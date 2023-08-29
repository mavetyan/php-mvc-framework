<?php

use Core\Route;

// Load Composer's autoloader
require_once '../vendor/autoload.php';

// Load the routes definition
require_once '../app/routes/web.php';

// Dispatch the request to the appropriate route
try {
    Route::dispatch();
} catch (Exception $e) {
    // Display the exception message (or log it for production environments)
    echo "Error: " . $e->getMessage();
}