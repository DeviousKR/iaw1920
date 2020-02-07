<?php

// Translations to user language
include "dictionary.php";

$acceptLang = ['en', 'ca', 'es'];
$lang = isset($_COOKIE['Language']) ? $_COOKIE['Language'] : $lang;
$lang = isset($_GET['lang']) ? $_GET['lang'] : $lang;
$lang = in_array($lang, $acceptLang) ? $lang : 'en';
//echo $lang;
$languages = ['en'=>'English','es'=>'Español','ca'=>"Català"];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cat Details</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      body{
        padding-top: 10px;
      }
    </style>
  </head>
  <body>
   <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"><?=$text[$lang]['home']?>
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?=$languages[$lang]?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?=$_SERVER['PHP_SELF']?>?lang=en">English</a>
                <a class="dropdown-item" href="<?=$_SERVER['PHP_SELF']?>?lang=ca">Català</a>
                <a class="dropdown-item" href="<?=$_SERVER['PHP_SELF']?>?lang=es">Español</a>
              </div>
            </li>
            <!--
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            -->
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page content -->
    <div class="container">
      <div class="jumbotron">
        <h2 class="text-center"><?=$text[$lang]['thanks']?></h2>
      </div>

      <div class="well">
      <?php
      if (isset($_GET["cat"])){

        $cats = $_GET["cat"];
        $total = 0;

        foreach($cats AS $cat=>$price){

          echo "<div>".$text[$lang]['item-purchase']." <strong>".$text[$lang][$cat]."</strong> ".$text[$lang]['at-price']." $price €</div>";
          $total += $price;

        }

        echo "<div>Total <span class='badge'>$total €</span></div>";
      }

        #print_r($_GET["cat"]);
      ?>
      </div>

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
