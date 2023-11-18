<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventrix</title>
	<link rel="shortcut icon" href="./dist/img/eventrix.png">
        <link rel="icon" href="./dist/img/eventrix.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .section {
            text-align: center;
            padding: 10px;
            margin: 0;
            transition: background-color 0.3s, color 0.3s;
        }

        .section img {
            opacity: 0;
            animation: fadeIn 2s forwards;
        }

        .container {
            text-align: left;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        /* Additional Styles for Navbar */
        .navbar {
            background-color: #343a40;
        }

        .navbar-brand {
            font-size: 24px;
        }

        .navbar-nav .nav-link {
            color: #fff;
            font-size: 18px;
            margin-right: 20px;
        }

        /* Styling for Sections */
        .section {
            background-color: #f7f7f7;
            color: #333;
            padding: 20px;
            margin: 0;
        }

        .section h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .section p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        /* Additional Styling for Cards */
        .card {
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 24px;
        }

        .card-text {
            font-size: 18px;
        }

        /* Testimonials Styling */
        .card-footer {
            background-color: #f7f7f7;
            font-size: 16px;
        }

        @keyframes slideIn {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .about-us-animation {
            animation: slideIn 1.5s ease-in-out;
        }

        .container.about-us-animation {
            animation-delay: 0.5s;
        }

        .container.about-us-animation p {
            animation-delay: 1s;
        }
    </style>
</head>
<body>

    <!-- Navigation menu with Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="adlogin.php">Eventrix</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Create New Account</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sections -->
    <div id="home" class="section">
        <h1>Welcome to Our
            Event Management Page</h1>

        <img src="./dist/img/EVE.png" alt="Event Image" width="100%">
    </div>
    <div id="about" class="section">
        <div class="container ">
            <h2 class="text-center">About Us</h2>

            <p>Welcome to <strong>Eventrix</strong>, Eventrix is not just an event management company; we are your
                partners in creating unforgettable moments with a primary emphasis on transforming event venues into
                works of art. We are dedicated to making your event truly exceptional, ensuring that the décor sets the
                stage for a memorable experience, complemented by delicious food and timeless photography.</p>

            <p><strong>Our Mission:</strong>
                Our mission is clear: to transform ordinary spaces into extraordinary event venues. We believe that
                every event should leave a lasting impression with its ambiance and décor. Our creative team excels in
                designing innovative themes and concepts that turn your vision into a reality.</p>

            <p><strong>Venue Decoration:</strong>
                - At Eventrix, our expertise lies in creating captivating event spaces that reflect your event's style
                and ambiance. We collaborate with local decorators and experts to ensure that every visual aspect of
                your event is exquisite and unique.</p>

            <p><strong>Food Services:</strong>
                - Alongside our venue decoration services, we partner with a network of top-tier food service providers
                in each city we serve. This ensures a diverse range of culinary options, from gourmet cuisine to street
                food, customized to your event's unique needs and location.</p>

            <p><strong>Photography Services:</strong>
                - At Eventrix, we understand the significance of capturing precious moments during your events. That's why
                we collaborate with a network of talented photographers and professionals who specialize in various
                photography styles, ensuring that your event is documented in a way that resonates with your unique
                vision and preferences.
            </p>
            <p>
                From weddings and corporate gatherings to family celebrations, our collaborative approach to
                photography guarantees that you receive a collection of stunning, high-quality photos that you'll
                treasure for years to come. We understand that photography is an art, and our network of professionals
                is dedicated to making your event's photography an artful masterpiece.
            </p>

        </div>
    </div>
    <div id="services" class="section">
        <h2>Our Services</h2>
        <p>Discover the services we offer for your events.</p>
        <div class="container mt-4">
            <h2> Events</h2>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="./dist/img/se.jpeg" width="100%"  height="330" class="card-img-top" alt="Event 1">
                            <h5 class="card-title">Social events</h5>
                            <p class="card-text">Join the ultimate social experience! Unforgettable moments await.</p>
                            <a href="event1.php" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="./dist/img/levent.jpeg" width="100%" height="330" class="card-img-top" alt="Event 2">
                            <h5 class="card-title">leisure event</h5>
                            <p class="card-text">Unwind, relax, and let the good times roll!</p>
                            <a href="event2.php" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="./dist/img/corevnt.png" width="100%"  height="330" class="card-img-top" alt="Event 3">
                            <h5 class="card-title">Corporate Event</h5>
                            <p class="card-text">Elevate your business with unforgettable corporate experiences!</p>
                            <a href="event3.php" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="section">
        <h2>Contact Us</h2>
        <p>Get in touch with us for your event planning needs.</p>
        <p><i class="fas fa-envelope"></i> Email: info@eventrix.com</p>
        <p><i class="fas fa-phone"></i> Phone: +91 9709666998</p>
    </div>

    <div class="container mt-5">
        <h2 class="text-center">Testimonials</h2>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="card-text">"Eventrix made my son's birthday party a huge success! The themed
                            decorations, entertainment, and activities kept the kids engaged and excited. It was a
                            stress-free experience, and the smiles on the kids' faces said it all. Thank you for creating
                            wonderful memories."</p>
                    </div>
                    <div class="card-footer text-center">
                        <cite>- piyush sehgal</cite>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="card-text">"I couldn't have asked for a better experience with Eventrix. From the
                            initial planning to the day of our wedding, they took care of every detail. The decorations
                            were stunning, and the coordination was flawless. Thank you for making our special day truly
                            magical!"."</p>
                    </div>
                    <div class="card-footer text-center">
                        <cite>- smithi jain</cite>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="card-text">"Impressed by the professionalism of the EventMaster team. They handled our
                            corporate conference with utmost precision. The audio-visual setup, seating arrangements, and
                            catering were all top-notch. I highly recommend their services for any corporate event.."</p>
                    </div>
                    <div class="card-footer text-center">
                        <cite>- David Johnson</cite>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add your scripts, including Bootstrap and any custom JavaScript, here -->

    <script>
        document.querySelectorAll('.navbar a').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const href = this.getAttribute('href');

                if (href === 'adlogin.php' || href === 'register.php') {
                    // Redirect to the clicked link
                    window.location.href = href;
                } else {
                    const targetId = href.substring(1);
                    const target = document.getElementById(targetId);
                    const offset = document.querySelector('.navbar').offsetHeight + 10; // Adjust this offset as needed
                    const targetPosition = target.offsetTop - offset;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

    <!-- Bootstrap and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
