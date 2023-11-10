<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Complaint Tracking System</title>
    <style>
        body {
            background-color: #f0f0f0; /* Light gray background */
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #003366; /* Government blue border */
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            background-color: #004952; /* Government blue */
            color: #fff;
            padding: 20px 0;
            margin: 0;
        }

        .complaint-status {
            text-align: center;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #003366; /* Government blue */
        }

        form {
            width: 80%;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #003366; /* Government blue */
        }

        input[type="text"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #004952; /* Government blue */
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

    </style>
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
                <a class="nav-link" href="user-dashboard.php">Home</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <h1 class="text-center mt-4">Complaint Tracking System</h1>
    <div class="complaint-status mt-4">
        <!-- <h2>Fetch Complaint by ID</h2> -->
        <form action="track.php" method="POST" id="fetch-form">
            <div class="form-group">
                <label for="email" style="color: #004952;"><h2><b>Enter Email:</b></h2></label>
                <input type="text" class="form-control" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #004952;">Fetch Complaint</button>
        </form>
       <!-- ... Your previous HTML code ... -->

<div class="complaint-details mt-4 text-center">
<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Connect to the MySQL database (replace with your credentials)
    $connection = new mysqli("localhost", "root", "dhruv@3005", "hackathon2023");

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Fetch complaints by email
    $query = "SELECT * FROM complaints WHERE email = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h2 class='font-weight-bold' style='color: #004952;'>Complaint Details</h2>";
        while ($complaint = $result->fetch_assoc()) {
            echo "<p><span class='font-weight-bold'>Category:</span> " . htmlspecialchars($complaint['category']) . "</p>";
            echo "<p><span class='font-weight-bold'>Description:</span> " . htmlspecialchars($complaint['description']) . "</p>";
            echo "<p><span class='font-weight-bold'>Status:</span> <span style='color: crimson;'></span>" . htmlspecialchars($complaint['status']) . "</p>";
            echo "<p><span class='font-weight-bold'>Created at:</span> <span style='color: crimson;'></span>" . htmlspecialchars($complaint['created_at']) . "</p>";
            echo "<hr>"; // Add a horizontal line to separate complaints
        }
    } else {
        echo "Complaints not found for the provided email.";
    }

    $stmt->close();
    $connection->close();
} else {
    echo "Please enter an email to fetch complaints.";
}
?>
</div>

<!-- ... Your remaining HTML and JavaScript code ... -->

    
</div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>