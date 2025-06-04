// Function to fetch borrowed devices
async function fetchBorrowedDevices(statusFilter = 'approved') {
    console.log('Fetching borrowed devices with filter:', statusFilter);
    try {
        const response = await fetch(`/dweeb/justincase-project/backend/api/get-borrowed-devices.php?statusFilter=${statusFilter}`);
        const data = await response.json();
        console.log('Borrowed devices API response:', data);
        
        if (data.success) {
            console.log('Displaying borrowed devices:', data.devices.length);
            displayBorrowedDevices(data.devices);
        } else {
            console.error('Error fetching borrowed devices:', data.message);
            const borrowedList = document.getElementById('borrowedDevicesList');
            if (borrowedList) {
                borrowedList.innerHTML = '<div class="no-devices-message"><p>Error loading devices.</p></div>';
            }
        }
    } catch (error) {
        console.error('Error:', error);
        const borrowedList = document.getElementById('borrowedDevicesList');
        if (borrowedList) {
            borrowedList.innerHTML = '<div class="no-devices-message"><p>Error loading devices.</p></div>';
        }
    }
}

// Function to display borrowed devices
function displayBorrowedDevices(devices) {
    const borrowedList = document.getElementById('borrowedDevicesList');
    if (!borrowedList) return;

    if (devices.length === 0) {
        borrowedList.innerHTML = `
            <div class="no-devices-message">
                <p>No devices found for the selected criteria.</p>
            </div>
        `;
        return;
    }

    borrowedList.innerHTML = ''; // Clear existing devices

    devices.forEach(device => {
        const borrowedItem = document.createElement('div');
        borrowedItem.className = 'rental-card';
        
        // Format borrow date
        const borrowedDate = new Date(device.borrow_date).toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
        
        let statusText = '';
        let statusClass = '';
        let timeLabel = '';
        let timeValue = '';
        let timeClass = '';
        let borrowedStatusInGrid = '';

        // Determine display based on reservation_status and return_date
        if (device.reservation_status === 'returned') {
            statusText = 'Returned';
            statusClass = 'status-returned';
            if (device.return_time) {
                 const returnedTime = new Date('1970/01/01 ' + device.return_time).toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', hour12: true });
                 timeLabel = 'Returned Time:';
                 timeValue = returnedTime;
                 timeClass = 'time-returned';
            }
        } else if (device.reservation_status === 'late') {
            statusText = 'Returned Late';
            statusClass = 'status-late';
             if (device.return_time) {
                 const returnedTime = new Date('1970/01/01 ' + device.return_time).toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', hour12: true });
                 timeLabel = 'Returned Late Time:';
                 timeValue = returnedTime;
                 timeClass = 'time-late';
            }
        } else { // Assuming status is 'approved' for currently borrowed
            statusText = 'Borrowed';
            statusClass = 'status-borrowed';

            const [year, month, day] = device.borrow_date.split('-');
            const [hours, minutes, seconds] = device.end_time.split(':');
            const dueDateWithTime = new Date(year, month - 1, day, hours, minutes, seconds);

             const formattedDueTime = dueDateWithTime.toLocaleTimeString('en-US', {
                 hour: '2-digit',
                 minute: '2-digit',
                 hour12: true
             });

            const now = new Date();
            if (now > dueDateWithTime) {
                statusText = 'Overdue';
                statusClass = 'status-overdue';
                timeLabel = 'Overdue Time:';
                timeValue = formattedDueTime;
                timeClass = 'time-overdue';
            } else {
                timeLabel = 'Due Time:';
                timeValue = formattedDueTime;
                timeClass = 'time-due';
                // Add a simplified 'Borrowed' status next to Due Time
                borrowedStatusInGrid = `
                    <div class="info-item info-separator borrowed-status-in-grid ${statusClass}">
                        <span class="status-dot"></span>
                        <span class="status-text">${statusText}</span>
                    </div>
                `;
            }
        }

        borrowedItem.innerHTML = `
            <div class="card-header">
                <div class="device-info">
                    <div class="device-title">${device.name}<span class="device-subtitle"> (${device.model})</span></div>
                </div>
            </div>
            
            <div class="card-body">
                <div class="info-grid">
                    <div class="info-item info-separator">
                        <span class="info-label">Device ID:</span>
                        <span class="info-value">${device.device_id}</span>
                    </div>
                    <div class="info-item info-separator">
                        <span class="info-label">Borrowed on:</span>
                        <span class="info-value">${borrowedDate}</span>
                    </div>
                    ${timeLabel && timeValue ? `
                     <div class="info-item ${timeClass}">
                         <span class="info-label">${timeLabel}</span>
                         <span class="info-value">${timeValue}</span>
                     </div>
                 ` : ''}
                    ${borrowedStatusInGrid}
                </div>
                 <div class="status-line-separator">
                    <div class="status-container ${statusClass}">
                        <span class="status-dot"></span>
                        <span class="status-text">${statusText}</span>
                    </div>
                 </div>
            </div>
        `;

        borrowedList.appendChild(borrowedItem);
    });
}

// Initial fetch and event listeners
document.addEventListener('DOMContentLoaded', () => {
    // Initial fetch for currently borrowed devices (default filter)
    fetchBorrowedDevices();

    // Refresh borrowed devices every minute (optional, maybe only for 'approved')
    // setInterval(fetchBorrowedDevices, 60000); 

    // Remove event listener for the old filter dropdown
    // const statusFilterDropdown = document.getElementById('borrowedStatusFilter');
    // if (statusFilterDropdown) {
    //     statusFilterDropdown.removeEventListener('change', (event) => {
    //         const selectedFilter = event.target.value;
    //         fetchBorrowedDevices(selectedFilter);
    //     });
    // }

    // Add event listeners to the new tab buttons
    const tabButtons = document.querySelectorAll('.borrowed-filter-tabs .tab-button');
    tabButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            // Remove active class from all buttons
            tabButtons.forEach(btn => btn.classList.remove('active'));

            // Add active class to the clicked button
            event.target.classList.add('active');

            // Get the filter value from the data-filter attribute
            const selectedFilter = event.target.getAttribute('data-filter');

            // Fetch devices with the selected filter
            fetchBorrowedDevices(selectedFilter);
        });
    });
}); 