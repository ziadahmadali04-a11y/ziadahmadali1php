<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
</head>
<body>
    <?php require_once("navbar.php") ?>
    <div class="container py-5">
        <div class="mb-4">
            <h2 class="fw-bold mb-1">Search Student</h2>
            <p class="text-muted mb-0">Find a student by name or ID</p>
        </div>
        <div class="card p-4 mb-4">
            <form method="GET">
                <div class="row g-3 align-items-center">
                    <div class="col-md-9">
                        <div class="search-box">
                            <input type="text" name="search" class="form-control" placeholder="Enter student name or ID..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class=" btn btn-outline-primary w-100">
                            <i class="bi bi-search me-1"></i> Search
                        </button>
                    </div>
                </div>
            </form>
            <?php require_once("../controller/searchController.php") ?>
        </div>
        <div class="card overflow-hidden">
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Search Results</h5>
                        <p class="text-muted small mb-0">Students matching your search</p>
                    </div>
                </div>
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
                while($students = mysqli_fetch_assoc($data)){
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
</body>
</html>