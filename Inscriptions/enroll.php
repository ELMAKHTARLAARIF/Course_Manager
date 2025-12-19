<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once '../Infrastructure/config.php';
session_start();
$user_id = $_SESSION['userId'];
$alreadyInscrepted = "";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $courId = $_GET['id'];
    $sql = "select * from courses WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $courId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $cour = mysqli_fetch_assoc($result);
        if ($cour) {
            $sql = "INSERT INTO enrollments (user_id, course_id) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            if ($stmt) {
                try {
                    mysqli_stmt_bind_param($stmt, "ii", $user_id, $courId);
                    mysqli_stmt_execute($stmt);
                } catch (\Throwable $th) {
                    $_SESSION['alreadyInscrepted'] = "cour already exist";
                    header("location: ../cours/courses_create.php");
                    exit;
                }
            }

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                header("location: ../cours/courses_create.php");
                exit;
            }
        }
    }
}
