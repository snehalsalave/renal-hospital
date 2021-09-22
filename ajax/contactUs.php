<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
      $firstName = !empty($_POST['first_name']) ? $_POST['first_name'] : '';
     $lastName = !empty($_POST['last_name']) ? $_POST['last_name'] : '';
     $Email = !empty($_POST['email']) ? $_POST['email'] : '';
      $msg= !empty($_POST['message']) ? $_POST['message']: '';
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    require_once('../Vendor/PHPMailer/src/PHPMailer.php');
    require_once('../Vendor/PHPMailer/src/SMTP.php');
    require_once('../Vendor/PHPMailer/src/Exception.php');

    //Load Composer's autoloader
    // require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
    // $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com.';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'snehalsalave130@gmail.com';                     //SMTP username
    $mail->Password   = '7038085932';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
        $mail->setFrom('snehalsalave130@gmail.com', 'snehal' ." ". 'salave');
        $mail->addAddress($Email ,$firstName ." ". $lastName);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
        $mail->Body    =  $msg;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        $_SESSION["success-msg"]=$_POST['first_name']."Your mail has been sent successfuly ! Thank you for your feedback";
        echo json_encode(["status"=>"success","msg"=>"Your mail has been sent successfuly ! Thank you for your feedback"]);
    //    header("location:contact.php");
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo json_encode(["status"=>"error","msg"=>"Your mail has been Not sent successfuly! "]);

        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}