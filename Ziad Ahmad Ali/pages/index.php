<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Students Mangment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
</head>
<body class="bg-light text-dark">
  <?php
  require_once("navbar.php");
  require_once("../controller/getAllStudents.php");
  $dataCount = 0;
  ?>
  <div class="container-fluid container-lg py-4 py-md-5">
    <div class="row g-4">
      <div class="col-12 col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 p-3 p-md-4 h-100">
          <div class="d-flex align-items-center gap-3 mb-4">
            <div class="bg-primary bg-opacity-10 text-primary rounded-3
                        d-flex align-items-center justify-content-center
                        flex-shrink-0"
                 style="width:46px;height:46px;">
              <i class="fa-solid fa-plus fs-5"></i>
            </div>
            <div>
              <h5 class="fw-bold mb-1">Add Student</h5>
              <p class="text-secondary mb-0 small">
                Create a new student
              </p>
            </div>
          </div>

          <form method="POST">
            <div class="text-center mb-3">
              <i class="fa-solid fa-user-plus fa-3x text-primary"></i>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label fw-semibold">
                Student Name
              </label>
              <input
                type="text"
                name="name"
                id="name"
                class="form-control form-control-lg rounded-3"
                placeholder="Enter student name"
              >
            </div>
            <div class="mb-4">
              <label for="score" class="form-label fw-semibold">
                Score
              </label>

              <input
                type="number"
                name="score"
                id="score"
                class="form-control form-control-lg rounded-3"
                placeholder="Enter score"
              >
            </div>
            <button
              type="submit"
              class="btn btn-primary btn-lg w-100 rounded-3 fw-semibold"
            >
              <i class="fa-solid fa-plus me-1"></i>
              Add Student
            </button>
          </form>
          <?php require_once("../controller/addNewStudent.php") ?>
        </div>
      </div>
      <div class="col-12 col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
          <div class="p-3 p-md-4 border-bottom">
            <h5 class="fw-bold mb-1">
              All Students
            </h5>
            <p class="text-secondary mb-0 small">
              Students stored in database
            </p>
          </div>
          <div class="table-responsive">
            <table class="table table-hover align-middle text-center mb-0">
              <thead class="table-light">
                <tr class="text-nowrap">
                  <th class="px-3 py-3">#</th>
                  <th class="px-3 py-3">Student</th>
                  <th class="px-3 py-3">Score</th>
                  <th class="px-3 py-3">Status</th>
                  <th class="px-3 py-3">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while($students = mysqli_fetch_assoc($result)){
                  $dataCount = count($students);
                  $id = $students['id'];
                  $name = $students['name'];
                  $score = $students['score'];
                  $status = [
                    'color' => '',
                    'background' => '',
                    'text' => ''
                  ];

                  if($score < 50){
                    $status['text'] = "Failed";
                    $status['color'] = "white";
                    $status['background'] = "red";
                  } else if($score >= 50 && $score < 60){
                    $status['text'] = "Pass";
                    $status['color'] = "black";
                    $status['background'] = "yellow";
                  } else if($score >= 60 && $score < 70){
                    $status['text'] = "Good";
                    $status['color'] = "white";
                    $status['background'] = "blue";
                  } else if($score >= 70 && $score < 80){
                    $status['text'] = "Very Good";
                    $status['color'] = "white";
                    $status['background'] = "orange";
                  } else if($score >= 80 && $score < 90){
                    $status['text'] = "Excellent";
                    $status['color'] = "white";
                    $status['background'] = "green";
                  } else if($score >= 90 && $score <= 100){
                    $status['text'] = "Excellent+";
                    $status['color'] = "white";
                    $status['background'] = "blue";
                  } else {
                    $status['text'] = "Error";
                    $status['color'] = "white";
                    $status['background'] = "red";

                  }
                  echo "<tr class='text-nowrap'>";
                  echo "<td class='px-3 py-3'>
                          $id
                        </td>";
                  echo "<td class='px-3 py-3 fw-semibold'>
                          $name
                        </td>";
                  echo "<td class='px-3 py-3'>
                          <span class='badge bg-primary-subtle text-primary rounded-pill px-3 py-2'>
                            $score
                          </span>
                        </td>";

                  echo "<td class='px-3 py-3'>
                          <span
                            class='badge rounded-pill px-3 py-2'
                            style='color: {$status['color']};
                                   background-color: {$status['background']};'
                          >
                            {$status['text']}
                          </span>
                        </td>";
                  echo "<td class='px-3 py-3'>
                          <div class='d-flex justify-content-center gap-2 flex-nowrap'>
                            <a
                              href='edit.php?id=$id'
                              class='btn btn-outline-primary btn-sm text-nowrap'
                            >
                              <i class='fa-solid fa-pen-to-square'></i>
                              Edit
                            </a>
                            <a
                              href='../controller/delete.php?id=$id'
                              class='btn btn-outline-danger btn-sm text-nowrap'
                            >
                              <i class='fa-solid fa-trash'></i>
                              Delete
                            </a>
                          </div>
                        </td>";
                  echo "</tr>";

                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/js/bootstrap.min.js"></script>
</body>
</html>