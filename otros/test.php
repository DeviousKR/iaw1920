<?php

$mysqli = new mysqli('localhost','root','root','test');

if ($mysqli->connect_errno){
  echo "Error connecting to the server, $mysqli->connect_errno : $mysqli->connect_error";
}

if (!$mysqli->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit;
}

/*$sql = "CREATE TABLE Person( id INT PRIMARY KEY, name VARCHAR(100), salary DECIMAL(10,2) )";

if ( !$mysqli->query($sql) ){

    echo "Error querying the server, $mysqli->connect_errno: $mysqli->error";

    exit;

}*/


/*$sql = "Insert INTO Person (id,name,salary) VALUES(1,'john',1100)";

if ( !$mysqli->query($sql) ){

    echo "Error inserting into table, $mysqli->connect_errno: $mysqli->error";

    //exit;
}


echo "Tuples modified: $mysqli->affected_rows .";*/


/*$sql = "Update Person SET salary=salary*1.2";

if ( !$mysqli->query($sql) ){

    echo "Error updating table, $mysqli->connect_errno: $mysqli->error";

    exit;
}

echo "Tuples modified: $mysqli->affected_rows .";*/

// select

$viewData = '';

$sql = "SELECT name,salary FROM person";

$res = $mysqli->query($sql);

$data = $res->fetch_all(MYSQLI_NUM);

$rows = "";
foreach ($data as $pos => $row) {
				$rows = $rows."<tr class=\"text-center\">
                        <td>$row[0]</td><td>$row[1]</td>
                      </tr>";
		}
    $table = "<table class=\"table table-bordered table-dark table-striped table-hover\">
                <thead>
                  <tr class=\"text-center\">
                    <th>Name</th>
                    <th>Salary</th>
                  </tr>
                </thead>
                <tbody>
                    $rows
                </tbody>
              </table>";






$mysqli->close();
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">


  </head>
  <body>
    <?=$table?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/popper.js/dist/popper.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
