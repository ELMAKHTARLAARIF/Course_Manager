<?php
require_once '../Infrastructure/config.php';

$data = "SELECT * FROM courses";
$result = mysqli_query($conn, $data);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="course-card">
        <div class="cour-image">
            <img src="../uploads/<?= $row['image'] ?>" alt="course image">
        </div>
        <h2 class="title"><?= htmlspecialchars($row['title']) ?></h2>
        <p class="level"><?= htmlspecialchars($row['level']) ?></p>
        <p class="desc"><?= htmlspecialchars($row['description']) ?></p>

        <div class="actions">
            <a class="btn" href="../Sections/sections_by_course.php?id=<?= $row['id'] ?>">View Section</a>
            <a href="courses_edit.php?id=<?= $row['id'] ?>" class="btn edit">Edit</a>
            <a href="courses_delete.php?id=<?php echo $row['id'] ?>" class="btn delete">Delete</a>
        </div>
    </div>
<?php
}
?>