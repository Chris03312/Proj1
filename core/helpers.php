<?php

// helpers.php or at the top of your web.php
function view($template, $data = []) {
    // Assuming templates are in a "views" directory
    extract($data); // Extracts data into variables for use in the view
    include __DIR__ . "/../views/{$template}.php";
}


function redirect($path) {
    header("Location: $path");
    exit;
}
