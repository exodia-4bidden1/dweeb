<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JustInCase - Device Catalog</title>

  <!-- Tailwindcss CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="../../styles/main-page-student.css" />
  <link rel="stylesheet" href="../../styles/borrow-modal.css" />
  <link rel="stylesheet" href="../../styles/borrowed-devices.css" />

  <!-- Boxicons -->
  <link
    href="https://cdn.boxicons.com/fonts/basic/boxicons.min.css"
    rel="stylesheet" />
</head>

<body>
  <div class="sidebar">
    <div class="sidebar-header">
      <div class="logo">
        <div class="logo-icon">A</div>
        <span>JustInCase</span>
      </div>
    </div>

    <nav class="sidebar-nav">
      <div class="nav-section">
        <div class="nav-section-title">Device Management</div>
        <a href="#" class="nav-item active" data-page="device-catalog">
          <span class="flex items-center gap-4">
            <i class="bx bxs-laptop" style="color: #7c7979"></i>
            Device Catalog
          </span>
        </a>
        <a href="#" class="nav-item" data-page="borrowed-devices">
          <span class="flex items-center gap-4">
            <i class="bx bxs-history" style="color: #7c7979"></i>
            Transactions
          </span>
        </a>
        <a href="#" class="nav-item" data-page="notifications">
          <span class="flex items-center gap-4">
            <i class="bx bxs-bell" style="color: #7c7979"></i>
            Notifications
          </span>
        </a>
      </div>

      <div class="nav-section">
        <div class="nav-section-title">Account</div>
        <a href="#" class="nav-item" data-page="user-agreement">
          <span class="flex items-center gap-4">
            <i class="bx bxs-reading" style="color: #7c7979"></i>
            User Agreement
          </span>
        </a>
        <a href="#" class="nav-item" data-page="account-settings">
          <span class="flex items-center gap-4">
            <i class="bx bxs-user-circle" style="color: #7c7979"></i>
            Account Settings
          </span>
        </a>
      </div>

      <div class="nav-section">
        <div class="nav-section-title">Support</div>
        <a href="#" class="nav-item" data-page="terms-conditions">
          <span class="flex items-center gap-4">
            <i class="bx bxs-book-open" style="color: #7c7979"></i>
            Terms & Conditions
          </span>
        </a>
        <a href="#" class="nav-item" data-page="faq">
          <span class="flex items-center gap-4">
            <i
              class="bx bxs-message-circle-question-mark"
              style="color: #7c7979"></i>
            FAQ
          </span>
        </a>
      </div>
    </nav>

    <div class="sidebar-footer">
      <div class="user-profile">
        <div class="user-avatar">JD</div>
        <div class="user-info">
          <div class="user-name">John Doe</div>
          <div class="user-role">Student</div>
        </div>
      </div>
    </div>
  </div>

  <div class="main-content">
    <!-- Device Catalog Section -->
    <div class="content-section active" id="device-catalog">
      <div class="content-header">
        <h1 class="content-title">Device Catalog</h1>
        <p class="content-subtitle">
          Browse and borrow available devices in your organization.
        </p>
      </div>

      <div class="search-bar">
        <div class="search-input-wrapper">
          <i class="bx bx-search-alt search-icon"></i>
          <input
            type="text"
            class="search-input"
            placeholder="Search devices by name, model, or specifications..."
            id="searchInput" />
        </div>
        <div class="select-wrapper">
          <select class="filter-select" id="statusFilter">
            <option value="all">All Status</option>
            <option value="available">Available</option>
            <option value="borrowed">Borrowed</option>
            <option value="maintenance">Under Maintenance</option>
            <option value="unavailable">Unavailable</option>
          </select>
          <i class="bx bxs-chevron-down custom-dropdown-icon"></i>
        </div>
        <div class="select-wrapper">
          <select class="filter-select" id="typeFilter">
            <option value="all">All Types</option>
            <option value="laptop">Laptops</option>
            <option value="phone">Phones</option>
          </select>
          <i class="bx bxs-chevron-down custom-dropdown-icon"></i>
        </div>
      </div>

      <div class="device-grid" id="deviceGrid">
        <!-- Devices will be populated by JavaScript -->
      </div>
    </div>

    <!-- Borrow Modal -->
    <div id="modalOverlay" class="modal-overlay" style="display: none">
      <div class="modal">
        <div class="modal-header">
          <h2>Device Reservation</h2>
          <p>Fill out the form below to reserve your device</p>
        </div>
        <div class="modal-body">
          <div class="device-info">
            <div class="device-label">Device to Borrow</div>
            <div class="device-name" id="deviceName">Device Name Here</div>
          </div>
          <div id="successMessage" class="success-message">
            Reservation submitted successfully. You will receive a
            confirmation in your notification if approved.
          </div>
          <form
            id="reservationForm"
            onsubmit="event.preventDefault(); submitReservation();">
            <div class="form-group">
              <label for="purpose">Purpose of Borrowing</label>
              <select
                id="purpose"
                name="purpose"
                class="form-control"
                required>
                <option value="">Select purpose</option>
                <option value="Academic Project">Academic Project</option>
                <option value="Research">Research</option>
                <option value="Presentation">Presentation</option>
                <option value="Testing">Testing</option>
                <option value="Training">Training</option>
                <option value="Development">Development</option>
                <option value="Others">Others</option>
              </select>
              <div id="otherPurposeContainer" class="textarea-container">
                <label for="otherPurpose">Please specify</label>
                <textarea
                  id="otherPurpose"
                  name="otherPurpose"
                  class="form-control"
                  placeholder="Describe your specific purpose..."></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="borrowDate">Date to Borrow</label>
              <input
                type="date"
                id="borrowDate"
                name="borrowDate"
                class="form-control"
                required />
            </div>
            <div class="form-group">
              <label>Borrowing Period</label>
              <div class="time-grid">
                <div>
                  <label for="startTime">Start Time</label>
                  <select
                    id="startTime"
                    name="startTime"
                    class="form-control"
                    required>
                    <option value="">Select start time</option>
                    <option value="01:00">1:00 AM</option>
                    <option value="02:00">2:00 AM</option>
                    <option value="03:00">3:00 AM</option>
                    <option value="04:00">4:00 AM</option>
                    <option value="05:00">5:00 AM</option>
                  </select>
                </div>
                <div>
                  <label for="endTime">End Time</label>
                  <select
                    id="endTime"
                    name="endTime"
                    class="form-control"
                    required>
                    <option value="">Select end time</option>
                  </select>
                </div>
              </div>
              <div class="time-note">
                Borrowing is only available from 1:00 AM to 5:00 AM
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-container">
                <input type="checkbox" id="agreeTerms" required />
                <label for="agreeTerms">
                  I agree to the Device Lending Agreement and understand I'm
                  responsible for this equipment.
                </label>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-cancel"
                onclick="closeModal()">
                Cancel
              </button>
              <button type="submit" class="btn btn-submit" id="submitBtn">
                Submit Reservation
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Currently Borrowed Devices Section -->
    <div class="content-section" id="borrowed-devices">
      <div class="content-header">
        <h1 class="content-title">Currently Borrowed Devices</h1>
        <p class="content-subtitle">
          Manage your borrowed devices and return dates.
        </p>
      </div>

      <!-- Tabbed interface for filtering borrowed items -->
      <div class="borrowed-filter-tabs" style="margin-bottom: 20px;">
        <button class="tab-button active" data-filter="approved">Active</button>
        <button class="tab-button" data-filter="all">History</button>
      </div>

      <div id="borrowedDevicesList">
        <!-- Borrowed devices will be populated here dynamically -->
      </div>

      <div id="historyList">
        <!-- History of completed reservations will be populated here dynamically -->
      </div>

      <div class="card" style="margin-top: 20px;">
        <h3 style="margin-bottom: 16px; color: #1e293b">Return Guidelines</h3>
        <p style="color: #64748b; line-height: 1.6; margin-bottom: 12px">
          Please return devices by the specified due date to avoid late fees.
          Ensure devices are in good condition and include all original
          accessories.
        </p>
        <ul style="color: #64748b; line-height: 1.6; margin-left: 20px">
          <li>Return devices to the IT office during business hours</li>
          <li>Include original chargers and accessories</li>
          <li>Report any damage or issues immediately</li>
          <li>Contact support for extension requests</li>
        </ul>
      </div>
    </div>

    <!-- Notifications Section -->
    <div class="content-section" id="notifications">
      <div class="content-header">
        <h1 class="content-title">Notifications</h1>
        <p class="content-subtitle">
          Stay updated with device alerts and system messages.
        </p>
      </div>
      <div id="notificationList"></div>
    </div>

    <!-- <div class="notification-item error">
      <div class="notification-title">Device Return Overdue</div>
      <div class="notification-message">
        Your MacBook Pro 16" (LT001) was due yesterday. Please return it
        immediately to avoid additional charges.
      </div>
      <div class="notification-time">2 hours ago</div>
    </div>

    <div class="notification-item warning">
      <div class="notification-title">Device Due Soon</div>
      <div class="notification-message">
        Your iPad Pro (TB001) is due for return in 2 days. Plan accordingly
        to avoid late fees.
      </div>
      <div class="notification-time">1 day ago</div>
    </div>

    <div class="notification-item">
      <div class="notification-title">New Device Available</div>
      <div class="notification-message">
        A new Surface Laptop 5 has been added to the device catalog and is
        available for borrowing.
      </div>
      <div class="notification-time">3 days ago</div>
    </div>
  </div> -->

    <!-- User Agreement Section -->
    <div class="content-section" id="user-agreement">
      <div class="content-header">
        <h1 class="content-title">User Agreement</h1>
        <p class="content-subtitle">
          Review and accept the device borrowing agreement.
        </p>
      </div>

      <div class="terms-content">
        <h3>Device Borrowing Agreement</h3>
        <p>
          By borrowing devices from our organization, you agree to the
          following terms and conditions:
        </p>

        <h3>Responsibilities</h3>
        <p>
          You are responsible for the proper care and handling of all borrowed
          devices. This includes protecting devices from damage, theft, and
          unauthorized use.
        </p>

        <h3>Return Policy</h3>
        <p>
          All devices must be returned by the specified due date in the same
          condition as when borrowed. Late returns may incur additional fees.
        </p>

        <h3>Damage and Loss</h3>
        <p>
          You will be held financially responsible for any damage or loss of
          borrowed devices. Report any issues immediately to the IT
          department.
        </p>

        <h3>Usage Guidelines</h3>
        <p>
          Devices should only be used for work-related purposes. Installing
          unauthorized software or accessing inappropriate content is
          prohibited.
        </p>
      </div>

      <div style="margin-top: 20px">
        <label
          style="
              display: flex;
              align-items: center;
              gap: 8px;
              margin-bottom: 16px;
            ">
          <input type="checkbox" id="agreementCheck" />
          <span style="color: #374151">I have read and agree to the User Agreement</span>
        </label>
        <button class="btn-primary" onclick="acceptAgreement()">
          Accept Agreement
        </button>
      </div>
    </div>

    <!-- Account Settings Section -->
    <div class="content-section" id="account-settings">
      <div class="content-header">
        <h1 class="content-title">Account Settings</h1>
        <p class="content-subtitle">
          Manage your personal information and preferences.
        </p>
      </div>

      <div class="card">
        <h3 style="margin-bottom: 20px; color: #1e293b">
          Personal Information
        </h3>
        <div class="form-group">
          <label class="form-label">Full Name</label>
          <input type="text" class="form-input" value="John Doe" />
        </div>
        <div class="form-group">
          <label class="form-label">Email Address</label>
          <input
            type="email"
            class="form-input"
            value="john.doe@company.com" />
        </div>
        <div class="form-group">
          <label class="form-label">Department</label>
          <input
            type="text"
            class="form-input"
            value="Information Technology" />
        </div>
        <div class="form-group">
          <label class="form-label">Student ID</label>
          <input type="text" class="form-input" value="EMP001" readonly />
        </div>
        <div class="form-group">
          <label class="form-label">Year Level</label>
          <input type="text" class="form-input" value="1st Year" readonly />
        </div>
        <div class="form-group">
          <label class="form-label">Phone Number</label>
          <input
            type="number"
            class="form-input"
            value="09931026109"
            readonly />
        </div>
        <button class="btn-primary">Update Information</button>
      </div>

      <div class="card" style="margin-top: 20px">
        <h3 style="margin-bottom: 20px; color: #1e293b">
          Notification Preferences
        </h3>
        <label
          style="
              display: flex;
              align-items: center;
              gap: 8px;
              margin-bottom: 12px;
            ">
          <input type="checkbox" checked />
          <span style="color: #374151">Email notifications for due dates</span>
        </label>
        <label
          style="
              display: flex;
              align-items: center;
              gap: 8px;
              margin-bottom: 12px;
            ">
          <input type="checkbox" checked />
          <span style="color: #374151">SMS reminders</span>
        </label>
        <label
          style="
              display: flex;
              align-items: center;
              gap: 8px;
              margin-bottom: 16px;
            ">
          <input type="checkbox" />
          <span style="color: #374151">Weekly device availability updates</span>
        </label>
        <button class="btn-primary">Save Preferences</button>
      </div>
    </div>

    <!-- Terms and Conditions Section -->
    <div class="content-section" id="terms-conditions">
      <div class="content-header">
        <h1 class="content-title">Terms & Conditions</h1>
        <p class="content-subtitle">
          Complete terms and conditions for device usage.
        </p>
      </div>

      <div class="terms-content">
        <h3>1. Acceptance of Terms</h3>
        <p>
          By accessing and using our device borrowing system, you accept and
          agree to be bound by the terms and provision of this agreement.
        </p>

        <h3>2. Device Usage</h3>
        <p>
          All borrowed devices remain the property of the organization and
          must be used in accordance with company policies. Users are
          prohibited from modifying hardware or installing unauthorized
          software.
        </p>

        <h3>3. Security Requirements</h3>
        <p>
          Users must maintain appropriate security measures including password
          protection, screen locks, and secure storage when devices are not in
          use.
        </p>

        <h3>4. Liability and Insurance</h3>
        <p>
          The organization is not liable for any personal data loss or damage.
          Users are encouraged to backup important data regularly.
        </p>

        <h3>5. Termination</h3>
        <p>
          The organization reserves the right to terminate borrowing
          privileges at any time for violation of these terms or company
          policies.
        </p>

        <h3>6. Support and Maintenance</h3>
        <p>
          Technical support is available during business hours. Users should
          report any technical issues immediately to the IT department.
        </p>
      </div>
    </div>

    <!-- FAQ Section -->
    <div class="content-section" id="faq">
      <div class="content-header">
        <h1 class="content-title">Frequently Asked Questions</h1>
        <p class="content-subtitle">
          Find answers to common questions about device borrowing.
        </p>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          How long can I borrow a device?
          <span>+</span>
        </div>
        <div class="faq-answer">
          <p>
            The standard borrowing period is 30 days. Extensions may be
            available upon request, subject to device availability and
            approval from your supervisor.
          </p>
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          What happens if I damage a device?
          <span>+</span>
        </div>
        <div class="faq-answer">
          <p>
            Report any damage immediately to the IT department. You may be
            held financially responsible for repairs or replacement costs
            depending on the extent of damage and circumstances.
          </p>
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          Can I install my own software?
          <span>+</span>
        </div>
        <div class="faq-answer">
          <p>
            Software installation is restricted to approved applications only.
            Contact the IT department if you need specific software for work
            purposes.
          </p>
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          How do I return a device?
          <span>+</span>
        </div>
        <div class="faq-answer">
          <p>
            Return devices to the IT office during business hours (9 AM - 5
            PM). Ensure all original accessories are included and the device
            is clean and functional.
          </p>
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          What if I need to extend my borrowing period?
          <span>+</span>
        </div>
        <div class="faq-answer">
          <p>
            Submit an extension request at least 3 days before your due date
            through the system or contact the IT department directly.
            Extensions are subject to availability and approval.
          </p>
        </div>
      </div>
    </div>
  </div>

  <script src="../../scripts/main-page-student.js"></script>
  <script src="../../scripts/notifications.js"></script>
  <script src="../../scripts/borrowed-devices.js"></script>
</body>

</html>