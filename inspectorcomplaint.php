<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $user_email = $_POST['user_email'];
    $sector = $_POST['sector'];
    $complaint_description = $_POST['complaint_description'];

    // Connect to the database
    $conn = new mysqli("localhost", "root", "dhruv@3005", "hackathon2023");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the insert statement
    $stmt = $conn->prepare("INSERT INTO inspector_complaints (user_email, sector, complaint_description) VALUES (?,?,?)");
    $stmt->bind_param("sis", $user_email, $sector, $complaint_description);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<script>alert("Your complaint has been registered.");</script>';
        // Redirect to a specific page after successful submission
        // header("Location: user-dashboard.php");
    } else {
        echo "Error: " . $stmt->error; // Add error handling to identify any issues
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Inspector Complaint Form</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004953;">
    <a class="navbar-brand" href="user-dashboard.php">
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
    <div class="container mt-5">
        <h2>Inspector Complaint Form</h2>
        <form id="complaintForm" method="post" action="submit_complaint.php">
            <div class="form-group">
                <label for="userEmail">User Email:</label>
                <input type="email" class="form-control" id="userEmail" name="user_email" required>
            </div>
            <div class="form-group">
                <label for="sector">Sector:</label>
                <select class="form-control" id="sector" name="sector" required>
                    <option value="">Select Sector</option>
                    <?php for ($i = 1; $i <= 30; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="complaintDescription">Complaint Description:</label>
                <textarea class="form-control" id="complaintDescription" name="complaint_description" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit Complaint</button>
        </form>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Form validation using JavaScript -->
    <script>
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                var form = document.getElementById('complaintForm');
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>
