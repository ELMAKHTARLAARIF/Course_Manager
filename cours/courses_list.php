    <?php
    require_once '../Infrastructure/config.php';
            $data= 'select * from courses';
            $result = mysqli_query($conn, $data);
            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }
    foreach ($result as $course) {
    ?>
            <div class="course-card">
                <h2 class="title"><?php echo ($course['title']); ?></h2>
                <p class="level"><?php echo ($course['level']); ?></p>
                <p class="desc"><?php echo ($course['description']); ?></p>
                <div class="actions">
                    <a href="#" class="btn">View</a>
                    <a href="#" class="btn edit">Edit</a>
                    <a href="#" class="btn delete">Delete</a>
                </div>
            </div>
    <?php
    }
    ?>