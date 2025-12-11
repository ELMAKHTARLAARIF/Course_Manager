<?php
require_once '../Infrastructure/config.php';

$data = "SELECT * FROM courses";
$result = mysqli_query($conn, $data);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

while ($row =  $result->fetch_assoc()) {
?>
    <div class="course-card">
        <h2 class="title"><?= htmlspecialchars($row['title']) ?></h2>
        <p class="level"><?= htmlspecialchars($row['level']) ?></p>
        <p class="desc"><?= htmlspecialchars($row['description']) ?></p>
        <div class="actions">
            <a class="btn" href="../Sections/sections_by_course.php?id=<?= $row['id'] ?>">View Section</a>
            <a href="courses_edit.php?id=<?= $row['id'] ?>" class="btn edit">Edit</a>
            <a href="courses_delete.php?id=<?= $row['id'] ?>" class="btn delete" >Delete</a>
        </div>
    </div>
<?php
}
?>

