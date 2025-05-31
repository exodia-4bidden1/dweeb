<!-- PLACE THIS PROJECT INSIDE XAAMP 'htdocs' -->

<!-- 
CREATE DATABASE justincase_db;
USE justincase_db;

DROP TABLE students;
DROP TABLE faculty;
TRUNCATE TABLE faculty;


CREATE TABLE students (
    student_id VARCHAR(11) PRIMARY KEY,
    nu_email VARCHAR(100) NOT NULL UNIQUE,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    year_level VARCHAR(100) NOT NULL,
    contact_num VARCHAR(11) NOT NULL,
    program VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE faculty (
    faculty_id VARCHAR(11) PRIMARY KEY,
    nu_email VARCHAR(100) NOT NULL UNIQUE,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO faculty (faculty_id, nu_email, first_name, last_name, password, created_at)
VALUES ('2023-101010', 'johndoe@nu-dasma.edu.ph', 'John', 'Doe', '$2y$10$98AzfpSSMw7nlLwxQ4lmU.3mpfFb8DHzDJVVK8QphxF9l0JKgk142', NOW());

-- Devices Table
CREATE TABLE devices (
    id VARCHAR(10) PRIMARY KEY,           -- e.g. 'LT001'
    name VARCHAR(100) NOT NULL,           -- e.g. 'MacBook Pro 16"'
    model VARCHAR(100) NOT NULL,          -- e.g. '2023 M2 Pro'
    type ENUM('laptop','desktop','tablet','phone') NOT NULL,
    status ENUM('available','maintenance','unavailable') NOT NULL DEFAULT 'available',
    specs JSON NOT NULL,                  -- e.g. '{"Processor":"Apple M2 Pro","RAM":"16GB",...}'
    icon VARCHAR(10)                      -- e.g. '💻' or SVG/icon name
);

-- Example insert
INSERT INTO devices (id, name, model, type, status, specs, icon) VALUES
('LT001', 'MacBook Pro 16"', '2023 M2 Pro', 'laptop', 'available',
 '{"Processor":"Apple M2 Pro","RAM":"16GB","Storage":"512GB SSD","Display":"16.2\\" Retina"}', '💻'),
('DT001', 'iMac 24"', '2023 M2', 'desktop', 'available',
 '{"Processor":"Apple M2","RAM":"24GB","Storage":"1TB SSD","Display":"24\\" 4.5K Retina"}', '🖥️');  

-->

<!-- - 
ISSUE: 
1. Ayaw na mapindot ng mga components sa sidebar
2. Ayaw mapindot ng borrow button tapos lalabas yung modal 
-->