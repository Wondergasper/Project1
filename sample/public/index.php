<?php

require_once __DIR__ . '/../src/functions.php';

// Check if the request is for the /api/hello endpoint
$request_uri = $_SERVER['REQUEST_URI'];
if (strpos($request_uri, '/api/hello') === false) {
    http_response_code(404);
    exit('Not Found');
}

// Get the visitor name from the query string
$visitor_name = $_GET['visitor_name'] ?? 'Guest';

// Get client IP and location data
$client_ip = getClientIp();
$location_data = getLocationData($client_ip);
$city = $location_data['city'] ?? 'Unknown';

// Get weather data for Lagos
$weather_data = getWeatherData();
$temperature = $weather_data['main']['temp'] ?? 'Unknown';

// Prepare the response
$response = [
    'client_ip' => $client_ip,
    'location' => $city,
    'greeting' => "Hello, {$visitor_name}! The temperature in Lagos is {$temperature} degrees Celsius"
];

// Send the JSON response
sendJsonResponse($response);