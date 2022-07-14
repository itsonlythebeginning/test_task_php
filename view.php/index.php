<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css" />
    <title>Тестовое задание 2</title>
</head>
<body>



<?php

        $connection = mysqli_connect('127.0.0.1', 'root', '', 'test2_db');
        if (  $connection == false  )
        {
            echo 'Не удалось подключиться к базе данных! <br>';
            echo mysqli_connect_error();
            exit();
        }

$page = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM news WHERE id=$page ");
$article = mysqli_fetch_assoc($query);

?>

<div  class="container"  >

    <div  class="header"  >
        <h1> <?php echo $article['title']; ?> </h1>
    </div>


    <div class="main_content"  >
        <div class="head"   >

        </div>

        <div  class="content"      >
            <?php echo $article['content']; ?>
        </div>
    </div>

    <div  class="bottom"  >
        <a href="http://news.php" class="bottom_title"  >
            Все новости >>
        </a>
    </div>

</div>



</body>
</html>