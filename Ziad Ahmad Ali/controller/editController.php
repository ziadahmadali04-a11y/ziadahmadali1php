<?php
require_once('connectdb.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST["name"];
    $score = $_POST["score"];
    $id = $_POST['id'];
    $sql = "UPDATE student SET name = '$name', score = $score WHERE id = $id";

    $errors = [];
  if(empty($name)){
    array_unshift($errors, "Name is required and can't be empty.");
  }

  if(strlen($name) < 5){
    array_unshift($errors, "Name must be more than 5 char.");
  }

  if(is_numeric($name)){
    array_unshift($errors, "Name must be a string.");
  }

  if(empty($score)){
    array_unshift($errors, "Score is required and can't be empty.");
  }

  if(!is_numeric($score)){
    array_unshift($errors, "Score must be a Number.");
  }

  if($score < 0){
    array_unshift($errors, "Score can't be a negative value.");
  }

  if(!empty($errors)){
    foreach($errors as $error){
      echo "<div class='alert alert-danger d-flex align-items-center' role='alert'
              <svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
              <div>
                <i class='fa-solid fa-circle-xmark' style='color:red'></i> $error
              </div>
            </div>";
    }
  } else {
    $proccess = $connect->query($sql);

    if($proccess){
      echo '<div class="alert alert-primary mt-3" role="alert">
        Student Updated Successfully.
      </div>';
    }else{
      echo '<div class="alert alert-danger" role="alert">
        Student Not Updated!
      </div>';
    }
  }
}