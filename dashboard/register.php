<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Register - Tech Store</title>
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- FontAwesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="container mt-5 ">
    <div class="row">

      <!-- Register Form -->
      <div class="col-md-6 mx-auto">
        <div class="card shadow-sm">
          <div class="card-header text-center bg-success text-white">
            <h4><i class="fas fa-user-plus"></i> Register</h4>
          </div>
          <div class="card-body">
            <form action="insert.php" method="POST">
              <div class="form-group mb-3">
                <label for="registerName">Name</label>
                <input type="text" name="name" class="form-control" id="registerName" placeholder="Enter your name"
                  required>
              </div>
              <div class="form-group mb-3">
                <label for="registerEmail">Email</label>
                <input type="email" name="email" class="form-control" id="registerEmail" placeholder="Enter your email"
                  required>
              </div>
              <div class="form-group mb-3">
                <label for="registerPassword">Password</label>
                <input type="password" name="password" class="form-control" id="registerPassword"
                  placeholder="Create a password" required>
              </div>
              <div class="form-group mb-3">
                <label for="registerConfirmPassword">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" id="registerConfirmPassword"
                  placeholder="Confirm your password" required>
              </div>
              <div class="form-group mb-3">
                <label for="registerRole">Role</label>
                <select name="role" id="registerRole" class="form-control mt-1" required>
                  <option value="user">User</option>
                  <option value="admin">Admin</option>
                </select>
              </div>

              <button type="submit" name="register" class="btn btn-success w-100">Register</button>
            </form>
          </div>
          <div class="card-footer text-center">
            <p>Already have an account? <a href="login.php">Login here</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-JiKo9Bgh3t2oIkm7g/5Gt1RWn5V4X4+mtmVnF1HZ0zTZjseYJFsU6nB1zp6i2wA2"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-PkZjJgsa3g5HDFuC7SStc+lDgd6wW7FJ07TJl6CSTTjtC9htYJ7PMelcMgVduOf9"
    crossorigin="anonymous"></script>
</body>

</html>