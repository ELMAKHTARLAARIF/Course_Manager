
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Course Manager</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <script>
        function openModal() {
            document.getElementById("modal-overlay").classList.add("show");
        }

        function closeModal() {
            document.getElementById("modal-overlay").classList.remove("show");
        }
    </script>
    <?php require_once '../Infrastructure/header.php'; ?>
        

    <section class="container">
        <div class="top-bar">
            <h1>Courses</h1>
            <a href="#" class="btn primary" onclick="openModal()">+ Add Course</a>
        </div>
            <div class="course-grid">
        <?php require_once '../cours/courses_list.php'; ?>
            </div>
    </section>
    <!-- Add Course Modal -->
    <div id="modal-overlay" class="modal-overlay">
        <div class="modal">
            <h2>Add New Course</h2>

            <form action="#" method="POST" class="modal-form">
                <label>Course Title</label>
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
