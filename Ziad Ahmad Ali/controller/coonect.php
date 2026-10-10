<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "students";
$connect = mysqli_connect($hostname, $username, $password);
if(!$connect){
    die("Connection Error: " . mysqli_connect_error());
}
$sql = "CREATE DATABASE IF NOT EXISTS `$db_name`";
if(mysqli_query($connect, $sql)){
    mysqli_select_db($connect, $db_name);
    $sql = "CREATE TABLE IF NOT EXISTS student (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        score INT NOT NULL
    )";
    if(!mysqli_query($connect, $sql)){
        echo "Table Error: " . mysqli_error($connect);
    }
}else{
    echo "Database Error: " . mysqli_error($connect);
}