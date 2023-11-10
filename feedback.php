<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $feedback = $_POST['feedback'];
    $email = "";
    $toilet_id = $_POST['toilet_id']; // Assuming the toilet name is retrieved from the form
    $rating = $_POST['rating']; // Assuming the rating is retrieved from the form

    // Connect to the database
    $conn = new mysqli("localhost", "root", "dhruv@3005", "hackathon2023");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch email from the users table
    $stmt_email = $conn->prepare("SELECT email FROM users");
    $stmt_email->execute();
    $result = $stmt_email->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $email = $row['email'];
        }
    }

    // Free the result set
    $stmt_email->free_result();

    // Prepare and bind the insert statement
    $stmt = $conn->prepare("INSERT INTO feedback (email, toilet_id, rating, feedback) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $email, $toilet_id, $rating, $feedback);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<script>alert("Feedback submitted successfully.");</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <style>
        .navbar {
            background-color: #004953;
        }

        .navbar a {
            color: #ffffff;
        }

        .navbar a:hover {
            color: #e6e6e6;
        }
        body {
            background-color: #f2f2f2;
        }

        .bg-custom-color {
            background-color: #004952;
        }

        .btn-custom-color {
            background-color: #004952;
            color: #ffffff;
        }

        .btn-custom-color:hover {
            background-color: #006f68;
            color: white;
        }

      
        /* Import Google font - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  background: #E3F2FD;
}
.chatbot-toggler {
  position: fixed;
  bottom: 30px;
  right: 35px;
  outline: none;
  border: none;
  height: 50px;
  width: 50px;
  display: flex;
  cursor: pointer;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background: #724ae8;
  transition: all 0.2s ease;
}
body.show-chatbot .chatbot-toggler {
  transform: rotate(90deg);
}
.chatbot-toggler span {
  color: #fff;
  position: absolute;
}
.chatbot-toggler span:last-child,
body.show-chatbot .chatbot-toggler span:first-child  {
  opacity: 0;
}
body.show-chatbot .chatbot-toggler span:last-child {
  opacity: 1;
}
.chatbot {
  position: fixed;
  right: 35px;
  bottom: 90px;
  width: 420px;
  background: #fff;
  border-radius: 15px;
  overflow: hidden;
  opacity: 0;
  pointer-events: none;
  transform: scale(0.5);
  transform-origin: bottom right;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
  transition: all 0.1s ease;
}
body.show-chatbot .chatbot {
  opacity: 1;
  pointer-events: auto;
  transform: scale(1);
}
.chatbot header {
  padding: 16px 0;
  position: relative;
  text-align: center;
  color: #fff;
  background: #724ae8;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}
.chatbot header span {
  position: absolute;
  right: 15px;
  top: 50%;
  display: none;
  cursor: pointer;
  transform: translateY(-50%);
}
header h2 {
  font-size: 1.4rem;
}
.chatbot .chatbox {
  overflow-y: auto;
  height: 510px;
  padding: 30px 20px 100px;
}
.chatbot :where(.chatbox, textarea)::-webkit-scrollbar {
  width: 6px;
}
.chatbot :where(.chatbox, textarea)::-webkit-scrollbar-track {
  background: #fff;
  border-radius: 25px;
}
.chatbot :where(.chatbox, textarea)::-webkit-scrollbar-thumb {
  background: #ccc;
  border-radius: 25px;
}
.chatbox .chat {
  display: flex;
  list-style: none;
}
.chatbox .outgoing {
  margin: 20px 0;
  justify-content: flex-end;
}
.chatbox .incoming span {
  width: 32px;
  height: 32px;
  color: #fff;
  cursor: default;
  text-align: center;
  line-height: 32px;
  align-self: flex-end;
  background: #724ae8;
  border-radius: 4px;
  margin: 0 10px 7px 0;
}
.chatbox .chat p {
  white-space: pre-wrap;
  padding: 12px 16px;
  border-radius: 10px 10px 0 10px;
  max-width: 75%;
  color: #fff;
  font-size: 0.95rem;
  background: #724ae8;
}
.chatbox .incoming p {
  border-radius: 10px 10px 10px 0;
}
.chatbox .chat p.error {
  color: #721c24;
  background: #f8d7da;
}
.chatbox .incoming p {
  color: #000;
  background: #f2f2f2;
}
.chatbot .chat-input {
  display: flex;
  gap: 5px;
  position: absolute;
  bottom: 0;
  width: 100%;
  background: #fff;
  padding: 3px 20px;
  border-top: 1px solid #ddd;
}
.chat-input textarea {
  height: 55px;
  width: 100%;
  border: none;
  outline: none;
  resize: none;
  max-height: 180px;
  padding: 15px 15px 15px 0;
  font-size: 0.95rem;
}
.chat-input span {
  align-self: flex-end;
  color: #724ae8;
  cursor: pointer;
  height: 55px;
  display: flex;
  align-items: center;
  visibility: hidden;
  font-size: 1.35rem;
}
.chat-input textarea:valid ~ span {
  visibility: visible;
}

@media (max-width: 490px) {
  .chatbot-toggler {
    right: 20px;
    bottom: 20px;
  }
  .chatbot {
    right: 0;
    bottom: 0;
    height: 100%;
    border-radius: 0;
    width: 100%;
  }
  .chatbot .chatbox {
    height: 90%;
    padding: 25px 15px 100px;
  }
  .chatbot .chat-input {
    padding: 5px 15px;
  }
  .chatbot header span {
    display: block;
  }
}
.rating {
  unicode-bidi: bidi-override;
  direction: rtl;
}

.rating > input {
  display: none;
}

.rating > label {
  display: inline-block;
  position: relative;
  width: 1.1em;
  font-size: 2em;
  color: #d3d3d3;
}

.rating > label:before {
  content: '\2605';
  position: absolute;
}

.rating > input:checked ~ label,
.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
  color: #ffc107;
}

.btn-custom-color {
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-custom-color:hover {
            background-color: #006f68;
            color: white;
        }

        /* Add hover effects for chatbot toggler */
        .chatbot-toggler {
            transition: all 0.2s ease;
        }
        .chatbot-toggler:hover {
            transform: scale(1.1);
        }

        /* Add hover effects for chatbot close button */
        .close-btn:hover {
            cursor: pointer;
            color: #ff0000;
        }

        /* Add transitions for the chatbox */
        .chatbox {
            transition: height 0.5s;
            overflow-y: scroll;
            overflow-x: hidden;
            scrollbar-width: thin;
        }

        /* Add transitions for the chat-input */
        .chat-input {
            transition: all 0.3s;
        }
        .chat-input textarea {
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .chat-input textarea:focus {
            border-color: #724ae8;
            box-shadow: 0 0 0 0.2rem rgba(114, 74, 232, 0.25);
        }
        .chat-input span {
            transition: all 0.3s;
        }
        .chat-input span:hover {
            transform: scale(1.1);
        }
        #toiletInfo {
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        width: 50%;
        font-size: 16px;
        color: #495057;
        background-color: #f8f9fa;
    }

    /* Style the options within the select element */
    #toiletInfo option {
        color: #495057;
        background-color: #fff;
    }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="card bg-custom-color text-white">
        <div class="card-header bg-custom-color text-white">
            <h2 class="mb-0">Feedback and Suggestions</h2>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group col-md-6">
                    <label for="toiletInfo" class="form-label">Toilet ID:</label>
                    <select class="form-select" id="toiletInfo" name="toilet_id">
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
                    <label for="rating" class="form-label">Rating:</label>
                    <div class="rating">
                        <input type="radio" id="star5" name="rating" value="5" />
                        <label for="star5" title="5 stars">&#9733;</label>
                        <input type="radio" id="star4" name="rating" value="4" />
                        <label for="star4" title="4 stars">&#9733;</label>
                        <input type="radio" id="star3" name="rating" value="3" />
                        <label for="star3" title="3 stars">&#9733;</label>
                        <input type="radio" id="star2" name="rating" value="2" />
                        <label for="star2" title="2 stars">&#9733;</label>
                        <input type="radio" id="star1" name="rating" value="1" />
                        <label for="star1" title="1 star">&#9733;</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="feedback" class="form-label">Feedback or Suggestion:</label>
                    <textarea class="form-control" id="feedback" name="feedback" rows="7" required></textarea>
                </div>
                <button type="submit" class="btn btn-custom-color">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>