<?php
  use PHPMailerPHPMailerPHPMailer;
  use PHPMailerPHPMailerException;

  require 'vendor/phpmailer/phpmailer/src/Exception.php';
  require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require 'vendor/autoload.php';
  // Create object of PHPMailer class
  $mail = new PHPMailer(true);

  $output = '';

  if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];

    $to = 'patelaman1653@gmail.com';
    $message = "Name: $name\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email\n";

    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = '';
      $mail->Password = '';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;

      $mail->setFrom('your_email@gmail.com');
      // Recipient Email ID where you want to receive emails
      $mail->addAddress('patelaman1653@gmail.com');

      $mail->isHTML(true);
      $mail->Subject = 'Form Submission';
      $mail->Body = "<h3>Name : $name <br>Email : $email <br>Message : $message</h3>";

      $mail->send();
      $output = "<div class='alert alert-success'>
                  <h5>Thankyou! for contacting us, We'll get back to you soon!</h5>
                </div>';
    } catch (Exception $e) {
      $output = '<div class='alert alert-danger'>
                  <h5>' . $e->getMessage() . '</h5>
                </div>";
    }
  }

?>