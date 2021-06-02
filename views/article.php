<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/index.css">
    <link rel="stylesheet" href="../public/home/home.css">
    <link rel="stylesheet" href="../public/remainder/remainder.css">
    <link rel="stylesheet" href="../public/home/homeNavigation.css">
    <link rel="stylesheet" href="../public/remainder/table.css">
    <title>Article</title>
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
                    <li><a class="active" href="add-reminder">Add remind</a></li>
                    <li><a class="active" href="logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <hr>

    <table id="customers">
        <tr>
            <th>Title</th>
            <th>Subject</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><a href="article?id=<?=$article['id']?>"><?= $article['title'] ?></a></td>
                <td><?= $article['subject'] ?></td>
                <td style="background-color: red"><a href="article/edit?id=<?=$article['id']?>" style="color: white">Edit</a></td>
                <td style="background-color: red"><a href="article/delete?id=<?=$article['id']?>" style="color: white">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div style="text-align: center;margin-top: 15px;font-size: 25px">
        <span style="border: 1px white solid; background-color: #04AA6D">
        <?php for ($i = 1; $i <= $pages; $i++): ?>
            <a href="?page=<?= $i; ?>" style="margin: 7px;color: white"><?= $i; ?></a>
        <?php endfor; ?>
            </span>
    </div>
</header>
</body>
</html>