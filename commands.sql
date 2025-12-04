CREATE DATABASE cours_manager;
use cours_manager;
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    level ENUM('Beginner', 'Intermediate', 'Advanced') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
 CREATE TABLE sections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    position INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_course
        FOREIGN KEY (course_id)
        REFERENCES courses(id)
        ON DELETE CASCADE
);
INSERT INTO courses (title, description, level,created_at) VALUES
('Web Development Basics', 'Learn the fundamentals of HTML, CSS, and JavaScript.', 'Beginner', NOW()),
('PHP Procedural Programming', 'Master the basics of PHP using procedural coding.', 'Intermediate', NOW()),
('Advanced MySQL & Optimization', 'Learn indexing, joins, triggers, and query tuning.', 'Advanced', NOW()),
('JavaScript ES6 Foundations', 'Understand the modern features of JavaScript ES6.', 'Beginner', NOW()),
('Object-Oriented PHP (OOP)', 'Learn classes, inheritance, and OOP architecture.', 'Intermediate', NOW()),
('Linux Server Administration', 'Introduction to Linux commands and server management.', 'Intermediate', NOW()),
('Laravel Framework Essentials', 'Learn routing, controllers, and Blade templates in Laravel.', 'Intermediate', NOW()),
('TailwindCSS UI Mastery', 'Build modern UI designs with TailwindCSS.', 'Beginner', NOW()),
('APIs & JSON for Beginners', 'Learn how REST APIs work and how to use JSON.', 'Beginner', NOW()),
('Full-Stack Web Project', 'Build a complete web application from scratch.', 'Advanced', NOW()),
('Git & GitHub Masterclass', 'Version control basics and GitHub workflows.', 'Beginner', NOW()),
('Cybersecurity Fundamentals', 'Learn about common risks and cybersecurity principles.', 'Beginner', NOW());
INSERT INTO sections (course_id, title, content, position, created_at) VALUES
(1, 'Introduction to HTML', 'Overview of HTML elements, tags, and structure.', 1, NOW()),
(2, 'Variables and Functions', 'Learn how to manipulate data using variables and functions.', 1, NOW()),
(3, 'Indexes & Optimization', 'How to improve MySQL performance using indexes.', 1, NOW()),
(4, 'Let, Const & Arrow Functions', 'Understand modern ES6 variable declarations and function syntax.', 1, NOW()),
(5, 'Classes & Objects', 'Learn how to create classes and instantiate objects.', 1, NOW()),
(6, 'Linux Terminal Basics', 'Introduction to essential Linux shell commands.', 1, NOW()),
(7, 'Routing & Controllers', 'Understanding Laravel route definitions and controllers.', 1, NOW()),
(8, 'Utility-First Styling', 'Deep dive into TailwindCSS utilities.', 1, NOW()),
(9, 'Understanding REST APIs', 'Introduction to how APIs communicate data using JSON.', 1, NOW()),
(10, 'Project Architecture Setup', 'Creating folders and planning the full-stack structure.', 1, NOW()),
(11, 'Git Basics & Commands', 'Learning git init, git add, git commit, and more.', 1, NOW()),
(12, 'Threats & Vulnerabilities', 'Common types of cyber attacks and system weaknesses.', 1, NOW());
