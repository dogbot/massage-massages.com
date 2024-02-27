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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenStreetMap Example</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
       integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
       crossorigin=""/>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>OpenStreetMap Example</h1>
    <div id="map"></div>

    <script>
        var userIP = "<?php echo $clientIP; ?>";
        // Function to initialize the map
        function initMap(latitude, longitude) {
            // Initialize map with default or user-provided coordinates
            var map = L.map('map').setView([latitude, longitude], 13);

            // Add OSM tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Add marker to the map
            L.marker([latitude, longitude]).addTo(map)
                .bindPopup('Your Location')
                .openPopup();
        }

        // Function to handle location retrieval success
        function locationSuccess(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            initMap(latitude, longitude);
        }

        // Function to handle location retrieval error
        function locationError() {
            // Fallback method using ip-api.org API
            fetch('https://ip-api.com/json/' + userIP )
                .then(response => response.json())
                .then(data => {
                    var latitude = data.lat;
                    var longitude = data.lon;
                    initMap(latitude, longitude);
                })
                .catch(error => console.log(error));
        }

        // Check if geolocation is supported by the browser
        if (navigator.geolocation) {
            // Retrieve user's current location
            navigator.geolocation.getCurrentPosition(locationSuccess, locationError);
        } else {
            // Fallback method using ip-api.org API
            locationError();
        }
    </script>

    <!-- Include Leaflet library -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
       integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
       crossorigin=""></script>
</body>
</html>