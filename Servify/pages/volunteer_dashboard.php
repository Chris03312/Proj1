<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/volunteer_dashboard.css">
    <link rel="stylesheet" href="../css/volunteer_sidebar.css">

    <!--BOOTSTRAP CSS CDN LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--BOOTSTRAP CDN ICONS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--Font awesome CDN ICONS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <?php
    include('../includes/volunteer_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container-fluid p-3">

        <!--DASHBOARD BANNER-->
        <div class="dashboardBanner mb-4">
            <p>January 15, 2025</p>
            <h4>Welcome back, Vicmar!</h4>
        </div>

        <div class="container-fluid">
            <!--COUNTDOWN, ANNOUNCEMENT, BADGE-->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 mb-4">
                <!-- COUNTDOWN -->
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <p class="card-text">
                                Here is the countdown timer showing the time left until <strong>election day.</strong>
                            </p>
                            <div class="row">
                                <div class="col-3 d-flex flex-row justify-content-center align-items-center gap-1">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <h2 class="countdown p-2">25</h2>
                                        <span class="text-danger fw-bold">DAYS</span>
                                    </div>
                                    <div>
                                        <h4>:</h4>
                                    </div>
                                </div>
                                <div class="col-3 d-flex flex-row justify-content-center align-items-center gap-1">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <h2 class="countdown p-2">25</h2>
                                        <span class="text-danger fw-bold">HRS</span>
                                    </div>
                                    <div>
                                        <h4>:</h4>
                                    </div>
                                </div>
                                <div class="col-3 d-flex flex-row justify-content-center align-items-center gap-1">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <h2 class="countdown p-2">25</h2>
                                        <span class="text-danger fw-bold">MNS</span>
                                    </div>
                                    <div>
                                        <h4>:</h4>
                                    </div>
                                </div>
                                <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                                    <h2 class="countdown p-2">25</h2>
                                    <span class="text-danger fw-bold">SEC</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ANNOUNCEMENT -->
                <div class="col">
                    <div class="card h-100">
                        <div class="d-flex flex-row justify-content-start align-items-center gap-2 p-2">
                            <img src="../img/icons8-announcement-90.png" alt="Announcement Icon" class="img-fluid" height="30" width="30">
                            <span class="fw-bold text-primary">Announcements</span>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-center align-items-center gap-5">
                                <div class="announcementCountdown">
                                    <h1>10</h1>
                                </div>
                                <div>
                                    <p class="text-muted">Your upcoming scheduled event:</p>
                                    <h3 class="text-center">National Election Day</h3>
                                </div>
                            </div>
                            <div class="text-center mt-2">
                                <a href="#" class="text-decoration-none">See All Announcements</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BADGE -->
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <h5 class="card-title">CONGRATULATIONS</h5>
                            <p class="card-text">You earned a <strong>Gold Badge</strong></p>
                            <div>
                                <img src="../img/GOLD BADGE.png" alt="Badge" class="img-fluid" height="auto" width="120">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--VOLUNTEER ASSIGNMENT-->
            <div class="row row-cols-1 row-cols-md-2 g-3 mb-4">
                <!--VOLUNTEER ASSIGNMENT-->
                <div class="col-md-8">
                    <div class="card">
                        <div class="d-flex flex-row justify-content-start align-items-center gap-2 p-2">
                            <img src="../img/icons8-pin-90.png" alt="Announcement Icon" class="img-fluid" height="30" width="30">
                            <h5 class="fw-bold text-primary">Volunteer Assignment</h5>
                        </div>
                        <div class="card-body text-center d-flex flex-column gap-2">
                            <div class="bg-primary p-2 rounded">
                                <h4 class="text-light">You are currently assigned as:</h4>
                            </div>
                            <div>
                                <h2>POLL WATCHER</h2>
                            </div>
                            <div class="bg-primary p-2 rounded">
                                <h4 class="text-light">Designated at:</h4>
                            </div>
                            <div>
                                <h2>Maligaya Elementary School</h3>
                            </div>
                        </div>
                    </div>
                    <!-- MAP PREVIEW -->
                    <div class="card mt-2">
                        <div class="d-flex flex-row justify-content-start align-items-center gap-2 p-2">
                            <img src="../img/icons8-location-90.png" alt="Announcement Icon" class="img-fluid" height="30" width="30">
                            <h5 class="fw-bold text-primary">Map Preview</h5>
                        </div>
                        <div class="card-body text-center d-flex flex-column gap-2">
                            <div class="ratio ratio-16x9 mt-2">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15445.173431257543!2d120.97427814951024!3d14.582352624427244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c98a4bfb38fd%3A0xfb33eeff422ecbbd!2sPope%20Pius%20XII%20Catholic%20Center!5e0!3m2!1sen!2sph!4v1729786575051!5m2!1sen!2sph"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RECENT ACTIVITY -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-light text-center">
                            <h5>Recent Activity</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="#" class="text-decoration-none text-dark">
                                        <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                                            <div class="time">
                                                <p class="text-center">Today, 11:11 PM</p>
                                            </div>
                                            <div class="time">
                                                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, illo.</p>
                                            </div>
                                            <div class="time">
                                                <p><i class="bi bi-chevron-right"></i></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#" class="text-decoration-none text-dark">
                                        <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                                            <div class="time">
                                                <p class="text-center">Today, 11:11 PM</p>
                                            </div>
                                            <div class="time">
                                                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, illo.</p>
                                            </div>
                                            <div class="time">
                                                <p><i class="bi bi-chevron-right"></i></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#" class="text-decoration-none text-dark">
                                        <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                                            <div class="time">
                                                <p class="text-center">Today, 11:11 PM</p>
                                            </div>
                                            <div class="time">
                                                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, illo.</p>
                                            </div>
                                            <div class="time">
                                                <p><i class="bi bi-chevron-right"></i></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <!--My Timeline-->
                    <div class="card mt-2">
                        <div class="card-header bg-primary text-light text-center">
                            <h5>My Timeline</h5>
                        </div>
                        <div class="card-body">

                            <!--TIMELINE CONTENT-->
                            <section class="px-2">
                                <ul class="timeline-with-icons">
                                    <li class="timeline-item mb-5">
                                        <span class="timeline-year">
                                            2022
                                        </span>

                                        <div class="timeline-content">
                                            <h5 class="fw-bold">Poll Watcher</h5>
                                            <p class="text-muted">
                                                Maligaya Elementary School
                                            </p>
                                        </div>
                                    </li>
                                    <li class="timeline-item mb-5">
                                        <span class="timeline-year">
                                            2022
                                        </span>

                                        <div class="timeline-content">
                                            <h5 class="fw-bold">Poll Watcher</h5>
                                            <p class="text-muted">
                                                Maligaya Elementary School
                                            </p>
                                        </div>
                                    </li>
                                    <li class="timeline-item mb-5">
                                        <span class="timeline-year">
                                            2022
                                        </span>

                                        <div class="timeline-content">
                                            <h5 class="fw-bold">Poll Watcher</h5>
                                            <p class="text-muted">
                                                Maligaya Elementary School
                                            </p>
                                        </div>
                                    </li>
                                    <li class="timeline-item mb-5">
                                        <span class="timeline-year">
                                            2022
                                        </span>

                                        <div class="timeline-content">
                                            <h5 class="fw-bold">Poll Watcher</h5>
                                            <p class="text-muted">
                                                Maligaya Elementary School
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </section>

                        </div>
                    </div>

                </div>
            </div>





    </main>
    </div>
    </div>





    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>