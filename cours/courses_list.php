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
            <a class="btn" onclick="showModalsections(<?= $row['id'] ?>)">View Section</a>
            <a class="btn delete" onclick="showAddSectionModal(<?= $row['id'] ?>)">Add Section</a>
            <a href="#" class="btn edit">Edit</a>
            <a href="#" class="btn delete">Delete</a>
        </div>
    </div>
<?php
}
require_once "../cours/courses_create.php";
?>