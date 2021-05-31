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
    <link rel="stylesheet" href="../public/css/index.css">
    <link rel="stylesheet" href="../public/home/home.css">
    <link rel="stylesheet" href="../public/home/homeNavigation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <title>Document</title>
</head>
<body>
<header>
    <nav>
        <div class="container">
            <div class="title">
                <a><h2>My Reminder</h2></a>
            </div>
            <div class="navbar">
                <input type="checkbox" id="check">
                <label for="check" class="checkbtn">
                    <i class="fas fa-bars"></i>
                </label>
                <ul>
                    <li><a class="active" href="articles">Back</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <hr>
    <br><br>
    <div class="callback-form">
        <div class="container">
            <div class="row">
                <div class="item item_1">
                    <div class="section-heading">
                        <?php if (Application::$session->get('error')): ?>
                            <div class="textbox"><h2 style="color: red"><?= Application::$session->get('error') ?></h2></div>
                            <?php Application::$session->forget('error') ?>
                        <?php endif; ?>
                        <h2><em>ADD REMINDER</em></h2>
                    </div>
                </div>
                <div class="item item_2">
                    <div class="contact-form">
                        <form class="contact" action="create" method="post">
                            <div class="row-form">
                                <div class="inputs">
                                    <div>
                                        <input type="text" placeholder="Title" name="title">
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Description" name="description">
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Subject" name="subject">
                                    </div>
                                </div>
                                <div>
                                    <textarea name="full_text" cols="30" rows="6"
                                              placeholder="Full Text"></textarea>
                                </div>
                                <div class="col col_5">
                                    <input type="submit" value="ADD" name="add">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

</body>
</html>
