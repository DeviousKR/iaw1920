<?php

// Translations to user language
include "dictionary.php";

//echo $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
$acceptLang = ['en', 'ca', 'es'];
$lang = isset($_COOKIE['Language']) ? $_COOKIE['Language'] : $lang;
$lang = isset($_GET['lang']) ? $_GET['lang'] : $lang;
$lang = in_array($lang, $acceptLang) ? $lang : 'en';
//echo $lang;
setcookie("Language",$lang);

$languages = ['en'=>'English','es'=>'Español','ca'=>"Català"];


?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">

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

    <!-- Page Content -->
    <div class="container">
      <form method="GET" action="catdetails.php">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3"><?=$text[$lang]['display-3']?> <button type="submit" class="btn btn-lg btn-success">&nbsp;<?=$text[$lang]['buy']?>&nbsp;</button></h1>
        <p class="lead"><?=$text[$lang]['lead']?></p>
      </header>

      <!-- Page Features -->
      <div class="row text-center">

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="img/siames.jpg" alt="">
            <div class="card-body">
              <h4 class="card-title"><?=$text[$lang]['siam-cat']?></h4>
              <p class="card-text"><?=$text[$lang]['new-offer']?> 250€</p>
            </div>
            <div class="card-footer">
              <label>
                <input type="checkbox" value="250" name="cat[siam-cat]">&nbsp;<?=$text[$lang]['buy']?><span class="badge">Hot offer!</span>
              </label>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="img/persa.jpg" alt="">
            <div class="card-body">
              <h4 class="card-title"><?=$text[$lang]['persian-cat']?></h4>
              <p class="card-text"><?=$text[$lang]['new-offer']?> 200€</p>
            </div>
            <div class="card-footer">
              <label>
                <input type="checkbox" value="200" name="cat[persian-cat]">&nbsp;<?=$text[$lang]['buy']?><span class="badge"></span>
              </label>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="img/cymric.jpg" alt="">
            <div class="card-body">
              <h4 class="card-title"><?=$text[$lang]['cymric-cat']?></h4>
              <p class="card-text"><?=$text[$lang]['new-offer']?> 175€</p>
            </div>
            <div class="card-footer">
              <label>
                <input type="checkbox" value="175" name="cat[cymric-cat]">&nbsp;<?=$text[$lang]['buy']?><span class="badge"></span>
              </label>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="img/angora_turco.jpg" alt="">
            <div class="card-body">
              <h4 class="card-title"><?=$text[$lang]['angora-cat']?></h4>
              <p class="card-text"><?=$text[$lang]['new-offer']?> 350€</p>
            </div>
            <div class="card-footer">
              <label>
                <input type="checkbox" value="350" name="cat[angora-cat]">&nbsp;<?=$text[$lang]['buy']?><span class="badge"></span>
              </label>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <!-- Need to pass the language to next page
      <input type="hidden" name="lang" value="<?=$lang?>"> -->

      </form>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
