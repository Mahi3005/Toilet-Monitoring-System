<?php
session_start(); // Starting the session

// Check if the user is logged in, if not redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: inspectorLogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .navbar-dark .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: #e9ecef;
        }
        .nav-link:hover {
            background-color: #007a8c;
        }
    </style>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004953;">
        <a class="navbar-brand" href="home.php">
            <img src="logo.png" width="40" height="40" class="d-inline-block align-top" alt="GMC Logo">
            User Dashboard
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php
                    // Establish the database connection
                    $db = new mysqli("localhost", "root", "dhruv@3005", "hackathon2023");
                    if ($db->connect_error) {
                        die("Connection failed: " . $db->connect_error);
                    }

                    // Fetch inspector_id
                    $inspector_id = ""; // Initializing the variable
                    // Assuming the username of the logged-in inspector is stored in a session variable
                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        $query = "SELECT inspector_id FROM inspectorregistrations WHERE inspector_id = '$username'";
                        $result = $db->query($query);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $inspector_id = $row["inspector_id"];
                        }
                    }
                    // Display the inspector_id in the navbar
                    echo '<li class="nav-item active">';
                    echo '<a class="nav-link" href="#">Inspector ID: '.$inspector_id.'</a>';
                    echo '</li>';
                ?>
                
                <li class="nav-item">
                    <a class="nav-link" href="userLogout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Survey Form</h5>
                        <p class="card-text">Click the button below to fill out the survey form.</p>
                        <a href="Public_CT.php" class="btn btn-primary">Go to Survey Form</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Complaint Form</h5>
                        <p class="card-text">Click the button below to fill out the complaint form.</p>
                        <a href="lookComplaints.php" class="btn btn-primary">Go to Complaint Form</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>