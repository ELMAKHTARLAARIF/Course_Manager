<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Welcome | Course Platform</title>
  <link rel="stylesheet" href="../assests/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="landing">
  <section class="hero">
    <h1>Welcome to LMS </h1>
    <p>Learn new skills through structured courses, clear sections, and guided progress.</p>
    <a href="register.php">Create Account</a>
  </section>

  <section class="auth-container">
    <form class="auth-card" method="POST">
      <h2>Sign In</h2>
      
      <input type="email" name="email" placeholder="Email address" required>
      <span class="error"><?= $erroFound ?></span>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
      <p>Don’t have an account? <a href="register.php">Register</a></p>
    </form>
  </section>

  <?php require_once '../Infrastructure/footer.php'; ?>
</body>

</html>
<?php
require_once '../Infrastructure/config.php';
$email = "";
$password = "";
$isValid = true;
$erroFound = "";
$errorPass="";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (!isset($_POST['email'], $_POST['password'])) {
    $isValid = false;
    echo "Missing email or password.";
  } else {

    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    $reg_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    // $reg_password = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/";
    // if (!preg_match($reg_email, $email)) {
    //     echo "Invalid email format.<br>";
    //     $isValid = false;
    // }

    // if (!preg_match($reg_password, $password)) {
    //     echo "Password must be at least 8 characters and contain letters and numbers.<br>";
    //     $isValid = false;
    // }

    if ($isValid) {
      $sql = "SELECT * FROM users WHERE email = ?";
      $stmt = mysqli_prepare($conn, $sql);

      if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
        $unhashedPassword=$user['password_hash'];
        if ($user && password_verify($password,$unhashedPassword)) {
          $_SESSION['email'] = $email;
          $_SESSION['userId']=$user['id'];
          header('location: ../cours/courses_create.php');
          exit;
        } else{
          $erroFound = "WRONG PASSWORD";

        }
      }
    }
  }
}
?>