<?php
// Function to get the client IP address
function getClientIP() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

// Get the user's IP address
$userIP = getClientIP();

// Query IP-API service
$apiUrl = "http://ip-api.com/json/{$userIP}?fields=query,city,country,zip,timezone,org";
$locationInfo = file_get_contents($apiUrl);

// Parse JSON response
$locationData = json_decode($locationInfo, true);

// Extract relevant location data
$userLocation = "{$locationData['city']}, 
{$locationData['country']}, 
{$locationData['zip']}";
$userTimezone = $locationData['timezone'];
$userOrganization = $locationData['org'];

// Populate the user_location, user_timezone, and user_organization hidden fields in the form with the inferred information
?>