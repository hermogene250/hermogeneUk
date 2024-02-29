<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>

<?php
// Define variables and initialize with empty values
$name = $email = $message = "";
$name_err = $email_err = $message_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email address.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate message
    if (empty(trim($_POST["message"]))) {
        $message_err = "Please enter your message.";
    } else {
        $message = trim($_POST["message"]);
    }

    // If no errors, send email
    if (empty($name_err) && empty($email_err) && empty($message_err)) {
        $to = "hermogene2001@gmail.com"; // Change this to your email address
        $subject = "Contact Form Submission";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        if (mail($to, $subject, $body)) {
            echo "<p>Your message has been sent successfully. Thank you!</p>";
        } else {
            echo "<p>Oops! Something went wrong. Please try again later.</p>";
        }
    }
}
?>

<h2>Contact Us</h2>
<p>Please fill in this form to contact us.</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div>
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <span><?php echo $name_err; ?></span>
    </div>
    <div>
        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <span><?php echo $email_err; ?></span>
    </div>
    <div>
        <label>Message:</label>
        <textarea name="message"><?php echo $message; ?></textarea>
        <span><?php echo $message_err; ?></span>
    </div>
    <div>
        <input type="submit" value="Submit">
    </div>
</form>

</body>
</html>
