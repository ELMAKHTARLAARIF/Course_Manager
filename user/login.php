<?php
class user{
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome | Course Platform</title>
  <link rel="stylesheet" href="../assests/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="landing">
      <?php
    require_once '../Infrastructure/header.php';
    ?>
 <section class="hero">
  <h1>Welcome to LMS </h1>
  <p>Learn new skills through structured courses, clear sections, and guided progress.</p>
  <a href="register.php">Create Account</a>
</section>

<section class="auth-container">
  <form class="auth-card" method="POST">
    <h2>Sign In</h2>
    <input type="email" name="email" placeholder="Email address" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
    <p>Don’t have an account? <a href="register.php">Register</a></p>
  </form>
</section>

    <?php require_once '../Infrastructure/footer.php'; ?>
</body>
</html>
