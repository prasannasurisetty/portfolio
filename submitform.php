<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Prepare the email to send to your inbox
    $to = "prasannasurisetty9@gmail.com"; // admin mail (mine)
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "You have received a new message from your portfolio contact form.\n\n".
                  "Name: $name\n".
                  "Email: $email\n\n".
                  "Message:\n$message\n";

    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirect to a thank you page (optional)
        echo "Message sent successfully! Thank you for contacting me.";
    } else {
        echo "Sorry, something went wrong. Please try again.";
    }
}
?>
