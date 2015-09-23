<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'web32.dnchosting.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'dms@ncdesigns-studio.com';

//Password to use for SMTP authentication
$mail->Password = 'Readne1312!';

$message='<div class="invalid">The following errors occurred:<br />';
$problem=FALSE;
$message='<div class="invalid">The following errors occurred:<br />';
            $problem=FALSE;
            if (!preg_match("/^[[:alpha:].'-]{4,}$/", stripslashes(trim($_POST['First_Name'])))) {
                $problem=TRUE;
                $message.='<p>Please enter a valid first name.</p>';
            }
            if (!preg_match("/^[[:alpha:].'-]{4,}$/", stripslashes(trim($_POST['Last_Name'])))) {
                $problem=TRUE;
                $message.='<p>Please enter a valid last name.</p>';
            }
            if (!preg_match("/^[[:alnum:]][a-zA-Z0-9_\.\#\' \-]{2,60}$/", stripslashes(trim($_POST['Home_Address'])))) {
                $problem=TRUE;
                $message.='<p>Please enter a valid home address.</p>';
            }
            if (!preg_match("/^[[:alnum:]][a-zA-Z0-9_\.\#\' \-]{2,60}$/", stripslashes(trim($_POST['City'])))) {
                $problem=TRUE;
                $message.='<p>Please enter a valid city.</p>';
            }
            if (!preg_match("/^(A[LKSZRAP]|C[AOT]|D[EC]|F[LM]|G[AU]|HI|I[ADL N]|K[SY]|LA|M[ADEHINOPST]|N[CDEHJMVY]|O[HKR]|P[ARW]|RI|S[CD] |T[NX]|UT|V[AIT]|W[AIVY])$/", stripslashes(trim($_POST['State'])))) {
                $problem=TRUE;
                $message.='<p>Please enter a state abbreviation.</p>';
            }
            if (!preg_match("/^[0-9]{5,5}([- ]?[0-9]{4,4})?$/", stripslashes(trim($_POST['Zip_Code'])))) {
                $problem=TRUE;
                $message.='<p>Please enter a zip code.</p>';
            }
            if (!preg_match("/^[[:alnum:]][a-z0-9_.-}*@[a-z0-9.-]+\.[a-z]{2,4}$/", stripslashes(trim($_POST['Email'])))) {
                $problem=TRUE;
                $message.='<p>Please enter a valid email address.</p>';
            }
            if (!preg_match("/^\(?[2-9][0-8][0-9]\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/", stripslashes(trim($_POST['Phone'])))) {
                $problem=TRUE;
                $message.='<p>Please enter a valid phone number.</p>';
            }
            if (!preg_match("/^[[:alpha:] .'-]{4,}$/", stripslashes(trim($_POST['High_School'])))) {
                $problem=TRUE;
                $message.='<p>Please enter a valid high school name.</p>';
            }
            if (!$problem) {
                $firstname = $_POST['First_Name'];
                $lastname = $_POST['Last_Name'];
                $homeaddress = $_POST['Home_Address'];
                $city = $_POST['City'];
                $state = $_POST['State'];
                $zipcode = $_POST['Zip_Code'];
                $email = $_POST['Email'];
                $phone = $_POST['Phone'];
                $currentposition = $_POST['Current_Position'];
                $companyone = $_POST['Company_One'];
                $locationone = $_POST['Location_One'];
                $highschool = $_POST['High_School'];
                $body = "<h1 style='color: #005F5F;'>Online Application @ DMS</h1>";
                foreach ($_POST as $post_field => $post_value) {
                    $body .= "<p style='font-family:arial,sans-serif!important;font-size:12px;font-weight:400;'>" . $post_field . ": " . $post_value . "</p>";
                }
            } else {
    echo file_get_contents('inc/header.inc');
    echo file_get_contents('inc/topNav.inc');
    echo ("<div id='screenContainer'>
<div id='content'>
<div id='companyTest'>
    <p class='pageIntro'>Our clients will tell you you know how we bring them an increase in pay, organization, and peace of mind.</p>
    <p class='testimonial'><span class='ldquo'></span><a href='testimonials.php#NCorreia'>Due to Tim&rsquo;s diligence in overseeing the company&rsquo;s activities, I consider DMS as the ideal client &hellip;</a><span class='rdquo'></span></p>
</div>
<div id='pageContentStandard'>
    <h1>careers</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    $message
    <FORM><INPUT Type='button' VALUE='Back' onClick='history.go(-1);return true;'></FORM>
    </div>
    </div>");
    echo file_get_contents('inc/sideBar.inc');
    echo file_get_contents('inc/footerCareers.inc');
    echo ("</body></html>");
}

//Set who the message is to be sent from
$mail->setFrom('from-dms@ncdesigns-studio.com', 'Nelson Correia');

//Set an alternative reply-to address
$mail->addReplyTo('nelson@ncdesigns-studio.com', 'Nelson Correia');

//Set who the message is to be sent to
$mail->addAddress('tim@doctorsmanagementservice.org', 'Timothy Dibona');
$mail->addAddress('nelson@ncdesigns-studio.com', 'Nelson Correia');

//Set the subject line
$mail->Subject = 'Online Application';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($body, dirname(__FILE__));

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
$mail->addAttachment('PHPMailer/examples/images/phpmailer_mini.png');

//send the message, check for errors

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo file_get_contents('inc/header.inc');
    echo file_get_contents('inc/topNav.inc');
    echo ("<div id='screenContainer'>
    <div id='content'>
        <div id='companyTest'>
            <p class='pageIntro'>Our clients will tell you you know how we bring them an increase in pay, organization, and peace of mind.</p>
            <p class='testimonial'><span class='ldquo'></span><a href='testimonials.php#NCorreia'>Due to Tim&rsquo;s diligence in overseeing the company&rsquo;s activities, I consider DMS as the ideal client &hellip;</a><span class='rdquo'></span></p>
        </div>
        <div id='pageContentStandard'>
            <h1>careers</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Thank you for your interest in employment with Doctors&rsquo; Management Services. Your information has been submitted and we will get in contact as soon as our team reviews your application.</p>
    </div>");
    echo file_get_contents('inc/sideBar.inc');
    echo file_get_contents('inc/footerCareers.inc');
    echo ("</body></html>");
}