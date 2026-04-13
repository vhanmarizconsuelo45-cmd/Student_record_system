<?php
session_start();

$error = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // DEFAULT ADMIN LOGIN
    $adminUser = "admin";
    $adminPass = "admin123";

    if ($username === $adminUser && $password === $adminPass) {
        $_SESSION['user'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - Blue Whale System</title>

    <style>
        body {
            font-family: 'Segoe UI';
            background: linear-gradient(180deg, #001f3f, #003366, #005f99);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        .card {
            background: rgba(0, 30, 60, 0.7);
            padding: 30px;
            border-radius: 18px;
            text-align: center;
            width: 320px;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 25px rgba(0,200,255,0.3);
        }

        input {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 10px;
            border: none;
            outline: none;
        }

        button {
            width: 95%;
            padding: 12px;
            border: none;
            border-radius: 30px;
            background: linear-gradient(45deg, #00c6ff, #0072ff);
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .error {
            color: #ff6b6b;
            margin-top: 10px;
        }

        .hint {
            font-size: 12px;
            opacity: 0.7;
        }
    </style>
</head>

<body>

<div class="card">
    <h2>🐋 Admin Login</h2>
    <p class="hint">Default: admin / admin123</p>

    <?php if ($error) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">🌊 Login</button>
    </form>
</div>

</body>
</html>