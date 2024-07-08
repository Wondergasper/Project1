<?php

function getClientIp() {
    return $_SERVER['REMOTE_ADDR'];
}

function getLocationData($ip) {
    $url = "https://ipapi.co/{$ip}/json/";
    $response = file_get_contents($url);
    return json_decode($response, true);
}

function getWeatherData() {
    $url = "http://api.openweathermap.org/data/2.5/weather?q=Lagos&appid=cc0f84d7073238fcb3c19d1eebd54c9c&units=metric";
    $response = @file_get_contents($url);
    if ($response === false) {
        return ['error' => 'Failed to fetch weather data'];
    }
    $data = json_decode($response, true);
    if (isset($data['cod']) && $data['cod'] != 200) {
        return ['error' => $data['message'] ?? 'Unknown error'];
    }
    return $data;
}

function sendJsonResponse($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}