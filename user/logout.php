
<?php 
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logged Out | LMS</title>
    <link rel="stylesheet" href="../assests/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="logout-page">
    <h1>You have been logged out</h1>
    <p>Thank you for visiting LMS.</p>
    <a href="login.php">Login Again</a>
</div>

</body>
</html>
