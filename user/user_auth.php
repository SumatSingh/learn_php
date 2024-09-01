<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Tech Store</title>
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- FontAwesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div class="container mt-5">
  <div class="row">
    <!-- Login Form -->
    <div class="col-md-6 mx-auto">
      <div class="card shadow-sm">
        <div class="card-header text-center bg-primary text-white">
          <h4><i class="fas fa-sign-in-alt"></i> Login</h4>
        </div>
        <div class="card-body">
          <form action="insert.php" method="POST">
            <div class="form-group mb-3">
              <label for="loginEmail">Email</label>
              <input type="email" name="email" class="form-control" id="loginEmail" placeholder="Enter your email" required>
            </div>
            <div class="form-group mb-3">
              <label for="loginPassword">Password</label>
              <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Enter your password" required>
            </div>
            <div class="form-group mb-3">
              <label for="userRole">Login as</label>
              <select name="role" class="form-control mt-1" id="userRole" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
              </select>
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
          </form>
        </div>
        <div class="card-footer text-center">
          <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
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
