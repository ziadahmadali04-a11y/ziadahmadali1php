<?php
require_once("connectdb.php");
$sql = "SELECT * FROM student";
$result = mysqli_query($connect, $sql);