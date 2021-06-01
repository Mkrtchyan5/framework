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
                    <li><a class="active" href="articles">Back</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <hr>
    <div class="main_remainder">
        <div class="container">
            <div class="head">
                <div class="title"><?= $article['title'] ?></div>
            </div>
            <div class="desc_body">
                <span>Description</span>
                <div class="desc item1">
                    <span><?= $article['description'] ?></span>
                </div>

                <span>Subject</span>
                <div class="desc item2">
                    <span><?= $article['subject'] ?></span>
                </div>

                <span>Text</span>
                <div class="desc item3">
                    <span><?= $article['full_text'] ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
</body>
</html>