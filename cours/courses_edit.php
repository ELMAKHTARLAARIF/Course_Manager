<?php
require_once '../Infrastructure/config.php';
$title = "";
$description = "";
$level = "";
$errormsg = "";
$successmsg = "";

if ($_SERVER['REQUEST_METHOD'] === "GET") {

    if (!isset($_GET['id'])) {
        header("Location: ../cours/courses_create.php");
        exit;
    }

    $id = $_GET["id"];
    $sql = "SELECT * FROM courses WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result || mysqli_num_rows($result) === 0) {
        header("Location: ../cours/courses_create.php");
        exit;
    }

    $row = mysqli_fetch_assoc($result);

    $title = $row["title"];
    $description = $row["description"];
    $level = $row["level"];
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $id = $_POST["id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $level = $_POST["level"];

    if (empty($title) || empty($description) || empty($level)) {
        $errormsg = "All fields are required!";
    } else {

        $sql = "UPDATE courses 
                SET title = '$title', 
                    description = '$description', 
                    level = '$level'
                WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            $errormsg = "Failed to update course!";
        } else {
            $successmsg = "Course updated successfully!";
            header("Location: ../cours/courses_create.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Course</title>
    <link rel="stylesheet" href="../assests/edit-style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <?php require_once '../Infrastructure/header.php'; ?>

<div class="container">
    <h1>Edit Course</h1>

    <?php if (!empty($successmsg)): ?>
        <p class="success" style="display:block; color:green; font-weight:bold;">
            <?= htmlspecialchars($successmsg) ?>
        </p>
    <?php endif; ?>

    <?php if (!empty($errormsg)): ?>
        <p class="error" style="display:block; color:red; font-weight:bold;">
            <?= htmlspecialchars($errormsg) ?>
        </p>
    <?php endif; ?>
    <form method="POST">
        <label for="id">Cour ID</label>
        <span><?php echo $id ?></span>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="title"> Title</label>
        <input type="text" id="title" name="title"
            placeholder="Enter course title"
            value="<?= htmlspecialchars($title) ?>">

        <label for="description"> Description</label>

        <textarea id="description" name="description" rows="5" placeholder="Enter course description"><?= htmlspecialchars($description) ?></textarea>

        <label for="level"> Level</label>
        <select name="level">
            <option value="Beginner" <?= $level === 'Beginner' ? 'selected' : '' ?>>Beginner</option>
            <option value="Intermediate" <?= $level === 'Intermediate' ? 'selected' : '' ?>>Intermediate</option>
            <option value="Advanced" <?= $level === 'Advanced' ? 'selected' : '' ?>>Advanced</option>
        </select>

        <button type="submit">Save Changes</button>
    </form>

    <a href="./courses_create.php" class="back-link"><- Back to Courses List</a>
</div>

    <?php require_once '../Infrastructure/footer.php'; ?>
</body>

</html>