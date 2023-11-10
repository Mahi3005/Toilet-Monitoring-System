<?php
session_start(); // Start the session

// Example logic: Check if the form is submitted and the credentials are valid
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Connect to the database
  $conn = new mysqli("localhost", "root", "dhruv@3005", "hackathon2023");

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and bind the select statement
  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);

  // Execute the statement and get the result
  if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
      $row = $result->fetch_assoc();
      if (password_verify($password, $row['password'])) {
        // Start session and store the email
        $_SESSION['email'] = $email;
        $_SESSION['user_data'] = $row;
        header("Location: user-dashboard.php");
        exit();
      } else {
        $_SESSION['login_failed'] = true; // Set session variable to indicate login failure
        header("Location: UserLogin.php");
        exit();
      }
    } else {
      $_SESSION['login_failed'] = true; // Set session variable to indicate login failure
      header("Location: UserLogin.php");
      exit();
    }
  } else {
    echo "Error: " . $stmt->error;
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
    <title>User Login</title>
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
        <form method="POST" action="resetPass.php">
            <h2>Reset Password</h2>
            <div class="form-group">
    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" class="form-control" required>
</div>

            <div style="text-align: center; margin-top: 20px;">
            <a href="#" id="otpverify">send otp</a>
        </div>

            <div class="form-group">
                <label for="password">Enter OTP sent on your registered email : </label>
                <input type="text"  name="otp_1" class="form-control" required>
            </div> 
            <div class="form-group">
                <input type="submit" value="Verify" class="btn btn-custom-color btn-block text-white" id='verifybtn'>
            </div>

        </form>
    </div>
     <script>
    let otp = document.getElementById('otpverify');
    let emailInput = document.getElementById('email');

    otp.addEventListener('click', () => {
        let email = emailInput.value;
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "store_email.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                // Request finished. Do processing here.
                console.log("Email sent to PHP script successfully.");
            }
        };
        xhr.send("email=" + email);
    });

  

</script>
</body>

</html>


