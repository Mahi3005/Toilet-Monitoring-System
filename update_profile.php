<?php
session_start(); // Start the session

// Include the database connection variables
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = "dhruv@3005"; // Replace with your MySQL password
$dbname = "hackathon2023"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$contact_number = $_POST['contact_number'];
$country = $_POST['country'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];

// Retrieve the logged-in user's email from the session
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Retrieve the user's ID from the database
    $fetchIdQuery = "SELECT id FROM users WHERE email='$email'";
    $result = $conn->query($fetchIdQuery);

    if ($result->num_rows > 0) {
        // Fetch the user ID
        $row = $result->fetch_assoc();
        $user_id = $row['id'];

        // Update the user's profile in the database
        $updateQuery = "UPDATE users SET first_name='$first_name', last_name='$last_name', contact_number='$contact_number', country='$country', dob='$dob', gender='$gender' WHERE id=$user_id";

        if ($conn->query($updateQuery) === TRUE) {
            echo "Profile updated successfully";
        } else {
            echo "Error updating profile: " . $conn->error;
        }
    } else {
        echo "User not found in the database.";
    }
} else {
    echo "Email not found in the session.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successful Profile Update</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .message {
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1 class="mt-5">Profile Updated Successfully!</h1>
        <p class="lead mb-4 message">Your profile has been successfully updated. You can now view your updated details.</p>
        <a class="btn btn-primary" href="user-dashboard.php">Go to Dashboard</a>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
