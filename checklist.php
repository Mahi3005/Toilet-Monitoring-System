<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Checklist Page</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004953;">
    <a class="navbar-brand" href="admin-dashboard.php">
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
    <div class="container mt-5">
        <h2 class="mb-4">Fetched Data in Table Format:</h2>
        <?php
            // Database connection
            $conn = new mysqli("localhost", "root", "dhruv@3005", "hackathon2023");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch data from the database
            $sql = "SELECT * FROM survey_report";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data in the table
                echo "<table class='table'>
                        <thead>
                            <tr>
                                <th>Toilet ID</th>
                                <th>Date and Time</th>
                                <th>Caretaker Present</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["toilet_id"]."</td>
                            <td>".$row["date_time"]."</td>
                            <td>".$row["caretaker_presentee"]."</td>
                            <td><button class='btn btn-primary' onclick='toggleForm(".json_encode($row).")'>View</button></td>
                        </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "0 results";
            }

            // Close the database connection
            $conn->close();
        ?>

<div id="formContainer" style="display: none;" class="mt-4">
    <form>
        <div class="form-group">
            <label>Toilet ID:</label>
            <input type='text' id="toiletId" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Date and Time:</label>
            <input type='text' id="dateTime" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Caretaker Present:</label>
            <input type='text' id="caretakerPresentee" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Cleanliness - Walls:</label>
            <input type='text' id="cleanlinessWalls" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Cleanliness - Floors:</label>
            <input type='text' id="cleanlinessFloors" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Cleanliness - Ceilings:</label>
            <input type='text' id="cleanlinessCeilings" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Cleanliness - Toilets & Urinals:</label>
            <input type='text' id="cleanlinessToiletsUrinals" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Cleanliness - Sinks & Counters:</label>
            <input type='text' id="cleanlinessSinksCounters" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Maintenance - Doors & Locks:</label>
            <input type='text' id="maintenanceDoorsLocks" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Maintenance - Lighting:</label>
            <input type='text' id="maintenanceLighting" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Maintenance - Ventilation:</label>
            <input type='text' id="maintenanceVentilation" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Maintenance - Plumbing:</label>
            <input type='text' id="maintenancePlumbing" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Water Availability:</label>
            <input type='text' id="waterAvailability" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Water Pressure:</label>
            <input type='text' id="waterPressure" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Consumables:</label>
            <input type='text' id="consumables" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Consumables - Soap:</label>
            <input type='text' id="consumablesSoap" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Consumables - Sanitizer:</label>
            <input type='text' id="consumablesSanitizer" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Comments:</label>
            <textarea id="comments" class="form-control" readonly></textarea>
        </div>

        <div class="form-group">
            <label>Feedback:</label>
            <textarea id="feedback" class="form-control" readonly></textarea>
        </div>
      

    </form>
</div>


    <script>
        let currentRowData = null;
        let formContainer = document.getElementById('formContainer');

        function toggleForm(data) {
            if (currentRowData && currentRowData.toilet_id === data.toilet_id) {
                formContainer.style.display = formContainer.style.display === 'none' ? 'block' : 'none';
            } else {
                formContainer.style.display = 'block';
                currentRowData = data;
                fillForm(currentRowData);
            }
        }

        function fillForm(data) {
            document.getElementById('toiletId').value = data.toilet_id;
            document.getElementById('dateTime').value = data.date_time;
            document.getElementById('caretakerPresentee').value = data.caretaker_presentee;
            document.getElementById('cleanlinessWalls').value = data.cleanliness_walls;
            document.getElementById('cleanlinessFloors').value = data.cleanliness_floors;
            document.getElementById('cleanlinessCeilings').value = data.cleanliness_ceilings;
            document.getElementById('cleanlinessToiletsUrinals').value = data.cleanliness_toilets_urinals;
            document.getElementById('cleanlinessSinksCounters').value = data.cleanliness_sinks_counters;
            document.getElementById('maintenanceDoorsLocks').value = data.maintenance_doors_locks;
            document.getElementById('maintenanceLighting').value = data.maintenance_lighting;
            document.getElementById('maintenanceVentilation').value = data.maintenance_ventilation;
            document.getElementById('maintenancePlumbing').value = data.maintenance_plumbing;
            document.getElementById('waterAvailability').value = data.water_availability;
            document.getElementById('waterPressure').value = data.water_pressure;
            document.getElementById('consumables').value = data.consumables;
            document.getElementById('consumablesSoap').value = data.consumables_soap;
            document.getElementById('consumablesSanitizer').value = data.consumables_sanitizer;
            document.getElementById('comments').value = data.comments;
            document.getElementById('feedback').value = data.feedback;
        }
    </script>

    <!-- Add Bootstrap JS and jQuery links here (at the end of the body) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
