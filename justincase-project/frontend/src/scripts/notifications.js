// Function to fetch notifications
async function fetchNotifications() {
    try {
        // First check if we have a session
        const sessionCheck = await fetch('/dweeb/justincase-project/backend/api/check-session.php');
        const sessionData = await sessionCheck.json();
        
        if (!sessionData.logged_in) {
            console.error('User not logged in');
            return;
        }

        const response = await fetch('/dweeb/justincase-project/backend/api/get-notifications.php', {
            credentials: 'include' // This is important for sending cookies
        }); 
        const data = await response.json();
        
        if (data.success) {
            displayNotifications(data.notifications);
        } else {
            console.error('Error fetching notifications:', data.message);
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

// Function to display notifications
function displayNotifications(notifications) {
    const notificationList = document.getElementById('notificationList');
    if (!notificationList) return;

    notificationList.innerHTML = ''; // Clear existing notifications

    notifications.forEach(notification => {
        const notificationItem = document.createElement('div');
        notificationItem.className = `notification-item ${notification.type}`;
        
        // Format the timestamp
        const timestamp = new Date(notification.created_at);
        const timeAgo = getTimeAgo(timestamp);

        notificationItem.innerHTML = `
            <div class="notification-title">${notification.title}</div>
            <div class="notification-message">${notification.message}</div>
            <div class="notification-time">${timeAgo}</div>
        `;

        // Add click handler to mark as read
        if (!notification.is_read) {
            notificationItem.addEventListener('click', () => markAsRead(notification.notification_id));
        }

        notificationList.appendChild(notificationItem);
    });
}

// Function to mark notification as read
async function markAsRead(notificationId) {
    try {
        const response = await fetch('../backend/api/mark-notification-read.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ notification_id: notificationId })
        });
        
        const data = await response.json();
        if (data.success) {
            // Refresh notifications
            fetchNotifications();
        }
    } catch (error) {
        console.error('Error marking notification as read:', error);
    }
}

// Helper function to format time ago
function getTimeAgo(date) {
    const seconds = Math.floor((new Date() - date) / 1000);
    
    let interval = seconds / 31536000;
    if (interval > 1) return Math.floor(interval) + ' years ago';
    
    interval = seconds / 2592000;
    if (interval > 1) return Math.floor(interval) + ' months ago';
    
    interval = seconds / 86400;
    if (interval > 1) return Math.floor(interval) + ' days ago';
    
    interval = seconds / 3600;
    if (interval > 1) return Math.floor(interval) + ' hours ago';
    
    interval = seconds / 60;
    if (interval > 1) return Math.floor(interval) + ' minutes ago';
    
    return Math.floor(seconds) + ' seconds ago';
}

// Fetch notifications when the page loads
document.addEventListener('DOMContentLoaded', () => {
    fetchNotifications();
    // Refresh notifications every 30 seconds
    setInterval(fetchNotifications, 30000);
}); 