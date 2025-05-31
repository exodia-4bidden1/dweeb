<div id="sidebar" class="sidebar">
    <div class="logo">
        <h1><span>Just</span><span>In</span><span>Case</span></h1>
        <p>Admin</p>
    </div>

    <hr />

    <div class="menu-section">
        <div class="menu-title">DEVICE MANAGEMENT</div>
        <ul class="menu-items">
            <li class="menu-item">
                <a href="./main-page-faculty.php" class="menu-link">
                    <i class="fas fa-desktop icon"></i>
                    Device Catalog
                </a>
            </li>
            <li class="menu-item">
                <a href="./device-inventory.php" class="menu-link">
                    <i class="fas fa-clipboard-list icon"></i>
                    Device Inventory
                </a>
            </li>
        </ul>
    </div>

    <div class="menu-section">
        <div class="menu-title">TRANSACTIONS</div>
        <ul class="menu-items">
            <li class="menu-item">
                <a href="./transactions.php" class="menu-link">
                    <i class="fas fa-exchange-alt icon"></i>
                    Transactions
                </a>
            </li>
            <li class="menu-item">
                <a href="./late-returns.php" class="menu-link">
                    <i class="fas fa-clock icon"></i>
                    Late Returns
                </a>
            </li>
        </ul>
    </div>

    <div class="menu-section">
        <div class="menu-title">ADMINISTRATION</div>
        <ul class="menu-items">
            <li class="menu-item">
                <a href="./profile-settings.php" class="menu-link">
                    <i class="fas fa-user-cog icon"></i>
                    Account Settings
                </a>
            </li>
        </ul>
    </div>

    <div class="menu-section logout">
        <div class="menu-title">LOGOUT</div>
        <ul class="menu-items">
            <li class="menu-item">
                <a href="./logout.html" class="menu-link">
                    <i class="fas fa-sign-out-alt icon"></i>
                    Log out
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- MODAL TEMPLATES -->
<div id="modal-templates" style="display: none;">

    <!-- Add/Edit Device Modal Template -->
    <div id="device-modal-template" class="modal-template">
        <div class="modal-overlay">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 id="modal-title">Add New Device</h2>
                    <button class="close-modal" type="button">&times;</button>
                </div>
                <form class="device-form">
                    <div class="form-group">
                        <label for="deviceName">Device Name:</label>
                        <input type="text" id="deviceName" name="deviceName" required>
                    </div>
                    <div class="form-group">
                        <label for="deviceType">Device Type:</label>
                        <select id="deviceType" name="deviceType" required>
                            <option value="">Select Type</option>
                            <option value="Laptop">Laptop</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Phone">Phone</option>
                            <option value="Desktop">Desktop</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deviceSpecs">Device Specs:</label>
                        <input type="text" id="deviceSpecs" name="deviceSpecs" placeholder="e.g., M2 PRO, 16 GB RAM">
                    </div>
                    <div class="form-group">
                        <label for="deviceStatus">Status:</label>
                        <select id="deviceStatus" name="deviceStatus" required>
                            <option value="Available">Available</option>
                            <option value="In Use">In Use</option>
                            <option value="Maintenance">Maintenance</option>
                            <option value="Unavailable">Unavailable</option>
                        </select>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="cancel-btn">Cancel</button>
                        <button type="submit" class="submit-btn">Add Device</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal Template -->
    <div id="delete-modal-template" class="modal-template">
        <div class="modal-overlay">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Confirm Delete</h2>
                    <button class="close-modal" type="button">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this device?</p>
                    <div class="device-info">
                        <strong>Device ID:</strong> <span id="delete-device-id"></span><br>
                        <strong>Name:</strong> <span id="delete-device-name"></span>
                    </div>
                    <p class="warning-text">This action cannot be undone.</p>
                    <div class="form-actions">
                        <button type="button" class="cancel-btn">Cancel</button>
                        <button type="button" class="delete-confirm-btn">Delete Device</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>