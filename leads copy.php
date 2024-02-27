<?php
    function clean($input, $type = 'text', $connection = null) {
        // Trim white space
        $input = trim($input);
        
        // Remove carriage returns and newlines
        $input = str_replace(array("\r", "\n"), '', $input);
        
        // Convert HTML entities
        $input = html_entity_decode($input);
        
        // Filter based on type
        switch ($type) {
            case 'email':
                // Validate email format
                $input = filter_var($input, FILTER_SANITIZE_EMAIL);
                break;
            case 'int':
                // Filter integer value
                $input = filter_var($input, FILTER_SANITIZE_NUMBER_INT);
                break;
            default:
                // Remove dangerous characters (text filtering)
                $input = preg_replace('/[&<>"\'`]/', '', $input);
                break;
        }
        
        // Escape special characters for MySQL query
        if ($connection !== null && $type !== 'int') {
            $input = mysqli_real_escape_string($connection, $input);
        }
        
        return $input;
    }
    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        // Check that data was sent to the mailer.
        if ( 
            empty($clientName) 
        // OR  empty($date) 
        OR  empty($serviceRequested) 
        OR  empty($clientNumber) 
        OR  !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Please complete the form and try again.";
            exit;
        }
        // Retrieve form data        
        $clientName = clean('clientName');
        $clientEmail= clean('clientEmail','email');
        $clientNumber = clean('number');
        $serviceRequested = clean('serviceRequested');
        $serviceLocation = clean('serviceLocation','int') ;
        $apiCountry = clean('apiCountry');
        $apiCountryCode = clean('apiCountryCode');
        $apiCity = clean('apiCity');
        $apiRegion = clean('apiRegion');
        $apiRegionName = clean('apiRegionName');
        $apiZip = clean('apiZip');
        $apiTimezone = clean('apiTimezone');
        $apiOrg = clean('apiOrg');
        $apiQuery = clean('apiQuery');
        $leadSource = clean('leadSource');
        $current_time = clean('current_time');
        $clientTime = clean('clientTime','int') ;
        $serverTime = clean('serverTime','int') ;
        


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Insert data into database
    $sql = "INSERT INTO leadgen (
        clientName,
                            clientEmail,
                            clientNumber,
                            serviceRequested,
                            apiCountry,
                            apiCountryCode,
                            apiCity,
                            apiRegion,
                            apiRegionName,
                            apiZip,
                            apiTimezone,
                            apiOrg,
                            apiQuery,
                            leadSource,
                            current_time,
                            clientTime,
                            serviceLocation,
                            ) VALUES (
                            '$clientName',
                            '$clientEmail',
                            '$clientNumber',
                            '$serviceRequested',
                            '$apiCountry',
                            '$apiCountryCode',
                            '$apiCity',
                            '$apiRegion',
                            '$apiRegionName',
                            '$apiZip',
                            '$apiTimezone',
                            '$apiOrg',
                            '$apiQuery',
                            '$leadSource',
                            '$current_time',
                            '$clientTime',
                            '$serviceLocation')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();





        // Set the recipient email address.     
        // Build the email headers.
        $notice_headers = "From: $clientName <$clientEmail>";
        $client_headers = "From: Massage-massages.com <m.gandel@massage-massages.com>\r\n";
        $client_headers .= "Reply-To: Methera Gandel <m.gandel@massage-massages.com>\r\n";

        // Set the email serviceRequested.
        $notice_serviceRequested = "massage-massages.com: New lead";
        $client_serviceRequested = "Massage-Massages: Thank you";

        // Email recipient
        $notice_email = "massages@colina.net";
        $client_email = $email;

        $notice_message .= "New \n\n";
        $notice_message .= "name:  $clientName\n";
        $notice_message .= "email:  $email\n";
        $notice_message .= "number:  $clientNumber\n";
        $notice_message .= "serviceRequested:  $serviceRequested\n";
        $notice_message .= "apiCountry:  $apiCountry\n";
        $notice_message .= "apiCountryCode:  $apiCountryCode\n";
        $notice_message .= "apiCity:  $apiCity\n";
        $notice_message .= "apiRegion:  $apiRegion\n";
        $notice_message .= "apiRegionName:  $apiRegionName\n";
        $notice_message .= "apiZip:  $apiZip\n";
        $notice_message .= "apiTimezone:  $apiTimezone\n";
        $notice_message .= "apiOrg:  $apiOrg\n";
        $notice_message .= "apiQuery:  $apiQuery\n";
        $notice_message .= "leadSource:  $leadSource\n";
        $notice_message .= "current_time:  $current_time\n";
        $notice_message .= "clientTime:  $userTime\n";
        $notice_message .= "serviceLocation:  $serviceLocation\n";

        // HTML Message 
        include 'htmlemails/leadgen/html.thankyou.php';//returns:  $client_message, $client_headers


// Sending the emails
        // Send the notice email.
        if (mail($notice_email, $notice_serviceRequested, $notice_message, $notice_headers)) {
            $notice_notification = true;
        } else {
            $notice_notification = false;
        }
        // Send the client email.
        if (mail($client_email, $client_serviceRequested, $client_message, $client_headers)) {
            $client_notification = true;
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank Your Appointment! Your appointment has been booked. We will contact you soon.";
        } else {
            // Set a 500 (internal server error) response code.
            $client_notification = false;
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your appointment.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }







