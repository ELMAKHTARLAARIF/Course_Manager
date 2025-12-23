<?php

require_once '../Infrastructure/config.php';
session_start();
$visit=0;
if($_SESSION['userId']){
    $visit=$visit+1;
    echo $visit;
}

$sql= "SELECT username, COUNT(course_id) as  total
FROM users
JOIN enrollments ON enrollments.user_id = users.id
GROUP BY course_id
HAVING COUNT(course_id) = 0;
";
$res = mysqli_query($conn,$sql);
var_dump($res);
$result= mysqli_fetch_all($res);
foreach($result as $row){
    echo $row['username'];
}
?>