<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login_style.css">
    <!--BOOTSTRAP CSS CDN LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <section class="login_bg">

        <div class="container-md p-5">

            <div class="row align-items-center justify-content-center bg-light rounded">
                <div class="loginLeftContainer col-lg-6 p-5">
                    <div class="d-flex flex-row justify-content-around align-items-center gap-3">
                        <img src="../img/PPCRV LOGO.png" alt="PPCRV Logo" class="img-fluid loginLogo">
                        <img src="../img/DPPAM LOGO.png" alt="DPPAM Logo" class="img-fluid loginLogo">
                    </div>

                    <div>
                        <p class="text-center fs-5">
                            You are accessing a secure system of
                            <strong>Diocese of Caloocan Public and Political Affairs Ministry (DPPAM).</strong>
                            Any unauthorized use or actions beyond your permitted access are strictly prohibited
                            and may lead to disciplinary measures, legal action, or criminal charges.
                        </p>

                        <p class="text-center fs-5">
                            If you are an official <strong>volunteer, coordinator,</strong> or <strong>administrator</strong>
                            registering for the first time, kindly inform the system administrator or assigned
                            coordinator after completing your registration to expedite the approval process.
                        </p>
                    </div>
                </div>

                <div class="right col-lg-6 pt-4">
                    <div class="text-center">
                        <h1 class="fw-bolder"><span class="text-danger">Serv</span><span class="text-primary">ify</span></h1>
                        <h3>Welcome Back!</h3>

                        <div class="d-flex flex-column">
                            <span class="text-muted">Glad to see you again</span>
                            <span class="text-muted">Login to your account below.</span>
                        </div>
                    </div>

                    <form action="" class="row mt-5">
                   <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    </div>
                    <div class="">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                    </div>
                    <a href="#" class="mb-3 text-decoration-none">Forgot Password</a>

                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary px-5" value="Sign in">
                    </div>
                   </form>

                   <div class="mb-3 text-center form">
                    <p>Don't have an account? <a href="../pages/sign_up_form.php" class="text-danger text-decoration-none">Sign Up!</a></p>
                   </div>

                   <div class="mt-5">
                    <img src="../img/HANDS.png" alt="Hands" class="img-fluid loginHands">
                   </div>
                </div>
            </div>

        </div>


    </section>


    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>