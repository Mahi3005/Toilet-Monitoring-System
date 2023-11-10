<!DOCTYPE html>
<html>

<head>
    <title>Inspector Complaints Display Page</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004953;">
    <a class="navbar-brand" href="displayComplain.php">
        <img src="logo.png" width="40" height="40" class="d-inline-block align-top" alt="GMC Logo">
        Complaint Display
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
    <h2>User Complaints Display Page</h2>
    <input type="text" id="sectorFilter" class="form-control mt-3" placeholder="Filter by Sector No">
    <table class="table table-bordered table-striped mt-4">
        <thead style="background-color: #004953; color: white;">
            <tr>
                <th>User Email</th>
                <th>Sector No</th>
                <th>Toilet_id</th>
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
            $sql = "SELECT inspectorregistrations.email as inspector_mail, 
            inspector_complaints.user_email, 
            inspector_complaints.sector, 
            inspector_complaints.toilet_id, 
            inspector_complaints.complaint_description 
            FROM inspector_complaints 
            JOIN inspectorregistrations ON inspector_complaints.sector = inspectorregistrations.sector;";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    
                    echo "<tr>";
                    $inspector_mail = $row["inspector_mail"];
                    $email = $row["user_email"];
                    $toilet_id = $row["toilet_id"];
                    $sector = $row["sector"];
                    $message = $row["complaint_description"];
                    echo "<td>" . $email . "</td>";
                    echo "<td>" . $sector . "</td>";
                    echo "<td>" . $toilet_id . "</td>";
                    echo "<td>" . $message . "</td>";
                    echo "<td><button type='button' class='btn btn-primary' onclick='viewComplaint(\"$email\",\"$toilet_id\",\"$sector\", this.parentNode.parentNode,\"$inspector_mail\",\"$message\")'>View</button></td>";
                    echo "</tr>";

                    $inspector_mail = null;
                    $email = null;
                    $toilet_id = null;
                    $sector = null;
                    $message = null;
                }
            } else {
                echo "<tr><td colspan='5'>No complaints found</td></tr>";
            }

            // Close the connection
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- JavaScript for displaying the modal with the complaint message -->
<script>
    // Function for mailing the inspector
    function Inspectormailer(inspector_mail, toilet_id) {
        $.ajax({
            type: 'POST',
            url: 'IC-mail.php',
            data: {
                inspector_mail: inspector_mail,
                toilet_id: toilet_id
            },
            success: function (response) {
                setTimeout(function () {
                    if (response != 'success') {
                        alert('Email Sent Successfully!');
                        document.getElementById('respondUser').disabled = false;
                    } else {
                        alert('Email sending failed.');
                    }
                }, 2000);
            }
        });
    }

    // Function for mailing the user
    function Usermailer(user_email, toilet_id, sector, row, button) {
        shouldDeleteRow=false;
       // var temp = $(button).closest('tr');
        $.ajax({
            type: 'POST',
            url: 'UC-revert-mail.php',
            data: {
                user_email: user_email,
                toilet_id: toilet_id,
                sector: sector
            },
            success: function (response) {
                setTimeout(function () {
                    if (response != 'success') {
                        alert('Email Sent Successfully!');
                      shouldDeleteRow=true;
                        $('#complaintModal').modal('hide');
                    } else {
                        alert('Email sending failed.');
                    }
                }, 2000);
            }
        });
    }

   

    function viewComplaint(user_email, toilet_id, sector, row, inspector_mail, message) {
        $("#complaintModal").remove();
        console.log("User Email: " + user_email);
    console.log("Toilet ID: " + toilet_id);
    console.log("Sector: " + sector);
    console.log("Inspector Mail: " + inspector_mail);
    console.log("Message: " + message);
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
            '<button type="button" id="mailInspector" class="btn btn-primary" onclick="Inspectormailer(\'' + inspector_mail + '\', \'' + toilet_id + '\')">Mail Inspector</button>' +
            '<button type="button" id="respondUser" class="btn btn-primary" onclick="Usermailer(\'' + user_email + '\', \'' + toilet_id + '\', \'' + sector + '\', \'' + row + '\', this)" disabled>Respond User</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        $("body").append(modal);
        $("#complaintModal").modal('show');

        setInterval(function () {
    if (shouldDeleteRow) {
        $(row).remove();
       $('#complaintModal').modal('hide');
        shouldDeleteRow = false; // Reset the flag
    }
}, 1000);
    }

    $(document).ready(function () {
        $("#sectorFilter").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("table tbody tr").filter(function () {
                $(this).toggle($(this).find("td:nth-child(2)").text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>
</body>

</html>