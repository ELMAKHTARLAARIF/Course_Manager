<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../Infrastructure/config.php';
$SectionTitle = "";
$SectionContent = "";
$SectionPosition = "";
$errormessage = "";
$course_id = "";
$id = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $sql = "SELECT * FROM sections WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($result);
    $SectionTitle = $result['title'];
    $SectionContent = $result['content'];
    $SectionPosition = $result['position'];
    $course_id = $result['course_id']; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $course_id = $_POST['course_id'];
    $SectionTitle = $_POST['title'];
    $SectionContent = $_POST['content'];
    $SectionPosition = $_POST['position'];
    $isValid = true;

    if (empty($SectionTitle) || empty($SectionContent) || empty($SectionPosition)) {
        $errormessage = "All fieled required";
        $isValid = false;
    } else {

        $sql = "UPDATE sections 
                SET course_id = $course_id,
                    title = '$SectionTitle',
                    content = '$SectionContent',
                    position = '$SectionPosition'
                WHERE id = $id";

        $InsertResult = mysqli_query($conn, $sql);

        if ($InsertResult) {
            header("location: sections_by_course.php?id=$course_id");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Course</title>
    <link rel="stylesheet" href="../assests/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php require_once '../Infrastructure/header.php'; ?>

<div id="add-section-modal" class="add-section-overlay">
    <div class="add-section-box">
        <h2>Add New Section</h2>
        <span class="error"><?= $errormessage ?></span>
        <form class="add-section-form" action="" method="POST">
            <input type="hidden" name="id" value="<?= $id ?>"> 
            <input type="hidden" name="course_id" value="<?= $course_id ?>">
            <label for="section-title">Section Title</label>
            <input type="text" id="section-title" name="title" value="<?= $SectionTitle ?>">

            <label for="section-desc">content</label>
            <textarea id="section-desc" name="content" rows="4"><?= $SectionContent ?></textarea>

            <label for="section-position">Position</label>
            <input type="number" id="section-position" name="position" value="<?= $SectionPosition ?>">

            <div class="add-section-actions">
                <a href="sections_by_course.php?id=<?= $course_id ?>" class="back-link"><- Back to Course Section</a> 
                <button type="submit" class="add-section-save-btn">Save Changes</button>
            </div>

        </form>
    </div>
</div>

<?php require_once '../Infrastructure/footer.php'; ?>
</body>
</html>
