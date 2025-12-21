 <?php
    require_once '../Infrastructure/config.php';
    $sql = "SELECT  COUNT(*) FROM users";
    $result = mysqli_query($conn, $sql);
    echo mysqli_fetch_column($result);
    ?>