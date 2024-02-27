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

$clientIP = getClientIP();

// Query IP-API service
$apiUrl = "http://ip-api.com/json/{$clientIP}?fields=query,city,country,countryCode,zip,timezone,org,region,regionName";
$locationInfo = file_get_contents($apiUrl);

$locationData = json_decode($locationInfo, true);

if (count($locationData) === 1) {
    $locationData = array(
        'Country' => 'United States',
        'CountryCode' => 'US',
        'City' => 'Washington',
        'Region' => 'DC',
        'RegionName' => 'District of Columbia',
        'Zip' => '20005',
        'Timezone' => 'NewYork',
        'Org' => 'Unknown',
        'Query' => 'Unknown'
    );
};
