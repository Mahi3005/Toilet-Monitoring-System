<?php
// Replace with your own database credentials
$servername = "localhost";
$username = "root";
$password = "dhruv@3005";
$dbname = "hackathon2023";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $toiletInfo = $db->real_escape_string($_POST['toiletInfo']);
    $locationInfo = $db->real_escape_string($_POST['locationInfo']);
    $dateTime = $db->real_escape_string($_POST['Date&Time']);
    $caretakerPresentee = $db->real_escape_string($_POST['caretakerPresentee']);
    $cleanlinessWalls = $db->real_escape_string($_POST['cleanliness-walls']);
    $cleanlinessFloors = $db->real_escape_string($_POST['cleanliness-floors']);
    $cleanlinessCeilings = $db->real_escape_string($_POST['cleanliness-ceilings']);
    $cleanlinessToiletsUrinals = $db->real_escape_string($_POST['cleanliness-toilets&urinals']);
    $cleanlinessSinksCounters = $db->real_escape_string($_POST['cleanliness-sinks&counters']);
    $maintenanceDoorsLocks = $db->real_escape_string($_POST['maintenance-doors-locks']);
    $maintenanceLighting = $db->real_escape_string($_POST['maintenance-lighting']);
    $maintenanceVentilation = $db->real_escape_string($_POST['maintenance-ventilation']);
    $maintenancePlumbing = $db->real_escape_string($_POST['maintenance-plumbing']);
    $waterAvailability = $db->real_escape_string($_POST['water-availability']);
    $waterPressure = $db->real_escape_string($_POST['water-pressure']);
    $consumablesToiletPaper = $db->real_escape_string($_POST['consumables']);
    $consumablesSoap = $db->real_escape_string($_POST['consumables-soap']);
    $consumablesSanitizer = $db->real_escape_string($_POST['consumables-sanitizer']);
    $additionalNotes = $db->real_escape_string($_POST['comments']);
    $feedback = $db->real_escape_string($_POST['feedback']);

    // Insert data into the database
    $sql = "INSERT INTO survey (toilet_info, location_info, date_time, caretaker_presentee, cleanliness_walls, cleanliness_floors, cleanliness_ceilings, cleanliness_toilets_urinals, cleanliness_sinks_counters, maintenance_doors_locks, maintenance_lighting, maintenance_ventilation, maintenance_plumbing, water_availability, water_pressure, consumables_toilet_paper, consumables_soap, consumables_sanitizer, additional_notes, feedback) 
            VALUES ('$toiletInfo', '$locationInfo', '$dateTime', '$caretakerPresentee', '$cleanlinessWalls', '$cleanlinessFloors', '$cleanlinessCeilings', '$cleanlinessToiletsUrinals', '$cleanlinessSinksCounters', '$maintenanceDoorsLocks', '$maintenanceLighting', '$maintenanceVentilation', '$maintenancePlumbing', '$waterAvailability', '$waterPressure', '$consumablesToiletPaper', '$consumablesSoap', '$consumablesSanitizer', '$additionalNotes', '$feedback')";



    if ($db->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

// Close the connection
$db->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Toilet Inspection Checklist and Report</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
@import url(https://fonts.googleapis.com/css?family=Lato:300,400,900);

#ourLabel{
    font-size:1.29em;
}

.button-wrap,.button-wrap1, .button-wrap2, .button-wrap3, .button-wrap4 {
  text-align: center;
  margin-top: -3.5em;
  margin-right:-28em;
}
@media (max-width: 40em) {
  .button-wrap,.button-wrap1, .button-wrap2, .button-wrap3, .button-wrap4 {
    margin-top: -1.5em;
  }
}

.button-label, .button-label1, .button-label2, .button-label3, .button-label4 {
  display: inline-block;
  padding: 1em 2em;
  margin: 0.5em;
  cursor: pointer;
  color: #292929;
  border-radius: 0.25em;
  background: #efefef;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0 -3px 0 rgba(0, 0, 0, 0.22);
  transition: 0.3s;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.button-label h1, .button-label1 h1, .button-label2 h1, .button-label3 h1, .button-label4 h1 {
  font-size: 1em;
  font-family: "Lato", sans-serif;
}
.button-label:hover,.button-label1:hover,.button-label2:hover,.button-label3:hover,.button-label4:hover {
  background: #d6d6d6;
  color: #101010;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0 -3px 0 rgba(0, 0, 0, 0.32);
}
.button-label:active, .button-label1:active, .button-label2:active, .button-label3:active, .button-label4:active{
  transform: translateY(2px);
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0px -1px 0 rgba(0, 0, 0, 0.22);
}
@media (max-width: 40em) {
  .button-label,.button-label1,.button-label2,.button-label3,.button-label4{
    padding: 0em 1em 3px;
    margin: 0.25em;
  }
}

#Pwall:checked + .button-label,
#Pfloors:checked + .button-label,
#Pceiling:checked + .button-label,
#Ptoilets-urinals:checked + .button-label,
#Psinks-counters:checked + .button-label,
#Pdoors-locks:checked + .button-label,
#Plighting:checked + .button-label,
#WaterPressure-Satisfactory:checked + .button-label,
#RunningWater-Yes:checked + .button-label,
#Pconsumables:checked + .button-label,
#Ventilation-Pass:checked + .button-label,
#Plumbing-Pass:checked + .button-label,
#ToiletPaper-Available:checked + .button-label,
#Soap-Available:checked +.button-label,
#Sanitizer-Available:checked + .button-label {
  background: #2ECC71;
  color: #efefef;
}

#Pwall:checked + .button-label:hover,
#Pfloors:checked + .button-label:hover,
#Pceiling:checked + .button-label:hover,
#Ptoilets-urinals:checked + .button-label:hover,
#Psinks-counters:checked + .button-label:hover,
#Pdoors-locks:checked + .button-label:hover,
#Plighting:checked + .button-label:hover,
#RunningWater-Yes:checked + .button-label:hover,
#WaterPressure-Satisfactory:checked + .button-label:hover,
#Pconsumables:checked + .button-label:hover,
#Ventilation-Pass:checked + .button-label:hover,
#Plumbing-Pass:checked + .button-label:hover,
#ToiletPaper-Available:checked + .button-label:hover,
#Soap-Available:checked + .button-label:hover,
#Sanitizer-Available:checked + .button-label:hover {
  background: #29b765;
  color: #e2e2e2;
}

