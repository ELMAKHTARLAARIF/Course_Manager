<?php
require_once '../Infrastructure/config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (!isset($_GET['id'])) {
        die("No course ID provided.");
    }

    $id = $_GET['id']; 
    $sql = "DELETE FROM courses WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    header("Location: ../cours/courses_create.php");
    exit;
}
?>

