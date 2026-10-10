<?php
require_once("../controller/connectdb.php");

if(isset($_GET["id"])){
  $id = $_GET["id"];
  $sql = "SELECT * FROM student WHERE id = $id";
  $result = $connect->query($sql);
  $student = $result->fetch_assoc();
}else{
  echo "ID Not Found!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
  >

  <title>Student | <?= $student['name'] ?></title>

  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
  >

</head>


<body class="bg-light text-dark">


  <?php require_once("navbar.php") ?>


  <div class="container py-4 py-md-5">

    <div class="row justify-content-center">

      <div class="col-12 col-md-8 col-lg-6">


        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">


          <!-- Header -->

          <div class="p-4 border-bottom bg-white">

            <div class="d-flex align-items-center gap-3">

              <div
                class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                style="width:46px;height:46px;"
              >

                <i class="fa-solid fa-user-pen fs-5"></i>

              </div>


              <div>

                <h5 class="fw-bold mb-1">
                  Update Student
                </h5>

                <p class="text-secondary mb-0 small">
                  Update information for <?= $student['name'] ?>
                </p>

              </div>

            </div>

          </div>


          <!-- Form -->

          <div class="card-body p-4 bg-white">


            <form method="POST">


              <!-- Student Name -->

              <div class="mb-4">

                <label class="form-label fw-semibold">
                  Student Name
                </label>


                <div class="input-group">

                  <span class="input-group-text bg-light border-end-0">

                    <i class="fa-solid fa-user text-primary"></i>

                  </span>


                  <input
                    type="text"
                    name="name"
                    class="form-control border-start-0"
                    value="<?= $student['name']; ?>"
                    placeholder="Enter student name"
                  >

                </div>

              </div>


              <!-- Score -->

              <div class="mb-4">

                <label class="form-label fw-semibold">
                  Score
                </label>


                <div class="input-group">

                  <span class="input-group-text bg-light border-end-0">

                    <i class="fa-solid fa-star text-warning"></i>

                  </span>


                  <input
                    type="number"
                    name="score"
                    class="form-control border-start-0"
                    value="<?= $student['score']; ?>"
                    placeholder="Enter score"
                  >

                </div>


                <input
                  type="hidden"
                  name="id"
                  value="<?= $student['id']; ?>"
                >

              </div>


              <!-- Buttons -->

              <div class="row g-2">


                <div class="col-12 col-sm-6">

                  <button
                    type="submit"
                    class="btn btn-primary w-100 rounded-3 fw-semibold py-2"
                  >

                    <i class="fa-solid fa-pen-to-square me-2"></i>

                    Update

                  </button>

                </div>


                <div class="col-12 col-sm-6">

                  <a
                    href="index.php"
                    class="btn btn-outline-danger w-100 rounded-3 fw-semibold py-2"
                  >

                    <i class="fa-solid fa-arrow-left me-2"></i>

                    Back

                  </a>

                </div>


              </div>


            </form>


            <?php require_once("../controller/editController.php") ?>


          </div>

        </div>

      </div>

    </div>

  </div>


  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  ></script>

</body>

</html>