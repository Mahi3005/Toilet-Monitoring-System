<!DOCTYPE html>
<html>
<head>
    <title>Complaints Display Page</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004953;">
        <a class="navbar-brand" href="admin_dashboard.php">
            <img src="logo.png" width="40" height="40" class="d-inline-block align-top" alt="GMC Logo">
            compalian Display
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
               
                <li class="nav-item">
                    <a class="nav-link" href="userLogout.php">Logout</a>
                </li>
            </ul>
        </div>
       
    </nav>
    <div class="container mt-5">
        <h2>Complaints Display Page</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">User Complaints</h3>
                        <p class="card-text">View complaints from users below:</p>
                        <button type="button" class="btn btn-success" onclick="viewUserComplaints()()">View User Complaints</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Inspector Complaints</h3>
                        <p class="card-text">View complaints against inspectors below:</p>
                        <button type="button" class="btn btn-success" onclick="viewInspectorComplaints()">View Inspector Complaints</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom JavaScript for fetching and displaying complaints -->
    <script>
        // Add your JavaScript logic for fetching and displaying complaints here
        function viewUserComplaints() {
            // Add your logic to fetch and display user complaints
            window.location.href = "displayuserComplain.php";
        }

        function viewInspectorComplaints() {
            // Add your logic to fetch and display inspector complaints
            window.location.href = "displayinspectorComplain.php";
        }
    </script>
</body>
</html>
