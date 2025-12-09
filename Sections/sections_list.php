
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
            $data= 'select * from sections';
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
                <div class="actions">
                    <a href="#" class="btn">View</a>
                    <a href="#" class="btn edit">Edit</a>
                    <a href="#" class="btn delete">Delete</a>
                </div>
            </div>
    <?php
    }
    ?>
            </div>
    </section>
    <div id="modal-overlay" class="modal-overlay">
        <div class="modal">
            <h2>Add New Section</h2>

            <form action="#" method="POST" class="modal-form">
                <label>Section Title</label>
                <input type="text" name="title" required>

                <label>Description</label>
                <textarea name="description" rows="4" required></textarea>

                <label>Level</label>
                <select name="level" required>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </select>

                <div class="modal-actions">
                    <button type="button" class="btn small delete" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="btn primary small">Save</button>
                </div>
            </form>
        </div>
    </div>
    <?php require_once '../Infrastructure/footer.php';?>
</body>

</html>
