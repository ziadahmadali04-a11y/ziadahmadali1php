<?php
require_once("connectdb.php");
if($_SERVER['REQUEST_METHOD'] === "GET"){
  $text = $_GET['search'];

  $sql = "SELECT * FROM student WHERE name LIKE '%$text%'";

  $data = mysqli_query($connect, $sql);

}