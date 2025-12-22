<?php
require_once '../Infrastructure/config.php';

$sql = "SELECT users.username, courses.title, enrollments.enrolled_at
        FROM enrollments
        JOIN users ON enrollments.user_id = users.id
        JOIN courses ON enrollments.course_id = courses.id
        ORDER BY enrollments.enrolled_at DESC
        LIMIT 5";

$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($res as $row) { ?>
    <tr>
        <td><?= $row['username'] ?></td>
        <td><?= $row['title'] ?></td>
        <td><?= $row['enrolled_at'] ?></td>
    </tr>
<?php } ?>