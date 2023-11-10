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
            color:background-color: #004953;
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
            Admin Dashboard
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
                        <a class="nav-link text-decoration-none" href="displayComplain.php" style="color: white;">
                            Complaints
                        </a>
                    </li>
                    <li class="nav-item my-3">
                        <a class="nav-link text-decoration-none" href="CareTakerAttendance.php" style="color: white;">
                            Care Taker Attendance and Mailing
                        </a>
                    </li>
                    <li class="nav-item my-3">
                        <a class="nav-link text-decoration-none" href="toiletregistration.php" style="color: white;">
                            Register Toilets
                        </a>
                    </li>
                    <li class="nav-item my-3">
                        <a class="nav-link text-decoration-none" href="checklist.php" style="color: white;">
                            Checklist Observation
                        </a>
                    </li>
                    <li class="nav-item my-3">
                        <a class="nav-link text-decoration-none" href="registerInspector.php" style="color: white;">
                            Register Inspector
                        </a>
                    </li>
                    <li class="nav-item my-3">
                        <a class="nav-link text-decoration-none" href="adminFeedback.php" style="color: white;">
                            User Feedback Management
                        </a>
                    </li>
                  
                </ul>
            </div>
        </nav>

        <main class="container mt-4">

        

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card text-white"style="background-color:#004953;">
                <div class="card-body">
                    <h5 class="card-title">Total <br> Visitors</h5>
                    <p class="card-text">500</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-white " style="background-color: #004953;">
                <div class="card-body">
                    <h5 class="card-title">Total <br> Complaints</h5>
                    <p class="card-text">200</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-white "style="background-color: #004953;">
                <div class="card-body">
                    <h5 class="card-title">Total Complaints Solved</h5>
                    <p class="card-text">150</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-white"style="background-color: #004953;">
                <div class="card-body">
                    <h5 class="card-title">Number of <br> Inspectors</h5>
                    <p class="card-text">10</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
    <div class="row">
        <div class="col-md-8 mb-4">
            <canvas id="visitorChart" style="width: 100%; height: auto;"></canvas>
        </div>
        <div class="col-md-8 mb-4">
            <canvas id="complaintChart" style="width: 100%; height: auto;"></canvas>
        </div>
    </div>
</div>
<div class="container mt-5">
        <h2>Toilets Information</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Recent Activity</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Toilet 1</td>
                    <td>Functional</td>
                    <td>Cleaned Today</td>
                </tr>
                <tr>
                    <td>Toilet 2</td>
                    <td>Under Maintenance</td>
                    <td>Inspection Pending</td>
                </tr>
                <tr>
                    <td>Toilet 3</td>
                    <td>Under Maintenance</td>
                    <td>Inspection Pending</td>
                </tr>
                <tr>
                    <td>Toilet 4</td>
                    <td>Under Maintenance</td>
                    <td>Inspection Pending</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>




</main>

    </div>
    
</div>





    <script>
        const visitorData = [10, 15, 20, 30, 25, 40,90,89,56,78,90,56];
        const complaintData = [5, 8, 12, 15, 10, 20,12,14,5,34,12,23,14];
        const labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul","Auj","Sept","Oct","Nov","Dec"];

        const visitorCtx = document.getElementById('visitorChart').getContext('2d');
        const complaintCtx = document.getElementById('complaintChart').getContext('2d');

        new Chart(visitorCtx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Visitors',
                    data: visitorData,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    fill: false
                }]
            }
        });

        new Chart(complaintCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Complaints',
                    data: complaintData,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
       
    </script>

   

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
