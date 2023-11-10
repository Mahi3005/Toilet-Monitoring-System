<!DOCTYPE html>
<html>

<head>
    <title>Caretaker Less Attendance Management</title>
    <!-- Add Bootstrap CSS -->
    <style>

.btn i.fa-spinner {
        margin-right: 5px;
    }

    .btn.loading i.fa-spinner {
        display: inline;
    }

      .loader {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        animation: spin 2s linear infinite;
        display: inline-block;
        margin-right: 10px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004953;">
        <a class a="navbar-brand" href="displayComplain.php">
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
        <h2>CareTaker Less Attendance Management</h2>
        <input type="text" id="attendanceFilter" placeholder="Search by Attendance" class="form-control mb-3">
        <table class="table table-bordered table-striped mt-4">
        <thead style="background-color: #004953; color: white;">
                <tr>
                    <th>Caretaker ID</th>
                    <th>Toilet ID</th>
                    <th>Attendance</th>
                    <th>SendMail</th>
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
                $sql = "SELECT CT_email, toilet_id, attendance FROM caretaker_attendance where attendance<23";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $email = $row["CT_email"];
                        $attend = $row["attendance"];
                        echo "<tr>";
                        echo "<td>" . $row["CT_email"] . "</td>";
                        echo "<td>" . $row["toilet_id"] . "</td>";
                        echo "<td>" . $row["attendance"] . "</td>";
                        echo "<td><button type='button' class='btn btn-primary' onclick='mailer(this,\"$email\", this.parentNode.parentNode,\"$attend\")'>  <div class='button-content'>
                        <span class='text'>Send Mail</span>
                        <div class='loader d-none'></div>
                    </div></button></td>";

                    }
                } else {
                    echo "<tr><td colspan='4'>No Records Found</td></tr>";
                }

                // Close the connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
</body>
<script>
    $('#attendanceFilter').on('input', function () {
        var filterValue = $(this).val().toLowerCase();

        // Filter the table rows
        $('table tbody tr').filter(function () {
            $(this).toggle($(this).find('td:eq(2)').text().toLowerCase().indexOf(filterValue) > -1);
        });
    });
    
    function mailer(button, email, row, attended) {
        // Get the button's content div
        var buttonContent = $(button).find(".button-content");

        // Get the loader element within the button
        var loader = buttonContent.find(".loader");

        // Get the text span
        var textSpan = buttonContent.find(".text");

        // Show the loader
        loader.removeClass('d-none');

        // Change the text to "Sending"
        textSpan.text('Sending');

        // Use AJAX to call the sendMail.php script
        $.ajax({
            type: 'POST',
            url: 'mailAttendance.php', // Adjust the path to your sendMail.php script
            data: { email: email, attended: attended }, // Pass the email as a parameter
            success: function(response) {
                // After a delay, remove the loader and revert the button text
                setTimeout(function () {
                    // Hide the loader
                    loader.addClass('d-none');

                    if (response != "success") {
                        alert("Email Sent Successfully!");
                        // Remove the row from the table
                        $(button).closest('tr').remove();
                        row.remove();
                    } else {
                        alert("Email sending failed.");
                    }

                
                }, 2000); // Adjust the delay time (2 seconds) as needed
            }
        });
    }
</script>

</html>