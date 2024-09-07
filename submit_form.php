<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars($_POST['first-name']);
    $lastName = htmlspecialchars($_POST['last-name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $to = "akajansivakumaran@gmail.com";
    $email_subject = "Contact Form Submission: $subject";
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $email_subject, $message, $headers)) {
        // Redirect to a thank you page (optional)
        header("Location: thank_you.html");
        exit;
    } else {
        echo "There was a problem sending your email. Please try again.";
    }
} else {
    echo "Form submission error!";
}