#Awall:checked + .button-label,
#Afloors:checked + .button-label,
#Aceiling:checked + .button-label,
#Atoilets-urinals:checked + .button-label,
#Asinks-counters:checked + .button-label,
#Adoors-locks:checked + .button-label,
#Alighting:checked + .button-label,
#RunningWater-No:checked + .button-label,
#WaterPressure-None:checked + .button-label,
#Aconsumables:checked + .button-label,
#Ventilation-Fail:checked + .button-label,
#Plumbing-Fail:checked + .button-label,
#ToiletPaper-NotAvailable:checked + .button-label,
#Soap-NotAvailable:checked + .button-label,
#Sanitizer-NotAvailable:checked + .button-label  {
  background: #D91E18;
  color: #efefef;
}

#Awall:checked + .button-label:hover,
#Afloors:checked + .button-label:hover,
#Aceiling:checked + .button-label:hover,
#Atoilets-urinals:checked + .button-label:hover,
#Asinks-counters:checked + .button-label:hover,
#Adoors-locks:checked + .button-label:hover,
#Alighting:checked + .button-label:hover,
#RunningWater-No:checked + .button-label:hover,
#WaterPressure-None:checked + .button-label:hover,
#Aconsumables:checked + .button-label:hover,
#Ventilation-Fail:checked + .button-label:hover,
#Plumbing-Fail:checked + .button-label:hover,
#ToiletPaper-NotAvailable:checked + .button-label:hover,
#Soap-NotAvailable:checked + .button-label:hover,
#Sanitizer-NotAvailable:checked + .button-label:hover
{
  background: #c21b15;
  color: #e2e2e2;
}


