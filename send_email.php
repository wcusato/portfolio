<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $to = "william.cusato@tufts.edu.com";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $full_message = "<h2>Contact Form Submission</h2>";
    $full_message .= "<p><strong>First Name:</strong> $first_name</p>";
    $full_message .= "<p><strong>Last Name:</strong> $last_name</p>";
    $full_message .= "<p><strong>Email:</strong> $email</p>";
    $full_message .= "<p><strong>Subject:</strong> $subject</p>";
    $full_message .= "<p><strong>Message:</strong><br>$message</p>";

    if (mail($to, $subject, $full_message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request.";
}
?>