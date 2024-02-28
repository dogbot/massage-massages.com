<?php

include("cms/confg.db.php");
function clean($input, $type = 'text', $connection = null)
{
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
        empty($_POST['clientName'])
     or empty($_POST['clientNumber']) 
     or empty($_POST['serviceRequested'])
     ) {
     http_response_code(400);// Set a 400 (bad request) response code and exit.
     $rr = "we need to know:<ul> ";
     $rr = empty($_POST['clientName'])      ?$rr ."<li>your name please":$rr;
     $rr = empty($_POST['clientNumber'])    ?$rr ."<li>a phone number to contact you":$rr;
     $rr = empty($_POST['serviceRequested'])?$rr ."<li>what type of massage you need":$rr;

     die( $rr."</ul>");
 }
    // Retrieve form data
    $clientName =       clean($_POST['clientName']);
    $clientEmail =      clean($_POST['clientEmail'], 'email');
    $clientNumber =     clean($_POST['clientNumber'], 'int');
    $serviceRequested = clean($_POST['serviceRequested']);
    $serviceLocation =  clean($_POST['serviceLocation']);
    $apiCountry =       clean($_POST['apicountry']);
    $apiCountryCode =   clean($_POST['apicountryCode']);
    $apiCity =          clean($_POST['apicity']);
    $apiRegion =        clean($_POST['apiregion']);
    $apiRegionName =    clean($_POST['apiregionName']);
    $apiZip =           clean($_POST['apizip']);
    $apiTimezone =      clean($_POST['apitimezone']);
    $apiOrg =           clean($_POST['apiorg']);
    $apiQuery =         clean($_POST['apiquery']);
    $leadSource =       clean($_POST['leadSource']);
    $clientTime =       clean($_POST['clientTime']);
    $serverTime =       clean($_POST['serverTime']);


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
mysqli_report(MYSQLI_REPORT_ALL);

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
                            clientTime,
                            serviceLocation,
                            serverTime
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
                            '$clientTime',
                            '$serviceLocation',
                            '$serverTime'
                            )";

                            
                            if ($conn->query($sql) === TRUE) {
                                echo "Thank you, we have received your information. ";
                            } else {
                                echo "Thank You! <!-- hidden Error: " . $sql . "<br>" . $conn->error ." -->";
                            }


    

    // Close connection
    $conn->close();

    // Set the recipient email address.
    // Build the email headers.
    $notice_headers = "From: $clientName <$clientEmail>";
    
    $client_headers = "From: Massage-massages.com <serviceteam@massage-massages.com>\r\n";
    $client_headers .= "Reply-To: Methera Gandel <serviceteam@massage-massages.com>\r\n";

    // Set the email serviceRequested.
    $notice_serviceRequested = "massage-massages.com: New lead";
    $client_serviceRequested = "Massage-Massages: Thank you";

    // Email recipient
    $notice_email = "massages@colina.net";
    $client_email = $clientEmail;

    $notice_message  = "New \n\n";
    $notice_message .= "name:  $clientName\n";
    $notice_message .= "email:  $clientEmail\n";
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
    $notice_message .= "clientTime:  $clientTime\n";
    $notice_message .= "serviceLocation:  $serviceLocation\n";

    // HTML Message
    include 'htmlemails/leadgen/html.thankyou.php'; //returns:  $client_message, $client_headers


    // Sending the emails
    // Send the notice email.
    if (mail($notice_email, $notice_serviceRequested, $notice_message, $notice_headers)) {
        echo 'We are matching you to a professional therapist. ';
    } else {
        echo 'We will contact you soon. ';
    }
    
    
    // Send the client email.
    if (mail($client_email, $client_serviceRequested, $client_message, $client_headers)) {
        $client_notification = true;
        // Set a 200 (okay) response code.
        http_response_code(200);
        echo "Please be on the lookout for our confirmation email.";
    } else {
        // Set a 500 (internal server error) response code.
        $client_notification = false;
        http_response_code(500);
        echo "Something went wrong and we couldn't send your email.";
    }

} else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
