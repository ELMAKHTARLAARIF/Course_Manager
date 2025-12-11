<!-- Add Section Modal -->
<?php
require_once '../Infrastructure/config.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $sectionTitle = "";
    $sectionContent = "";
    $sectionPosition = "";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sectionTitle = $_POST['title'];
    $sectionContent = $_POST['content'];
    $sectionPosition = $_POST['position'];
    $course_id = $_GET['id'];
    $sectionTitle = mysqli_real_escape_string($conn, $sectionTitle);
    $sectionContent = mysqli_real_escape_string($conn, $sectionContent);
    $sectionPosition = mysqli_real_escape_string($conn, $sectionPosition);
    if (empty($sectionTitle) || empty($sectionContent || empty($sectionPosition)))
        $errormsg = "All fields are required!";
    else {
        $sql = "INSERT INTO sections(course_id,title,content,position) 
        VALUES($course_id,'$sectionTitle','$sectionContent','$sectionPosition')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("error add section" . mysqli_errno($conn));
        } else {
            header("Location: sections_by_course.php?id=$course_id");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assests/style.css">
    <title>Course Manager</title>
</head>

<body>
    <?php require_once '../Infrastructure/header.php' ?>
    <div id="add-section-modal" class="add-section-overlay">
        <div class="add-section-box">
            <h2>Add New Section</h2>
            <span class="error"><?= $errormsg ?></span>
            <form class="add-section-form" action="" method="POST">
                <label for="section-title">Section Title</label>
                <input type="text" id="section-title" name="title" placeholder="Enter section title">
    
                <label for="section-desc">content</label>
                <textarea id="section-desc" name="content" rows="4" placeholder="Enter section Content"></textarea>
                <label for="section-position">Position</label>
                <input type="number" id="section-position" name="position" placeholder="Enter section position">
                <div class="add-section-actions">
                    <a href="sections_by_course.php?id=<?= $id ?>" class="back-link"><- Back to Course Sections</a>
                            <button type="submit" class="add-section-save-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
    <?php require_once '../Infrastructure/footer.php' ?>
</body>

</html>