# Course Manager

A simple web-based Learning Management System (LMS) for managing courses and their sections built with PHP and MySQL.

## Features

- **Course Management**: Create, view, edit, and delete courses.
- **Section Management**: Add, edit, and delete sections within courses.
- **File Uploads**: Upload images for courses.
- **Responsive UI**: Custom CSS for a modern look.
- **CRUD Operations**: Full Create, Read, Update, Delete functionality for both courses and sections.

## Technologies Used

- **Backend**: PHP
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript
- **Styling**: Custom CSS with animations and responsive design

## Prerequisites

- Web server (e.g., Apache or Nginx)
- PHP 7.0 or higher
- MySQL database
- File upload permissions for the `uploads/` directory

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/ELMAKHTARLAARIF/Course_Manager.git
   cd Course_Manager
   ```

2. **Set up the database**:
   - Create a new MySQL database.
   - Run the SQL commands from `commands.sql` to create the necessary tables.

3. **Configure the database connection**:
   - Open `Infrastructure/config.php`.
   - Update the database credentials:
     ```php
     $servername = "your_server";
     $username = "your_username";
     $password = "your_password";
     $dbname = "your_database_name";
     ```

4. **Place the project in your web root**:
   - Copy the project files to your web server's document root (e.g., `/var/www/html/`).

5. **Set permissions**:
   - Ensure the `uploads/` directory is writable by the web server.

## Database Schema

### Courses Table
- `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
- `title` (VARCHAR(255))
- `description` (TEXT)
- `level` (ENUM: 'Beginner', 'Intermediate', 'Advanced')
- `image` (VARCHAR(255)) - Path to uploaded image

### Sections Table
- `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
- `course_id` (INT, FOREIGN KEY to courses.id)
- `title` (VARCHAR(255))
- `content` (TEXT)
- `position` (INT) - Order of sections within a course

## Usage

1. **Access the application**:
   - Open your browser and navigate to the project URL (e.g., `http://localhost/gerer-cours-section/cours/courses_create.php`).

2. **Managing Courses**:
   - From the homepage, click "Courses" in the navbar.
   - Click "+ Add Course" to create a new course.
   - Fill in the title, description, level, and upload an image.
   - View existing courses in a grid layout.
   - Click "View Section" to see sections for a course.
   - Use "Edit" or "Delete" buttons for modifications.

3. **Managing Sections**:
   - From a course's section view, click "+ Add Section".
   - Enter title, content, and position.
   - Edit or delete sections as needed.

## File Structure

```
gerer-cours-section/
├── assests/
│   ├── style.css          # Main stylesheet
│   ├── edit-style.css     # Styles for edit forms
│   └── main.js            # JavaScript for form validation
├── cours/
│   ├── courses_create.php # Course creation and listing
│   ├── courses_list.php   # Course listing component
│   ├── courses_edit.php   # Course editing
│   └── courses_delete.php # Course deletion
├── Sections/
│   ├── sections_create.php    # Section creation
│   ├── sections_edit.php      # Section editing
│   ├── sections_delete.php    # Section deletion
│   ├── sections_list.php      # Section listing
│   └── sections_by_course.php # Sections for a specific course
├── Infrastructure/
│   ├── config.php         # Database configuration
│   ├── header.php         # HTML header and navbar
│   └── footer.php         # HTML footer
├── uploads/               # Directory for uploaded images
├── commands.sql           # Database setup SQL
└── README.md              # This file
```

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request.

## License

This project is open-source. Feel free to use and modify it.

## Author

ELMAKHTAR LAARIF