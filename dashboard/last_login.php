<?php
// dashboard.php
include 'config.php';
session_start();

// Assuming $user_id is the logged-in user's ID
$user_id = $_SESSION['user_id'];
$query = "SELECT last_login FROM users WHERE id='$user_id'";
$result = mysqli_query($db_con, $query);
$row = mysqli_fetch_assoc($result);
$last_login = $row['last_login'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tech Store Dashboard</title>
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- FontAwesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Tech_Store</a>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container mt-4">
    <h3 class="mb-4">Dashboard</h3>
    
    <!-- Last Login Card -->
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-header">
            <h5>Last Login</h5>
          </div>
          <div class="card-body">
            <p class="card-text">
              <?php if ($last_login) { ?>
                Last Login: <strong><?php echo htmlspecialchars($last_login); ?></strong>
              <?php } else { ?>
                No login history available.
              <?php } ?>
            </p>
          </div>
        </div>
      </div>
      
      <!-- Other dashboard content -->
      <div class="col-md-8 mb-4">
        <!-- Recent Products, User Activity, and Stats go here -->
      </div>
    </div>

  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-JiKo9Bgh3t2oIkm7g/5Gt1RWn5V4X4+mtmVnF1HZ0zTZjseYJFsU6nB1zp6i2wA2" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-PkZjJgsa3g5HDFuC7SStc+lDgd6wW7FJ07TJl6CSTTjtC9htYJ7PMelcMgVduOf9" crossorigin="anonymous"></script>
</body>

</html>
