<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture the form data
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $user_email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Prepare the email
    $to = $user_email; // Email the user provided
    $subject = "Thank you for contacting us, $first_name!";
    $body = "Hello $first_name $last_name,\n\nThank you for your message:\n\n$message\n\nWe will get back to you soon!";
    $headers = "From: noreply@yourdomain.com"; // Change to your domain

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Email sent successfully to $user_email!";
    } else {
        echo "Failed to send email.";
    }
}
?>
