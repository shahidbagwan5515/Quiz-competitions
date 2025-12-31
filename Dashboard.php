<?php
// Current page name
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Professional Dashboard</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: #f4f6f9;
      font-family: "Segoe UI", sans-serif;
    }

    .sidebar {
      width: 260px;
      height: 100vh;
      background: #ffffff;
      position: fixed;
      box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
    }

    .sidebar h4 {
      font-weight: 700;
    }

    .sidebar a {
      color: #555;
      padding: 12px 15px;
      display: flex;
      align-items: center;
      border-radius: 8px;
      text-decoration: none;
      margin-bottom: 8px;
      transition: 0.3s;
    }

    .sidebar a i {
      margin-right: 10px;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background: #0d6efd;
      color: #fff;
    }

    .content {
      margin-left: 260px;
      padding: 25px;
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .topbar {
      background: #fff;
      padding: 15px 25px;
      border-radius: 15px;
      margin-bottom: 25px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    @media (max-width: 768px) {
      .sidebar {
        position: relative;
        width: 100%;
        height: auto;
      }

      .content {
        margin-left: 0;
      }
    }
  </style>
</head>

<body>

  <!-- Sidebar -->
  <div class="sidebar p-4">
    <h4 class="mb-4 text-primary">Admin Panel</h4>

    <a href="dashboard.php" class="<?= ($currentPage == 'dashboard.php') ? 'active' : '' ?>">
      <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <a href="./RecoardQuiz.php" class="<?= ($currentPage == './RecoardQuiz.php') ? 'active' : '' ?>">
      <i class="bi bi-people"></i> Recoard Quiz
    </a>

    <a href="" class="<?= ($currentPage == 'reports.php') ? 'active' : '' ?>">
      <i class="bi bi-bar-chart"></i> Reports
    </a>

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
    <div class="topbar d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Dashboard Overview</h5>
      <span class="text-muted">Welcome, Admin</span>
    </div>

    <!-- Cards -->
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card p-4">
          <h6>Total Users</h6>
          <h2 class="fw-bold">1,240</h2>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4">
          <h6>Monthly Revenue</h6>
          <h2 class="fw-bold">₹85,000</h2>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4">
          <h6>Active Sessions</h6>
          <h2 class="fw-bold">320</h2>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>