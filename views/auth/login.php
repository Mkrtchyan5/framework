<?php
use engine\Application;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../public/css/index.css">
    <link rel="stylesheet" href="../../public/home/home.css">
    <link rel="stylesheet" href="../../public/home/homeNavigation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <title>login</title>
</head>
<body>
<header>
    <nav>
        <div class="container">
            <div class="title">
                <h2>My Reminder</h2>
            </div>
            <div class="navbar">
                <input type="checkbox" id="check">
                <label for="check" class="checkbtn">
                    <i class="fas fa-bars"></i>
                </label>
                <ul>
                    <li><a class="active"  href="/">Home</a></li>
                    <li><a class="active" href="register">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<form action="login/auth" method="post">
    <div class="login-box">
        <?php if (Application::$session->get('error')): ?>
            <div class="textbox"><h2><?= Application::$session->get('error') ?></h2></div>
            <?php Application::$session->forget('error') ?>
        <?php endif; ?>
        <h1>Login</h1>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username">
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password">
        </div>

        <input type="submit" class="btn" value="Sign in" name="login">
    </div>
</form>
</body>
</html>