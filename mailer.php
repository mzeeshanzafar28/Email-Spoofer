<?php

$to = $_POST['r_email'];
$subject = $_POST['subject'];
$message = $_POST['message'];  

$sender_name = $_POST['s_name'];
$sender_email = $_POST['s_email'];

$random_hash = md5(date('r', time())); 

$headers = "From: " . $sender_name . " <" . $sender_email . ">\r\n";
$headers .= "Reply-To: " . $sender_email . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$mail_sent = mail($to, $subject, $message, $headers);

if ($mail_sent) {
    echo "
    <html>
    <head>
        <title>Success :)</title>
    </head>
    <body>
        <script>
            alert('Email Sent Successfully!');
            window.location.replace('index.html');
        </script>
    </body>
    </html>";
} else {
    echo "
    <html>
    <head>
        <title>Failed :(</title>
    </head>
    <body>
        <script>
            alert('Failed to Send Email!');
            window.location.replace('index.html');
        </script>
    </body>
    </html>";
}

?>
