<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .card {
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
      max-width: 500px;
      width: 100%;
    }
    .form-control:focus {
      border-color: #007bff;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      transition: all 0.3s ease;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #004a9b;
    }
    .input-group-text {
      background-color: #f8f9fa;
      border-right: none;
      color: #6c757d;
    }
    .input-group-text + .form-control {
      border-left: none;
    }
    .login-image {
      background: url('https://via.placeholder.com/400x600') center/cover no-repeat;
      border-top-left-radius: 1rem;
      border-bottom-left-radius: 1rem;
    }
    .card-body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100%;
    }
    .login-text {
      color: #007bff;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="card">
    <div class="row g-0">
      <div class="col-md-12">
        <div class="card-body p-5">
          <h2 class="card-title mb-4 login-text text-center">Perpustakan Nich</h2>
          <form method="POST" action="ceklogin.php" class="w-100" style="max-width: 300px;">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
              <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Sign In</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
