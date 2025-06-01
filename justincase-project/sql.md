-- User agreements table
CREATE TABLE user_agreements (
    agreement_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    agreement_accepted BOOLEAN DEFAULT FALSE,
    accepted_at TIMESTAMP NULL,
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE
);

-- Devices table
CREATE TABLE devices (
    device_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    model VARCHAR(100) NOT NULL,
    type ENUM('laptop', 'desktop', 'tablet', 'phone') NOT NULL,
    status ENUM('available', 'borrowed', 'maintenance', 'unavailable') DEFAULT 'available',
    specs JSON,
    added_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (added_by) REFERENCES faculty(faculty_id) ON DELETE CASCADE
);

-- Reservations table
CREATE TABLE reservations (
    reservation_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    device_id INT NOT NULL,
    purpose VARCHAR(255) NOT NULL,
    other_purpose TEXT,
    borrow_date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    status ENUM('pending', 'approved', 'rejected', 'completed', 'cancelled') DEFAULT 'pending',
    faculty_id INT,
    approved_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE,
    FOREIGN KEY (device_id) REFERENCES devices(device_id) ON DELETE CASCADE,
    FOREIGN KEY (faculty_id) REFERENCES faculty(faculty_id) ON DELETE SET NULL
);

-- Notifications table
CREATE TABLE notifications (
    notification_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    type ENUM('reservation', 'approval', 'reminder', 'system') NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE
);

-- Device history table (to track all device usage)
CREATE TABLE device_history (
    history_id INT PRIMARY KEY AUTO_INCREMENT,
    device_id INT NOT NULL,
    student_id INT NOT NULL,
    reservation_id INT NOT NULL,
    action ENUM('borrowed', 'returned', 'maintenance', 'damaged') NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (device_id) REFERENCES devices(device_id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE,
    FOREIGN KEY (reservation_id) REFERENCES reservations(reservation_id) ON DELETE CASCADE
);

-- Create indexes for better performance
CREATE INDEX idx_devices_status ON devices(status);
CREATE INDEX idx_reservations_status ON reservations(status);
CREATE INDEX idx_notifications_student ON notifications(student_id, is_read);
CREATE INDEX idx_user_agreements_student ON user_agreements(student_id);