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

    // Delete the product from the database
    $query = "DELETE FROM `products` WHERE id='$id'";
    if (mysqli_query($db_con, $query)) {
        $_SESSION['message'] = "Product deleted successfully!";
    } else {
        $_SESSION['message'] = "Failed to delete the product.";
    }
} else {
    $_SESSION['message'] = "Invalid product ID.";
}

header("Location: productAddpage.php");
exit();