#WaterPressure-Low:checked + .button-label,#ToiletPaper-LowStock:checked +.button-label, #Soap-LowStock:checked +.button-label, #Sanitizer-LowStock:checked +.button-label {
  background: #4183D7;
  color: #efefef;
}
#WaterPressure-Low:checked + .button-label:hover,#ToiletPaper-LowStock:checked +.button-label:hover, #Soap-LowStock:checked +.button-label:hover, #Sanitizer-LowStock:checked +.button-label:hover {
  background: #2c75d2;
  color: #e2e2e2;
}

.hidden {
  display: none;
}


/* nffn */
        body {
            background-color: #f2f2f2;
        }

        .container {
        width: 90%; /* Reduce container width for smaller screens */
        margin-top: 50px;
        padding: 20px; /* Reduce padding for better spacing */
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

     
        input[type="number"] {
    width: 50px; /* Adjust the width as needed */
    padding: 5px;
    border: 2px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    text-align: center;
  }

  .note{
    color: crimson; font-family: Arial, Helvetica, sans-serif; margin-top: 6px;
                margin-bottom: 0rem;
  }
 
.icon-container {
    position: absolute;
    right:21vw; 
    top: 18vh;
    padding: 10px; }
    
.survey-icon {
    width: 8vw; /* Adjust the width and height as needed */
    height: 13vh;
}
/* Existing styles above this point */



/* Modify the number input for responsiveness */
input[type="number"] {
    width: 70px; /* Adjust the width as needed */
    padding: 5px;
    border: 2px solid #ccc;
    border-radius: 5px;
    font-size: 25px; /* Adjust the font size as needed */
    text-align: center;
}

/* Add a media query for responsiveness */

#care{
    display: flex; 
    align-items: center;
}

/* Common styles for form elements */
.form-group label {
    font-weight: bold;
    margin-top: 10px;
}

