<?php
require_once '../Infrastructure/config.php';
$cours_sql = "SELECT COUNT(*) FROM courses";
$sections_sql = "SELECT COUNT(*) FROM sections";
$cours_result = mysqli_query($conn, $cours_sql);
$sections_result = mysqli_query($conn, $sections_sql);
$total_courses = mysqli_fetch_column($cours_result);
$total_sections = mysqli_fetch_column($sections_result);

if ($total_courses != 0) {
    $Moyenne = $total_sections / $total_courses;
    echo $Moyenne;
} else {
    echo "There are no courses";
}
?>