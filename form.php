<?php
require_once('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = mysqli_real_escape_string($conn,$_POST["fullname"]);
    $phone_number = mysqli_real_escape_string($conn,$_POST["phone"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $subject = mysqli_real_escape_string($conn,$_POST["subject"]);
    $message = mysqli_real_escape_string($conn,$_POST["message"]);
    $ip_address = $_SERVER["REMOTE_ADDR"];
    $timestamp = date("Y-m-d H:i:s");
    // Validate input fields
    if (empty($full_name) || empty($phone_number) || empty($email) || empty($subject) || empty($message)) {
        echo "All fields are mandatory";
    } 
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    } 
    else if (!preg_match("/^[0-9]{10}$/", $phone_number)) {
        echo "Invalid phone number format";
    } 
    else if (strlen($subject) > 100) {
        echo "Subject is too long";
    }
    else if (strlen($message) > 500) {
        echo "Message is too long";
    }
    else {

            $sql = "INSERT INTO contact_form (full_name, phone_number, email, subject, message, ip_address, timestamp)
                    VALUES ('$full_name', '$phone_number', '$email', '$subject', '$message', '$ip_address', '$timestamp')";

            if (mysqli_query($conn, $sql)) {
                // Send email notification
                $to = "test@techsolvitservices.com";
                $subject_email = "New Form Submission";
                $message_email = "Name: $full_name\nPhone: $phone_number\nEmail: $email\nSubject: $subject\nMessage: $message";
                $header_email= "From: $email";

                mail($to, $subject_email, $message_email,$header_email);
                

                header("Location:success.php");

               
            } else {
                echo "Error: "  . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    }
?>
