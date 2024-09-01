<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-COM</title>
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- FontAwesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
  <style>
    .sticky-category {
      position: sticky;
      top: 60px; 
      z-index: 999;
    }
  </style>
</head>

<body>

 <!-- header -->
 <?php include 'header.php'; ?>

 <!-- category -->
 <div class="sticky-category container my-5">
  <div class="row text-center">
    <div class="col-3">
      <a href="?category=all" class="btn btn-success w-100 py-3 text-white">
        <i class="fas fa-home"></i> All
      </a>
    </div>
    <div class="col-3">
      <a href="?category=laptop" class="btn btn-primary w-100 py-3 text-white">
        <i class="fas fa-laptop"></i> Laptop
      </a>
    </div>
    <div class="col-3">
      <a href="?category=mobile" class="btn btn-info w-100 py-3 text-white">
        <i class="fas fa-mobile-alt"></i> Mobile
      </a>
    </div>
    <div class="col-3">
      <a href="?category=bag" class="btn btn-warning w-100 py-3 text-white">
        <i class="fas fa-shopping-bag"></i> Bag
      </a>
    </div>
  </div>
</div>


  <!-- Products Display -->
  <div class="container">
    <div class="row">
    <?php
include 'config.php';

// Category check karein URL mein
$category = isset($_GET['category']) ? $_GET['category'] : 'all';

// Category ke hisaab se SQL query banayein
if ($category === 'all') {
    $query = "SELECT * FROM `products`";
} else {
    // Agar specific category select hui ho to uske liye filtering
    $query = "SELECT * FROM `products` WHERE category='$category'";
}
$record = mysqli_query($db_con, $query);

if (mysqli_num_rows($record) > 0) {
    while ($row = mysqli_fetch_array($record)) {
        echo "
       <div class='col-md-3 col-lg-4 col-sm-6 mb-4'>
    <form action='cartlogic.php' method='POST'>
        <div class='card'>
            <img class='img-fluid mx-auto d-block' style='width: 150px; height: 150px;' src='../dashboard/{$row['image']}' alt='Product image'>
            <div class='card-body text-center'>
                <h5 class='card-title'>{$row['name']}</h5>
                <p class='card-text text-success fw-bold'>₹{$row['price']}</p>
                <input type='hidden' name='product_id' value='{$row['id']}'>
                <input type='hidden' name='product_name' value='{$row['name']}'>
                <input type='hidden' name='product_price' value='{$row['price']}'>
                <input type='number' name='product_quantity' class='form-control mb-2' min='1' max='20' value='1' placeholder='Quantity'>
                <button type='submit' name='add_to_cart' class='btn btn-primary w-100'><i class='fas fa-cart-plus'></i> Add to cart</button>
            </div>
        </div>
    </form>
</div>
  
        ";
    }
} else {
    echo "<div class='col-12 text-center'><h5>No products available</h5></div>";
}
?>

    </div>
  </div>



  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- FontAwesome JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>