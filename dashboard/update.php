<?php
include 'config.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if product ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch product details
    $query = "SELECT * FROM `products` WHERE id='$id'";
    $result = mysqli_query($db_con, $query);
    $product = mysqli_fetch_array($result);
} else {
    $_SESSION['message'] = "Invalid product ID.";
    header("Location: index.php");
    exit();
}

// Handle form submission
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Update the product details in the database
    $query = "UPDATE `products` SET name='$name', price='$price', category='$category' WHERE id='$id'";
    if (mysqli_query($db_con, $query)) {
        $_SESSION['message'] = "Product updated successfully!";
        header("Location: productAddPage.php");
        exit();
    } else {
        $_SESSION['message'] = "Failed to update the product.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Product</title>
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
      <h2 class="text-center mb-4">Update Product</h2>
      <form action="" method="POST">
        <div class="mb-3">
          <label for="productName" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="productName" name="name" value="<?php echo $product['name']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="productPrice" class="form-label">Price</label>
          <input type="number" step="0.01" class="form-control" id="productPrice" name="price" value="<?php echo $product['price']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="productCategory" class="form-label">Select Category</label>
          <select class="form-select" id="productCategory" name="category" required>
            <option value="home" <?php if ($product['category'] == 'home') echo 'selected'; ?>>Home</option>
            <option value="mobile" <?php if ($product['category'] == 'mobile') echo 'selected'; ?>>Mobile</option>
            <option value="laptop" <?php if ($product['category'] == 'laptop') echo 'selected'; ?>>Laptop</option>
            <option value="bag" <?php if ($product['category'] == 'bag') echo 'selected'; ?>>Bag</option>
          </select>
        </div>
        <div class="text-center">
          <button type="submit" name="update" class="btn btn-primary">Update Product</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-JiKo9Bgh3t2oIkm7g/5Gt1RWn5V4X4+mtmVnF1HZ0zTZjseYJFsU6nB1zp6i2wA2" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-PkZjJgsa3g5HDFuC7SStc+lDgd6wW7FJ07TJl6CSTTjtC9htYJ7PMelcMgVduOf9" crossorigin="anonymous"></script>
</body>

</html>
