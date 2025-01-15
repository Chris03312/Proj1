<?php

require_once __DIR__ . '/../core/helpers.php'; 
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../models/Parish.php';
require_once __DIR__ . '/../controllers/LandingPageController.php';
require_once __DIR__ . '/../controllers/SignUpController.php';
require_once __DIR__ . '/../controllers/HeatmapController.php';
require_once __DIR__ . '/../controllers/ParishController.php';
require_once __DIR__ . '/../controllers/ProfileController.php';
require_once __DIR__ . '/../controllers/LogoutController.php';
require_once __DIR__ . '/../controllers/DashboardController.php';
require_once __DIR__ . '/../controllers/AuthController.php';


$router = new Router();

$router->add('/', function () use ($router) {
    $router->redirect('/index'); // Now $router is available inside the closure
});

$router->add('/index', [LandingPageController::class, 'showLandingPage']);
$router->add('/signup', [SignUpController::class, 'showSignUp']);
$router->add('/signup/submit', [SignUpController::class, 'signup']);
$router->add('/login', [AuthController::class, 'showLoginForm']);
$router->add('/login/submit', [AuthController::class, 'login']);
$router->add('/dashboard', [DashboardController::class, 'dashboard']);
$router->add('/parishes', [ParishController::class, 'getParishes']);
$router->add('/profile/submit', [ProfileController::class,'updateProfile']);
$router->add('/profile', [ProfileController::class,'profile']);
$router->add('/heatmap', [HeatmapController::class, 'showHeatmap']);
$router->add('/logout', [LogoutController::class, 'logout']);

$router->run();


