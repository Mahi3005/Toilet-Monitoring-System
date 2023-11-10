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
    <title>Inspector Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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


    /* .modal-content {
        max-width: 600px;
        margin: 0 auto;
    } */

    </style>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004953;">
        <a class="navbar-brand" href="home.php">
            <img src="logo.png" width="40" height="40" class="d-inline-block align-top" alt="GMC Logo">
            Inspector Dashboard
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
                    <a class="nav-link" href="inspectorLogout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- View Complaints Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">View Complaints</h5>
                        <?php
                        // Establish the database connection
                        $db = new mysqli("localhost", "root", "dhruv@3005", "hackathon2023");
                        if ($db->connect_error) {
                            die("Connection failed: " . $db->connect_error);
                        }

                        // Fetch and display complaints for the inspector's sector
                        $inspector_id = $_SESSION['username'];
                        $complaint_query = "SELECT * FROM complaints WHERE sector = (SELECT sector FROM inspectorregistrations WHERE inspector_id = '$inspector_id')";
                        $complaint_result = $db->query($complaint_query);
                        if ($complaint_result->num_rows > 0) {
                            echo '<table class="table table-striped">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th scope="col">ID</th>';
                            echo '<th scope="col">Toilet ID</th>';
                            echo '<th scope="col">User Email</th>';
                            echo '<th scope="col">Description</th>';
                            echo '<th scope="col">View</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            while ($row = $complaint_result->fetch_assoc()) {
                                echo '<tr>';
                                if (array_key_exists('id', $row)) {
                                    echo '<td>' . $row['id'] . '</td>';
                                    // $id1 = $row['id'];
                                }
                                if (array_key_exists('toilet_id', $row)) {
                                    echo '<td>' . $row['toilet_id'] . '</td>';
                                }
                                if (array_key_exists('email', $row)) {
                                    echo '<td>' . $row['email'] . '</td>';
                                }
                                if (array_key_exists('complaint_description', $row)) {
                                    echo '<td>' . $row['complaint_description'] . '</td>';
                                }
                                echo '<td><button class="btn btn-primary view-complaint" data-toggle="modal" data-target="#complaintModal" data-complaint-id="'.$row['id'].'">View</button></td>';
                                $complaintId = $row['id'];
                                echo '</tr>';
                            }
                            
                            echo '</tbody>';
                            echo '</table>';
                        } else {
                            echo '<p>No complaints found in your sector.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Complaint Modal -->
    <div class="modal fade" id="complaintModal" tabindex="-1" role="dialog" aria-labelledby="complaintModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="complaintModalLabel">Complaint Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Display the complaint details form here -->
                    <div id="complaint-details-section">
                        <?php
                            // Fetch complaint details based on complaint ID and populate the form
                            // $complaintId = $row['id'];
                            // Query your database to retrieve the complaint data
                            $complaint_query = "SELECT * FROM complaints WHERE id = $complaintId";
                            $complaint_result = $db->query($complaint_query);
                            if ($complaint_result->num_rows > 0) {
                                $row = $complaint_result->fetch_assoc();
                                echo '<div class="form-group">';
                                echo '<label for="toiletInfo" id="ourLabel">Toilet ID:</label>';
                                echo '<input type="text" class="form-control" id="toiletInfo" name="toilet_id" value="' . $row['toilet_id'] . '" readonly>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="subject">Subject:</label>';
                                echo '<input type="text" class="form-control" id="subject" name="subject" value="' . $row['subject'] . '" readonly>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="complaint_description">Description:</label>';
                                echo '<textarea class="form-control" id="description" name="complaint_description" rows="6" readonly>' . $row['complaint_description'] . '</textarea>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="observation_time">Date and Time of Observation:</label>';
                                echo '<input type="text" class="form-control" id="observation_time" name="observation_time" value="' . $row['observation_time'] . '" readonly>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="name">Your Name :</label>';
                                echo '<input type="text" class="form-control" id="name" name="name" value="' . $row['name'] . '" readonly>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="email">User Email :</label>';
                                echo '<input type="email" class="form-control" id="email" name="email" value="' . $row['email'] . '" readonly>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="severity">Severity Level:</label>';
                                echo '<input type="text" class="form-control" id="severity" name="severity" value="' . $row['severity'] . '" readonly>';
                                echo '</div>';
                                // ...

echo '<div class="form-group">';
echo '<label for="image">Image:</label>';
if (!empty($row['image'])) {
    // Check if the image file exists before displaying it
    $imagePath = $row['image'];

    if (file_exists($imagePath)) {
        echo '<img src="' . $imagePath . '" class="img-fluid" alt="Complaint Image">';
    } else {
        echo 'Image file not found.';
    }
} else {
    echo 'No image uploaded.';
}
echo '</div>';

// ...

                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="video">Video:</label>';
                                if (!empty($row['video'])) {
                                    echo '<video width="320" height="240" controls>';
                                    echo '<source src="' . $row['video'] . '" type="video/mp4">';
                                    echo 'Your browser does not support the video tag.';
                                    echo '</video>';
                                } else {
                                    echo 'No video uploaded.';
                                }
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="pdf">PDF:</label>';
                                if (!empty($row['pdf'])) {
                                    echo '<a href="' . $row['pdf'] . '" target="_blank">View PDF</a>';
                                } else {
                                    echo 'No PDF uploaded.';
                                }
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="category">Category/Type:</label>';
                                echo '<input type="text" class="form-control" id="category" name="category" value="' . $row['category'] . '" readonly>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="comments">Additional Comments:</label>';
                                echo '<textarea class="form-control" id="comments" name="comments" rows="4" readonly>' . $row['comments'] . '</textarea>';
                                echo '</div>';
                            } else {
                                echo '<p>No complaint found with this ID.</p>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rest of your HTML code continues here -->

</body>
</html>