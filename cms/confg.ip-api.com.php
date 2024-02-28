<?php
// Function to get the client IP address

// Function to get the client IP address
function getClientIP() {
    if (getenv('HTTP_CLIENT_IP'))
        {$ipaddress['protocol'] = 'HTTP_CLIENT_IP';
        $ipaddress['ip'] = getenv('HTTP_CLIENT_IP');}
    //else if(getenv('HTTP_X_FORWARDED_FOR'))
    //    {$ipaddress['protocol'] = 'HTTP_X_FORWARDED_FOR';
    //    $ipaddress['ip'] = getenv('HTTP_X_FORWARDED_FOR');}
    else if(getenv('HTTP_X_FORWARDED'))
        {$ipaddress['protocol'] = 'HTTP_X_FORWARDED';
        $ipaddress['ip'] = getenv('HTTP_X_FORWARDED');}
    else if(getenv('HTTP_FORWARDED_FOR'))
        {$ipaddress['protocol'] = 'HTTP_FORWARDED_FOR';
        $ipaddress['ip'] = getenv('HTTP_FORWARDED_FOR');}
    else if(getenv('HTTP_FORWARDED'))
        {$ipaddress['protocol'] = 'HTTP_FORWARDED';
        $ipaddress['ip'] = getenv('HTTP_FORWARDED');}
    else if(getenv('REMOTE_ADDR'))
        {$ipaddress['protocol'] = 'REMOTE_ADDR';
        $ipaddress['ip'] = getenv('REMOTE_ADDR');}
    else
        $ipaddress['protocol'] = 'PAILA';
        $ipaddres['ip'] = 'UNKNOWN';
    return $ipaddress;
}
// Get the user's IP address

$clientIP = getClientIP();
if(filter_var($clientIP['ip'] , FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)){
  $clientIP['ip'] = 'UNKNOWN';
}

// Query IP-API service
$apiUrl = "http://ip-api.com/json/{$clientIP['ip']}?fields=query,city,country,countryCode,zip,timezone,org,region,regionName";
$locationInfo = file_get_contents($apiUrl);
$ip_src = $clientIP['protocol'];


$locationData = json_decode($locationInfo, true);

if ($locationData===null or count($locationData) === 1) {
    $locationData = array(
        'Country' => 'United States',
        'CountryCode' => 'US',
        'City' => 'Washington',
        'Region' => 'D.C.',
        'RegionName' => 'District of Columbia',
        'Zip' => '20005',
        'Timezone' => 'NewYork',
        'Org' => 'Unknown',
        'Query' => 'Unknown'
    );
};
