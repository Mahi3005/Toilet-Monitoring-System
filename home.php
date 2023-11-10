<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toilet Monitoring System - Gandhinagar Municipal Corporation</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom Styles */
        body {
            background-color: #f2f2f2;
            color: #333333;
        }

        header,
        nav.navbar,
        footer {
            background-color: #004953;
            color: #ffffff;
        }

        .carousel-item {
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
        }

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

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
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
                <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
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
            <li class="nav-item">
                <a class="nav-link" href="feedback.php">give Feedback</a>
            </li>
        </ul>
    </div>
</nav>


    <!-- Image Carousel -->
    <div id="imageCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#imageCarousel" data-slide-to="1"></li>
            <li data-target="#imageCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
    <div class="carousel-item active" style="background-image: url('GMC BLG.jpg');"></div>
    <div class="carousel-item" style="background-image: url('img2.jpg');"></div>
    <div class="carousel-item" style="background-image: url('TUSIMG.jpg');"></div>
</div>

        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="col-md-8 offset-md-2 text-center">
    <div class="description-box p-4">
        <h2>Gandhinagar Municipal Corporation</h2>
        <p class="text-left">
            The Gandhinagar Municipal Corporation (GMC) has implemented a comprehensive toilet monitoring system to
            ensure the cleanliness and proper maintenance of public and community toilets across the city. Through this
            system, the GMC aims to promote better sanitation practices and improve the overall hygiene standards in
            Gandhinagar.
        </p>

        <p class="text-left">
            <strong>Objective:</strong>
        </p>

        <ul class="text-left">
            <li>Our goal is to maintain clean and accessible public toilets for all citizens.</li>
            <li>We cover public toilets across the city, ensuring a clean and safe environment.</li>
            <li>We perform regular cleaning and maintenance to keep toilets clean and ready for use.</li>
            <li>High hygiene standards are maintained using eco-friendly cleaning products.</li>
            <li>Our trained staff is responsible for the cleanliness and maintenance of these facilities.</li>
            <li>We actively promote public toilet cleanliness through various campaigns.</li>
            <li>Report issues or provide feedback on public toilet cleanliness.</li>
            <li>We use eco-friendly practices and technologies to minimize our environmental impact.</li>
            <li>We collaborate with local businesses and organizations to support this initiative.</li>
        </ul>

        <p class="text-left">
            Stay updated on our cleaning initiative's progress through our website.
        </p>
    </div>
</div>


    <!-- Testimonial Section -->
    <section class="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <h2>Testimonials</h2>
                    <p>Here you can add some testimonials from satisfied users or officials.</p>
                </div>
            </div>
            <div class="row justify-content-around">
                <div class="col-md-3 testimonial-box">
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ac eleifend nisl, sit amet
                        consequat velit."</p>
                    <p><em>- John Doe</em></p>
                </div>
                <div class="col-md-3 testimonial-box">
                    <p>"Ut eleifend mauris in ex efficitur interdum. Curabitur in nisi id tortor pretium vulputate."</p>
                    <p><em>- Jane Smith</em></p>
                </div>
                <div class="col-md-3 testimonial-box">
                    <p>"Praesent eget augue quis metus imperdiet fermentum. Sed vel diam et felis varius luctus."</p>
                    <p><em>- Mike Johnson</em></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-green text-white p-3 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Useful Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 2</a></li>
                        <li><a href="#">Link 3</a></li>
                    </ul>
                </div>
                <div class="col-md-4 text-center">
                    <img src="logo.png" alt="GMC Logo">
                </div>
                <div class="col-md-4 text-right">
                    <p>Visit <a href="https://www.gandhinagarmunicipal.com">Gandhinagar Municipal Corporation</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Link Bootstrap and JavaScript libraries at the end of the body -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    

</body>

</html>
