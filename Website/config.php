<?php
$link = mysqli_connect("localhost", "root", "", "components");
if($link->connect_error){
  die("Connection to database failed! . $link->connect_error");
}

?>
