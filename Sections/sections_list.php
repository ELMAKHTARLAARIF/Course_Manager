
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Course Manager</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assests/style.css">
    <script src="../assets/main.js" defer></script>
</head>

<body>

    <?php require_once '../Infrastructure/header.php'; ?>
        

    <section class="container">
        <div class="top-bar">
            <h1>Sections</h1>
        </div>
            <div class="course-grid">
            <?php
    require_once '../Infrastructure/config.php';
            $data= 'SELECT * FROM sections';
            $result = mysqli_query($conn, $data);
            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }
    foreach ($result as $section) {
    ?>
            <div class="course-card">
                <h2 class="title"><?php echo ($section['title']); ?></h2>
                <p class="level"><?php echo ($section['content']); ?></p>
                <p class="desc"><?php echo ($section['position']); ?></p>

            </div>
    <?php
    }
    ?>
            </div>
    </section>

    <?php require_once '../Infrastructure/footer.php';?>
</body>

</html>