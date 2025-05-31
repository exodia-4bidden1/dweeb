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
VALUES ('2023-101010', 'johndoe@nu-dasma.edu.ph', 'John', 'Doe', '$2y$10$abcdefghijklmnopqrstuvABCDEFGHIJKLMNOpqrstuv1234567890abcd', NOW());

INSERT INTO `faculty` (`faculty_id`, `nu_email`, `first_name`, `last_name`, `password`, `created_at`)
VALUES ('2023-101010', 'johndoe@nu-dasma.edu.ph', 'John', 'Doe', '$2y$10$wHh6QZ8Q1v9QwQwQwQwQwOQwQwQwQwQwQwQwQwQwQwQwQwQwQwQwQwQwQwQwQwQwQwQw', NOW()); 

-->

<!-- - 
- No logic in password eye icon + bug

- Kulang
By creating an account you agree to our 
Terms and Condition and Privacy Policy 
-->