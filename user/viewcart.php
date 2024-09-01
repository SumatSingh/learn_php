<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- FontAwesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
 <!-- Navbar -->
 <?php include 'header.php'; ?>


    <div class="container mt-5">
    <h2 class="bg-success text-white text-center py-2 px-4" style="width: 300px; font-family: 'Poppins', sans-serif;">
    <i class="fas fa-shopping-cart px-1"></i>Your Cart</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $item) {
                        echo "<tr>
                            <td>{$item['name']}</td>
                            <td>
                                <form action='cartlogic.php' method='POST' class='d-inline'>
                                    <input type='hidden' name='product_id' value='{$item['id']}'>
                                    <div class='d-flex'>
                                    <input type='number' name='product_quantity' class='form-control' value='{$item['quantity']}' min='1'>
                                    <button type='submit' name='update_cart' class='btn btn-info btn-sm px-2 mx-2'>Update</button>
                                    </div>
                                </form>
                            </td>
                            <td>₹{$item['price']}</td>
                            <td>₹" . ($item['price'] * $item['quantity']) . "</td>
                            <td>
                                <form action='cartlogic.php' method='POST' class='d-inline'>
                                    <input type='hidden' name='product_id' value='{$item['id']}'>
                                    <button type='submit' name='delete_cart_item' class='btn btn-danger btn-sm'>Delete</button>
                                </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Your cart is empty</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="checkout.php" class="btn btn-primary">Checkout</a>
        <a href="index.php" class="btn btn-primary">Continue Shopping</a>
    </div>



    <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- FontAwesome JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>



