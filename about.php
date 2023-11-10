<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toilet Monitoring System - Gandhinagar Municipal Corporation</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .boxer {
            text-align: center;
            margin-left: 3%;
            max-width: 95%;
        }

        #content-main .description-box {
            margin: 0;
            padding: 0;
        }

        /* Custom Styles */
        body {
            margin: 0 auto;
            background-image: url("gandhinagar.jpg");
            /* background-color: #f2f2f2;
            color: #333333; */
            background-size: cover;
            background-repeat: no-repeat;
            font-weight: 500;
            font-size: 20px;
        }

        #body {
            background-color: #ffffff70;
            text-align: justify;
        }

        #content-main {
            padding-left: 10px;
            font-family: serif;
            font-size: 115%;
        }

        .contact-links {
            color: black;
            font-weight: 599;
        }

        .contact-content {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;

        }

        .contact-content p {
            margin-left: 10%;
        }

        .list-items {
            margin-top: 0.2%;
            margin-bottom: 0.2%;
        }

        /* footer css */

        .useful-links {
            color: bisque;
        }

        header,
        nav.navbar,
        footer {
            background-color: #004953;
            color: #ffffff;
        }

        /* .carousel-item {
            height: 60vh;
            min-height: 300px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .testimonial {
            background-color: #004953;
            color: #ffffff;
            padding: 30px 0;
        }

        .testimonial p {
            font-size: 18px;
            line-height: 1.6;
        }

        .testimonial-box {
            border: 1px solid #ffffff;
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
        } */

        nav.navbar a,
        footer a {
            color: #ffffff;
        }

        nav.navbar a:hover,
        footer a:hover {
            color: #e6e6e6;
        }
    </style>
</head>

<body>
    <div id="body">
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="home.php">
                <img src="logo.png" width="40" height="40" class="d-inline-block align-top" alt="GMC Logo">
                Gandhinagar Municipal Corporation
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userSignup.php">Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userLogin.php" id='log'>Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminLogin.php">Admin Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inspectorLogin.php">Inspector Login</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="content-main">
            <div class="boxer">
                <div class="description-box p-4">
                    <h2 style="font-weight: 700; font-size: 200%;">GMC Toilet Monitoring</h2>
                    <p class="text-left">
                        Welcome to our Municipal Toilet Website, your go-to resource for all things related to public sanitation facilities in our vibrant and thriving community. We understand that access to clean and accessible public toilets is a basic necessity for everyone. Our mission is to make your life more convenient and promote a cleaner, healthier, and more inclusive urban environment. <br><br>
                        <strong>Our Vision: </strong><br>
                        We envision a city where every resident and visitor can easily find and access well-maintained public restrooms. We believe that clean and safe public toilets are an essential part of urban infrastructure, contributing to the well-being and comfort of our community.
                    </p>

                    <p class="text-left">
                        <strong>What we offer:</strong>
                    </p>

                    <ul class="text-left" type="square">
                        <li class="list-items"><b>Toilet Locator: </b> Our user-friendly platform allows you to quickly locate the nearest public toilets in your area. Whether you're out for a leisurely stroll, exploring the city, or caught in an emergency, our website ensures you can easily find a clean and accessible restroom nearby.</li>
                        <li class="list-items"><b>Reviews and Ratings: </b> We believe in the power of the community. Share your experiences with others by leaving reviews and ratings for the public toilets you visit. Your feedback helps us maintain a high standard of cleanliness and service.</li>
                        <li class="list-items"><b>Sanitation Guidelines: </b> Our website provides valuable information on proper toilet etiquette, promoting responsible usage and environmental awareness. We are committed to maintaining the hygiene and sustainability of our public toilets.</li>
                        <li class="list-items"><b>Accessibility Information: </b> We strive to make our city more inclusive. You can find information on accessible toilets for individuals with disabilities, parents with young children, and those who need special accommodations.</li>
                    </ul>
                    <p class="text-left">
                        <strong>Our commitment: </strong>
                    </p>

                    <ul class="text-left" type="square">
                        <li class="list-items"><b>Cleanliness: </b>We advocate for and monitor the cleanliness of public restrooms in our city. We believe that clean toilets are a reflection of a healthy and well-maintained community.</li>
                        <li class="list-items"><b>Safety: </b>Ensuring the safety of all users is our priority. We provide information on well-lit, secure facilities and work closely with local authorities to address any security concerns.</li>
                        <li class="list-items"><b>Sustainability: </b>We promote the responsible use of resources and environmentally friendly practices in the maintenance of public toilets, contributing to a greener urban environment.</li>
                        <li class="list-items"><b>Community Engagement: </b>We encourage active participation from our users. Share your experiences and concerns to help us improve the quality of public toilets in our city.</li>
                    </ul>

                    <p class="text-left">
                        We invite you to join us in our mission to create a more comfortable, accessible, and hygienic urban environment. Together, we can ensure that everyone in our community has easy access to clean and safe public toilets. <br><br>
                        Thank you for visiting our GMC Toilet Monitoring. We look forward to your continued support in making our city a better place to live, work, and visit.
                    </p>

                    <p class="text-left">
                        <strong>Contact us: </strong>
                    </p>

                    <div class="contact-content">
                        <p style="text-align: left;">
                            Phone No. - <a href="tel:(079) 23284150" class="contact-links">(079) 23284150</a><br>
                            Fax No - <a href="tel:(079) 23284150" class="contact-links">(079) 23221419</a><br>
                            E-Mail - <a href="mailto:gmc8gandhinagar@gmail.com" class="contact-links">gmc8gandhinagar@gmail.com</a><br>
                            Mayor Office - <a href="mailto:gmc.gandhinagar@gmail.com" class="contact-links">gmc.gandhinagar@gmail.com</a>
                        </p>
                        <p style="text-align: left; margin-left: 8%;">
                            Pandit Dindayal Upadhyay Bhavan,<br>
                            Behind Fire Station, <br>
                            Sector-17,<br>
                            Gandhinagar-382016<br><br>
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Footer -->
        <footer>
        <?php include('footer.php'); ?> 
            <!-- <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5 style="font-weight: 600;">Useful Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="https://www.ecsenvironment.com/gmc-ewaste-disposal/" class="useful-links">E-waste collection request form</a></li>
                            <li><a href="https://igod.gov.in/" class="useful-links">Goverment Of India</a></li>
                            <li><a href="https://gscdlgis.gandhinagarsmartcity.in/GandhinagarGIS/#reile" class="useful-links">Gandhinagar Smart City</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="logo.png" alt="GMC Logo">
                    </div>
                    <div class="col-md-4 text-right">
                        <p><a href="https://www.gandhinagarmunicipal.com" style="color: bisque;"> Visit Gandhinagar Municipal Corporation</a></p>
                    </div>
                </div>
            </div> -->
        </footer>

        <!-- Link Bootstrap and JavaScript libraries at the end of the body -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
</body>

</html>