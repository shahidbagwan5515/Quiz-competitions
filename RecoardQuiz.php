<?php
// Current page
$currentPage = basename($_SERVER['PHP_SELF']);

// DB connection
include 'dp.php';

// Fetch data
$sql = "SELECT * FROM quiz_result ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Quiz Records</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: #f4f6f9;
      font-family: Segoe UI, sans-serif;
    }

    .sidebar {
      width: 260px;
      height: 100vh;
      position: fixed;
      background: #fff;
      box-shadow: 2px 0 10px rgba(0, 0, 0, .05)
    }

    .sidebar a {
      display: flex;
      align-items: center;
      padding: 12px 15px;
      margin-bottom: 8px;
      border-radius: 8px;
      text-decoration: none;
      color: #555
    }

    .sidebar a i {
      margin-right: 10px
    }

    .sidebar a.active,
    .sidebar a:hover {
      background: #0d6efd;
      color: #fff
    }

    .content {
      margin-left: 260px;
      padding: 25px
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, .05)
    }

    th {
      background: #0d6efd;
      color: #fff;
      white-space: nowrap
    }

    td {
      white-space: nowrap
    }

    @media(max-width:768px) {
      .sidebar {
        position: relative;
        width: 100%;
        height: auto
      }

      .content {
        margin-left: 0
      }
    }
  </style>
</head>

<body>

  <!-- Sidebar -->
  <div class="sidebar p-4">
    <h4 class="mb-4 text-primary">Admin Panel</h4>
    <a href="dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <a href="" class="active"><i class="bi bi-bar-chart"></i> Reports</a>


    <a href="" class="<?= ($currentPage == 'settings.php') ? 'active' : '' ?>">
      <i class="bi bi-gear"></i> Settings
    </a>

    <a href="" class="text-danger">
      <i class="bi bi-box-arrow-right"></i> Logout
    </a>
  </div>

  <!-- Content -->
  <div class="content">

    <!-- Topbar -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h5 class="mb-0">Quiz Result Records</h5>
      <a href="download_records.php" class="btn btn-success btn-sm">
        <i class="bi bi-download"></i> Download Excel
      </a>
    </div>

    <div class="card p-3">
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Class</th>
              <th>Roll</th>
              <th>Gender</th>
              <th>Total Q</th>
              <th>Correct</th>
              <th>Wrong</th>
              <th>Score</th>
              <th>Time</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) { ?>
                <tr>
                  <td><?= $row['id'] ?></td>
                  <td><?= htmlspecialchars($row['name']) ?></td>
                  <td><?= $row['class'] ?></td>
                  <td><?= $row['roll'] ?></td>
                  <td><?= $row['gender'] ?></td>
                  <td><?= $row['total_questions'] ?></td>
                  <td class="text-success fw-bold"><?= $row['correct_answers'] ?></td>
                  <td class="text-danger fw-bold"><?= $row['wrong_answers'] ?></td>
                  <td><?= $row['score'] ?></td>
                  <td><?= $row['time_taken'] ?></td>
                  <td><?= $row['date_time'] ?></td>
                </tr>
              <?php }
            } else { ?>
              <tr>
                <td colspan="11" class="text-center">No records found</td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>

</html>