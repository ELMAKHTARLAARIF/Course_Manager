 <?php
     ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once '../Infrastructure/config.php';
    $sql = "SELECT  COUNT(*) FROM enrollments";
    $result = mysqli_query($conn, $sql);
    echo mysqli_fetch_column($result);
    ?>