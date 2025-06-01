let devices = [];
let filteredDevices = [];

async function fetchDevices() {
    try {
        const response = await fetch(
            "../../../../backend/api/get-devices.php"
        );
        devices = await response.json(); // <-- assign to global variable!
        console.log(devices);
        filteredDevices = [...devices];
        renderDevices(filteredDevices);
    } catch (e) {
        document.getElementById("deviceGrid").innerHTML =
            "<div>Error loading devices.</div>";
        console.error(e);
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
    <div class="spec-item" style="display: flex; justify-content: space-between;">
        <span class="spec-label" style="color: #64748b; font-weight: 500;">${key}:</span>
        <span class="spec-value" style="color: #334155;">${value}</span>
    </div>
    `
                )
                .join("") :
            "";

        deviceCard.innerHTML = `
    <div class="device-id" style="color: #94a3b8; font-size: 14px; font-weight: 500; text-align: right;">#${device.device_id
            }</div>
    <div class="device-icon" style="font-size: 32px; text-align: center; margin-bottom: 8px;">${getDeviceIcon(
                device.type
            )}</div>
    <div class="device-title" style="font-size: 20px; font-weight: 600; margin-top: 8px;">${device.name
            }</div>
    <div class="device-model" style="color: #64748b; font-size: 15px; margin-bottom: 12px;">${device.model
            }</div>
    <div class="device-specs">
        ${specsHTML}
    </div>
    <div class="device-footer" style="display: flex; justify-content: space-between; align-items: center; margin-top: 16px;">
        <span class="status-badge ${statusClass}" style="${getStatusBadgeStyle(
                device.status
            )} padding: 4px 16px; border-radius: 16px; font-size: 13px; font-weight: 500;">
            ${statusText}
        </span>
        <button class="borrow-btn" style="${getButtonStyle(
                device.status
            )} border: none; padding: 8px 20px; border-radius: 8px; font-size: 15px; font-weight: 500;" ${!isAvailable ? "disabled" : ""
            }>
            ${isAvailable ? "Borrow" : "Not Available"}
        </button>
    </div>
    `;

        const borrowBtn = deviceCard.querySelector(".borrow-btn");
        if (borrowBtn) {
            borrowBtn.disabled = !isAvailable;
            borrowBtn.addEventListener("click", () => openModal(device));
        }

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
                (typeof spec === "string" ? spec.toLowerCase() : "").includes(
                    searchTerm
                )
            );

        const matchesStatus =
            statusFilter === "all" ||
            device.status.toLowerCase() === statusFilter.toLowerCase();
        const matchesType =
            typeFilter === "all" ||
            device.type.toLowerCase() === typeFilter.toLowerCase();

        return matchesSearch && matchesStatus && matchesType;
    });

    renderDevices(filteredDevices);
}

function openModal(device) {
    document.getElementById("modalOverlay").style.display = "flex";
    document.body.style.overflow = "hidden";
    document.getElementById("deviceName").textContent =
        device.name || "Device Name Here";
    // Store device.device_id for later use if needed
    window.currentDeviceId = device.device_id;
}

function closeModal() {
    document.getElementById("modalOverlay").style.display = "none";
    document.body.style.overflow = "auto";
    document.getElementById("reservationForm").reset();
    document
        .getElementById("otherPurposeContainer")
        .classList.remove("show");
    document.getElementById("successMessage").style.display = "none";
    document.getElementById("otherPurpose").required = false;
    updateEndTimeOptions();
}

// ...existing code...
async function submitReservation() {
    const form = document.getElementById("reservationForm");
    const submitBtn = document.getElementById("submitBtn");
    if (form.checkValidity()) {
        submitBtn.disabled = true;
        submitBtn.textContent = "Submitting...";

        const payload = {
            device_id: window.currentDeviceId,
            purpose: form.purpose.value,
            other_purpose: form.otherPurpose.value,
            borrow_date: form.borrowDate.value,
            start_time: form.startTime.value,
            end_time: form.endTime.value,
        };

        try {
            const response = await fetch("../pages/create-reservation.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(payload),
            });
            const result = await response.json();
            if (result.success) {
                document.getElementById("successMessage").style.display = "block";
                document.getElementById("reservationForm").style.display = "none";
                fetchNotifications(); // Refresh notifications
            } else {
                alert(result.message || "Reservation failed.");
            }
        } catch (e) {
            alert("Error submitting reservation.");
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = "Submit";
        }
    } else {
        form.reportValidity();
    }
}

function addNotification(title, message, time = "just now") {
    const notificationsSection = document.getElementById("notifications");
    // Find where to insert (after .content-header)
    const header = notificationsSection.querySelector(".content-header");
    const notificationItem = document.createElement("div");
    notificationItem.className = "notification-item info";
    notificationItem.innerHTML = `
    <div class="notification-title">${title}</div>
    <div class="notification-message">${message}</div>
    <div class="notification-time">${time}</div>
    `;
    // Insert after header, before other notificationsz
    header.insertAdjacentElement("afterend", notificationItem);
}

const form = document.getElementById("reservationForm");
const submitBtn = document.getElementById("submitBtn");
if (form.checkValidity()) {
    submitBtn.disabled = true;
    submitBtn.textContent = "Submitting...";
    setTimeout(() => {
        document.getElementById("successMessage").style.display = "block";
        document.getElementById("reservationForm").style.display = "none";
        setTimeout(() => {
            closeModal();
            submitBtn.disabled = false;
            submitBtn.textContent = "Submit Reservation";
            document.getElementById("reservationForm").style.display = "block";
        }, 2000);
    }, 1000);
} else {
    form.reportValidity();
}

function updateEndTimeOptions() {
    const startTime = document.getElementById("startTime").value;
    const endTimeSelect = document.getElementById("endTime");
    endTimeSelect.innerHTML = '<option value="">Select end time</option>';
    if (startTime) {
        const startHour = parseInt(startTime.split(":")[0]);
        const timeOptions = [{
            value: "02:00",
            text: "2:00 AM",
            hour: 2,
        },
        {
            value: "03:00",
            text: "3:00 AM",
            hour: 3,
        },
        {
            value: "04:00",
            text: "4:00 AM",
            hour: 4,
        },
        {
            value: "05:00",
            text: "5:00 AM",
            hour: 5,
        },
        ];
        timeOptions.forEach((option) => {
            if (option.hour > startHour) {
                const optionElement = document.createElement("option");
                optionElement.value = option.value;
                optionElement.textContent = option.text;
                endTimeSelect.appendChild(optionElement);
            }
        });
    }
}

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

// Set minimum date to today
document.getElementById("borrowDate").min = new Date()
    .toISOString()
    .split("T")[0];

// Handle purpose dropdown change
document
    .getElementById("purpose")
    .addEventListener("change", function () {
        const otherContainer = document.getElementById(
            "otherPurposeContainer"
        );
        const otherTextarea = document.getElementById("otherPurpose");
        if (this.value === "Others") {
            otherContainer.classList.add("show");
            otherTextarea.required = true;
        } else {
            otherContainer.classList.remove("show");
            otherTextarea.required = false;
            otherTextarea.value = "";
        }
    });

// Handle time selection validation
document
    .getElementById("startTime")
    .addEventListener("change", updateEndTimeOptions);

// Close modal when clicking outside
document
    .getElementById("modalOverlay")
    .addEventListener("click", function (e) {
        if (e.target === this) {
            closeModal();
        }
    });

// Handle Escape key
document.addEventListener("keydown", function (e) {
    if (
        e.key === "Escape" &&
        document.getElementById("modalOverlay").style.display === "flex"
    ) {
        closeModal();
    }
});

function getDeviceIcon(type) {
    switch (type) {
        case "laptop":
            return `
    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
        fill="#414141" viewBox="0 0 24 24" >
        <!--Boxicons v3.0 https://boxicons.com | License  https://docs.boxicons.com/free-->
        <rect x="3" y="4" width="18" height="14" rx="2" ry="2"></rect><path d="M2 19H22V21H2z"></path>
    </svg>
    `;
        case "phone":
            return `
    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
        fill="#414141" viewBox="0 0 24 24" >
        <!--Boxicons v3.0 https://boxicons.com | License  https://docs.boxicons.com/free-->
        <path d="M7 22h10c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2H7c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2m5-5c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1"></path>
    </svg>
    `;
        // Add more types as needed
        default:
            return `
    <svg width="32" height="32" fill="none" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="10" fill="#e5e7eb" />
    </svg>
    `;
    }
}

function getStatusBadgeStyle(status) {
    switch (status) {
        case "available":
            return "background: #d1fae5; color: #059669;"; // green
        case "borrowed":
            return "background: #fef3c7; color: #b45309;"; // orange
        case "maintenance":
            return "background: #e5e7eb; color: #6b7280;"; // gray
        case "unavailable":
            return "background: #fee2e2; color: #b91c1c;"; // red
        default:
            return "background: #e5e7eb; color: #6b7280;";
    }
}

function getButtonStyle(status) {
    switch (status) {
        case "available":
            return "background: #3b82f6; color: white; cursor: pointer;";
        case "borrowed":
            return "background: #9ca3af; color: white; cursor: not-allowed;";
        case "maintenance":
            return "background: #9ca3af; color: white; cursor: not-allowed;";
        case "unavailable":
            return "background: #9ca3af; color: white; cursor: not-allowed;";
        default:
            return "background: #9ca3af; color: white; cursor: not-allowed;";
    }
}

async function fetchNotifications() {
    try {
        const response = await fetch("../../pages/get-notifications.php");
        const data = await response.json();
        const notificationList = document.getElementById("notificationList");
        notificationList.innerHTML = "";
        if (data.success && data.notifications.length > 0) {
            data.notifications.forEach(notif => {
                const notifDiv = document.createElement("div");
                notifDiv.className = "notification-item " + (notif.type || "");
                notifDiv.innerHTML = `
                    <div class="notification-title">${notif.title}</div>
                    <div class="notification-message">${notif.message}</div>
                    <div class="notification-time">${new Date(notif.created_at).toLocaleString()}</div>
                `;
                notificationList.appendChild(notifDiv);
            });
        } else {
            notificationList.innerHTML = "<div>No notifications yet.</div>";
        }
    } catch (e) {
        document.getElementById("notificationList").innerHTML = "<div>Error loading notifications.</div>";
    }
}
fetchNotifications();