<?php
require_once '../Infrastructure/config.php';
$sql = "SELECT title, COUNT(enrollments.user_id) as total_inscreptions
FROM courses
LEFT JOIN enrollments ON enrollments.course_id = courses.id 
GROUP BY courses.id
HAVING COUNT(enrollments.user_id) = 0
";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) { ?>
    <li><?= $row['title'] ?></li>
<?php
}
?>