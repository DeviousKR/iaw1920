<?php
session_start();
$disp = "";
$def = "";

require("bower_components/wordnik-php-master/wordnik/Swagger.php");
$myAPIKey = '9b0f0sjaxqb4f54ikg7jdolqlszikpuvrmojft4ndc5icfvsm';
$client = new APIClient($myAPIKey, 'http://api.wordnik.com/v4');

/*we recive the array from the form and set it into a variable, we eliminate the
repeated responses from the user to avoid false correct answers, also we avoid
the access to this page if it's not through the formulary*/

if (isset($_POST["ans"]) && !empty($_SESSION["guess"])) {
    $ans = $_POST["ans"];
} else {
  header("Location:index.php");
  exit;
}

$res = $_SESSION["guess"];
$ans1 = array_unique($ans);
$count = 0;


/*during the maximum number of answers we can have (count($res)) we will check
if that array key exists (so the blanks left by the user stay in position with the
else clausle). Then we check if the user responses are inside the response array,
if that's the case points are added and a correct checkmark is displayed, in negative
case, a cross is displayed and ponts are not added, finally points are ceiled to
avoid issues with addition*/

$wrong = "";

for ($i=0;$i<count($res);$i++){
  if (array_key_exists($i,$ans1)){
    if (in_array($ans1[$i],$res)){
      $disp = $disp."<input name=\"name\" readonly class=\"form-control is-valid mb-4\" placeholder=\"$ans1[$i]\" type=\"text\">";
      $count = $count + (100/count($res));
    } else {
      $disp = $disp."<input name=\"name\" readonly class=\"form-control is-invalid mb-4\" placeholder=\"$ans1[$i]\" type=\"text\">";
    }
  } else {
    $disp = $disp."<input name=\"name\" readonly class=\"form-control is-invalid mb-4\" placeholder=\"\" type=\"text\">";
  }
}

$count = ceil($count);
/*This will display all the words that the user has not guessed, or guessed incorrectly*/

foreach ($res as $value) {
  if (!in_array($value,$ans1)) {
    $wrong = $wrong."<button class=\"btn btn-info mt-5 mb-5 ml-3\" disabled>$value</button>";
  }
}

  $wordApi = new wordApi($client);
foreach ($res as $s_word) {
  $word = $s_word;
  $w_array = $wordApi->getDefinitions($word, $partOfSpeech=null, $sourceDictionaries=null,
  $limit=1, $includeRelated=null, $useCanonical=null, $includeTags=null);
  foreach ($w_array as $definition) {
    $def=$def."<div class=\"alert alert-dark\" role=\"alert\">
    Definition of $s_word is: $definition->text
    </div>";
  }
}

unset($_SESSION);
session_destroy();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Memory Test</title>
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
       <h1 class="display-3">Now it's time to test your memory!</h1>
     <hr>
     <form action="#" novalidate="" method="POST" class="text-center bg-secondary text white">
       <p>Thanks for playing, Your results are: <?=$count?>%!</p>
       <p>You missed these words: <?=$wrong?>
         <?=$disp?>
     </form>
     <a class="btn btn-info mt-4 mb-2" href="index.php">Try again?</a>
     </div>
             <?=$def?>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/popper.js/dist/popper.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
