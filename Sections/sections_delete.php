<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../Infrastructure/config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        die("Invalid section id");
    }
    $id = intval($_GET['id']);
    $sql = "SELECT course_id FROM sections WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        die("Section not found");
    }
    $courseId = $row['course_id'];
    $sql = "DELETE FROM sections WHERE id = $id";
    $DELRESULT = mysqli_query($conn, $sql);

    if ($DELRESULT) {
        header("Location: sections_by_course.php?id=$courseId");
        exit;
    } else {
        die("ERROR: Could not delete section");
    }
}
?>
