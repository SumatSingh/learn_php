<?php
include 'config.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Product</title>
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
      <a class="navbar-brand" href="index.php">Tech_Store</a>
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

  <div class="container mt-5">
    <div class="col-md-8 mx-auto p-4 border rounded shadow-sm bg-light">
      <h2 class="text-center mb-4">Add New Product</h2>
      <form action="insert.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="productName" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="productName" name="name" placeholder="Enter product name" required>
        </div>
        <div class="mb-3">
          <label for="productPrice" class="form-label">Price</label>
          <input type="number" step="0.01" class="form-control" id="productPrice" name="price" placeholder="Enter product price" required>
        </div>
        <div class="mb-3">
          <label for="productImage" class="form-label">Product Image</label>
          <input type="file" class="form-control" id="productImage" name="image" required>
        </div>
        <div class="mb-3">
          <label for="productCategory" class="form-label">Select Category</label>
          <select class="form-select" id="productCategory" name="category" required>
            <option value="" disabled selected>Select category</option>
            <option value="home">Home</option>
            <option value="mobile">Mobile</option>
            <option value="laptop">Laptop</option>
            <option value="bag">Bag</option>
          </select>
        </div>
        <div class="text-center">
          <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
        </div>
      </form>
    </div>

    <div class="col-md-10 mx-auto mt-5">
      <h3 class="text-center mb-4">Product List</h3>
      <table class="table table-bordered table-hover text-center">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Category</th>
            <th>Delete</th>
            <th>Update</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'config.php';
          $record = mysqli_query($db_con, "SELECT * FROM `products`");
          while ($row = mysqli_fetch_array($record)) {
            echo "
              <tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['price']}</td>
                <td><img src='{$row['image']}' class='img-fluid' style='height: 100px; width: 100px;'></td>
                <td>{$row['category']}</td>
                <td><a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a></td>
                <td><a href='update.php?id={$row['id']}' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a></td>
              </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-JiKo9Bgh3t2oIkm7g/5Gt1RWn5V4X4+mtmVnF1HZ0zTZjseYJFsU6nB1zp6i2wA2" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-PkZjJgsa3g5HDFuC7SStc+lDgd6wW7FJ07TJl6CSTTjtC9htYJ7PMelcMgVduOf9" crossorigin="anonymous"></script>
</body>

</html>
