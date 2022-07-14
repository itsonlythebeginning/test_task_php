<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css" />
    <title>Тестовое задание</title>
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

$articles = mysqli_query($connection, "SELECT * FROM `news`");

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$total = 0;
$per_page = 5;
$art =  mysqli_fetch_assoc($articles);
$a = mysqli_query($connection,"SELECT COUNT(1) FROM `news`");
$b = mysqli_fetch_array( $a );
$total_pages = $b[0];
$count_pages = ceil(($total_pages -1) / $per_page);
$offset = ($page-1) * $per_page;
$sql = "SELECT * FROM news  ORDER BY idate DESC LIMIT $offset,  $per_page";
$res_data = mysqli_query($connection, $sql);

?>

    <div  class="container"  >

        <div  class="header"  >
            <h1>   Новости  </h1>
        </div>

        <div class="main_content"  >

                 <?php

                    while ($row = mysqli_fetch_array($res_data)) {
                    $data =     gmdate("d.m.Y",    $row['idate']);

                 ?>

            <div class="head"   >
                <p class="date" > <?php     echo  $data;     ?>     </p>
                <a  href="http://view.php?id=<?php echo  $row['id']    ?>      "  class="title"   > <?php   echo $row['title'];    ?> </a>
            </div>
            <div  class="content"      >
                    <p class="new"  >
                        <?php   echo $row['announce'];    ?>
                    </p>
            </div>
                 <?php   }     ?>
                    <div  class="bottom_buttons"  >
                            <h3  class="bottom_title"   >  Страницы:   </h3>
                          <?php          for ($p = 0;  $p <= $count_pages; $p++       )               :?>
                              <a  class="ref" href="?page=<?php   echo  $p+1 ;    ?>">
                                  <button class="btn" type="button"  data-id="<?=$p+1?>"  >  <?php  echo $p+1;   ?>
                                  </button></a>
                          <?php   endfor;    ?>
                    </div>
        </div>
    </div>


<script  src="app.js" >   </script>



</body>
</html>