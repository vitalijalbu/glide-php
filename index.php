<?php

require_once 'vendor/autoload.php';

use League\Glide\Responses\PsrResponseFactory;
use League\Glide\ServerFactory;

// Set up your image manipulation server
$server = ServerFactory::create([
    'driver' => 'gd',
    'source' => './uploads', // Update this with the path to your images
    'cache' => './cache', // Update this with the path to your cache directory,
    'presets' => [
        'small' => [
            'w' => 640, // Double the width
            'h' => 360, // Double the height
            'fit' => 'crop',
        ],
        'medium' => [
            'w' => 640,
            'h' => 360,
            'fit' => 'crop',
        ],
        'large' => [
            'w' => 1280,
            'h' => 720,
            'fit' => 'crop',
        ]
    ]    
]);



// Extract the path from the 'source' query parameter
$path = isset($_GET['source']) ? $_GET['source'] : null;


// Check if source path is provided
if (!$path || !file_exists('./uploads/' . $path)) {
    // If source is missing or invalid, return JSON response with error
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Source image not found']);
    print_r($path);
    exit;
}
else {
 
    // Define the image manipulation options
    $options = [];

    // Extract manipulation options from the URL
    foreach ($_GET as $key => $value) {
        // Exclude 'source' parameter
        if ($key !== 'source') {
            // Add all parameters except 'source' to options array
            $options[$key] = $value;
        }
    }

    // Output the manipulated image
    $server->outputImage($path, $options);
}