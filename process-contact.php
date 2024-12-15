<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate form inputs
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    // Admin's WhatsApp phone number (include country code without '+')
    $admin_whatsapp_number = "8504924899"; // Replace with your WhatsApp number (without '+')

    // Construct the message to be sent on WhatsApp
    $whatsapp_message = urlencode("New Contact Form Submission\n\n");
    $whatsapp_message .= urlencode("Name: $name\n");
    $whatsapp_message .= urlencode("Email: $email\n");
    $whatsapp_message .= urlencode("Subject: $subject\n\n");
    $whatsapp_message .= urlencode("Message: $message");

    // WhatsApp URL to open the app with the pre-filled message
    $whatsapp_url = "https://wa.me/$admin_whatsapp_number?text=$whatsapp_message";

    // Redirect to WhatsApp with the message
    header("Location: $whatsapp_url");
    exit;
}
?>
