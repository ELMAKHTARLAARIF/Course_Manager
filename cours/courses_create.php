<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Course Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assests/style.css">
    <script src="../assests/main.js" defer></script>
</head>

<body>

    <?php require_once '../Infrastructure/header.php'; ?>
    <?php require_once '../Infrastructure/config.php'; ?>
    <?php
    $isvalid = true;
    $errors = [];
    $success = null;
    $title = "";
    $description = "";
    $level = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = trim($_POST["title"]);
        $description = trim($_POST["description"]);
        $level = trim($_POST["level"]);

        if (empty($title)) {
            $errors[] = "Title is required!";
            $isvalid = false;
        }

        if (empty($description)) {
            $errors[] = "Description is required!";
            $isvalid = false;
        }

        if (empty($level)) {
            $errors[] = "Level is required!";
            $isvalid = false;
        }

        if ($isvalid) {
            $sql = "INSERT INTO courses (title, description, level)
            VALUES ('$title', '$description', '$level')";

            if (mysqli_query($conn, $sql)) {
                header("Location: " . $_SERVER['PHP_SELF'] . "?added=1");
                exit();
            } else {
                $errors[] = "Database error: " . mysqli_error($conn);
                $title = "";
                $description = "";
                $level = "";
            }
        }
    }

    ?>

    <section class="container">
        <div class="top-bar">
            <h1>Courses</h1>
            <a href="#" class="btn primary" onclick="openModal()">+ Add Course</a>
        </div>

        <div class="course-grid">
            <?php require_once '../cours/courses_list.php'; ?>
        </div>
    </section>

    <div id="modal-overlay" class="modal-overlay ">
        <div class="modal">
            <h2>Add New Course</h2>

            <form action="" method="POST" class="modal-form" id="courseForm">
                <label>Course Title</label>
                <input type="text" name="title" class="input" id="course-title" value="<?php echo htmlspecialchars($title); ?>"><span class="error">*</span>
                <label>Description</label>
                <textarea name="description" rows="4" class="input" id="course-desc"></textarea><span class="error" value="<?php echo "$description" ?>">*</span>

                <label>Level</label>
                <select name="level">
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </select>
                <span class="error">*</span>

                <div class="modal-actions">
                    <button type="button" class="btn small delete" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="btn save small" id="add-course-form">Save</button>
                </div>

                <?php
                if (!empty($errors)) {
                    echo '<div class="error-messages">';
                    foreach ($errors as $error) {
                        echo '<p class="error" style=color:red>' . htmlspecialchars($error) . '</p>';
                    }
                    echo '</div>';
                }
                ?>
                <span class="success" style="display: none;"></span>
            </form>
        </div>
    </div>
    <?php require_once '../Sections/sections_by_course.php'; ?>
    <?php require_once '../Sections/sections_create.php'; ?>
    <?php require_once '../Infrastructure/footer.php'; ?>

</body>

</html>