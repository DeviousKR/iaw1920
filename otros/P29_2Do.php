<?php
  session_start();
  $list = isset($_SESSION["2Do"]) ? $_SESSION["2Do"] : array();
  $Olist = "";
  $rem = "";

  if (isset($_POST["task"]) && !(empty($_POST["task"]))) {
    $list[] = $_POST["task"];
  }

  if (isset($_GET["del"]) && !(empty($_GET["del"]))) {
    if ($_GET["del"] == "0 key") {
      unset($list[0]);
    } else {
      $rem = substr($_GET["del"],0,1);
      unset($list["$rem"]);
    }
  }

  $_SESSION["2Do"] = $list;

  foreach ($list as $key => $value) {
    $Olist = $Olist."<div class=\"alert alert-warning alert-dismissible fade show text-center\" role=\"alert\">
                        <strong>$value</strong>
                        <form action=\"".$_SERVER['PHP_SELF']."\" method=\"GET\">
                          <button type=\"submit\" name=\"del\" value=\"$key key\" class=\"close\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                          </button>
                        </form>
                    </div>";
  }
?>

 <!doctype html>
 <html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title> To do list</title>
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
      <div class="jumbotron mt-4 bg-secondary text-white">
        <h1 class="display-3">Your task list</h1>
        <p class="lead">Add a task by simply inserting it on the line below and
        pressing, "Add Task", You can remove your tasks by pressing the "x"
        button near the list below!</p>
      <hr>
      <form action="P29_2Do.php" method="POST" class="text-center bg-secondary text white">
        <label for="select1">Add a task:</label>
        <input type="text" class="form-control" name="task" placeholder="Please insert the task:" id="select1">
        <button class="btn btn-info mt-5 mb-5" type="submit">Add task!</button>
      </form>
        <?=$Olist?>

      </div>
    </div>
     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="bower_components/jquery/dist/jquery.min.js"></script>
     <script src="bower_components/popper.js/dist/popper.min.js"></script>
     <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
   </body>
 </html>
