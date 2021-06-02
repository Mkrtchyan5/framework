<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/remainder/remainder.css">
    <link rel="stylesheet" href="../public/home/home.css">
    <link rel="stylesheet" href="../public/home/homeNavigation.css">

    <title>Reminders</title>
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
                    <li><a class="active" href="/articles">Back</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <hr>

    <form action="/article/update" method="post">
        <div class="main_remainder">
            <?php use engine\Application;

            if (Application::$session->get('error')): ?>
                <div class="textbox"><h2><?= Application::$session->get('error') ?></h2></div>
                <?php Application::$session->forget('error') ?>
            <?php endif; ?>
            <div class="container">
                <div class="head">
                    <div class="title"><input type="text" value="<?= $article['title'] ?>" name="title"></div>
                </div>
                <div class="desc_body">
                    <input type="hidden" value="<?= $article['id'] ?>" name="id">
                    <span>Description</span>
                    <div class="desc item1">
                        <span><input type="text" value="<?= $article['description'] ?>" name="description"></span>
                    </div>

                    <span>Subject</span>
                    <div class="desc item2">
                        <span><input type="text" value="<?= $article['subject'] ?>" name="subject"></span>
                    </div>

                    <span>Text</span>
                    <div class="desc item3">
                        <span><textarea name="full_text" cols="70"
                                        rows="20"><?= $article['full_text'] ?></textarea></span>
                    </div>
                </div>
                <input type="submit" value="Update" name="update">
            </div>
        </div>
    </form>
</header>
</body>
</html>