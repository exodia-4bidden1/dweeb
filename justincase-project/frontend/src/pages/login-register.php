<?php

session_start();
require_once '../pages/backend/config/config.php';  // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Registration for students only
    if (isset($_POST['register'])) {
        $first_name = trim($_POST['first_name'] ?? '');
        $last_name = trim($_POST['last_name'] ?? '');
        $nu_email = trim($_POST['nu_email'] ?? '');
        $student_id = trim($_POST['student_id'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';
        $program = $_POST['program'] ?? '';
        $year_level = $_POST['year_level'] ?? '';
        $contact_num = trim($_POST['contact_num'] ?? '');

        // Student ID pattern: 4 digits, dash, 6 digits (e.g., 2023-172077)
        $student_id_pattern = '/^\d{4}-\d{6}$/';
        // Password: min 8 chars, 1 uppercase, 1 symbol
        $password_pattern = '/^(?=.*[A-Z])(?=.*[\W_]).{8,}$/';

        function store_old($first_name, $last_name, $nu_email, $student_id, $program, $year_level, $contact_num)
        {
            $_SESSION['old'] = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'nu_email' => $nu_email,
                'student_id' => $student_id,
                'program' => $program,
                'year_level' => $year_level,
                'contact_num' => $contact_num
            ];
        }

        if ($first_name && $last_name && $nu_email && $student_id && $password && $confirm_password && $program && $year_level && $contact_num) {
            if (strpos($nu_email, '@students.nu-dasma.edu.ph') === false) {
                $_SESSION['registration_error'] = "Please use your NU student email.";
                $_SESSION['active_form'] = 'register';
                store_old($first_name, $last_name, $nu_email, $student_id, $program, $year_level, $contact_num);
            } elseif (!preg_match($student_id_pattern, $student_id)) {
                $_SESSION['registration_error'] = "Student ID must be in the format YYYY-NNNNNN (e.g., 2023-172077).";
                $_SESSION['active_form'] = 'register';
                store_old($first_name, $last_name, $nu_email, $student_id, $program, $year_level, $contact_num);
            } elseif (strlen($student_id) !== 11) {
                $_SESSION['registration_error'] = "Student ID must be exactly 11 characters.";
                $_SESSION['active_form'] = 'register';
                store_old($first_name, $last_name, $nu_email, $student_id, $program, $year_level, $contact_num);
            } elseif (!preg_match($password_pattern, $password)) {
                $_SESSION['registration_error'] = "Password must be at least 8 characters, include 1 uppercase letter and 1 symbol.";
                $_SESSION['active_form'] = 'register';
                store_old($first_name, $last_name, $nu_email, $student_id, $program, $year_level, $contact_num);
            } elseif ($password !== $confirm_password) {
                $_SESSION['registration_error'] = "Passwords do not match.";
                $_SESSION['active_form'] = 'register';
                store_old($first_name, $last_name, $nu_email, $student_id, $program, $year_level, $contact_num);
            } elseif (!preg_match('/^09\d{9}$/', $contact_num)) {
                $_SESSION['registration_error'] = "Contact number must be 11 digits, start with 09, and contain only numbers.";
                $_SESSION['active_form'] = 'register';
                store_old($first_name, $last_name, $nu_email, $student_id, $program, $year_level, $contact_num);
            } else {
                // Check if student is already registered by email or student ID
                $stmt = $conn->prepare("SELECT student_id, nu_email FROM students WHERE nu_email = ? OR student_id = ?");
                $stmt->bind_param("ss", $nu_email, $student_id);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($existing_id, $existing_email);
                    $stmt->fetch();
                    if ($existing_id === $student_id && $existing_email === $nu_email) {
                        $_SESSION['registration_error'] = "This student has already registered.";
                    } elseif ($existing_id === $student_id) {
                        $_SESSION['registration_error'] = "This student ID is already registered.";
                    } else {
                        $_SESSION['registration_error'] = "This NU email is already registered.";
                    }
                    $_SESSION['active_form'] = 'register';
                    store_old($first_name, $last_name, $nu_email, $student_id, $program, $year_level, $contact_num);
                } else {
                    // Hash the password for security
                    $password = password_hash($password, PASSWORD_DEFAULT);

                    $stmt = $conn->prepare("INSERT INTO students (student_id, nu_email, first_name, last_name, year_level, contact_num, program, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssssss", $student_id, $nu_email, $first_name, $last_name, $year_level, $contact_num, $program, $password);
                    if ($stmt->execute()) {
                        $_SESSION['success'] = "Registration successful! You can now log in.";
                        $_SESSION['active_form'] = 'login';
                        unset($_SESSION['old']);
                        header("Location: index.php");
                    } else {
                        $_SESSION['registration_error'] = "Registration failed. Please try again.";
                        $_SESSION['active_form'] = 'register';
                        store_old($first_name, $last_name, $nu_email, $student_id, $program, $year_level, $contact_num);
                    }
                }
                $stmt->close();
            }
        } else {
            $_SESSION['registration_error'] = "Please fill in all fields.";
            $_SESSION['active_form'] = 'register';
            store_old($first_name, $last_name, $nu_email, $student_id, $program, $year_level, $contact_num);
        }
        header("Location: index.php");
        exit();
    }
    // Login for both students and faculty
    else {
        $nu_email = trim($_POST['nu_email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($nu_email && $password) {
            if (strpos($nu_email, '@students.nu-dasma.edu.ph') !== false) {
                $role = 'student';
                $stmt = $conn->prepare("SELECT student_id, password, first_name, last_name FROM students WHERE nu_email = ?");
            } elseif (strpos($nu_email, '@nu-dasma.edu.ph') !== false) {
                $role = 'faculty';
                $stmt = $conn->prepare("SELECT faculty_id, password, first_name, last_name FROM faculty WHERE nu_email = ?");
            } else {
                $error = "Invalid Student Email or Password";
            }

            if (isset($stmt)) {
                $stmt->bind_param("s", $nu_email);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows === 1) {
                    $stmt->bind_result($id, $hashed_password, $first_name, $last_name);
                    $stmt->fetch();

                    error_log("Entered password: $password");
                    error_log("Hashed password from DB: $hashed_password");
                    // For demo: plain text password check. In production, use password_hash and password_verify.
                    if (password_verify($password, $hashed_password)) {
                        $_SESSION['user_id'] = $id;
                        $_SESSION['role'] = $role;
                        $_SESSION['first_name'] = $first_name;
                        $_SESSION['last_name'] = $last_name;
                        // Redirect to different portal based on role
                        if ($role === 'faculty') {
                            header("Location: faculty-page.php");
                        } else {
                            header("Location: student-page.php");
                        }
                        exit;
                    } else {
                        $error = "Incorrect password.";
                    }
                } else {
                    $error = "Invalid Student Email or Password.";
                }
                $stmt->close();
            }
        } else {
            $error = "Please fill in all fields.";
        }
        $_SESSION['login_error'] = $error ?? '';
        $_SESSION['active_form'] = 'login';
        header("Location: index.php");
        exit();
    }
}
?>
<!-- Display error or success if any -->
<?php if (!empty($error)): ?>
    <div style="color:red;"><?php echo htmlspecialchars($error); ?></div>
<?php elseif (!empty($success)): ?>
    <div style="color:green;"><?php echo htmlspecialchars($success); ?></div>
<?php endif; ?>
<!-- ...existing HTML form code... -->