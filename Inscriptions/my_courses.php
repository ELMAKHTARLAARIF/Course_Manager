<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once '../Infrastructure/config.php';
// var_dump($_SESSION['userId']);

if (!isset($_SESSION['userId'])) {
    header("Location: ../user/login.php");
    exit;
}
$user_id = $_SESSION['userId'];

$sql = "
    SELECT * FROM courses JOIN enrollments  ON courses.id = course_id WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

?>

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
    <section class="container">
        <div class="top-bar">
            <h1>YOUR COURSES</h1>
        </div>

        <div class="course-grid">

            <?php

            if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="course-card">
                        <div class="cour-image">
                            <img src="../uploads/<?= htmlspecialchars($row['image']) ?>" alt="course image">
                        </div>
                        <h2 class="title"><?= htmlspecialchars($row['title']) ?></h2>
                        <p class="level"><?= htmlspecialchars($row['level']) ?></p>
                        <p class="desc"><?= htmlspecialchars($row['description']) ?></p>

                        <div class="actions">
                            <a href="../cours/courses_delete.php?id=<?= $row['id'] ?>" class="btn delete">Desinscription</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No course for you</p>
            <?php endif; ?>
        </div>

        </div>
    </section>
    <?php require_once '../Infrastructure/footer.php'; ?>

</body>

</html>