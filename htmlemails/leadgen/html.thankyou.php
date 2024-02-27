<?php ob_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Your Request Received - A Step Closer to Ultimate Relaxation</title>
    <style type="text/css">
    </style>
    <script src="chrome-extension://nngceckbapebfimnlniiiahkandclblb/content/fido2/page-script.js"
        id="bw-fido2-page-script"></script>
</head>

<body style="margin:0;padding:0;">
    <center>
        <table width="100%" border="0" cellpadding="0" cellspacing="0"
            style="font-family: 'Georgia',sans-serif;background-color: white; max-width:640px;">
            <tbody>
                <tr>
                    <td style="background-color:rgb(49,60,69);padding: 20px;"> &nbsp;
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px 60px 4px;">
                        <img alt="massage massages logo"
                            src="cid:logo.png">
                    </td>
                </tr>
                <tr>
                    <td>
                        <table
                            style=" padding: 40px; border-spacing: 0; width: -webkit-fill-available; background-color: #e3907c;">
                            <tbody>
                                <tr>
                                    <td style="padding: 0 0 0 40px;font-family: 'Georgia';line-height: 120%;">
                                        <div style="font-weight: 100;color: #fde5d8;">
                                            Your Request Received!</div>
                                        <div style="  font-size: 41px;  line-height: normal;  color: #fde5d8;">
                                            A Step Closer to Ultimate Relaxation</div>
                                    </td>
                                    <td style="padding: 0 40px 0;">
                                        <img alt="leaves"
                                            src="cid:leaves.png">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="top" style="padding: 40px;background-color: #f9f9f9;">
                        <table style="background-color:rgb(255, 255, 255)">
                            <tbody>
                                <tr>
                                    <td style="padding: 9%;line-height: 204%;font-size: 100%;color: rgb(106 106 105);font-weight: 100;box-shadow: 1.5px 2.598px 14.88px 1.12px rgba(18, 27, 36, 0.06);">


                                        <p>
                                            Thank you for reaching out to us through Massage-Massages.com. We're
                                            delighted to
                                            have the opportunity to assist you
                                            in finding the perfect massage therapy experience.
                                        </p>
                                        <p>
                                            Your contact details have been successfully received, and we are currently
                                            in the
                                            process of matching you with one
                                            of our independent professional massage therapists. They will reach out to
                                            you
                                            directly to discuss your preferences
                                            and schedule your session. Please allow some time for us to find the
                                            therapist that
                                            best suits your needs.
                                        </p>
                                        <p>
                                            We understand the importance of a great massage experience, and our clients
                                            often
                                            share how much they value the
                                            convenience and quality of our service. From the comfort of your own home,
                                            you're
                                            set to enjoy an experience that
                                            many have described as "unbeatable" and "pure luxury." We look forward to
                                            providing
                                            you with an experience that not
                                            only meets but exceeds your expectations.
                                        </p>
                                        <p>
                                            In the meantime, if you have any questions or additional requirements,
                                            please feel
                                            free to respond to this email.
                                            We're here to ensure your journey to relaxation is smooth and enjoyable.
                                        </p>
                                        <p>
                                            Thank you for choosing us for your home massage therapy needs. We can't wait
                                            to help
                                            you unwind and rejuvenate.
                                        </p>
                                        <p>
                                            Warm regards,
                                        </p>
                                        <p>
                                            Methera Gandel<br>
                                            Customer Service Team<br>
                                            Massage-Massages.com<br>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
</body>

</html>
<?php $html_content = ob_get_clean(); 


    // Boundary 
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

    // Headers for attachment 
    $client_headers .= "MIME-Version: 1.0\r\n";
    $client_headers .= "Content-Type: multipart/mixed;\r\n";
    $client_headers .= " boundary=\"{$mime_boundary}\"";

    // Multipart Boundary above message
    $client_message = "--{$mime_boundary}\r\n";
    $client_message .= "Content-Type: text/html; charset=\"UTF-8\"\r\n";
    $client_message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";

    // HTML Message 
    $client_message .= $html_content;
    $client_message .= "\r\n\r\n";


    // base64 encoded strings for  images

    // Attachment logo
    include 'img.logo.php';//$encoded_logo
    $client_message .= "--{$mime_boundary}\r\n";
    $client_message .= "Content-Type: image/png; name=\"logo.png\"\r\n";
    $client_message .= "Content-Disposition: attachment; filename=\"logo.png\"\r\n";
    $client_message .= "Content-Transfer-Encoding: base64\r\n";
    $client_message .= "X-Attachment-Id: logo.png\r\n";
    $client_message .= "Content-ID: <logo.png>\r\n\r\n";
    $client_message .= $encoded_logo . "\r\n\r\n";
    
    // Attachment decoration
    include 'img.leaves.php';//$encoded_leaves
    $client_message .= "--{$mime_boundary}\r\n";
    $client_message .= "Content-Type: image/png; name=\"leaves.png\"\r\n";
    $client_message .= "Content-Disposition: attachment; filename=\"leaves.png\"\r\n";
    $client_message .= "Content-Transfer-Encoding: base64\r\n";
    $client_message .= "X-Attachment-Id: leaves.png\r\n";
    $client_message .= "Content-ID: <leaves.png>\r\n\r\n";
    $client_message .= $encoded_leaves . "\r\n\r\n";

    // End of the message
    $client_message .= "--{$mime_boundary}--";

?>