<?php 
require_once '../Infrastructure/config.php';
$sql = "SELECT courses.title, COUNT(enrollments.id) AS total
        FROM courses 
        JOIN enrollments ON courses.id = enrollments.course_id
        GROUP BY courses.id
        ORDER BY total DESC
        LIMIT 1";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo $row['title'];
?>
