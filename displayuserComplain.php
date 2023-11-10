<!DOCTYPE html>
<html>

<head>
    <title>User Complaints Display Page</title>
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
       
    </nav>
    <div class="container mt-5">
        <h2>User Complaints Display Page</h2>
        <table class="table table-bordered table-striped mt-4">
        <thead style="background-color: #004953; color: white;">
                <tr>
                    <th>User Email</th>
                    <th>Sector No</th>
                    <th>Message</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Replace with your own database credentials
                $servername = "localhost";
                $username = "root";
                $password = "dhruv@3005";
                $dbname = "hackathon2023";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch and display user complaints
                $sql = "SELECT  email, sector, complaint_description FROM complaints";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["sector"] . "</td>";
                        echo "<td>" . $row["complaint_description"] . "</td>";
                        echo "<td><button type='button' class='btn btn-primary' onclick='viewComplaint(\"" . $row["complaint_description"] . "\")'>View</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No complaints found</td></tr>";
                }

                // Close the connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript for displaying the modal with the complaint message -->
    <script>
        function viewComplaint(message) {
            // Create the modal
            var modal = '<div class="modal fade" id="complaintModal" tabindex="-1" role="dialog" aria-labelledby="complaintModalLabel" aria-hidden="true">' +
                '<div class="modal-dialog" role="document">' +
                '<div class="modal-content">' +
                '<div class="modal-header">' +
                '<h5 class="modal-title" id="complaintModalLabel">Complaint Message</h5>' +
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '</div>' +
                '<div class="modal-body">' +
                '<p>' + message + '</p>' +
                '</div>' +
                '<div class="modal-footer">' +
                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
                
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';

            // Append the modal to the body
            $('body').append(modal);

            // Show the modal
            $('#complaintModal').modal('show');

            // Remove the modal from the DOM after it's hidden
            $('#complaintModal').on('hidden.bs.modal', function (e) {
                $(this).remove();
            });
        }
    </script>
</body>

</html>
