<?php
// session_start();

// Assume this connects to your database
include 'config.php';

// Calculate the total number of items in the cart
$cart_count = 0;
if (isset($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $item) {
    $cart_count += $item['quantity'];
  }
}

// Fetch products from the database
$query = "SELECT * FROM `products`";
$record = mysqli_query($db_con, $query);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tech-Store</title>
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- FontAwesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .navbar {
      position: sticky;
      top: 0;
      z-index: 1000;
    }
  </style>
</head>

<body>

  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary sticky">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><i class="fas fa-store"></i> Tech_Store</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php"><i class="fas fa-home"></i> Home</a>
          </li>
          <li class="nav-item position-relative">
            <a class="nav-link text-white d-flex align-items-center" href="viewcart.php">
              <i class="fas fa-shopping-cart fa-lg me-2"></i> Cart
              <span
                class="badge bg-success position-absolute top-10 translate-middle p-2 border border-light rounded-circle"
                style="font-size: 0.60rem;">
                <?php echo $cart_count; ?>
              </span>
            </a>
          </li>

          <?php
          if (isset($_SESSION['user_id'])) {
            // User is logged in
            echo '<li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="fas fa-user"></i> Hello, ' . htmlspecialchars($_SESSION['user_name']) . '</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="../dashboard/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                  </li>';
          } else {
            // User is not logged in
            echo '<li class="nav-item">
                    <a class="nav-link text-white" href="../dashboard/login.php"><i class="fas fa-user-cog"></i> Login</a>
                  </li>';
          }
          ?>
          <li class="nav-item">
            <a class="nav-link text-white" href="../dashboard/login.php"><i class="fas fa-user-cog"></i> Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <!-- FontAwesome JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"
    integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>