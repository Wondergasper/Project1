# Weather Server API

This is a simple PHP application that provides a weather greeting based on the user's IP address.

## Features

- Greets users by name (if provided) or as "Guest"
- Retrieves the user's location and current temperature based on their IP address
- Uses the WeatherAPI to fetch weather data

## Prerequisites

- PHP
- XAMPP
## Installation

1. Clone this repository
2. Install XAMPP

## Configuration

1. Create a .htaccess file in the root directory
2. Add:
RewriteEngine On
RewriteBase /sample/
RewriteRule ^(.*)$ public/index.php [L,QSA]

## Usage

1. Start the server: Apache

2. The server will run on http://localhost/sample/api/hello?visitor_name=yourname (or the port specified in your environment)

## API Endpoint

### GET /api/hello

Returns a greeting with the current weather for the user's location.

Query Parameters:
- `visitor_name` (optional): The name of the visitor

Response:
```json
{
"client_ip": "user's IP address",
"location": "user's location",
"greeting": "Hello, [name]! The temperature is [temp] degrees Celsius in [location]"
}