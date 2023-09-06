<?php
require_once "../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable("../../");
$dotenv->load();

class Email {

    public static function requestEmail($email, $requestNumber) {
        //Use PHPMailer to send email
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'donotreply@wellredbookshelves.com';
        $mail->Password = $_ENV['EMAIL_PW'];
        $mail->Port = 587;
        $mail->setFrom('donotreply@wellredbookshelves.com', 'Well Red Bookshelves');
        $mail->addAddress($email);
        $mail->isHTML(TRUE);
        $mail->Subject = 'Well Red Book Request Confirmation';
        $mail->Body = "Thank you for your request. Your request number is " . $requestNumber . ". Please use this number to check the status of your request <a href='https://wellredbookshelves.com/lookup/lookup.php'>here</a>. <br/>
            Thank you for your patronage! <br/>
            Well Red <br/>
            <img src='https://wellredbookshelves.com/img/wellredfox.png' alt='Well Red Bookshelves Logo' width='100' height='100'>";
        $mail->send();
    }

    public static function reserveEmail($email, $reservationNumber) {
        //Use PHPMailer to send email
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'donotreply@wellredbookshelves.com';
        $mail->Password = $_ENV['EMAIL_PW'];
        $mail->Port = 587;
        $mail->isHTML(TRUE);
        $mail->setFrom('donotreply@wellredbookshelves.com', 'Well Red Bookshelves');
        $mail->addAddress($email);
        $mail->Subject = 'Well Red Book Reservation Confirmation';
        $mail->Body = "Thank you for your reservation. Your reservation number is " . $reservationNumber . ". Please use this number to check the status of your reservation <a href='https://wellredbookshelves.com/lookup/lookup.php'>here</a>. <br/>
            Thank you for your patronage! <br/>
            Well Red <br/>
            <img src='https://wellredbookshelves.com/img/wellredfox.png' alt='Well Red Bookshelves Logo' width='100' height='100'>";
        $mail->send();
    }

    public static function reservationReady($email, $reservationNumber) {
        //Use PHPMailer to send email
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'donotreply@wellredbookshelves.com';
        $mail->Password = $_ENV['EMAIL_PW'];
        $mail->Port = 587;
        $mail->isHTML(TRUE);
        $mail->setFrom('donotreply@wellredbookshelves.com', 'Well Red Bookshelves');
        $mail->addAddress($email);
        $mail->Subject = 'Well Red Book Reservation Ready';
        $mail->Body = "Your reserved book is ready for pickup! Your reservation number is " . $reservationNumber . ". Please use this number to check the status of your reservation <a href='https://wellredbookshelves.com/lookup/lookup.php'>here</a>. <br/>
            Your book will be held for one week from the date of this email before being returned to the shelf. <br/>
            Thank you for your patronage! <br/>
            Well Red <br/>
            <img src='https://wellredbookshelves.com/img/wellredfox.png' alt='Well Red Bookshelves Logo' width='100' height='100'>";
        $mail->send();
    }

    public static function requestCanceled($email, $requestNumber) {
        //Use PHPMailer to send email
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'donotreply@wellredbookshelves.com';
        $mail->Password = $_ENV['EMAIL_PW'];
        $mail->Port = 587;
        $mail->isHTML(TRUE);
        $mail->setFrom('donotreply@wellredbookshelves.com', 'Well Red Bookshelves');
        $mail->addAddress($email);
        $mail->Subject = 'Well Red Book Request Canceled';
        $mail->Body = "We're sorry, your request has been canceled. This is likely due to us not being able to find a copy of the book or our publisher not carrying it. <br/>
            Your request number is " . $requestNumber . ". Please use this number to check the status of your request <a href='https://wellredbookshelves.com/lookup/lookup.php'>here</a>. <br/>
            Thank you for your patronage! <br/>
            Well Red <br/>
            <img src='https://wellredbookshelves.com/img/wellredfox.png' alt='Well Red Bookshelves Logo' width='100' height='100'>";
    }
}

?>