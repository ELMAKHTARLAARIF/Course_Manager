
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logged Out | CourseHub</title>
    <link rel="stylesheet" href="../assests/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .logout-page {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            gap: 20px;
        }

        .logout-page h1 {
            color: var(--accent-2);
            font-size: 36px;
        }

        .logout-page p {
            color: var(--muted);
            font-size: 16px;
        }

        .logout-page a {
            padding: 12px 24px;
            border-radius: var(--radius);
            background: var(--accent);
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
        }

        .logout-page a:hover {
            background: #6325d0;
        }
    </style>
</head>
<body>

<div class="logout-page">
    <h1>You have been logged out</h1>
    <p>Thank you for visiting CourseHub.</p>
    <a href="login.php">Login Again</a>
</div>

</body>
</html>

<?php
header("Refresh:2; url=login.php");
?>