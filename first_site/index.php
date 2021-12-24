<?php
session_start();
include ('functions.php');
function exits(){
    if ($_POST['btn-exit'] && !isset($_SESSION['login'])){
        echo "index.php?page=5";
    }
    elseif ($_POST['btn-exit'] && isset($_SESSION['login'])) {
        echo "index.php?page=1";
        session_destroy();
    }
}
function user(){
if (!isset($_SESSION['login'])) {
   echo 'ВОЙТИ';
    }
 else {
    echo 'ВЫЙТИ';
    }
}

function viewUser(){
    if ($_SESSION['login']){
        echo "Привет, " . $_SESSION['login'];
    }
    else
    echo "Привет, Гость ";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Галерея</title>
</head>
<body>
    <div class="container-fluid border bg-light">
        <header class="row ">
            <div class="d-flex justify-content-between">
                <h1>SITE ON PHP</h1>
                <div>
                        <div class="d-flex justify-content-between">
                        <img src="img/user.png" alt="img-user">
                            <form action=" <?exits();?>" method="post">
                            <input type="submit" class="btn bg-success bg-opacity-50" name="btn-exit" value="<?user()?>">
                            </form>


                        </div>
                        <div class="user">
                       <? viewUser() ?>
                        </div>
                </div>
            </div>

        </header>
        <ul class="nav row">
            <li class="nav-item bg-success bg-opacity-50 col-sm-3 col-md-3 col-lg-3 p-3 border-top border-secondary border-end rounded-top shadow position-relative">
                <a href="index.php?page=1" class="text-white position-absolute button-50 start-50 translate-middle stretched-link">
                    Home
                </a>
            </li>
            <li class="nav-item bg-success bg-opacity-50 col-sm-3 col-md-3 col-lg-3 p-3 border-top border-secondary border-end rounded-top shadow position-relative">
                <a href="index.php?page=2" class="text-white position-absolute button-50 start-50 translate-middle">
                    Gallery
                </a>
            </li>
            <li class="nav-item bg-success bg-opacity-50 col-sm-3 col-md-3 col-lg-3 p-3 border-top border-secondary border-end rounded-top shadow position-relative">
                <a href="index.php?page=3" class="text-white position-absolute button-50 start-50 translate-middle">
                    Upload
                </a>
            </li>
            <li class="nav-item bg-success bg-opacity-50 col-sm-3 col-md-3 col-lg-3 p-3 border-top border-secondary border-end rounded-top shadow position-relative">
                <a href="index.php?page=4" class="text-white position-absolute button-50 start-50 translate-middle">
                    Register

                </a>
            </li>
        </ul>
        <section class="row">
            <?php
                switch ($_GET['page'])
                {
                    case "1":
                    {
                        include_once ("pages/home.php");
                        break;
                    }
                    case "2":
                    {
                        include_once ("pages/gallery.php");
                        break;
                    }
                    case "3":
                    {
                        include_once ("pages/upload.php");

                        break;
                    }
                    case "4":
                    {
                        include_once ("pages/register.php");
                        break;
                    }
                    case "5":
                        include_once ("pages/open.php");
                        break;
                }
            ?>
        </section>
        <footer class="row d-flex fixed-bottom">
            <div class="d-flex justify-content-center border bg-light bg-opacity-90">Все права защищены</div>
        </footer>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    </script>
</body>
</html>