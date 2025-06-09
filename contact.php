<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Set the recipient email address
    $to = "prasannasurisetty9@gmail.com";  // Replace with your actual email

    // Prepare email subject and body
    $email_subject = "Contact Form: $subject";
    $email_body = "Name: $name\nEmail: $email\n\nMessage:\n$message\n";
    $headers = "From: $email\nReply-To: $email";

    // Try to send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        $success_message = "Message sent successfully!";
    } else {
        $error_message = "Failed to send the message. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact page of Prasanna Surisetty. Reach out for inquiries and collaborations.">
    <title>Contact Me - Prasanna Surisetty</title>
    <link rel="stylesheet" href="portfolio.css">
    <style>
        /* Add your styling here */
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <a href="#" class="logo">Portfolio</a>
        <nav class="navbar">
            <a href="home.html">Home</a>
            <a href="about.html">About</a>
            <a href="skills.html">Skills</a>
            <a href="projects.html">Projects</a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>

    <!-- Contact Section -->
    <section class="contact">
        <div class="contact-content">
            <h1>Contact Me</h1>
            <p>If you have any questions or would like to work together, feel free to reach out!</p>

            <!-- Display success or error message -->
            <?php if (isset($success_message)): ?>
                <p style="color: green;"><?php echo $success_message; ?></p>
            <?php elseif (isset($error_message)): ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <div class="form-container">
                <form action="contact.php" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Prasanna Surisetty | All Rights Reserved</p>
    </footer>
</body>
</html>
