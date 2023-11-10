<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $contact_number = $_POST['contact_number'];
  // You can add code here to handle file uploads for the profile picture
  $country = $_POST['sector'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];

  // Connect to the database
  $conn = new mysqli("localhost", "root", "dhruv@3005", "hackathon2023");

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and bind the insert statement
  $stmt = $conn->prepare("INSERT INTO users (email, password, first_name, last_name, contact_number,  sector, dob, gender) VALUES (?,?,?,?,?,?,?,?)");
  $stmt->bind_param("ssssssss", $email, $password, $first_name, $last_name, $contact_number, $country, $dob, $gender);

  // Execute the statement
  if ($stmt->execute()) {
    header("Location: userLogin.php");
    exit();
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
    <title>User Registration</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
        }

       .container {
        margin-bottom: 3vh;
        margin-top: 3vh;
    background-color: rgba(255, 255, 255, 0.8); /* Add an opaque background to the container */
    padding: 30px;
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
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" >
        <form method="POST">
            <h2>User Registration</h2>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" class="form-control" required>
                <a id="verifyEmailLink" href="javascript:void(0);" onclick="openEmailVerificationWindow()">Verify Email</a>
            </div>
            <!-- Add this hidden input field for OTP -->
            <input type="hidden" id="otp" name="otp" value="">

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="tel" id="contact_number" name="contact_number" class="form-control">
            </div>

            <div class="select-container">
          <label for="sector" class="font-weight-bold">Select Sector</label>
          <select class="form-control" id="sector" name="sector" required>
            <option value="">Select Sector</option>
            <option value="1">Sector 1</option>
  <option value="2">Sector 2</option>
  <option value="3">Sector 3</option>
  <option value="4">Sector 4</option>
  <option value="5">Sector 5</option>
  <option value="6">Sector 6</option>
  <option value="7">Sector 7</option>
  <option value="8">Sector 8</option>
  <option value="9">Sector 9</option>
  <option value="10">Sector 10</option>
  <option value="11">Sector 11</option>
  <option value="12">Sector 12</option>
  <option value="13">Sector 13</option>
  <option value="14">Sector 14</option>
  <option value="15">Sector 15</option>
  <option value="16">Sector 16</option>
  <option value="17">Sector 17</option>
  <option value="18">Sector 18</option>
  <option value="19">Sector 19</option>
  <option value="20">Sector 20</option>
  <option value="21">Sector 21</option>
  <option value="22">Sector 22</option>
  <option value="23">Sector 23</option>
  <option value="24">Sector 24</option>
  <option value="25">Sector 25</option>
  <option value="26">Sector 26</option>
  <option value="27">Sector 27</option>
  <option value="28">Sector 28</option>
  <option value="29">Sector 29</option>
  <option value="30">Sector 30</option>
          </select>
        </div>

            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" class="form-control">
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" class="form-control" size="1">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" id="registerButton" value="Register" class="btn btn-custom-color btn-block text-white"
                    disabled>
            </div>
        </form>
    </div>

    <script>
        function openEmailVerificationWindow() {
            // Generate a random OTP
            var otp = Math.floor(100000 + Math.random() * 900000);
            let checker = otp;
            // Store the OTP in a hidden field for later use
            document.getElementById("otp").value = otp;

            $.post('sendVerificationMail.php', { email: document.getElementById('email').value, otp: otp }, function(data) {
                // Handle the response from the server (if needed)
                // Prompt the user to enter the OTP
                var enteredOTP = prompt("Please check your email for the OTP and enter it below:");

                if (enteredOTP == checker) {
                    alert("Email verified. You can now register.");
                    document.getElementById("registerButton").disabled = false;
                } else {
                    alert("Invalid OTP. Please try again.");
                }
            });
        }
    </script>
</body>

</html>