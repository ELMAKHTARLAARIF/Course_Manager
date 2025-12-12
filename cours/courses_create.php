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

    <?php require_once '../Infrastructure/header.php';
    require_once '../Infrastructure/config.php';
    ?>
    <?php
    $isvalid = true;
    $success = null;
    $title = "";
    $description = "";
    $level = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = trim($_POST["title"]);
        $description = trim($_POST["description"]);
        $level = trim($_POST["level"]);
        $file_name = time() . "_" . basename($_FILES["image"]["name"]);

        $tempname = $_FILES['image']['tmp_name'];
        echo $tempname;
        $folder = '../uploads/'.$file_name;
        if (empty($title))
            $isvalid = false;
        if (empty($description)) 
            $isvalid = false;
        if(!in_array($_POST['level'],["Beginner","Intermediate","Advanced"]))
            $isvalid==false;
            if (!empty($file_name)) {
        if (!move_uploaded_file($tempname, $folder)) {
            echo "Image upload failed!";
            $isvalid = false;
        }
    }
        if ($isvalid) {
            $sql = "INSERT INTO courses (title, description, level,image)
            VALUES ('$title', '$description', '$level','$file_name')";
            if (mysqli_query($conn, $sql)) {
                header("Location: " . $_SERVER['PHP_SELF']);
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
            <a class="btn primary" onclick="openModal()">+ Add Course</a>
        </div>

        <div class="course-grid">
            <?php require_once '../cours/courses_list.php'; ?>
        </div>
    </section>

    <div id="modal-overlay" class="modal-overlay ">
        <div class="modal">
            <h2>Add New Course</h2>

            <form method="POST" class="modal-form" id="courseForm" enctype="multipart/form-data">
                <label>Course Title</label>
                <input type="text" name="title" class="input" id="course-title"><span class="error title-error"  >*</span>
                <label>Description</label>
                <textarea name="description" rows="4" class="input" id="course-desc"></textarea><span class="error desc-error" >*</span>

                <label>Level</label>
                <select name="level" id=level>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </select>
                <input type="file" name="image">
                <span class="error level-error">* </span>

                <div class="modal-actions">
                    <button type="button" class="btn small delete" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="btn save small" id="add-course-form">Save</button>
                </div>

                <span class="success" style="display: none;"></span>
            </form>
        </div>
    </div>
    <?php require_once '../Infrastructure/footer.php'; ?>

</body>

</html>