<?php
session_start();
$errors = [
  'registration' => $_SESSION['registration_error'] ?? '',
  'login' => $_SESSION['login_error'] ?? '',
];
$success = $_SESSION['success'] ?? '';
$activeForm = $_SESSION['active_form'] ?? 'login';

function showError($error)
{
  if (!empty($error)) {
    echo "<div class='error-message'>$error</div>";
  }
}
function showSuccess($success)
{
  if (!empty($success)) {
    echo "<div class='success-message'>$success</div>";
  }
}
function isActiveForm($formName, $activeForm)
{
  return $formName === $activeForm ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JustInCase</title>

  <!-- CSS -->
  <link rel="stylesheet" href="../../styles/login-and-register.css" />

  <!-- Boxicons CSS -->
  <link
    href="https://cdn.boxicons.com/fonts/basic/boxicons.min.css" rel="stylesheet" />
  <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
</head>

<body>
  <!-- LOGIN FORM -->
  <section class="container forms">
    <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
      <div class="form content">
        <header>Hello Friend!</header>
        <p class="text">
          Welcome back you've been missed! Please login to continue.
        </p>
        <?= showSuccess($success) ?>
        <?php showError($errors['login']); ?>
        <form action="../../../../backend/auth/login-register-logic.php" method="post">
          <div class="field input-field">
            <input
              type="email"
              placeholder="NU Email"
              name="nu_email"
              class="input"
              required />
          </div>
          <div class="field input-field password-wrapper">
            <input
              type="password"
              placeholder="Password"
              name="password"
              id="login-password"
              autocomplete="off"
              class="password"
              required />
            <i class='bx bx-eye-closed toggle-password' toggle="#login-password"></i>
          </div>

          <div class="form-link-pass">
            <a href="#" class="forgot-pass-link">Forgot password?</a>
          </div>

          <div class="field button-field">
            <button>Login</button>
          </div>

          <div class="form-link-signin">
            <span>Don't have an account?
              <a
                href="clear-old.php?form=register"
                onclick="showForm('register-form')"
                class="signin-link">Register now</a></span>
          </div>
        </form>
      </div>
    </div>

    <!-- REGISTER FORM -->
    <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
      <div class="form content">
        <header>Sign Up</header>
        <div class="form-text">
          <p class="text">
            Please fill in the details below to create your account.
          </p>
        </div>
        <?= showError($errors['registration']) ?>
        <form action="../../../../backend/auth/login-register-logic.php" method="post">
          <div class="field-row">
            <div class="field input-field">
              <input
                type="text"
                placeholder="First Name"
                class="input"
                name="first_name"
                value="<?= htmlspecialchars($_SESSION['old']['first_name'] ?? '') ?>"
                required />
            </div>
            <div class="field input-field">
              <input
                type="text"
                placeholder="Last Name"
                class="input"
                name="last_name"
                value="<?= htmlspecialchars($_SESSION['old']['last_name'] ?? '') ?>"
                required />
            </div>
          </div>

          <div class="field input-field">
            <input
              type="email"
              name="nu_email"
              pattern="[a-zA-Z0-9._%+-]+@students\.nu-dasma\.edu\.ph"
              placeholder="NU Email"
              class="input"
              value="<?= htmlspecialchars($_SESSION['old']['nu_email'] ?? '') ?>"
              required />
          </div>
          <div class="field input-field">
            <input
              type="text"
              name="student_id"
              placeholder="Student ID"
              maxlength="11"
              class="input"
              value="<?= htmlspecialchars($_SESSION['old']['student_id'] ?? '') ?>"
              required />
          </div>
          <div class="field input-field password-wrapper">
            <input
              type="password"
              name="password"
              placeholder="Password"
              autocomplete="off"
              class="password"
              id="register-password"
              required />
            <i class='bx bx-eye-closed toggle-password' toggle="#register-password"></i>
          </div>
          <div class="field input-field password-wrapper">
            <input
              type="password"
              name="confirm_password"
              placeholder="Confirm Password"
              class="confirmPassword"
              id="register-confirm-password"
              autocomplete="off"
              required />
            <i class='bx bx-eye-closed toggle-password' toggle="#register-confirm-password"></i>
          </div>
          <div class="field input-field select-wrapper">
            <select class="input" name="program" required>
              <option value="" disabled <?= empty($_SESSION['old']['program']) ? 'selected' : '' ?>>Select Program</option>
              <option value="IT" <?= (($_SESSION['old']['program'] ?? '') === 'IT') ? 'selected' : '' ?>>Information Technology</option>
              <option value="CS" <?= (($_SESSION['old']['program'] ?? '') === 'CS') ? 'selected' : '' ?>>Computer Science</option>
            </select>
            <i class="bx bx-chevron-down dropdown-icon"></i>
          </div>
          <div class="field-row">
            <div class="field input-field select-wrapper">
              <select class="input" name="year_level" required>
                <option value="" disabled <?= empty($_SESSION['old']['year_level']) ? 'selected' : '' ?>>Year Level</option>
                <option value="1" <?= (($_SESSION['old']['year_level'] ?? '') === '1') ? 'selected' : '' ?>>1st Year</option>
                <option value="2" <?= (($_SESSION['old']['year_level'] ?? '') === '2') ? 'selected' : '' ?>>2nd Year</option>
                <option value="3" <?= (($_SESSION['old']['year_level'] ?? '') === '3') ? 'selected' : '' ?>>3rd Year</option>
                <option value="4" <?= (($_SESSION['old']['year_level'] ?? '') === '4') ? 'selected' : '' ?>>4th Year</option>
              </select>
              <i class="bx bx-chevron-down dropdown-icon"></i>
            </div>
            <div class="field input-field">
              <input
                type="text"
                placeholder="09XXXXXXXXX"
                class="input"
                name="contact_num"
                maxlength="11"
                pattern="[0-9]{11}"
                value="<?= htmlspecialchars($_SESSION['old']['contact_num'] ?? '') ?>"
                required />
            </div>
          </div>
          <div class="field button-field">
            <button type="submit" name="register">Create My Account</button>
          </div>
          <div class="form-link-login">
            <span>Already have an account?
              <a href="clear-old.php?form=login" onclick="showForm('login-form')" class="login-link">Login here</a></span>
          </div>
          <div class="">
            <p class="condition-text">
              By clicking continue, you agree to our
              <a href="#" class="terms-link">Terms of Service</a> and
              <a href="#" class="privacy-link">Privacy Policy</a>.
            </p>
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- JavaScript -->
  <script src="../../scripts/login-and-register.js"></script>
</body>

</html>
<?php
unset(
  $_SESSION['registration_error'],
  $_SESSION['login_error'],
  $_SESSION['success'],
  $_SESSION['active_form'],
  $_SESSION['old']
);
?>