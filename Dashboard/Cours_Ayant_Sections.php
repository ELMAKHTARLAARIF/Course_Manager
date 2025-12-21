<?php

require_once '../Infrastructure/config.php';
$sql = "SELECT courses.title, COUNT(sections.id) AS total_sections
        FROM courses
        JOIN sections ON sections.course_id = courses.id
        GROUP BY courses.id
        HAVING COUNT(sections.id) > 5";

$result = mysqli_query($conn, $sql);
?>
<table>
    <thead>
        <tr>
            <th>Cours</th>
            <th>Sections</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['total_sections'] ?></td>
                </tr>
        <?php }
        } else {
            echo "<tr><td colspan='2'>No courses with more than 5 sections</td></tr>";
        } ?>

    </tbody>
</table>