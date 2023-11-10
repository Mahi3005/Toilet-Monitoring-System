

<?php
$message = "";
$alertClass = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST["type"];
    $sector = $_POST["sector"];
    
    try {
        // Connect to your MySQL database here
        $db = new mysqli("localhost", "root", "dhruv@3005", "hackathon2023");

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        // Generate a custom toilet_id based on the selected sector and type
        $toilet_id = $sector . ($type == 'public' ? 'P' : 'C');
        
        // Get the next serial number for the combination of sector and type
        $sql = "SELECT MAX(SUBSTRING(toilet_id, -3)) AS max_serial FROM toiletregistrations WHERE toilet_id LIKE '$toilet_id%'";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
        $max_serial = $row['max_serial'];
        
        // Increment the serial number
        $next_serial = str_pad((int)$max_serial + 1, 3, '0', STR_PAD_LEFT);
        
        // Construct the final toilet_id
        $toilet_id .= $next_serial;

        // Insert the data into the table
        $sql = "INSERT INTO toiletregistrations (toilet_id, type, sector) VALUES ('$toilet_id', '$type', '$sector')";

        if ($db->query($sql) === TRUE) {
            $message = "Toilet registered successfully!  Toilet ID: $toilet_id";
            $alertClass = "alert-success"; // Green alert for success




require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

//Create an instance; passing true enables exceptions
$mail = new PHPMailer(true);

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'gecrdrive@gmail.com';                     //SMTP username
    $mail->Password   = 'gjpanjierbibjwgp';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
    $conn = new mysqli("localhost", "root", "dhruv@3005", "hackathon2023");
    $sqlquery = "SELECT inspectorregistrations.email
                FROM inspectorregistrations
                WHERE inspectorregistrations.sector = (SELECT sector FROM toiletregistrations WHERE toilet_id = '$toilet_id')";
    $result = mysqli_query($conn, $sqlquery);
    if ($result) {
      // Fetch the email address from the query result
      $row = mysqli_fetch_assoc($result);
      $email = $row['email'];
  
      // Now you have the inspector's email address
  }
    //Recipients
    $mail->setFrom('gecrdrive@gmail.com', 'Gandhinagar Municipal Corporation (Dummy)');
        //Add a recipient
    // $mail->addAddress('Mihirvyas6401@gmail.com'); 
    $mail->addAddress($email); 
    // $mail->addAddress('bhavikachhatbar2004@gmail.com','Bhavika'); 
   // $mail->addAddress('Mihirvyas6487@gmail.com','Mihir Vyas'); 
    //$mail->addAddress('joshijay075@gmail.com','Jay Jodhi');              //Name is optional
    $mail->addReplyTo('gecrdrive@gmail.com', 'Gandhinagar Municipal Corporation (Dummy)');
 
    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
 //   $mail->addAttachment('C:\Users\Mihir\Downloads\GaneshaWallpaper\Lalbaugcha_RajaP9AR.jpg', 'BappaMorya.jpg');    //Optional name

//OTP Generator : 
// $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification';
    $mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">
    <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="telephone=no" name="format-detection">
    <title>New message</title><!--[if (mso 16)]>
    <style type="text/css">
    a {text-decoration: none;}
    </style>
    <![endif]--><!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--><!--[if gte mso 9]>
    <xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG></o:AllowPNG>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
    <style type="text/css">
    .rollover:hover .rollover-first {
    max-height:0px!important;
    display:none!important;
    }
    .rollover:hover .rollover-second {
    max-height:none!important;
    display:inline-block!important;
    }
    .rollover div {
    font-size:0px;
    }
    u + .body img ~ div div {
    display:none;
    }
    #outlook a {
    padding:0;
    }
    span.MsoHyperlink,
    span.MsoHyperlinkFollowed {
    color:inherit;
    mso-style-priority:99;
    }
    a.es-button {
    mso-style-priority:100!important;
    text-decoration:none!important;
    }
    a[x-apple-data-detectors] {
    color:inherit!important;
    text-decoration:none!important;
    font-size:inherit!important;
    font-family:inherit!important;
    font-weight:inherit!important;
    line-height:inherit!important;
    }
    .es-desk-hidden {
    display:none;
    float:left;
    overflow:hidden;
    width:0;
    max-height:0;
    line-height:0;
    mso-hide:all;
    }
    .es-button-border:hover > a.es-button {
    color:#ffffff!important;
    }
    @media only screen and (max-width:600px) {.es-m-p0r { padding-right:0px!important } .es-m-p20b { padding-bottom:20px!important } .es-m-p0r { padding-right:0px!important } .es-m-p20b { padding-bottom:20px!important } .es-m-p0r { padding-right:0px!important } .es-m-p20b { padding-bottom:20px!important } .es-m-p0r { padding-right:0px!important } .es-m-p20b { padding-bottom:20px!important } .es-m-p0r { padding-right:0px!important } .es-m-p20b { padding-bottom:20px!important } *[class="gmail-fix"] { display:none!important } p, a { line-height:150%!important } h1, h1 a { line-height:120%!important } h2, h2 a { line-height:120%!important } h3, h3 a { line-height:120%!important } h4, h4 a { line-height:120%!important } h5, h5 a { line-height:120%!important } h6, h6 a { line-height:120%!important } h1 { font-size:30px!important; text-align:center; line-height:120%!important } h2 { font-size:26px!important; text-align:center; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h4 { font-size:24px!important; text-align:left } h5 { font-size:20px!important; text-align:left } h6 { font-size:16px!important; text-align:left } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px!important } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-header-body h4 a, .es-content-body h4 a, .es-footer-body h4 a { font-size:24px!important } .es-header-body h5 a, .es-content-body h5 a, .es-footer-body h5 a { font-size:20px!important } .es-header-body h6 a, .es-content-body h6 a, .es-footer-body h6 a { font-size:16px!important } .es-menu td a { font-size:16px!important } .es-header-body p, .es-header-body a { font-size:16px!important } .es-content-body p, .es-content-body a { font-size:14px!important } .es-footer-body p, .es-footer-body a { font-size:16px!important } .es-infoblock p, .es-infoblock a { font-size:12px!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3, .es-m-txt-c h4, .es-m-txt-c h5, .es-m-txt-c h6 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3, .es-m-txt-r h4, .es-m-txt-r h5, .es-m-txt-r h6 { text-align:right!important } .es-m-txt-j, .es-m-txt-j h1, .es-m-txt-j h2, .es-m-txt-j h3, .es-m-txt-j h4, .es-m-txt-j h5, .es-m-txt-j h6 { text-align:justify!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3, .es-m-txt-l h4, .es-m-txt-l h5, .es-m-txt-l h6 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-m-txt-r .rollover:hover .rollover-second, .es-m-txt-c .rollover:hover .rollover-second, .es-m-txt-l .rollover:hover .rollover-second { display:inline!important } .es-m-txt-r .rollover div, .es-m-txt-c .rollover div, .es-m-txt-l .rollover div { line-height:0!important; font-size:0!important } .es-spacer { display:inline-table } a.es-button, button.es-button { font-size:20px!important; line-height:120%!important } a.es-button, button.es-button, .es-button-border { display:inline-block!important } .es-m-fw, .es-m-fw.es-fw, .es-m-fw .es-button { display:block!important } .es-m-il, .es-m-il .es-button, .es-social, .es-social td, .es-menu { display:inline-block!important } .es-adaptive table, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .adapt-img { width:100%!important; height:auto!important } .es-mobile-hidden, .es-hidden { display:none!important } .es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } .es-social td { padding-bottom:10px } .h-auto { height:auto!important } p, ul li, ol li, a { font-size:16px!important } }
    </style>
    </head>
    <body class="body" style="width:100%;height:100%;padding:0;Margin:0">
    <div dir="ltr" class="es-wrapper-color" lang="en" style="background-color:#F6F6F6"><!--[if gte mso 9]>
    <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
    <v:fill type="tile" color="#f6f6f6"></v:fill>
    </v:background>
    <![endif]-->
    <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#F6F6F6">
    <tr>
    <td valign="top" style="padding:0;Margin:0">
    <table cellpadding="0" cellspacing="0" class="es-header" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important;background-color:transparent;background-repeat:repeat;background-position:center top">
    <tr>
    <td align="center" style="padding:0;Margin:0">
    <table class="es-header-body" cellspacing="0" cellpadding="0" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
    <tr>
    <td align="left" style="padding:10px;Margin:0">
    <table width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
    <tr>
    <td valign="top" align="center" style="padding:0;Margin:0;width:580px">
    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
    <tr>
    <td align="center" style="padding:0;Margin:0"><h1 style="Margin:0;font-family:arial, "helvetica neue", helvetica, sans-serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:30px;font-style:normal;font-weight:normal;line-height:36px;color:#004952">Gandhinagar Municipal &nbsp;Corporation</h1></td>
    </tr>
    </table></td>
    </tr>
    </table></td>
    </tr>
    </table></td>
    </tr>
    </table>
    <table class="es-content" cellspacing="0" cellpadding="0" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important">
    <tr>
    <td style="padding:0;Margin:0;background-color:#004952" bgcolor="#004952" align="center">
    <table class="es-content-body" cellspacing="0" cellpadding="0" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
    <tr>
    <td style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px;background-color:#004952" bgcolor="#004952" align="left">
    <table width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
    <tr>
    <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
    <tr>
    <td align="center" bgcolor="#004952" style="padding:0;Margin:0">
    <h3 style="Margin:0;font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:20px;font-style:normal;font-weight:normal;line-height:24px;color:#f2f2f2;">
      <span style="background:#004952; color:#f2f2f2;">E-Governance Email &nbsp;Verification</span>
    </h3>
  </td>
  
    </tr>
    </table></td>
    </tr>
    </table></td>
    </tr>
    </table></td>
    </tr>
    </table>
    <table class="es-content" cellspacing="0" cellpadding="0" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important">
    <tr></tr>
    <tr>
    <td align="center" style="padding:0;Margin:0">
    <table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
    <tr>
    <td align="left" style="padding:0;Margin:0">
    <table width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
    <tr>
    <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
    <tr>
    <td align="center" style="padding:0;Margin:0;font-size:0"><img class="adapt-img" src="https://ebhwjto.stripocdn.email/content/guids/CABINET_73533724c601879cbe4b3ff32a9862dda3a57079cb765598a4d332dc33affb3b/images/gmc_logo.png" alt="" width="600" style="display:block;font-size:14px;border:0;outline:none;text-decoration:none"></td>
    </tr>
    </table></td>
    </tr>
    </table></td>
    </tr>
    </table></td>
    </tr>
    </table>
    <table class="es-content" cellspacing="0" cellpadding="0" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important">
    <tr>
    <td align="center" style="padding:0;Margin:0">
    <table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
    <tr>
    <td align="left" style="Margin:0;padding-top:40px;padding-right:40px;padding-bottom:20px;padding-left:40px">
    <table width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
    <tr>
    <td valign="top" align="center" style="padding:0;Margin:0;width:520px">
    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
    <tr>
    <td esdev-links-color="#000000" align="left" style="padding:0;Margin:0"><h5 style="Margin:0;font-family:"times new roman", times, baskerville, georgia, serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:20px;font-style:normal;font-weight:normal;line-height:24px;color:#000">Dear Inspector,&nbsp;</h5><h5 style="Margin:0;font-family:"times new roman", times, baskerville, georgia, serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:20px;font-style:normal;font-weight:normal;line-height:24px;color:#000">This mail is send for kindly inform to you that a new Toilet is registered in your sector.<br> <h3 style="color: crimson;">Toilet ID : <span id="otpDisplay">' . $toilet_id . '</span>&nbsp;</h3><br></h5><h5 style="Margin:0;font-family:"times new roman", times, baskerville, georgia, serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:20px;font-style:normal;font-weight:normal;line-height:24px;color:#000">If you have any query regarding this then kindly contact the administrative departmant.</h5><h5 style="Margin:0;font-family:"times new roman", times, baskerville, georgia, serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:20px;font-style:normal;font-weight:normal;line-height:24px;color:#000"></h5><h5 style="Margin:0;font-family:"times new roman", times, baskerville, georgia, serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:20px;font-style:normal;font-weight:normal;line-height:24px;color:#000">Best regards,</h5><h5 style="Margin:0;font-family:"times new roman", times, baskerville, georgia, serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:20px;font-style:normal;font-weight:normal;line-height:24px;color:#000">Gandhinagar Municipal Corporation</h5></td>
    </tr>
    </table></td>
    </tr>
    </table></td>
    </tr>
    <tr>
    <td align="left" bgcolor="#004952" style="Margin:0;padding-right:40px;padding-left:40px;padding-top:10px;padding-bottom:10px;background-color:#004952">
    <table width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
    <tr>
    <td valign="top" align="center" style="padding:0;Margin:0;width:520px">
    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
    <tr>
    <td align="center" style="padding:0; Margin:0;">
  <h5 style="Margin:0; font-family:\'lucida sans unicode\', \'lucida grande\', sans-serif; mso-line-height-rule:exactly; letter-spacing:0; font-size:20px; font-style:normal; font-weight:normal; color:#f2f2f2; line-height:24px;">
    Clean India, Green India! &nbsp;
  </h5>
</td>
    </tr>
    </table></td>
    </tr>
    </table></td>
    </tr>
    <tr>
    <td align="left" style="Margin:0;padding-right:40px;padding-left:40px;padding-top:10px;padding-bottom:40px"><!--[if mso]><table style="width:520px" cellpadding="0" cellspacing="0"><tr><td style="width:135px"><![endif]-->
    <table class="es-left" cellspacing="0" cellpadding="0" align="left" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
    <tr>
    <td class="es-m-p0r es-m-p20b" align="center" style="padding:0;Margin:0;width:115px">
    <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-width:1px;border-style:dashed;border-color:#CCCCCC" width="100%" cellspacing="0" cellpadding="0" role="presentation">
    <tr>
    <td align="center" style="padding:0;Margin:0;font-size:0"><img class="adapt-img" src="https://ebhwjto.stripocdn.email/content/guids/CABINET_73533724c601879cbe4b3ff32a9862dda3a57079cb765598a4d332dc33affb3b/images/image3_3Y3.png" alt="" width="113" style="display:block;font-size:14px;border:0;outline:none;text-decoration:none"></td>
    </tr>
    </table></td>
    <td class="es-hidden" style="padding:0;Margin:0;width:20px"></td>
    </tr>
    </table><!--[if mso]></td><td style="width:135px"><![endif]-->
    <table class="es-left" cellspacing="0" cellpadding="0" align="left" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
    <tr>
    <td align="left" style="padding:0;Margin:0;width:115px">
    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
    <tr>
    <td align="center" style="padding:0;Margin:0;font-size:0"><img class="adapt-img" src="https://ebhwjto.stripocdn.email/content/guids/CABINET_73533724c601879cbe4b3ff32a9862dda3a57079cb765598a4d332dc33affb3b/images/image2.jpeg" alt="" width="115" style="display:block;font-size:14px;border:0;outline:none;text-decoration:none"></td>
    </tr>
    </table></td>
    <td class="es-hidden" style="padding:0;Margin:0;width:20px"></td>
    </tr>
    </table><!--[if mso]></td><td style="width:115px"><![endif]-->
    <table class="es-left" cellspacing="0" cellpadding="0" align="left" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
    <tr>
    <td class="es-m-p0r es-m-p20b" align="center" style="padding:0;Margin:0;width:115px">
    <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-width:1px;border-style:dashed;border-color:#CCCCCC" width="100%" cellspacing="0" cellpadding="0" role="presentation">
    <tr>
    <td align="center" style="padding:0;Margin:0;font-size:0"><img class="adapt-img" src="https://ebhwjto.stripocdn.email/content/guids/CABINET_73533724c601879cbe4b3ff32a9862dda3a57079cb765598a4d332dc33affb3b/images/image4.jpeg" alt="" width="113" style="display:block;font-size:14px;border:0;outline:none;text-decoration:none"></td>
    </tr>
    </table></td>
    </tr>
    </table><!--[if mso]></td><td style="width:20px"></td><td style="width:115px"><![endif]-->
    <table class="es-right" cellspacing="0" cellpadding="0" align="right" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
    <tr>
    <td align="left" style="padding:0;Margin:0;width:115px">
    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
    <tr>
    <td align="center" style="padding:0;Margin:0;font-size:0"><img class="adapt-img" src="https://ebhwjto.stripocdn.email/content/guids/CABINET_73533724c601879cbe4b3ff32a9862dda3a57079cb765598a4d332dc33affb3b/images/image5.png" alt="" width="115" style="display:block;font-size:14px;border:0;outline:none;text-decoration:none"></td>
    </tr>
    </table></td>
    </tr>
    </table><!--[if mso]></td></tr></table><![endif]--></td>
    </tr>
    </table></td>
    </tr>
    </table>
    <table cellpadding="0" cellspacing="0" class="es-footer" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important;background-color:transparent;background-repeat:repeat;background-position:center top">
    <tr>
    <td align="center" style="padding:0;Margin:0">
    <table class="es-footer-body" cellspacing="0" cellpadding="0" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#EAEBF0;width:600px">
    <tr>
    <td align="left" style="padding:0;Margin:0;padding-bottom:5px;padding-right:20px;padding-left:20px"><!--[if mso]><table style="width:560px" cellpadding="0" cellspacing="0"><tr><td style="width:194px"><![endif]-->
    <table class="es-left" cellspacing="0" cellpadding="0" align="left" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
    <tr>
    <td class="es-m-p0r es-m-p20b" align="center" style="padding:0;Margin:0;width:174px">
    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
    <tr>
    <td align="center" style="padding:0;Margin:0">
  <span class="es-button-border" style="border-style:solid;border-color:#FFFFFF;background:#004952;border-width:0px;display:inline-block;border-radius:0px;width:auto">
    <a class="es-button" target="_blank" href="https://gandhinagarmunicipal.com/news/" style="mso-style-priority:100 !important;text-decoration:none !important;mso-line-height-rule:exactly;font-family:arial, &quot;helvetica neue&quot;, helvetica, sans-serif;font-size:16px;color:#f2f2f2;padding:10px 20px 10px 20px;display:inline-block;background:#004952;border-radius:0px;font-weight:normal;text-decoration:none;font-style:normal;line-height:19px;width:auto;text-align:center;letter-spacing:0;mso-padding-alt:0;mso-border-alt:10px solid #004952">News And Updates</a>
  </span>
</td>

    </tr>
    </table></td>
    <td class="es-hidden" style="padding:0;Margin:0;width:20px"></td>
    </tr>
    </table><!--[if mso]></td><td style="width:173px"><![endif]-->
    <table class="es-left" cellspacing="0" cellpadding="0" align="left" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
    <tr>
    <td class="es-m-p0r es-m-p20b" align="center" style="padding:0;Margin:0;width:173px">
    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
    <tr>
    <td align="center" style="padding:0;Margin:0">
    <span class="es-button-border" style="border-style:solid;border-color:#FFFFFF;background:#004952;border-width:0px;display:inline-block;border-radius:0px;width:auto">
      <a href="https://www.facebook.com/profile.php?id=100065268859855" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none !important;mso-line-height-rule:exactly;font-family:arial, &quot;helvetica neue&quot;, helvetica, sans-serif;font-size:16px;color:#f2f2f2;padding:10px 20px 10px 20px;display:inline-block;background:#004952;border-radius:0px;text-decoration:none;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center;letter-spacing:0;mso-padding-alt:0;mso-border-alt:10px solid #004952">Facebook</a>
    </span>
  </td>
  

    </tr>
    </table></td>
    </tr>
    </table><!--[if mso]></td><td style="width:20px"></td><td style="width:173px"><![endif]-->
    <table class="es-right" cellspacing="0" cellpadding="0" align="right" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
    <tr>
    <td class="es-m-p0r es-m-p20b" align="center" style="padding:0;Margin:0;width:173px">
    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
    <tr>
    <td align="center" style="padding:0;Margin:0">
    <span class="es-button-border" style="border-style:solid;border-color:#FFFFFF;background:#004952;border-width:0px;display:inline-block;border-radius:0px;width:auto">
      <a class="es-button" target="_blank" href="https://gandhinagarmunicipal.com/emergency-contact/" style="mso-style-priority:100 !important;text-decoration:none !important;mso-line-height-rule:exactly;font-family:arial, &quot;helvetica neue&quot;, helvetica, sans-serif;font-size:16px;color:#f2f2f2;padding:10px 20px 10px 20px;display:inline-block;background:#004952;border-radius:0px;font-weight:normal;text-decoration:none;font-style:normal;line-height:19px;width:auto;text-align:center;letter-spacing:0;mso-padding-alt:0;mso-border-alt:10px solid #004952">Important Contacts</a>
    </span>
  </td>
    </tr>    </div>
    <script>
    document.getElementById("otpDisplay").addEventListener("click", copyOTP);

    function copyOTP() {
        var otpText = document.getElementById("otpDisplay");
        var range = document.createRange();
        range.selectNode(otpText);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        document.execCommand("copy");
        window.getSelection().removeAllRanges();
        alert("OTP copied to clipboard: " + otpText.textContent);
    }
    
  </script>

    </body>
    </html>';
        } 
      
       
        else {
            $message = "Error: " . $sql . "<br>" . $db->error;
            $alertClass = "alert-danger"; // Red alert for error
        }
        $mail->send();
        $db->close();
    } 
    catch (Exception $e) {
      $message = "An error occurred: " . $e->getMessage();
      $alertClass = "alert-danger"; // Red alert for exception
  }
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toilet Registration</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    h2.mb-4.text-center {
      background-color: #004953;
      color: white;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .container {
      margin: 0 auto; /* Center the container */
      width: 80%; /* Set the container width to control form width */
    }

    .form-group {
      margin-bottom: 1rem;
    }

    input.form-control {
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 1rem;
    }

    button.btn-primary {
      background-color: #004953;
      color: white;
      border: 1px solid #004953;
      border-radius: 4px;
      font-size: 1rem;
      height: 40px; /* Set the button height */
      width: 30%; /* Make the button width 100% of its container */
    }

    button.btn-primary:hover {
      background-color: #004953;
    }

    .select-container {
      display: inline-block; /* Display the containers side by side */
      width: 48%; /* Adjust the width as needed (48% allows for some spacing) */
      margin-right: 2%; /* Add some margin between the containers */
    }

    /* To clear the right margin of the last container */
    .select-container:last-child {
      margin-right: 0;
    }

    .custom-button {
  background-color: #004953;
  color: white;
  border: 1px solid #004953;
  border-radius: 4px;
  font-size: 1rem;
  height: 40px;
  width: 30%;
  display: block; /* To make it a block element for centering */
  margin: 0 auto; /* Center the button horizontally */
  margin-top: 20px; /* Add some top margin for spacing */
}

.custom-button:hover {
  background-color: #004953;
}

  </style>
</head>
<body>
  
<div class="container mt-5" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 50px; border: 2px solid #ccc; border-radius: 10px;">
    <h2 class="mb-4 text-center">Toilet Registration</h2>
    <?php
    if (!empty($message)) {
        echo '<div style="font-weight:bold;" class=" text-center alert ' . $alertClass . '">' . $message . '</div>';
    }
    ?>
    
    <form action="toiletregistration.php" method="POST">
      <div class="form-group">
        <div class="select-container">
          <label for="type" class="font-weight-bold">Select Toilet Type</label>
          <select class="form-control" id="type" name="type" required>
            <option value="">Select Type</option>
            <option value="public">Public</option>
            <option value="community">Community</option>
          </select>
        </div>
        <div class="select-container">
          <label for="sector" class="font-weight-bold">Select Sector</label>
          <select class="form-control" id="sector" name="sector" required>
            <option value="">Select Sector</option>
            <option value="1">Sector 1</option>
  <option value="2">Sector 2</option>
  <option value="3">Sector 3</option>
  <option value="4">Sector 4</option>
  <option value="5">Sector 5</option>
  <option value="6">Sector 6</option>
  <option value="7">Sector 7</option>
  <option value="8">Sector 8</option>
  <option value="9">Sector 9</option>
  <option value="10">Sector 10</option>
  <option value="11">Sector 11</option>
  <option value="12">Sector 12</option>
  <option value="13">Sector 13</option>
  <option value="14">Sector 14</option>
  <option value="15">Sector 15</option>
  <option value="16">Sector 16</option>
  <option value="17">Sector 17</option>
  <option value="18">Sector 18</option>
  <option value="19">Sector 19</option>
  <option value="20">Sector 20</option>
  <option value="21">Sector 21</option>
  <option value="22">Sector 22</option>
  <option value="23">Sector 23</option>
  <option value="24">Sector 24</option>
  <option value="25">Sector 25</option>
  <option value="26">Sector 26</option>
  <option value="27">Sector 27</option>
  <option value="28">Sector 28</option>
  <option value="29">Sector 29</option>
  <option value="30">Sector 30</option>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-primary custom-button">Register</button>
    </form>
  </div>
</body>
</html>