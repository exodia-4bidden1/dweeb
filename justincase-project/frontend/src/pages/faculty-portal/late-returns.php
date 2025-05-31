<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustInCase - Late Returns</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../../styles/late-returns.css">
    <link rel="stylesheet" href="../../styles/sidebar-faculty.css">
</head>

<body>
    <div class="container">
        <div id="sidebar-container"></div>

        <div class="main-content" id="main-content">
            <div class="header">
                <img src="../../../assets/ic_sidebar_blue.svg" alt="menu" id="menu-toggle" width="20" height="20">
                <div class="user-info">Hello, Professor!</div>
            </div>

            <div class="content">
                <h1 class="page-title">Late Return</h1>

                <div class="search-container">
                    <input type="text" class="search-bar" placeholder="Search by student ID, device ID...">
                </div>

                <div class="tabs">
                    <div class="tab active" data-filter="Overdue">Current Overdue <span class="tab-count">12</span></div>
                    <div class="tab" data-filter="Pending">Pending Resolution <span class="tab-count">5</span></div>
                    <div class="tab" data-filter="All">All Late Returns</div>
                </div>

                <div class="deadline-notification">
                    Return Deadline: 5:00 PM Today
                </div>

                <div class="table-container">
                    <table class="returns-table">
                        <thead>
                            <tr>
                                <th>STUDENT ID</th>
                                <th>STUDENT NAME</th>
                                <th>DEVICE ID</th>
                                <th>CHECKOUT DATE</th>
                                <th>DUE TIME</th>
                                <th>OVERDUE BY</th>
                                <th>STATUS</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="student-id">STU-001</td>
                                <td>Juan Dela Cruz</td>
                                <td>DEV-001</td>
                                <td>May 19, 2025</td>
                                <td>5:00 PM</td>
                                <td class="overdue-time">1h 43m</td>
                                <td><span class="status-badge status-overdue">Overdue</span></td>
                                <td>
                                    <div class="action-icons">
                                        <i class="fas fa-edit action-icon edit-icon"></i>
                                        <i class="fas fa-trash-alt action-icon delete-icon"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="student-id">STU-002</td>
                                <td>Mang Kanor</td>
                                <td>DEV-002</td>
                                <td>May 19, 2025</td>
                                <td>5:00 PM</td>
                                <td class="overdue-time">1h 43m</td>
                                <td><span class="status-badge status-overdue">Overdue</span></td>
                                <td>
                                    <div class="action-icons">
                                        <i class="fas fa-edit action-icon edit-icon"></i>
                                        <i class="fas fa-trash-alt action-icon delete-icon"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="student-id">STU-003</td>
                                <td>Wally Bayola</td>
                                <td>DEV-003</td>
                                <td>May 19, 2025</td>
                                <td>5:00 PM</td>
                                <td class="overdue-time">1h 43m</td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                                <td>
                                    <div class="action-icons">
                                        <i class="fas fa-edit action-icon edit-icon"></i>
                                        <i class="fas fa-trash-alt action-icon delete-icon"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="student-id">STU-004</td>
                                <td>Mama Mo Jr.</td>
                                <td>DEV-004</td>
                                <td>May 19, 2025</td>
                                <td>5:00 PM</td>
                                <td class="overdue-time">1h 43m</td>
                                <td><span class="status-badge status-resolved">Resolved</span></td>
                                <td>
                                    <div class="action-icons">
                                        <i class="fas fa-edit action-icon edit-icon"></i>
                                        <i class="fas fa-trash-alt action-icon delete-icon"></i>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal-overlay" id="edit-modal">
        <div class="modal">
            <div class="modal-header">
                <h3>Edit Late Return</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <form id="edit-form">
                    <div class="modal-form-group">
                        <label for="edit-student-id">Student ID</label>
                        <input type="text" id="edit-student-id" class="modal-form-control" readonly>
                    </div>
                    <div class="modal-form-group">
                        <label for="edit-student-name">Student Name</label>
                        <input type="text" id="edit-student-name" class="modal-form-control">
                    </div>
                    <div class="modal-form-group">
                        <label for="edit-device-id">Device ID</label>
                        <input type="text" id="edit-device-id" class="modal-form-control">
                    </div>
                    <div class="modal-form-group">
                        <label for="edit-checkout-date">Checkout Date</label>
                        <input type="date" id="edit-checkout-date" class="modal-form-control">
                    </div>
                    <div class="modal-form-group">
                        <label for="edit-due-time">Due Time</label>
                        <input type="time" id="edit-due-time" class="modal-form-control">
                    </div>
                    <div class="modal-form-group">
                        <label for="edit-status">Status</label>
                        <select id="edit-status" class="modal-form-control">
                            <option value="Overdue">Overdue</option>
                            <option value="Pending">Pending Resolution</option>
                            <option value="Resolved">Resolved</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="modal-button modal-button-cancel">Cancel</button>
                <button type="submit" form="edit-form" class="modal-button modal-button-confirm">Save Changes</button>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal-overlay" id="delete-modal">
        <div class="modal">
            <div class="modal-header">
                <h3>Confirm Deletion</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <div class="delete-confirmation-icon">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <p class="delete-confirmation-message">Are you sure you want to delete this late return record? This action cannot be undone.</p>
                <div class="delete-confirmation-details">
                    <p><strong>Student ID:</strong> <span id="delete-student-id"></span></p>
                    <p><strong>Student Name:</strong> <span id="delete-student-name"></span></p>
                    <p><strong>Device ID:</strong> <span id="delete-device-id"></span></p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="modal-button modal-button-cancel">Cancel</button>
                <button class="modal-button modal-button-delete confirm-delete-btn">Delete</button>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // 4aLRScript.js - Late Returns Script  
        document.addEventListener("DOMContentLoaded", () => {
            fetch('./sidebar-faculty.php')
                .then(response => response.text())
                .then(html => {
                    document.getElementById('sidebar-container').innerHTML = html;
                    initializeSidebar();
                    setActiveNavigation('Late Returns'); // ← This makes Late Returns active
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

        // Initialize tabs with filtering
        const tabs = document.querySelectorAll('.tab');
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');
                filterTableRows(filter);
            });
        });

        // Filter table rows based on status
        function filterTableRows(filter) {
            const rows = document.querySelectorAll('.returns-table tbody tr');

            rows.forEach(row => {
                const statusBadge = row.querySelector('.status-badge');
                const status = statusBadge ? statusBadge.textContent.trim() : '';

                if (filter === 'All') {
                    row.style.display = '';
                } else {
                    row.style.display = status === filter ? '' : 'none';
                }
            });

            // Update tab counts (example - you would replace with real data)
            updateTabCounts();
        }

        // Example function to update tab counts
        function updateTabCounts() {
            const counts = {
                overdue: document.querySelectorAll('.status-badge.status-overdue').length,
                pending: document.querySelectorAll('.status-badge.status-pending').length
            };

            document.querySelector('.tab[data-filter="Overdue"] .tab-count').textContent = counts.overdue;
            document.querySelector('.tab[data-filter="Pending"] .tab-count').textContent = counts.pending;
        }

        // Initialize modals with new structure
        const editModal = document.getElementById('edit-modal');
        const deleteModal = document.getElementById('delete-modal');
        const closeButtons = document.querySelectorAll('.modal-close, .modal-button-cancel');

        // Show modal function
        function showModal(modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // Hide modal function
        function hideModal(modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }

        // Edit functionality
        document.querySelectorAll('.edit-icon').forEach(icon => {
            icon.addEventListener('click', function(e) {
                const row = e.target.closest('tr');
                const cells = row.querySelectorAll('td');

                document.getElementById('edit-student-id').value = cells[0].textContent;
                document.getElementById('edit-student-name').value = cells[1].textContent;
                document.getElementById('edit-device-id').value = cells[2].textContent;

                // Format date for input
                const checkoutDate = new Date(cells[3].textContent);
                document.getElementById('edit-checkout-date').valueAsDate = checkoutDate;

                // Format time for input
                const timeParts = cells[4].textContent.split(' ');
                const [hours, minutes] = timeParts[0].split(':');
                const period = timeParts[1];
                let hours24 = period === 'PM' ? parseInt(hours) + 12 : hours;
                if (hours24 === 24) hours24 = 12;
                if (period === 'AM' && hours === '12') hours24 = 0;

                document.getElementById('edit-due-time').value = `${hours24.toString().padStart(2, '0')}:${minutes}`;

                // Set status
                const status = cells[6].querySelector('.status-badge').textContent;
                document.getElementById('edit-status').value = status;

                showModal(editModal);
            });
        });

        // Delete functionality
        document.querySelectorAll('.delete-icon').forEach(icon => {
            icon.addEventListener('click', function(e) {
                const row = e.target.closest('tr');
                const cells = row.querySelectorAll('td');

                document.getElementById('delete-student-id').textContent = cells[0].textContent;
                document.getElementById('delete-student-name').textContent = cells[1].textContent;
                document.getElementById('delete-device-id').textContent = cells[2].textContent;

                showModal(deleteModal);
                deleteModal.dataset.row = row.rowIndex;
            });
        });

        // Close modals
        closeButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const modal = this.closest('.modal-overlay');
                hideModal(modal);
            });
        });

        // Close modal when clicking outside
        document.querySelectorAll('.modal-overlay').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    hideModal(this);
                }
            });
        });

        // Save edit form
        document.getElementById('edit-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const studentId = document.getElementById('edit-student-id').value;
            const studentName = document.getElementById('edit-student-name').value;
            const deviceId = document.getElementById('edit-device-id').value;
            const checkoutDate = document.getElementById('edit-checkout-date').valueAsDate;
            const dueTime = document.getElementById('edit-due-time').value;
            const status = document.getElementById('edit-status').value;

            // Format date
            const formattedDate = checkoutDate.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            // Format time
            const [hours, minutes] = dueTime.split(':');
            let hours12 = hours % 12 || 12;
            const period = hours >= 12 ? 'PM' : 'AM';
            const formattedTime = `${hours12}:${minutes} ${period}`;

            // Find and update the row
            document.querySelectorAll(`.student-id`).forEach(cell => {
                if (cell.textContent === studentId) {
                    const row = cell.closest('tr');
                    row.querySelector('td:nth-child(2)').textContent = studentName;
                    row.querySelector('td:nth-child(3)').textContent = deviceId;
                    row.querySelector('td:nth-child(4)').textContent = formattedDate;
                    row.querySelector('td:nth-child(5)').textContent = formattedTime;

                    // Update status
                    const statusBadge = row.querySelector('.status-badge');
                    statusBadge.textContent = status;
                    statusBadge.className = 'status-badge'; // Reset classes

                    if (status === 'Overdue') {
                        statusBadge.classList.add('status-overdue');
                    } else if (status === 'Pending') {
                        statusBadge.classList.add('status-pending');
                    } else if (status === 'Resolved') {
                        statusBadge.classList.add('status-resolved');
                    }
                }
            });

            editModal.style.display = 'none';
            updateTabCounts(); // Update counts after edit
        });


        // Confirm deletion
        document.querySelector('.confirm-delete-btn').addEventListener('click', function() {
            const rowIndex = deleteModal.dataset.row;
            const table = document.querySelector('.returns-table');

            if (table && rowIndex) {
                table.deleteRow(rowIndex);
            }

            hideModal(deleteModal);
            updateTabCounts();
        });

        // Close modal when clicking outside
        window.addEventListener('click', function(e) {
            if (e.target === editModal) {
                editModal.style.display = 'none';
            }
            if (e.target === deleteModal) {
                deleteModal.style.display = 'none';
            }
        });

        // Search functionality
        const searchBar = document.querySelector('.search-bar');
        searchBar.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.returns-table tbody tr');

            rows.forEach(row => {
                if (row.style.display === 'none') return; // Skip hidden rows

                let found = false;
                const cells = row.querySelectorAll('td');

                cells.forEach(cell => {
                    if (cell.textContent.toLowerCase().includes(searchTerm)) {
                        found = true;
                    }
                });

                row.style.display = found ? '' : 'none';
            });
        });

        function initializeSidebar() {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');

            if (menuToggle && sidebar && mainContent) {
                menuToggle.addEventListener('click', () => {
                    sidebar.classList.toggle('active');
                    mainContent.classList.toggle('shifted');
                });

                // Close sidebar when clicking outside on mobile
                document.addEventListener('click', (e) => {
                    if (window.innerWidth <= 768) {
                        if (!sidebar.contains(e.target) && !menuToggle.contains(e.target)) {
                            sidebar.classList.remove('active');
                            mainContent.classList.remove('shifted');
                        }
                    }
                });

                // Handle window resize
                window.addEventListener('resize', () => {
                    if (window.innerWidth > 768) {
                        sidebar.classList.remove('active');
                        mainContent.classList.remove('shifted');
                    }
                });
            }
        }
    </script>
</body>

</html>