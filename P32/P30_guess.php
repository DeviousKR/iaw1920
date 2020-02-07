<?php
//We start the session and we include our word dictionary.
session_start();
require("bower_components/wordnik-php-master/wordnik/Swagger.php");
$myAPIKey = '9b0f0sjaxqb4f54ikg7jdolqlszikpuvrmojft4ndc5icfvsm';
$client = new APIClient($myAPIKey, 'http://api.wordnik.com/v4');



/*Preparatory variables, res is the display variable, disp will be the variable
that will manage the selected words*/
$disp = [];
$res = "";

/*We check that a difficulty has been set from the difficulty selector page if not
baseline number of words is set to 5*/
$_SESSION['dif'] = empty($_GET['dif']) ? 5 : $_GET['dif'];
if (!preg_match('/^[1-9][0-9]$|^[2-9]$|^100$/',$_SESSION['dif'])) {
  header("Location:index.php");
  exit;
}
$dif = $_SESSION['dif'];


/*we create a group of random array keys from our dictionary array, then we search
which words does those keys belong to*/
$wordApi = new wordsApi($client);
$w_array = $wordApi->getrandomWords($includePartOfSpeech=null, $excludePartOfSpeech=null,
$sortBy=null, $sortOrder=null, $hasDictionaryDef=true, $minCorpusCount=null, $maxCorpusCount=-1,
$minDictionaryCount=1, $maxDictionaryCount=-1, $minLength=4, $maxLength=-1, $limit=$dif);


/*we display the words into a button-like element to the user*/
foreach ($w_array as $position => $w_container) {
  $res = $res."<button class=\"btn btn-info mt-5 mb-5 ml-3\" disabled>$w_container->word</button>";
  $s_array[] = $w_container->word;
}

/*we save this displayed words into a session array*/
$_SESSION["guess"] = $s_array;

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Memory game</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <style>
      body {
        background-color: #000000;
        font-family:"Trebuchet MS", Helvetica, sans-serif'
      }
    </style>
  </head>
  <body>
   <div class="container">
     <div class="jumbotron mt-4 bg-secondary text-white text-center">
       <h1 class="display-3">Memory Game</h1>
       <p class="lead">You have five (5) seconds to memorize the next words!</p>
     <hr>
     <?=$res?>
     </div>
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/popper.js/dist/popper.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
     $(setTimeout(function(){location="P30_form.php"},5000));
    </script>
  </body>
</html>
