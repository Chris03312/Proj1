<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status</title>
    <link rel="stylesheet" href="../css/volunteer_registration_status.css">
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
        <h4>Volunteer Registration Status</h4>

            <div class="timeline mb-5">
                <div class="timeline-progress"></div>
                <div class="timeline-item">
                    <img src="../img/icons8-announcement-90.png" alt="Step 1">
                    <div class="progress-step" data-content="Submit Volunteer Registration Form"></div>
                </div>
                <div class="timeline-item">
                    <img src="../img/icons8-announcement-90.png" alt="Step 2">
                    <div class="progress-step" data-content="To be reviewed by DPPAM Team"></div>
                </div>
                <div class="timeline-item">
                    <img src="../img/icons8-announcement-90.png" alt="Step 3">
                    <div class="progress-step" data-content="Application Approved"></div>
                </div>
                <div class="timeline-item">
                    <img src="../img/icons8-announcement-90.png" alt="Step 4">
                    <div class="progress-step" data-content="Submit Additional Requirements"></div>
                </div>
                <div class="timeline-item">
                    <img src="../img/icons8-announcement-90.png" alt="Step 5">
                    <div class="progress-step" data-content="Orientation and Training"></div>
                </div>
                <div class="timeline-item">
                    <img src="../img/icons8-announcement-90.png" alt="Step 6">
                    <div class="progress-step" data-content="Start Volunteering"></div>
                </div>
            </div>


            <!--TABLE-->
            <div class="mt-5">
                <h5 class="text-center text-danger">This user has no existing application.</h5>


                <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Registration Number</th>
                            <th scope="col">Registration Details</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>

            <!--
            <button id="startProgress" class="mt-5">Start Progress</button>
            -->
    </main>
    </div>
    </div>





    <!--
    <script>
      document.getElementById('startProgress').addEventListener('click', function() {
  let progress = parseInt(document.querySelector('.timeline-progress').style.width) || 0; // Get current progress, default to 0
  const progressBar = document.querySelector('.timeline-progress');

  // Increment by 16% but prevent exceeding 100%
  progress += 16;
  if (progress > 100) {
    progress = 100; // Cap the progress at 100%
  }

  progressBar.style.width = progress + '%'; // Update progress bar width
  console.log('Current Progress: ' + progress + '%'); // Optional: log the current progress for debugging
});


    </script>
-->


    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>