<?php 
if(isset($_POST['rfNameform'])){
    $to = "kapil.chhabra@systematixindia.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $frn_email = $_POST['emailid'];
    $first_name = $_POST['rfName'];
    $last_name = $_POST['last_name'];
    $email = $_POST['emailid'];
    $invitation = $_POST['invitation'];
    $sender_name = $_POST['name'];
    $sender_email = $_POST['email'];
    $subject = "Form submission from people";
    $subject2 = "This is sender email";
    $subject3 = "This is friend email";
    $message = $first_name . " " . $sender_name . " wrote the following:" . "\n\n" . $_POST['invitation'];
    $message2 = "Here is a copy of sender email " . $first_name . "\n\n" . $_POST['invitation'];
    $message3 = "Here is a copy of friend email " . $first_name . "\n\n" . $_POST['invitation'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    $headers3 = "From:" . $frn_email;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    mail($frn_email,$subject3,$message3,$headers3);
    //echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    echo '<script>window.location.href="thank-you.php"</script>';
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>
