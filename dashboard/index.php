<?php
// Include configuration file and start session
include 'config.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Assuming $user_id is the logged-in user's ID
$user_id = $_SESSION['user_id'];

// Query to fetch last login time
$query = "SELECT last_login FROM users WHERE id='$user_id'";
$result = mysqli_query($db_con, $query);
$row = mysqli_fetch_assoc($result);
$last_login = $row['last_login'];

// Total Products
$product_count_query = "SELECT COUNT(*) as total_products FROM products";
$product_count_result = mysqli_query($db_con, $product_count_query);
$product_count = mysqli_fetch_assoc($product_count_result)['total_products'];

// Total Users
$user_count_query = "SELECT COUNT(*) as total_users FROM users";
$user_count_result = mysqli_query($db_con, $user_count_query);
$user_count = mysqli_fetch_assoc($user_count_result)['total_users'];

// Active Orders
$order_count_query = "SELECT COUNT(*) as active_orders FROM orders WHERE status = 'active'";
$order_count_result = mysqli_query($db_con, $order_count_query);
$active_orders = mysqli_fetch_assoc($order_count_result)['active_orders'];

// Recent Products
$recent_products_query = "SELECT * FROM products ORDER BY created_at DESC LIMIT 3";
$recent_products_result = mysqli_query($db_con, $recent_products_query);

// User Activity (Last 3 activities)
$user_activity_query = "SELECT name, last_login FROM users ORDER BY last_login DESC LIMIT 3";
$user_activity_result = mysqli_query($db_con, $user_activity_query);
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
    
    <!-- Dashboard Cards -->
    <div class="row">
      <!-- Last Login Card -->
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

      <!-- Stats and Summary -->
      <div class="col-md-8 mb-4">
        <div class="d-flex gap-4 mb-4">
          <a href="productAddPage.php" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add Product</a>
          <a href="#" class="btn btn-secondary"><i class="fas fa-users"></i> Manage Users</a>
        </div>

        <!-- Recent Products -->
        <div class="card mb-4">
          <div class="card-header">
            <h5>Recent Products</h5>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <?php while ($product = mysqli_fetch_assoc($recent_products_result)): ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo htmlspecialchars($product['name']); ?>
                <span class="badge bg-primary rounded-pill">Edit</span>
              </li>
              <?php endwhile; ?>
            </ul>
          </div>
        </div>

        <!-- User Activity -->
        <div class="card mb-4">
          <div class="card-header">
            <h5>User Activity</h5>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <?php while ($user = mysqli_fetch_assoc($user_activity_result)): ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo htmlspecialchars($user['name']); ?> logged in
                <span class="text-muted small"><?php echo htmlspecialchars($user['last_login']); ?></span>
              </li>
              <?php endwhile; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Stats and Summary -->
    <div class="row text-center">
      <div class="col-md-4">
        <div class="p-3 bg-light rounded shadow-sm">
          <h6>Total Products</h6>
          <p class="display-4"><?php echo htmlspecialchars($product_count); ?></p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-3 bg-light rounded shadow-sm">
          <h6>Total Users</h6>
          <p class="display-4"><?php echo htmlspecialchars($user_count); ?></p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-3 bg-light rounded shadow-sm">
          <h6>Active Orders</h6>
          <p class="display-4"><?php echo htmlspecialchars($active_orders); ?></p>
        </div>
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

<?php mysqli_close($db_con); ?>
