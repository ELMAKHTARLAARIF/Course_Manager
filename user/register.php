<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assests/style.css">
  <title>Document</title>
</head>

<body>
  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once '../Infrastructure/header.php';
  require_once '../Infrastructure/config.php';
  $Name = "";
  $password = "";
  $Email = "";
  $ConfirmPassword = "";
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm'];

    $isValid = true;
    $errormsg = "";
    $successmsg = "";

    $reg_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $reg_password = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
    if (!empty($name)) {
      $errormsg = "invalid name";
      $isValid = false;
    }
    if (!preg_match($reg_email, $email)) {
      $errormsg = "The email address '$email' is considered invalid according to the regex.";
      $isValid = false;
    }

    if (!preg_match($reg_password, $password)) {
      $errormsg = "Password must be at least 8 characters long and include both letters and numbers.";
      $isValid = false;
    }

    if ($confirmPassword != $password) {
      $errormsg = "Please enter a correct confirm password";
      $isValid = false;
    }

    if ($isValid) {
      // $name = mysqli_real_escape_string($conn, $name);
      // $email = mysqli_real_escape_string($conn, $email);
      // $passwordHash = password_hash($password, PASSWORD_DEFAULT);

      $sql = "INSERT INTO users (username, email, password_hash)
                VALUES ('$name', '$email', '$passwordHash')";

      $result = mysqli_query($conn, $sql);
      if (!$result) {
        echo "Sorry, something went wrong.";
      } else {
        echo "Registration successful!";
      }
    } else {
      echo $errormsg;
    }
  }

  ?>
  <div class="register-container">
    <h1>Create Account</h1>
    <p>Join us and start learning</p>

    <form method="POST" action="#">
      <div class="form-group">

        <?php if (!empty($errormsg)): ?>
          <span class="error" style="color:red"><?= $errormsg ?></span>
        <?php elseif (!empty($successmsg)): ?>
          <span class="success" style="color:green"><?= $successmsg ?></span>
        <?php endif; ?>

        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="John Doe" required>
      </div>

      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="you@example.com" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="••••••••" required>
      </div>

      <div class="form-group">
        <label for="confirm">Confirm Password</label>
        <input type="password" id="confirm" name="confirm" placeholder="••••••••" required>
      </div>

      <button type="submit">Register</button>
    </form>

    <div class="footer-text">
      Already have an account?
      <a href="login.php">Login</a>
    </div>
  </div>
  </div>
  <?php require_once '../Infrastructure/footer.php'; ?>
</body>

</html>