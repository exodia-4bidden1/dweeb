<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustInCase - Account Settings</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../../styles/profile-settings-faculty.css">
    <link rel="stylesheet" href="../../styles/sidebar-faculty.css">
</head>

<body>
    <div id="sidebar-container"></div>

    <!-- MAIN CONTENT -->
    <div class="main-content" id="main-content">
        <div class="header">
            <img src="../../../assets/ic_sidebar_blue.svg" alt="menu" id="menu-toggle" width="20" height="20">
            <div class="user-info">Hello, Professor!</div>
        </div>

        <div class="content">
            <div class="settings-container">
                <div class="settings-header">
                    <h1 class="settings-title">Account Settings</h1>
                    <p class="settings-subtitle">Manage your profile and preferences</p>
                </div>

                <div class="settings-content">
                    <div class="tab-navigation">
                        <button class="tab-button active">Profile</button>
                    </div>

                    <div class="profile-section">
                        <div class="section-header">
                            <h2 class="section-title">Personal Information</h2>
                            <button class="edit-button" id="edit-profile-btn">
                                <i class="fas fa-edit"></i>
                                Edit Profile
                            </button>
                        </div>

                        <div class="profile-info">
                            <div class="profile-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="profile-details">
                                <h3 class="profile-name">Juan Dela Cruz</h3>
                                <p class="profile-id">2023-171883</p>
                                <p class="profile-department">Computer Science</p>
                            </div>
                        </div>

                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">First Name</span>
                                <span class="info-value">Juan</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Middle Name (Optional)</span>
                                <span class="info-value">N/A</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Last Name</span>
                                <span class="info-value">Dela Cruz</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">School Email</span>
                                <span class="info-value">juandelacruz@students.nu-dasma.edu.ph</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Program</span>
                                <span class="info-value">Computer Science</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Room Location</span>
                                <span class="info-value">Networking Room - 534</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Edit Profile Modal -->
    <div id="edit-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Profile</h2>
            </div>
            <form id="edit-form">
                <div class="form-group">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-input" id="first-name" value="Juan" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Middle Name (Optional)</label>
                    <input type="text" class="form-input" id="middle-name" value="">
                </div>
                <div class="form-group">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-input" id="last-name" value="Dela Cruz" required>
                </div>
                <div class="form-group">
                    <label class="form-label">School Email</label>
                    <input type="email" class="form-input" id="email" value="juandelacruz@students.nu-dasma.edu.ph" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Program</label>
                    <input type="text" class="form-input" id="program" value="Computer Science" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Room Location</label>
                    <input type="text" class="form-input" id="room" value="Networking Room - 534" required>
                </div>
                <div class="modal-buttons">
                    <button type="button" class="btn btn-secondary" id="cancel-edit">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Load sidebar dynamically from fragments.html
        // 5ASScript.js - Account Settings Script
        document.addEventListener("DOMContentLoaded", () => {
            fetch('./sidebar-faculty.php')
                .then(response => response.text())
                .then(html => {
                    document.getElementById('sidebar-container').innerHTML = html;
                    initializeSidebar();
                    setActiveNavigation('Account Settings'); // ← This makes Account Settings active
                    initializeModals();
                })
                .catch(error => {
                    console.error('Error loading sidebar:', error);
                });
        });

        // SHARED FUNCTION - Add this to each script file
        function setActiveNavigation(pageName) {
            // Remove any existing active classes
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => item.classList.remove('active'));

            // Find and activate the corresponding menu item
            const menuLinks = document.querySelectorAll('.menu-link');
            menuLinks.forEach(link => {
                const linkText = link.textContent.trim();

                if (linkText.includes(pageName)) {
                    const menuItem = link.closest('.menu-item');
                    if (menuItem) {
                        menuItem.classList.add('active');
                    }
                }
            });
        }

        function initializeSidebar() {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');

            if (menuToggle && sidebar && mainContent) {
                menuToggle.addEventListener('click', () => {
                    sidebar.classList.toggle('active');
                    mainContent.classList.toggle('shifted');
                });

                document.addEventListener('click', e => {
                    const isClickInside = sidebar.contains(e.target) || menuToggle.contains(e.target);
                    if (!isClickInside || e.target.closest('.menu-item')) {
                        sidebar.classList.remove('active');
                    }
                });

                document.addEventListener('click', (e) => {
                    if (window.innerWidth <= 768) {
                        if (!sidebar.contains(e.target) && !menuToggle.contains(e.target)) {
                            sidebar.classList.remove('active');
                            mainContent.classList.remove('shifted');
                        }
                    }
                });

                window.addEventListener('resize', () => {
                    if (window.innerWidth > 768) {
                        sidebar.classList.remove('active');
                        mainContent.classList.remove('shifted');
                    }
                });
            }
        }

        // Edit profile modal functionality
        const editBtn = document.getElementById('edit-profile-btn');
        const modal = document.getElementById('edit-modal');
        const cancelBtn = document.getElementById('cancel-edit');
        const form = document.getElementById('edit-form');

        editBtn.addEventListener('click', () => {
            modal.style.display = 'block';
        });

        cancelBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });

        form.addEventListener('submit', (e) => {
            e.preventDefault();

            // Get form values
            const firstName = document.getElementById('first-name').value;
            const middleName = document.getElementById('middle-name').value;
            const lastName = document.getElementById('last-name').value;
            const email = document.getElementById('email').value;
            const program = document.getElementById('program').value;
            const room = document.getElementById('room').value;

            // Update profile display
            document.querySelector('.profile-name').textContent = `${firstName} ${lastName}`;
            document.querySelector('.profile-department').textContent = program;

            // Update info grid
            const infoValues = document.querySelectorAll('.info-value');
            infoValues[0].textContent = firstName;
            infoValues[1].textContent = middleName || 'N/A';
            infoValues[2].textContent = lastName;
            infoValues[3].textContent = email;
            infoValues[4].textContent = program;
            infoValues[5].textContent = room;

            // Close modal
            modal.style.display = 'none';

            // Show success message (optional)
            alert('Profile updated successfully!');
        });
    </script>
</body>

</html>