<?php
require_once("connectdb.php");
$studentID = $_GET['id'];
$sql = "DELETE FROM student WHERE id = $studentID";
$deletion = mysqli_query($connect, $sql);
if($deletion){
  header("Location: ../Pages/index.php");
}