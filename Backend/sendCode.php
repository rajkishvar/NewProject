<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php' ; 
    function generateOTP() {
        return sprintf("%06d", rand(0, 999999));
    }
    session_start();
    $userEmail = $_SESSION["email"];
    echo "$email";

    $otp = generateOTP();
    $_SESSION["otp"] = $otp;


    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
 
    try {
        // SMTP server settings (customize these)
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // SMTP server address
        $mail->SMTPAuth   = true;
        $mail->Username   = 'catherinianbuzz@gmail.com'; // SMTP username
        $mail->Password   = 'uyhgjfcctwllqfgb'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        // $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port       = 587; // TCP port to connect to

        // Recipients
        $mail->setFrom('catherinianbuzz@gmail.com', 'CatherinianBuzz.com');
        $mail->addAddress($userEmail); // User's email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Reset Password Code';  
        $mail->Body    = "Your Reset Password Code is : $otp";

        // Send the email
        $mail->send();
        
        // Redirect to OTP verification page
        header("location: ../verifyCode.php");
        exit;
    } catch (Exception $e) {
    
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


  ?>