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
  <link rel="stylesheet" href="../../styles/modal.css" />

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
        <select class="filter-select" id="statusFilter">
          <option value="all">All Status</option>
          <option value="available">Available</option>
          <option value="maintenance">Under Maintenance</option>
          <option value="unavailable">Unavailable</option>
        </select>
        <select class="filter-select" id="typeFilter">
          <option value="all">All Types</option>
          <option value="laptop">Laptops</option>
          <option value="desktop">Desktops</option>
          <option value="tablet">Tablets</option>
          <option value="phone">Phones</option>
        </select>
      </div>

      <div class="device-grid" id="deviceGrid">
        <!-- Devices will be populated by JavaScript -->
      </div>
    </div>

    <!-- Borrow Modal -->
    <div id="borrowModal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4);">
      <div style="background:#fff; margin:10% auto; padding:32px 24px; border-radius:8px; width:90%; max-width:400px; position:relative;">
        <span id="closeBorrowModal" style="position:absolute; top:12px; right:18px; font-size:24px; cursor:pointer;">&times;</span>
        <h2 id="modalDeviceName" style="margin-bottom:12px;">Borrow Device</h2>
        <div id="modalDeviceDetails" style="margin-bottom:20px; color:#64748b;"></div>
        <button id="confirmBorrowBtn" class="btn-primary" style="width:100%;">Confirm Borrow</button>
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

      <div class="borrowed-item">
        <div class="borrowed-info">
          <h4>MacBook Pro 16" (2023 M2 Pro)</h4>
          <p>Device ID: LT001 • Borrowed on: Jan 15, 2025</p>
        </div>
        <div class="due-date">Due: Feb 15, 2025</div>
      </div>

      <div class="borrowed-item">
        <div class="borrowed-info">
          <h4>iPad Pro 12.9" (6th Gen)</h4>
          <p>Device ID: TB001 • Borrowed on: Jan 20, 2025</p>
        </div>
        <div class="due-date">Due: Feb 20, 2025</div>
      </div>

      <div class="card">
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

      <div class="notification-item error">
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
    </div>

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

  <script>
    let devices = [];
    let filteredDevices = [];

    async function fetchDevices() {
      try {
        const response = await fetch("../../../../backend/api/get-devices.php");
        devices = await response.json();
        filteredDevices = [...devices];
        renderDevices(filteredDevices);
      } catch (e) {
        document.getElementById("deviceGrid").innerHTML =
          "<div>Error loading devices.</div>";
      }
    }

    fetchDevices();

    function renderDevices(devicesToRender) {
      const deviceGrid = document.getElementById("deviceGrid");
      deviceGrid.innerHTML = "";

      devicesToRender.forEach((device) => {
        const deviceCard = document.createElement("div");
        deviceCard.className = "device-card";

        const statusClass = `status-${device.status}`;
        const statusText =
          device.status.charAt(0).toUpperCase() + device.status.slice(1);
        const isAvailable = device.status === "available";

        const specsHTML = device.specs ?
          Object.entries(device.specs)
          .map(
            ([key, value]) => `
        <div class="spec-item">
            <span class="spec-label">${key}:</span>
            <span class="spec-value">${value}</span>
        </div>
      `
          )
          .join("") :
          "";

        deviceCard.innerHTML = `
  <div class="device-id">#${device.id}</div>
  <div class="device-icon">${device.icon}</div>
  <div class="device-title">${device.name}</div>
  <div class="device-model">${device.model}</div>
  <div class="device-specs">
    ${specsHTML}
  </div>
  <div class="device-footer">
    <span class="status-badge ${statusClass}">${statusText}</span>
    <span class="borrow-btn-placeholder"></span>
  </div>
`;

        const borrowBtn = document.createElement("button");
        borrowBtn.className = "borrow-btn";
        borrowBtn.disabled = !isAvailable;
        borrowBtn.textContent = isAvailable ? "Borrow" : "Not Available";
        borrowBtn.addEventListener("click", () => borrowDevice(device.id, device.name));

        // Place the button in the placeholder
        deviceCard.querySelector(".borrow-btn-placeholder").appendChild(borrowBtn);

        deviceGrid.appendChild(deviceCard);

        deviceGrid.appendChild(deviceCard);
      });
    }

    function filterDevices() {
      const searchTerm = document
        .getElementById("searchInput")
        .value.toLowerCase();
      const statusFilter = document.getElementById("statusFilter").value;
      const typeFilter = document.getElementById("typeFilter").value;

      filteredDevices = devices.filter((device) => {
        const matchesSearch =
          device.name.toLowerCase().includes(searchTerm) ||
          device.model.toLowerCase().includes(searchTerm) ||
          Object.values(device.specs).some((spec) =>
            spec.toLowerCase().includes(searchTerm)
          );

        const matchesStatus =
          statusFilter === "all" || device.status === statusFilter;
        const matchesType =
          typeFilter === "all" || device.type === typeFilter;

        return matchesSearch && matchesStatus && matchesType;
      });

      renderDevices(filteredDevices);
    }

    function borrowDevice(deviceId, deviceName) {
      const device = devices.find((d) => d.id === deviceId);
      if (device && device.status === "available") {
        // Show modal
        document.getElementById("modalDeviceName").textContent = `Borrow: ${device.name}`;
        document.getElementById("modalDeviceDetails").innerHTML = `
      <strong>Device ID:</strong> ${device.id}<br>
      <strong>Model:</strong> ${device.model}
    `;
        document.getElementById("borrowModal").style.display = "block";

        // Set up confirm button
        document.getElementById("confirmBorrowBtn").onclick = function() {
          device.status = "unavailable";
          filterDevices();
          document.getElementById("borrowModal").style.display = "none";
          alert(
            `Successfully borrowed: ${device.name}\nDevice ID: ${device.id}\n\nPlease return the device by the specified due date.`
          );
        };
      }
    }
    window.borrowDevice = borrowDevice;

    document.getElementById("closeBorrowModal").onclick = function() {
      document.getElementById("borrowModal").style.display = "none";
    };
    window.onclick = function(event) {
      const modal = document.getElementById("borrowModal");
      if (event.target === modal) {
        modal.style.display = "none";
      }
    };

    // Event listeners
    document
      .getElementById("searchInput")
      .addEventListener("input", filterDevices);
    document
      .getElementById("statusFilter")
      .addEventListener("change", filterDevices);
    document
      .getElementById("typeFilter")
      .addEventListener("change", filterDevices);

    // Navigation handling
    document.querySelectorAll(".nav-item").forEach((item) => {
      item.addEventListener("click", (e) => {
        e.preventDefault();

        // Remove active class from all items
        document
          .querySelectorAll(".nav-item")
          .forEach((nav) => nav.classList.remove("active"));

        // Add active class to clicked item
        item.classList.add("active");

        // Hide all content sections
        document.querySelectorAll(".content-section").forEach((section) => {
          section.classList.remove("active");
        });

        // Show selected content section
        const pageId = item.getAttribute("data-page");
        const targetSection = document.getElementById(pageId);
        if (targetSection) {
          targetSection.classList.add("active");
        }
      });
    });

    // FAQ toggle functionality
    document.querySelectorAll(".faq-question").forEach((question) => {
      question.addEventListener("click", () => {
        const faqItem = question.parentElement;
        const isActive = faqItem.classList.contains("active");

        // Close all FAQ items
        document.querySelectorAll(".faq-item").forEach((item) => {
          item.classList.remove("active");
          item.querySelector(".faq-question span").textContent = "+";
        });

        // Toggle current item
        if (!isActive) {
          faqItem.classList.add("active");
          question.querySelector("span").textContent = "-";
        }
      });
    });

    // User Agreement functionality
    function acceptAgreement() {
      const checkbox = document.getElementById("agreementCheck");
      if (checkbox.checked) {
        alert(
          "Thank you for accepting the User Agreement. You can now proceed with device borrowing."
        );
      } else {
        alert("Please read and check the agreement box before accepting.");
      }
    }

    // User profile interaction
    document.querySelector(".user-profile").addEventListener("click", () => {
      alert(
        "User profile clicked! In a real app, this would open a profile menu."
      );
    });

    // Initial render
    //   renderDevices(devices);
  </script>
</body>

</html>