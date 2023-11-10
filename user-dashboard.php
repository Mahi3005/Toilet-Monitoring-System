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
    <title>User Login</title>
    <!-- Link Bootstrap CSS -->
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

    <div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-custom-color mb-4" style="border-radius: 10px; height: 200px;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h3 class="card-title text-white">Complaint <br> Registration</h3>
                  
                    <a href="complaint.php" class="btn btn-custom-color mt-2">Toilet Complaint</a>
                    <a href="inspectorcomplaint.php" class="btn btn-custom-color mt-2">Inspector Complaint</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-custom-color mb-4" style="border-radius: 10px; height: 200px;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h3 class="card-title text-white"><br>  FAQs</h3>
                    <a href="faq.php" class="btn btn-custom-color mt-2">View FAQs</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card bg-custom-color mb-4" style="border-radius: 10px; height: 200px;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h3 class="card-title text-white">Track <br>Your <br>Complaint</h3>
                    <a href="track.php" class="btn btn-custom-color mt-2">Track</a>
                </div>
            </div>
        </div>
    </div>
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

<button class="chatbot-toggler">
      <span class="material-symbols-rounded">mode_comment</span>
      <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
      <header>
        <h2>Chatbot</h2>
        <span class="close-btn material-symbols-outlined">close</span>
      </header>
      <ul class="chatbox">
        <li class="chat incoming">
          <span class="material-symbols-outlined">smart_toy</span>
          <p>Hi there 👋<br>How can I help you today?</p>
        </li>
      </ul>
      <div class="chat-input">
        <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
        <span id="send-btn" class="material-symbols-rounded">send</span>
      </div>
    </div>

</div>




<script>
const chatbotToggler = document.querySelector(".chatbot-toggler");
    const closeBtn = document.querySelector(".close-btn");
    const chatbox = document.querySelector(".chatbox");
    const chatInput = document.querySelector(".chat-input textarea");
    const sendChatBtn = document.querySelector(".chat-input span");

    let userMessage = null; // Variable to store user's message
    const API_KEY = "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"; // Paste your API key here
    const inputInitHeight = chatInput.scrollHeight;

    const createChatLi = (message, className) => {
        // Create a chat <li> element with passed message and className
        const chatLi = document.createElement("li");
        chatLi.classList.add("chat", `${className}`);
        let chatContent = className === "outgoing" ? `<p></p>` : `<span class="material-symbols-outlined">smart_toy</span><p></p>`;
        chatLi.innerHTML = chatContent;
        chatLi.querySelector("p").textContent = message;
        return chatLi; // return chat <li> element
    }

    const generateResponse = (chatElement) => {
        const API_URL = "https://api.openai.com/v1/chat/completions";
        const messageElement = chatElement.querySelector("p");

        // Define the properties and message for the API request
        const requestOptions = {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Authorization": `Bearer ${API_KEY}` // Change to API_KEY
            },
            body: JSON.stringify({
                model: "gpt-3.5-turbo",
                messages: [{role: "user", content: userMessage}],
            })
        }

        // Send POST request to API, get response and set the reponse as paragraph text
        fetch(API_URL, requestOptions).then(res => res.json()).then(data => {
            messageElement.textContent = data.choices[0].message.content.trim();
        }).catch(() => {
            messageElement.classList.add("error");
            messageElement.textContent = "Oops! Something went wrong. Please try again.";
        }).finally(() => chatbox.scrollTo(0, chatbox.scrollHeight));
    }

    

const handleChat = () => {
    userMessage = chatInput.value.trim(); // Get user entered message and remove extra whitespace
    if(!userMessage) return;

    // Clear the input textarea and set its height to default
    chatInput.value = "";
    chatInput.style.height = `${inputInitHeight}px`;

    // Append the user's message to the chatbox
    chatbox.appendChild(createChatLi(userMessage, "outgoing"));
    chatbox.scrollTo(0, chatbox.scrollHeight);
    
    setTimeout(() => {
        // Display "Thinking..." message while waiting for the response
        const incomingChatLi = createChatLi("Thinking...", "incoming");
        chatbox.appendChild(incomingChatLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);
        generateResponse(incomingChatLi);
    }, 600);
}

chatInput.addEventListener("input", () => {
    // Adjust the height of the input textarea based on its content
    chatInput.style.height = `${inputInitHeight}px`;
    chatInput.style.height = `${chatInput.scrollHeight}px`;
});

chatInput.addEventListener("keydown", (e) => {
    // If Enter key is pressed without Shift key and the window 
    // width is greater than 800px, handle the chat
    if(e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
        e.preventDefault();
        handleChat();
    }
});

sendChatBtn.addEventListener("click", handleChat);
closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
    
</script>



    
    <!-- Link necessary JavaScript files here -->
</body>

</html>