.form-group input,
.form-group select,
.form-group textarea,
.form-group input[type="file"] {
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

/* Media queries for responsiveness */
@media (max-width: 768px) {
    .container {
        width: 100%; /* Use full width on smaller screens */
    }

    .icon-container {
        right: 0; /* Adjust the position of the icon container */
    }

    .survey-icon {
        width: 30%; /* Adjust the size of the survey icon */
    }

    /* Adjust the font size of number input fields for smaller screens */
    input[type="number"] {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .button-wrap, .button-wrap1, .button-wrap2, .button-wrap3, .button-wrap4 {
        margin-top: -1.5em; /* Adjust the margin for button groups */
    }

    .button-label, .button-label1, .button-label2, .button-label3, .button-label4 {
        padding: 0em 1em 3px; /* Adjust padding for smaller screens */
    }

    .icon-container {
        right: 0; /* Adjust the position of the icon container */
    }

    .survey-icon {
        width: 40%; /* Adjust the size of the survey icon */
    }
}

/* Common styles for radio buttons */
.button-wrap, .button-wrap1, .button-wrap2, .button-wrap3, .button-wrap4 {
    text-align: center;
    margin-top: -3.5em;
    margin-right: -28em;
}

.button-label, .button-label1, .button-label2, .button-label3, .button-label4 {
    display: inline-block;
    padding: 1em;
    margin: 0.5em;
    cursor: pointer;
    color: #292929;
    border-radius: 0.25em;
    background: #efefef;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0 -3px 0 rgba(0, 0, 0, 0.22);
    transition: 0.3s;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Media queries for responsive radio buttons */
@media (max-width: 768px) {
    .button-wrap, .button-wrap1, .button-wrap2, .button-wrap3, .button-wrap4 {
        margin-top: -1.5em; /* Adjust the margin for smaller screens */
        text-align: center; /* Center the radio buttons on smaller screens */
    }

    .button-label, .button-label1, .button-label2, .button-label3, .button-label4 {
        padding: 0.5em; /* Adjust padding for smaller screens */
        margin: 0.25em; /* Adjust margin for smaller screens */
    }

    /* Adjust the font size of radio button labels for smaller screens */
    .button-label h1 {
        font-size: 0.8em;
    }
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
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
        </ul>
    </div>
</nav>
    <div class="container">
        <form method="POST" >
            <div class="icon-container">
                <img src="survey.gif" alt="Survey Icon" class="survey-icon">
            </div>
            <h2>Public Toilet Inspection Checklist and Report</h2>
            <div class="form-group">
                <label for="toiletInfo" id="ourLabel">Toilet Identity : </label>
                <input type="text" id="toiletInfo" name="toiletInfo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="locationInfo" id="ourLabel">Location Of Toilet : </label>
                <input type="text" id="locationInfo" name="locationInfo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Date&Time" id="ourLabel">Date And Time Of Inspection : </label>
                <input type="datetime-local" id="Date&Time" name="Date&Time" class="form-control">
            </div>

            <div id="care" class="form-group">
                <label for="caretakerPresentee" id="ourLabel" >Caretaker Presence:</label>  &#160; &#160; 
                <p class="note">Enter the number of days the caretaker has been present during the inspection period. (limit : 0 to 31)  </p>  &#160;  &#160;
                <input type="number" id="caretakerPresentee" name="caretakerPresentee" class="form-control" required min="0" max="31">
            </div>
            
<br>
                <!-- CHECKLIST STARTS :  -->

            <div class="form-group">
                <label for="walls"  id="ourLabel">Cleanliness Of The Walls : </label>
            <div class="button-wrap">
                <input class="hidden radio-label" id="Pwall" type="radio" name="cleanliness-walls" />
                <label class="button-label" for="Pwall">
                  <h1>Present</h1>
                </label>
                <input class="hidden radio-label" id="Awall" type="radio" name="cleanliness-walls"/>
                <label class="button-label" for="Awall">
                  <h1>Absent</h1>
                </label>
              </div>
            </div>

<!-- Cleanliness of the Floors -->
<div class="form-group">
    <label for="floors" id="ourLabel">Cleanliness Of The Floors : </label>
    <div class="button-wrap">
        <input class="hidden radio-label" id="Pfloors" type="radio" name="cleanliness-floors" />
        <label class="button-label" for="Pfloors">
            <h1>Present</h1>
        </label>
        <input class="hidden radio-label" id="Afloors" type="radio" name="cleanliness-floors" />
        <label class="button-label" for="Afloors">
            <h1>Absent</h1>
        </label>
    </div>
</div>

<div class="form-group">
    <label for="walls" id="ourLabel">Cleanliness Of The Ceilings : </label>
    <div class="button-wrap">
        <input class="hidden radio-label" id="Pceiling" type="radio" name="cleanliness-ceilings" />
        <label class="button-label" for="Pceiling">
            <h1>Present</h1>
        </label>
        <input class="hidden radio-label" id="Aceiling" type="radio" name="cleanliness-ceilings"/>
        <label class="button-label" for="Aceiling">
            <h1>Absent</h1>
        </label>
    </div>
</div>

<div class="form-group">
    <label for="walls" id="ourLabel">Cleanliness Of The Toilets And Urinals : </label>
    <div class="button-wrap">
        <input class="hidden radio-label" id="Ptoilets-urinals" type="radio" name="cleanliness-toilets&urinals" />
        <label class="button-label" for="Ptoilets-urinals">
            <h1>Present</h1>
        </label>
        <input class="hidden radio-label" id="Atoilets-urinals" type="radio" name="cleanliness-toilets&urinals"/>
        <label class="button-label" for="Atoilets-urinals">
            <h1>Absent</h1>
        </label>
    </div>
</div>

<div class="form-group">
    <label for "walls" id="ourLabel">Cleanliness Of The Sinks And Counters : </label>
    <div class="button-wrap">
        <input class="hidden radio-label" id="Psinks-counters" type="radio" name="cleanliness-sinks&counters" />
        <label class="button-label" for="Psinks-counters">
            <h1>Present</h1>
        </label>
        <input class="hidden radio-label" id="Asinks-counters" type="radio" name="cleanliness-sinks&counters"/>
        <label class="button-label" for="Asinks-counters">
            <h1>Absent</h1>
        </label>
    </div>
</div>

<div class="form-group">
    <label for="doors-locks" id="ourLabel">Maintenance Of Doors And Locks : </label>
    <div class="button-wrap">
        <input class="hidden radio-label" id="Pdoors-locks" type="radio" name="maintenance-doors-locks" />
        <label class="button-label" for="Pdoors-locks">
            <h1>Present</h1>
        </label>
        <input class="hidden radio-label" id="Adoors-locks" type="radio" name="maintenance-doors-locks"/>
        <label class="button-label" for="Adoors-locks">
            <h1>Absent</h1>
        </label>
    </div>
</div>

<div class="form-group">
    <label for="lighting" id="ourLabel">Maintenance Of Lighting : </label>
    <div class="button-wrap">
        <input class="hidden radio-label" id="Plighting" type="radio" name="maintenance-lighting" />
        <label class="button-label" for="Plighting">
            <h1>Present</h1>
        </label>
        <input class="hidden radio-label" id="Alighting" type="radio" name="maintenance-lighting"/>
        <label class="button-label" for="Alighting">
            <h1>Absent</h1>
        </label>
    </div>
</div>

<div class="form-group">
    <label for="ventilation" id="ourLabel">Maintenance Of Ventilation : </label>
    <div class="button-wrap"> <!-- Use a new class name here -->
        <input class="hidden radio-label" id="Ventilation-Pass" type="radio" name="maintenance-ventilation" />
        <label class="button-label" for="Ventilation-Pass"> <!-- Use a new class name here -->
            <h1>Pass</h1>
        </label>
        <input class="hidden radio-label" id="Ventilation-Fail" type="radio" name="maintenance-ventilation"/>
        <label class="button-label" for="Ventilation-Fail"> <!-- Use a new class name here -->
            <h1>Fail</h1>
        </label>
    </div>
</div>

<div class="form-group">
    <label for="plumbing" id="ourLabel">Maintenance Of Plumbing : </label>
    <div class="button-wrap"> <!-- Use a new class name here -->
        <input class="hidden radio-label" id="Plumbing-Pass" type="radio" name="maintenance-plumbing" />
        <label class="button-label" for="Plumbing-Pass"> <!-- Use a new class name here -->
            <h1>Pass</h1>
        </label>
        <input class="hidden radio-label" id="Plumbing-Fail" type="radio" name="maintenance-plumbing"/>
        <label class="button-label" for="Plumbing-Fail"> <!-- Use a new class name here -->
            <h1>Fail</h1>
        </label>
    </div>
</div>

<div class="form-group">
    <label for="running-water" id="ourLabel">Availability Of Running Water : </label>
    <div class="button-wrap"> <!-- Use a new class name here -->
        <input class="hidden radio-label" id="RunningWater-Yes" type="radio" name="water-availability" />
        <label class="button-label" for="RunningWater-Yes"> <!-- Use a new class name here -->
            <h1>Yes</h1>
        </label>
        <input class="hidden radio-label" id="RunningWater-No" type="radio" name="water-availability"/>
        <label class="button-label" for="RunningWater-No"> <!-- Use a new class name here -->
            <h1>No</h1>
        </label>
    </div>
</div>

<div class="form-group">
    <label for="water-pressure" id="ourLabel">Appropriate Water Pressure : </label>
    <div class="button-wrap"> <!-- Use a new class name here -->
        <input class="hidden radio-label" id="WaterPressure-Satisfactory" type="radio" name="water-pressure" />
        <label class="button-label" for="WaterPressure-Satisfactory"> <!-- Use a new class name here -->
            <h1>Satisfactory</h1>
        </label>
        <input class="hidden radio-label" id="WaterPressure-Low" type="radio" name="water-pressure"/>
        <label class="button-label" for="WaterPressure-Low"> <!-- Use a new class name here -->
            <h1>Low</h1>
        </label>
        <input class="hidden radio-label" id="WaterPressure-None" type="radio" name="water-pressure"/>
        <label class="button-label" for="WaterPressure-None"> 
            <h1>None</h1>
        </label>
    </div>
</div>

<div class="form-group">
    <label for="toilet-paper" id="ourLabel">Availability Stock Of Toilet Paper : </label>
    <div class="button-wrap"> <!-- Use a new class name here -->
        <input class="hidden radio-label" id="ToiletPaper-Available" type="radio" name="consumables" />
        <label class="button-label" for="ToiletPaper-Available"> <!-- Use a new class name here -->
            <h1>Available</h1>
        </label>
        <input class="hidden radio-label" id="ToiletPaper-NotAvailable" type="radio" name="consumables"/>
        <label class="button-label" for="ToiletPaper-NotAvailable"> <!-- Use a new class name here -->
            <h1>Not Available</h1>
        </label>
        <input class="hidden radio-label" id="ToiletPaper-LowStock" type="radio" name="consumables"/>
        <label class="button-label" for="ToiletPaper-LowStock"> <!-- Use a new class name here -->
            <h1>Low Stock</h1>
        </label>
    </div>
</div>

<div class="form-group">
    <label for="soap" id="ourLabel">Availability Stock Of Soap : </label>
    <div class="button-wrap"> <!-- Use a new class name here -->
        <input class="hidden radio-label" id="Soap-Available" type="radio" name="consumables-soap" />
        <label class="button-label" for="Soap-Available"> <!-- Use a new class name here -->
            <h1>Available</h1>
        </label>
        <input class="hidden radio-label" id="Soap-NotAvailable" type="radio" name="consumables-soap"/>
        <label class="button-label" for="Soap-NotAvailable"> <!-- Use a new class name here -->
            <h1>Not Available</h1>
        </label>
        <input class="hidden radio-label" id="Soap-LowStock" type="radio" name="consumables-soap"/>
        <label class="button-label" for="Soap-LowStock"> <!-- Use a new class name here -->
            <h1>Low Stock</h1>
        </label>
    </div>
</div>

<div class="form-group">
    <label for="hand-sanitizer" id="ourLabel">Availability Stock Of Hand Sanitizer : </label>
    <div class="button-wrap"> <!-- Use a new class name here -->
        <input class="hidden radio-label" id="Sanitizer-Available" type="radio" name="consumables-sanitizer" />
        <label class="button-label" for="Sanitizer-Available"> <!-- Use a new class name here -->
            <h1>Available</h1>
        </label>
        <input class="hidden radio-label" id="Sanitizer-NotAvailable" type="radio" name="consumables-sanitizer"/>
        <label class="button-label" for="Sanitizer-NotAvailable"> <!-- Use a new class name here -->
            <h1>Not Available</h1>
        </label>
        <input class="hidden radio-label" id="Sanitizer-LowStock" type="radio" name="consumables-sanitizer"/>
        <label class="button-label" for="Sanitizer-LowStock"> <!-- Use a new class name here -->
            <h1>Low Stock</h1>
        </label>
    </div>
</div>
<br>
    <div class="form-group">
    <label for="comments" id="ourLabel">Additional Notes : </label>
    <textarea id="comments" name="comments" class="form-control" rows="5" cols="20"></textarea>
    </div>

    <div class="form-group">
        <label for="attachments" id="ourLabel">Image Files Attachments:</label>
        <input type="file" id="attachments" name="attachments" accept="image/*" accept="video/*" class="form-control-file" multiple>
        <p class="note">Upload images as attachments if necessary.</p>
    </div>

    <div class="form-group">
        <label for="videoAttachments" id="ourLabel">Video Files Attachments:</label>
        <input type="file" id="videoAttachments" name="videoAttachments" accept="video/*" class="form-control-file" multiple>
        <p class="note">Upload video files as attachments if necessary.</p>
    </div>
    
    <div class="form-group">
        <label for="pdfAttachments" id="ourLabel">PDF Files Attachments:</label>
        <input type="file" id="pdfAttachments" name="pdfAttachments" accept=".pdf" class="form-control-file" multiple >
        <p class="note">Upload PDF files as attachments if necessary.</p>
    </div>

    <div class="form-group">
        <label for="feedback" id="ourLabel">Feedback (if applicable) : </label>
        <textarea id="feedback" name="feedback" class="form-control" rows="5" cols="20"></textarea>
        </div>
<!-- Final Submit ------------- -->
            <div class="form-group">
                <input type="submit" value="Submit Report" class="btn btn-custom-color btn-block text-white">
            </div>

        </form>
    </div>
  
</body>
</html>