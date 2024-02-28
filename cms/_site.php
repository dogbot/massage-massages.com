<?PHP
// Determine the current environment 
// based on the SMTP settings in php.ini
$smtpSettings = ini_get('SMTP');

if ($smtpSettings === 'localhost') {
    $environment = 'local';
} else {
    $environment = 'production';
}

// Load environment-specific configuration
switch ($environment) {
    case 'local':
        $servername = "localhost";
        $username = "root";
        $password = "ServBay.dev";
        $dbname = "leadgen";
        break;
    case 'production':
        $servername = "localhost";
        $username = "colinane_root";
        $password = "nV2wNr!7PkP4";
        $dbname = "colinane_leadgen_massage";
        break;
    // Add more cases for other environments as needed
}

include("confg.ip-api.com.php");

$serverTime=date("m/d/y  H:i:s", time());
$site_name="Massages-Massages";
$site_domain="massage-massages.com";
$site_contact="Service Team Mgr";
$site_contact_name="M. Gandel";
$site_contact_email="serviceteam@massage-massages.com";
$site_phone="";