<?php
session_start();

// Add to Cart Logic
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $product_array = array(
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => $product_quantity
    );

    $product_in_cart = false;
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $product_id) {
            $_SESSION['cart'][$key]['quantity'] += $product_quantity;
            $product_in_cart = true;
            break;
        }
    }

    if (!$product_in_cart) {
        $_SESSION['cart'][] = $product_array;
    }

    header('Location: index.php');
    exit;
}

// Update Cart Item Logic
if (isset($_POST['update_cart'])) {
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $product_id) {
            $_SESSION['cart'][$key]['quantity'] = $product_quantity;
            break;
        }
    }

    header('Location: viewcart.php');
    exit;
}

// Delete Cart Item Logic
if (isset($_POST['delete_cart_item'])) {
    $product_id = $_POST['product_id'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $product_id) {
            unset($_SESSION['cart'][$key]);
            // Re-index the array after deletion
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            break;
        }
    }

    header('Location: viewcart.php');
    exit;
}
