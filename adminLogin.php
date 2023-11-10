<?php
session_start(); // Start the session

// Perform necessary login authentication logic here
// ...

// Example logic: Check if the form is submitted and the credentials are valid
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $Username = $_POST['username'];
  $Password = $_POST['password'];

  // Connect to the database
  $conn = new mysqli("localhost", "root", "dhruv@3005", "hackathon2023");

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and bind the select statement
  $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
  $stmt->bind_param("s", $Username);

  // Execute the statement and get the result
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if the user exists
  if ($result->num_rows === 1) {
    // Start session and store the username
    $_SESSION['username'] = $Username;
    header("Location: admin-dashboard.php");
    exit();
  } else {
    $_SESSION['login_failed'] = true; // Set session variable to indicate login failure
    header("Location: adminLogin.php");
    exit();
  }

  // Close statement and connection
  $stmt->close();
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
        }

        .container {
            width: 60%;
            margin-top: 50px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px #004953;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group label {
            font-weight: bold;
            margin-top: 10px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group input[type="submit"] {
            background-color: #004953;
            color: #fff;
        }

        .btn-custom-color {
            background-color: #004953;
        }

        .btn-custom-color:hover {
            background-color: #00332b;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004953;">
    <a class="navbar-brand" href="home.php">
        <img src="logo.png" width="40" height="40" class="d-inline-block align-top" alt="GMC Logo">
        Gandhinagar Municipal Corporation
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
          
        </ul>
    </div>
</nav>
    <div class="container">
        <form method="POST">
            <h2>Log In</h2>
            <div class="form-group">
                <label for="email">User Name:</label>
                <input type="email" id="username" name="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div> 
            <div class="form-group">
                <input type="submit" value="Log In" class="btn btn-custom-color btn-block text-white" id='logbtn'>
            </div>

        </form>
    </div>

</body>

</html>


