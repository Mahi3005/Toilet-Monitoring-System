<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $toilet_id = $_POST['toilet_id'];
    $observation_time = $_POST['observation_time'];
    $name = $_POST['name'];
    $email = ''; // Initialize with empty string
    $severity = $_POST['severity'];
    $image = $_FILES['image']['name'] ?: '';
    $video = $_FILES['video']['name'] ?: '';
    $pdf = $_FILES['pdf']['name'] ?: '';
    $category = $_POST['category'];
    $comments = $_POST['comments'];
    $inspector_id = ''; // Make sure to set the inspector_id
    $sector = isset($_POST['sector']) ? $_POST['sector'] : '';

    if(empty($sector)) {
        // Handle the case where the sector is not selected
        // You can redirect to the form page with an error message or handle it in a way suitable for your application.
        echo "Please select a sector.";
        exit;
    }

    // Connect to the database
    $conn = new mysqli("localhost", "root", "dhruv@3005", "hackathon2023");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the insert statement
    $stmt = $conn->prepare("INSERT INTO Complaints (subject, description, toilet_id, observation_time, name, email, severity, image, video, pdf, category, comments, sector) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssssis", $subject, $description, $toilet_id,  $observation_time, $name, $email, $severity, $image, $video, $pdf, $category, $comments, $sector);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<script>alert("Your complaint has been registered.");</script>';
        header("Location: user-dashboard.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statements and connection
    $stmt->close();
    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add any custom styles here */
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

        label {
            font-weight: bold;
            margin-top: 10px;
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
        <form method="POST"  enctype="multipart/form-data" onsubmit="return validateForm()">
            <h2>Complaint Registration</h2>

           
            <div class="form-group">
        <label for="toiletInfo" id="ourLabel">Toilet ID:</label>
        <select class="form-control" id="toiletInfo" name="toilet_id" size="1">
            <?php
            // Create a connection to the database
            $conn = new mysqli("localhost", "root", "dhruv@3005", "hackathon2023");

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch Toilet IDs from the database
            $sql = "SELECT toilet_id FROM toiletregistrations";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<option value=''>Select ID</option>";
                while ($row = $result->fetch_assoc()) {
                    $toiletId = $row["toilet_id"];
                    
                    
                    echo "<option value='$toiletId'>$toiletId</option>";
                }
            }

            // Close the database connection
            $conn->close();
            ?>
        </select>
    </div>


            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="6" required></textarea>
            </div>

            <div class="form-group">
                <label for="observation_time">Date and Time of Observation:</label>
                <input type="datetime-local" class="form-control" id="observation_time" name="observation_time" required>
            </div>

            <div class="form-group">
                <label for="name">Your Name :</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <!-- <div class="form-group">
                <label for="email">Your Email :</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div> -->

            <div class="form-group">
                <label for="severity">Severity Level:</label>
                <select class="form-control" id="severity" name="severity" required size="1">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Upload Image (Optional):</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>

            <div class="form-group">
                <label for="video">Upload Video (Optional):</label>
                <input type="file" class="form-control-file" id="video" name="video">
            </div>

            <div class="form-group">
                <label for="pdf">Upload PDF (Optional):</label>
                <input type="file" class="form-control-file" id="pdf" name="pdf">
            </div>

            <div class="form-group">
                <label for="category">Category/Type:</label>
                <select class="form-control" id="category" name="category"  size="1" required>
                <option value="cleanliness">Cleanliness</option>
    <option value="maintenance">Maintenance</option>
    <option value="plumbing">Plumbing</option>
    <option value="lighting">Lighting</option>
    <option value="security">Security</option>
    <option value="accessibility">Accessibility</option>
    <option value="odor">Odor</option>
    <option value="vandalism">Vandalism</option>
    <option value="equipment">Equipment Issues</option>
    <option value="hygiene">Hygiene Concerns</option>
    <option value="waste_management">Waste Management</option>
    <option value="crowd_control">Crowd Control</option>
    <option value="privacy">Privacy Issues</option>
    <option value="signage">Signage Problems</option>
    <option value="environmental">Environmental Concerns</option>
    <option value="safety">Safety Hazards</option>
    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="comments">Additional Comments (Optional):</label>
                <textarea class="form-control" id="comments" name="comments" rows="4"></textarea>
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

            <button type="submit" class="btn btn-primary">Submit Complaint</button>
        </form>
    </div>

    <script>
        function validateForm() {
            // Add your form validation logic here
            return true; // Change this to false if you want to prevent form submission
        }
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>