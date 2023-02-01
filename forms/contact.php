<?php
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $subject = $_POST['subject'];

  $to = 'patelaman1653@gmail.com';
  $message = "Name: $name\nEmail: $email\nMessage:\n$message";
  $headers = "From: $email\n";

  if (mail($to, $subject, $message, $headers)) {
    echo 'Your message was sent successfully!';
  } else {
    echo 'There was an error sending your message. Please try again later.';
  }
} else {
  echo 'Please fill out all required fields.';
}
