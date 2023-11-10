<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumable Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .navbar-dark .navbar-nav .nav-link {
            color:background-color: #004953;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: #e9ecef;
        }
        .nav-link:hover {
        background-color: #007a8c;
    }

    .card-header{
        background-color: #004953;
    }

    .text-center{
        color: white;
    }   
    
    #submitbtn {
            display: block;
            margin: 0 auto;
            margin-bottom: 3%;
            width: 17vw; /* Adjust the width as needed */
            background-color: #004953;
            transition: background-color 0.3s;
        }
        #submitbtn:hover {
            background-color: #007a8c; /* Hover color */
        }
    </style>
</head>

<body>

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
                <li class="nav-item active">
                    <a class="nav-link" href="editProfile.php">Edit Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userLogout.php">Logout</a>
                </li>
            </ul>
        </div>
       
    </nav>
    <!-- Side Navbar -->
    <!-- ... -->

    <div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar" style="background-color: #004953; height: 120vh;">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item my-3">
                        <a class="nav-link active  text-decoration-none" href="consumableManagement.php" style="color: white;">
                            Consumable Management
                        </a>
                    </li>
                    <li class="nav-item my-3">
                        <a class="nav-link text-decoration-none" href="#" style="color: white;">
                            Inspector Complaint
                        </a>
                    </li>
                    <li class="nav-item my-3">
                        <a class="nav-link text-decoration-none" href="#" style="color: white;">
                            Care Taker Attendance and Mailing
                        </a>
                    </li>
                    <li class="nav-item my-3">
                        <a class="nav-link text-decoration-none" href="#" style="color: white;">
                            Register Toilets
                        </a>
                    </li>
                    <li class="nav-item my-3">
                        <a class="nav-link text-decoration-none" href="#" style="color: white;">
                            Checklist Observation
                        </a>
                    </li>
                    <li class="nav-item my-3">
                        <a class="nav-link text-decoration-none" href="#" style="color: white;">
                            Register Inspector
                        </a>
                    </li>
                    <li class="nav-item my-3">
                        <a class="nav-link text-decoration-none" href="#" style="color: white;">
                            User Feedback Management
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Consumable Management</h2>
            </div>
            <div class="card-body">
                <form id="consumablesForm" method="post">
                         
            <div class="form-group">
        <label for="toiletInfo" id="ourLabel">Toilet ID:</label>
        <select class="form-control" id="toilet_id" name="toilet_id" size="1">
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
                        <label for="toiletCleaner">Toilet Cleaner Quantity:</label>
                        <input type="number" class="form-control" id="toiletCleaner" required>
                    </div>
                    <div class="form-group">
                        <label for="soap">Soap Quantity:</label>
                        <input type="number" class="form-control" id="soap" required>
                    </div>
                    <div class="form-group">
                        <label for="sanitizer">Sanitizer Quantity:</label>
                        <input type="number" class="form-control" id="sanitizer" required>
                    </div>
                    
                        </select>
                    </div>
                    <button type="submit" id="submitbtn" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Add this line to include jQuery -->

<script>
    $(document).ready(function () {
        let btn = document.getElementById('submitbtn');

        btn.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Gather form data
            let toiletId = $('#toilet_id').val();
            let toiletCleaner = $('#toiletCleaner').val();
            let soap = $('#soap').val();
            let sanitizer = $('#sanitizer').val();

            // Send data to re-orderConsumables.php using AJAX
            $.ajax({
                type: 'POST',
                url: 're-orderConsumables.php',
                data: {
                    toilet_id: toiletId,
                    toiletCleaner: toiletCleaner,
                    soap: soap,
                    sanitizer: sanitizer
                },

                success: function (response) {
                    setTimeout(function () {
                    if (response === 'success') {
                        alert("Consumables Re-Order Mail Sent Successfully!");
                        location.reload();
                    } else {
                        alert("Consumables Re-Order Mail Sending Failed...!");
                    }
                }, 2000);
                }
            });
        });
    });
</script>

</body>

</html>
