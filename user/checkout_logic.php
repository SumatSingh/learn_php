<?php
session_start();
include 'config.php';

if (isset($_POST['place_order'])) {
    $name = mysqli_real_escape_string($db_con, $_POST['name']);
    $address = mysqli_real_escape_string($db_con, $_POST['address']);
    $city = mysqli_real_escape_string($db_con, $_POST['city']);
    $zip = mysqli_real_escape_string($db_con, $_POST['zip']);
    $phone = mysqli_real_escape_string($db_con, $_POST['phone']);
    $payment_method = $_POST['payment_method'];
    $order_total = 0;

    // Calculate total price
    foreach ($_SESSION['cart'] as $item) {
        $order_total += $item['price'] * $item['quantity'];
    }

    // Insert order details into the orders table
    $query = "INSERT INTO `orders` (name, address, city, zip, phone, payment_method, total_amount)
              VALUES ('$name', '$address', '$city', '$zip', '$phone', '$payment_method', '$order_total')";
    $result = mysqli_query($db_con, $query);

    if ($result) {
        // Get the last inserted order ID
        $order_id = mysqli_insert_id($db_con);

        // Insert each cart item into the order_items table
        foreach ($_SESSION['cart'] as $item) {
            $product_id = $item['id'];
            $quantity = $item['quantity'];
            $price = $item['price'];

            $query = "INSERT INTO `order_items` (order_id, product_id, quantity, price)
                      VALUES ('$order_id', '$product_id', '$quantity', '$price')";
            mysqli_query($db_con, $query);
        }

        // Clear the cart session
        unset($_SESSION['cart']);

        // Redirect to a success page
        header('Location: order_success.php');
    } else {
        echo "Order could not be placed. Please try again.";
    }
}

