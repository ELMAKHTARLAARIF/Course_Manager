<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../Infrastructure/config.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cour_id = $_GET["id"];
    $sql = "SELECT * FROM sections WHERE course_id = $cour_id";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    $getData = "SELECT * FROM courses WHERE id = $cour_id";
    $dataCours = mysqli_query($conn, $getData);
    if (!$dataCours) {
        die("Query failed: " . mysqli_error($conn));
    }
    $dataCours = mysqli_fetch_assoc($dataCours);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Course Manager</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assests/style.css">
    <script src="../assets/main.js" defer></script>
</head>

<body>

    <?php require_once "../Infrastructure/header.php" ?>
    <div id="course-sections" class="course-sections">
        <div class="title-section-add-section-btn">
            <?php if (empty($result))
                echo "<h2>No Sections Found</h2>";
            else {
                echo "<h2>Cour Sections</h2>";
            }

            ?>
            <a href="../Sections/sections_create.php?id=<?= $dataCours['id'] ?>" class="btn primary">+ Add Section</a>
        </div>
        <div class="sections-box">
            <?php foreach ($result as $section) { ?>

                <div class="course-sections-box">
                    <h3>Course title : <?php echo $dataCours['title'] ?></h3>
                    <ul class="course-sections-list">
                        <li>title : <?php echo $section['title'] ?></li>
                        <li>Content : <?php echo $section['content'] ?></li>
                        <li>Position : <?php echo $section['position'] ?></li>
                    </ul>
                    <div class="actions">
                        <a href="sections_edit.php?id=<?= $section['id']?>" class="btn edit">Edit</a>
                        <a href="sections_delete.php?id=<?= $section['id']?>" class="btn delete">Delete</a>
                    </div>
                </div>


            <?php } ?>
        </div>
    </div>



    <?php require_once '../Infrastructure/footer.php'; ?>
</body>

</html>