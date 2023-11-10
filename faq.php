<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequently Asked Questions</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f9f9f9;
            color: #333;
            font-family: Arial, sans-serif;
        }

        main {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #0074a7;
        }

        #btnGuj {
            background-color: #0074D9;
            /* Blue background color */
            color: white;
            /* Text color */
            padding: 5px 15px;
            /* Padding for space inside the button */
            border: none;
            /* Remove the default button border */
            border-radius: 10px;
            /* Rounded corners */
            cursor: pointer;
            margin-bottom: 10px;
        }

        #btnGuj:hover {
            background-color: #0056b3;
            /* Darker blue when hovered */
        }

        .faq-section {
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
        }

        h2 {
            font-size: 24px;
            color: #0074a7;
            margin-bottom: 10px;
        }

        .answer {
            margin-left: 20px;
        }

        .expand-icon {
            font-weight: bold;
            margin-right: 5px;
            cursor: pointer;
            width: 20px;
            height: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004953;">
        <a class="navbar-brand" href="user-dashboard.php">
            <img src="logo.png" width="40" height="40" class="d-inline-block align-top" alt="GMC Logo">
            Gandhinagar Municipal Corporation
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="user-dashboard.php">Home</a>
                </li>


            </ul>
        </div>
    </nav>
    <main>
        <h1>Frequently Asked Questions</h1><button id="btnGuj">ગુજરાતી</button>

        <div class="input-group mb-3">
            <input type="text" class="form-control" id="faq-search" placeholder="Search for FAQs">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
            </div>
        </div>

        <!-- FAQ Section 1 -->
        <div class="faq-section ">
            <h2><img class="expand-icon section-toggle" src="expand.png" alt="Expand"> User Registration</h2>

            <div class="answer">
                <p><strong>Q:</strong> How can I register as a user?</p>
                <p><strong>A:</strong> To register as a user, visit the 'Register' page and fill out the required information.</p>
                <p><strong>Q:</strong> What information is required for user registration?</p>
                <p><strong>Q:</strong> Can I register as both a Sanitary Inspector and a regular user?</p>
                <p><strong>Q:</strong> I forgot my password. How can I reset it?</p>
            </div>
        </div>

        <!-- FAQ Section 2 -->
        <!-- FAQ Section 2 -->
        <div class="faq-section ">
            <h2><img class="expand-icon section-toggle" src="expand.png" alt="Expand">Dashboard Usage</h2>

            <div class="answer">
                <p><strong>Q:</strong> What information is available on the dashboard?</p>
                <p><strong>A:</strong> The dashboard provides real-time data on toilet conditions, cleanliness, and more.</p>
                <p><strong>Q:</strong> How often is the dashboard data updated?</p>
                <p><strong>Q:</strong>Can I customize the dashboard to show specific information?</p>
                <p><strong>Q:</strong> What do the different KPIs on the dashboard represent?
                </p>
            </div>
        </div>

        <div class="faq-section ">
            <h2><img class="expand-icon section-toggle" src="expand.png" alt="Expand">Complaint Submission</h2>

            <div class="answer">
                <p><strong>Q:</strong>How can I submit a complaint about a toilet?</p>
                <p><strong>Q:</strong>Is there a specific format for filing complaints?</p>
                <p><strong>Q:</strong>Can I track the status of my complaints?</p>
                <p><strong>Q:</strong>What information should I provide when submitting a complaint?</p>
            </div>
        </div>

        <div class="faq-section ">
            <h2><img class="expand-icon section-toggle" src="expand.png" alt="Expand">Maintenance</h2>

            <div class="answer">
                <p><strong>Q:</strong>How often is the application maintained and updated?</p>
                <p><strong>Q:</strong>Will the system be available during maintenance periods?</p>
                <p><strong>Q:</strong>Are there regular bug fixes and updates?</p>
                <p><strong>Q:</strong>How do I report a technical issue or bug in the system?</p>
            </div>
        </div>


        <div class="faq-section ">
            <h2><img class="expand-icon section-toggle" src="expand.png" alt="Expand">Image Upload</h2>

            <div class="answer">
                <p><strong>Q:</strong> How can I upload images as evidence for my complaints?</p>
                <p><strong>Q:</strong>Are there file size limitations for image uploads?</p>
                <p><strong>Q:</strong>What image formats are supported?</p>
                <p><strong>Q:</strong>Can I attach multiple images to a single complaint?</p>
            </div>
        </div>


        <div class="faq-section ">
            <h2><img class="expand-icon section-toggle" src="expand.png" alt="Expand">Consumables Management</h2>

            <div class="answer">
                <p><strong>Q:</strong>How can I check the availability of consumables in a toilet?</p>
                <p><strong>Q:</strong>Are there alerts for low consumable levels?</p>
                <p><strong>Q:</strong>What consumables are tracked in the system?</p>
                <p><strong>Q:</strong>How are consumables restocked?</p>
            </div>
        </div>


        <div class="faq-section ">
            <h2><img class="expand-icon section-toggle" src="expand.png" alt="Expand">Notification System</h2>

            <div class="answer">
                <p><strong>Q:</strong>Will I receive notifications about the status of my complaints?</p>
                <p><strong>Q:</strong>How can I opt out of certain notifications?</p>
                <p><strong>Q:</strong>Are there reminders for scheduled tasks?</p>
                <p><strong>Q:</strong>Can I customize the notification preferences?</p>
            </div>
        </div>


        <div class="faq-section ">
            <h2><img class="expand-icon section-toggle" src="expand.png" alt="Expand">Feedback Mechanism</h2>

            <div class="answer">
                <p><strong>Q:</strong>How can I provide feedback on the cleanliness and service of a toilet?</p>
                <p><strong>Q:</strong>Is my feedback anonymous?</p>
                <p><strong>Q:</strong>What happens to the feedback I provide?</p>
                <p><strong>Q:</strong>Can I follow up on my feedback?</p>
            </div>
        </div>


        <div class="faq-section ">
            <h2><img class="expand-icon section-toggle" src="expand.png" alt="Expand">Communication With Complaint Resolving Administration</h2>

            <div class="answer">
                <p><strong>Q:</strong>How will I be notified of the resolution of my complaints?</p>
                <p><strong>Q:</strong>Can I send additional comments or inquiries after submitting a complaint?</p>
                <p><strong>Q:</strong>Is there a customer support channel for assistance?</p>
                <p><strong>Q:</strong>How can I reach out to the support team?</p>
            </div>
        </div>
        <!-- Add more FAQ sections as needed -->
    </main>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript to handle the expand/collapse functionality for sections
        // JavaScript to handle  the expand/collapse functionality for sections
        // JavaScript to handle the expand/collapse functionality for sections
        document.addEventListener("DOMContentLoaded", function() {
            const faqSections = document.querySelectorAll(".faq-section");

            faqSections.forEach((faqSection) => {
                const expandIcon = faqSection.querySelector(".expand-icon");
                expandIcon.addEventListener("click", () => {
                    faqSection.classList.toggle("open");
                    const answer = faqSection.querySelector(".answer");

                    if (faqSection.classList.contains("open")) {
                        expandIcon.src = "collapse.png";
                        answer.style.display = "block";
                    } else {
                        expandIcon.src = "expand.png";
                        answer.style.display = "none";
                    }
                });
            });

            // Add a listener to the search input for real-time search
            const searchInput = document.getElementById('faq-search');
            searchInput.addEventListener('input', () => {
                const searchTerm = searchInput.value.toLowerCase();

                faqSections.forEach(faqSection => {
                    const sectionTitle = faqSection.querySelector('h2').textContent.toLowerCase();
                    const answers = faqSection.querySelectorAll('.answer p');
                    let matchFound = sectionTitle.includes(searchTerm);

                    answers.forEach(answer => {
                        if (answer.textContent.toLowerCase().includes(searchTerm)) {
                            matchFound = true;
                        }
                    });

                    faqSection.style.display = matchFound ? 'block' : 'none';
                });
            });
        });

        // script for button

        function changePage() {
            // Replace the URL with the desired destination
            window.location.href = "faqGuj.php";
        }

        // Add a click event listener to the button
        document.getElementById("btnGuj").addEventListener("click", changePage);
    </script>
</body>

</html>