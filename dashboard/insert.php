<?php
include 'config.php';

// ######################################################
// For Adding Products

if(isset($_POST['submit'])) {
    $product_name = mysqli_real_escape_string($db_con, $_POST['name']);
    $product_price = mysqli_real_escape_string($db_con, $_POST['price']);
    $product_image = $_FILES['image'];
    $image_loc = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $img_dest = "UploadImage/" . basename($image_name);
    $product_category = mysqli_real_escape_string($db_con, $_POST['category']);

    // Move uploaded image to the destination folder
    if (move_uploaded_file($image_loc, $img_dest)) {
        // Insert product into the database
        $query = "INSERT INTO products (name, price, image, category) 
                  VALUES ('$product_name', '$product_price', '$img_dest', '$product_category')";
        
        if (mysqli_query($db_con, $query)) {
            echo "<script> alert('Product added successfully!'); window.location.href = 'productAddPage.php'; </script>";

        } else {
            echo "Error: " . mysqli_error($db_con);
        }
    } else {
        echo "Failed to upload image.";
    }
}

// ######################################################
// Register.php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $name = mysqli_real_escape_string($db_con, $_POST['name']);
    $email = mysqli_real_escape_string($db_con, $_POST['email']);
    $password = mysqli_real_escape_string($db_con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($db_con, $_POST['confirm_password']);
    $role = mysqli_real_escape_string($db_con, $_POST['role']);
    $last_login = mysqli_real_escape_string($db_con, $_POST['last_login']);

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit;
    }

    // Password hashing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $email_check = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db_con, $email_check);

    if (mysqli_num_rows($result) > 0) {
        echo "<script> alert('Email Already Exists!'); window.location.href = 'register.php';</script>";
        exit;
    }

    // Insert the new user into the database
    $query = "INSERT INTO users (name, email, password, role, last_login) VALUES ('$name', '$email', '$hashed_password', '$role', '$last_login')";

    if (mysqli_query($db_con, $query)) {
        echo "Registration successful!";
        header("Location: login.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($db_con);
    }
}

// ######################################################
// Login.php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    // Sanitize input data
    $email = mysqli_real_escape_string($db_con, $_POST['email']);
    $password = mysqli_real_escape_string($db_con, $_POST['password']);

    // Fetch user data from the database
    $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db_con, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Start session and store user data
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['last_login'] = $user['last_login'];

            // Redirect based on role
            if ($user['role'] == 'admin') {
                header("Location: index.php"); // Admin dashboard
            } else {
                header("Location: ../user/index.php"); // User homepage
            }

            // Optional: Success message and exit
            exit;
        } else {
            echo "<script> alert('Incorrect email / password!'); window.location.href = 'login.php';</script>";
        }
    } else {
        // No user found with the entered email
        echo "<script> alert('No user found with this email!'); window.location.href = 'login.php';</script>";
    }
}


