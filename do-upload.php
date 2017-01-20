<?php
require("../../PHPMailer_5.2.0/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.aussietranslations.com.au';                 // Specify main and backup server
$mail->Port = 587;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'office@aussietranslations.com.au';                // SMTP username
$mail->Password = 'XINEemail22!!';                  // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

if(isset($_POST['getcallbackname'])) {
    $name = $_POST['getcallbackname'];
    $phone = $_POST['getcallbackphone'];
    $mail->From = 'google@aussietranslations.com.au';
    $mail->FromName = 'Quick Quote Aussie Translation';
    //	$mail->AddAddress($to,$name);  // Add a recipient
    $mail->AddAddress('office@aussietranslations.com.au');               // Name is optional
    $mail->IsHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Online Enquiry at Aussie Translations';
    $mail->Body    = '<html>
				<head>
					<title>Online Enquiry at Aussie Translations</title>
				</head>
				<body>
					<h1>Online Enquiry!</h1>
					<table cellspacing="1" style="border: 2px dashed #FB4314; height: 200px;">
						<tr>
							<th>Name:</th><td>'.$name.'</td>
						</tr>
						<tr style="background-color: #e0e0e0;">
							<th>Phone:</th><td>'.$phone.'</td>
						</tr>
						<tr>
							<th>Website:</th><td><a href="http://aussietranslations.com.au/">aussietranslations.com.au</a></td>
						</tr>
					</table>
				</body>
				</html>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->Send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }
    echo 'Message has been sent';
}else if(isset($_FILES["file"]["type"])) {
    if ($_FILES['file']['size'] != 0) {
        $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
        //$targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored
        $targetPath = 'upload/' . date('Y-m-d-H-i-s') . '_' . uniqid() .$_FILES['file']['name'];
        move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
    }

    $to = $_POST['email'];
    $name = $_POST['username'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $mail->From = $to;
    $mail->FromName = $to;
    //$mail->AddAddress($to,$name);  // Add a recipient
    $mail->AddAddress('office@aussietranslations.com.au'); // Name is optional
    if ($_FILES['file']['size'] != 0) {
        $mail->AddAttachment($targetPath);
    }
    //$mail->AddAttachment("upload/".$_FILES['file']['name']);
    //$mail->AddAttachment($_FILES['file']['tmp_name'],$_FILES['file']['name']);

    $mail->IsHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Online Enquiry at Aussie Translations';
    $mail->Body    = '<html>
				<head>
					<title>Online Enquiry at Aussie Translations</title>
				</head>
				<body>
					<h1>Online Enquiry</h1>
					<table cellspacing="1" style="border: 2px dashed #FB4314; height: 200px;">
						<tr>
							<th>Name:</th><td>'.$name.'</td>
						</tr>
						<tr style="background-color: #e0e0e0;">
							<th>Email:</th><td>'.$to.'</td>
						</tr>
						<tr>
							<th>Phone:</th><td>'.$phone.'</td>
						</tr>
						<tr>
							<th>Message:</th><td>'.$message.'</td>
						</tr>
						<tr>
							<th>Website:</th><td><a href="http://aussietranslations.com.au/">aussietranslations.com.au</a></td>
						</tr>
					</table>
				</body>
				</html>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->Send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }
    echo 'Message has been sent';
}else if(isset($_FILES["filequ"]["type"])) {

    if ($_FILES['filequ']['size'] != 0) {

        $sourcePath = $_FILES['filequ']['tmp_name']; // Storing source path of the file in a variable
        //$targetPath = "upload/".$_FILES['filequ']['name']; // Target path where file is to be stored
        $targetPath = 'upload/' . date('Y-m-d-H-i-s') . '_' . uniqid() .$_FILES['filequ']['name'];
        move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
    }
    $to = $_POST['email'];
    $fname = $_POST['username'];
    $lname = $_POST['lastname'];
    $message = $_POST['message'];
    $mail->From = $to;
    $mail->FromName = $to;
    //$mail->AddAddress($to,$fname);  // Add a recipient
    $mail->AddAddress('office@aussietranslations.com.au');               // Name is optional
    if ($_FILES['filequ']['size'] != 0) {
        $mail->AddAttachment($targetPath);
    }
    //$mail->AddAttachment("upload/".$_FILES['filequ']['name']);
    //$mail->AddAttachment($_FILES['file']['tmp_name'],$_FILES['file']['name']);

    $mail->IsHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Online Enquiry at Aussie Translations';
    $mail->Body    = '<html>
				<head>
					<title>Online Enquiry at Aussie Translations</title>
				</head>
				<body>
					<h1>Online Enquiry</h1>
					<table cellspacing="1" style="border: 2px dashed #FB4314; height: 200px;">
						<tr>
							<th>First Name:</th><td>'.$fname.'</td>
						</tr>
						<tr>
							<th>Last Name:</th><td>'.$lname.'</td>
						</tr>
						<tr>
							<th>Message:</th><td>'.$message.'</td>
						</tr>
						<tr style="background-color: #e0e0e0;">
							<th>Email:</th><td>'.$to.'</td>
						</tr>
						<tr>
							<th>Website:</th><td><a href="http://aussietranslations.com.au/">aussietranslations.com.au</a></td>
						</tr>
					</table>
				</body>
				</html>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->Send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }
    echo 'Message has been sent';
}else if(isset($_POST["uploaded_files"])) {
     $to = $_POST['email1'];
    $fname = $_POST['username1'];
    //$lname = $_POST['lastname1'];
    $phnum = $_POST['phonenum'];
    $cmname = $_POST['companynm'];
    $message = $_POST['message1'];
    $mail->From = $to;
    $mail->FromName = $to;
    //$mail->AddAddress($to,$fname);  // Add a recipient
    //$mail->AddAddress('kapil.chhabra@systematixindia.com');               // Name is optional
    //$mail->AddAddress('shrikant.soni@systematixindia.com');
    $mail->AddAddress('office@aussietranslations.com.au');

    if (!empty($_POST["uploaded_files"])) {
        $uploadedFiles = explode('|', $_POST["uploaded_files"]);

        if(count($uploadedFiles) > 0) {
            foreach($uploadedFiles as $file) {
                $targetPath = '../uploads/'.$file;
                $mail->AddAttachment($targetPath);
            }
        }

    }

    //$mail->AddAttachment("upload/".$_FILES['filege']['name']);
    //$mail->AddAttachment($_FILES['file']['tmp_name'],$_FILES['file']['name']);

    $mail->IsHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Online Enquiry at Aussie Translations';
    $mail->Body    = '<html>
				<head>
					<title>Online Enquiry at Aussie Translations</title>
				</head>
				<body>
					<h1>Online Enquiry</h1>
					<table cellspacing="1" style="border: 2px dashed #FB4314; height: 200px;">
						<tr>
							<th>Name:</th><td>'.$fname.'</td>
						</tr>
						<tr style="background-color: #e0e0e0;">
							<th>Email:</th><td>'.$to.'</td>
						</tr>
						<tr>
							<th>Phone:</th><td>'.$phnum.'</td>
						</tr>
						<tr>
							<th>Business(if any):</th><td>'.$cmname.'</td>
						</tr>
						<tr>
							<th>Message:</th><td>'.$message.'</td>
						</tr>

						<tr>
							<th>Website:</th><td><a href="http://aussietranslations.com.au/">aussietranslations.com.au</a></td>
						</tr>
					</table>
				</body>
				</html>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->Send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }
    echo 1;
}else if(isset($_FILES["filejo"]["type"])) {

    if ($_FILES['filejo']['size'] != 0) {
        $sourcePath = $_FILES['filejo']['tmp_name']; // Storing source path of the file in a variable
        //$targetPath = "upload/".$_FILES['filejo']['name']; // Target path where file is to be stored
        $targetPath = 'upload/' . date('Y-m-d-H-i-s') . '_' . uniqid() .$_FILES['filejo']['name'];
        move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
    }
    if ($_FILES['filejo1']['size'] != 0) {
        $sourcePath1 = $_FILES['filejo1']['tmp_name']; // Storing source path of the file in a variable
        $targetPath1 = 'upload/' . date('Y-m-d-H-i-s') . '_' . uniqid() .$_FILES['filejo1']['name'];
        //$targetPath1 = "upload/".$_FILES['filejo1']['name']; // Target path where file is to be stored
        move_uploaded_file($sourcePath1,$targetPath1) ; // Moving Uploaded file
    }
    $to = $_POST['emailjo'];
    $fname = $_POST['usernamejo'];
    $lname = $_POST['lastnamejo'];
    $phone = $_POST['phonejo'];
    $nativelanguage = $_POST['nativelanguage'];
    $targetlanguage = $_POST['targetlanguage'];
    $house = $_POST['house'];
    $city = $_POST['city'];
    $message = $_POST['message'];
    $country = $_POST['country'];
    $postcode = $_POST['postcode'];
    $mail->From = $to;
    $mail->FromName = $to;
    //$mail->AddAddress($to,$fname);  // Add a recipient
    $mail->AddAddress('office@aussietranslations.com.au');               // Name is optional
    if ($_FILES['filejo']['size'] != 0) {
        $mail->AddAttachment($targetPath);
    }
    if ($_FILES['filejo1']['size'] != 0) {
        $mail->AddAttachment($targetPath1);
    }
    //$mail->AddAttachment("upload/".$_FILES['filejo']['name']);
    //$mail->AddAttachment("upload/".$_FILES['filejo1']['name']);
    //$mail->AddAttachment($_FILES['file']['tmp_name'],$_FILES['file']['name']);

    $mail->IsHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Online Enquiry at Aussie Translations';
    $mail->Body    = '<html>
				<head>
					<title>Online Enquiry at Aussie Translations</title>
				</head>
				<body>
					<h1>Online Enquiry</h1>
					<table cellspacing="1" style="border: 2px dashed #FB4314; height: 200px;">
						<tr>
							<th>First Name:</th><td>'.$fname.'</td>
						</tr>
						<tr>
							<th>Last Name:</th><td>'.$lname.'</td>
						</tr>
						<tr style="background-color: #e0e0e0;">
							<th>Email:</th><td>'.$to.'</td>
						</tr>
						<tr>
							<th>Phone:</th>
							<td>'.$phone .'</td>
						</tr>
						<tr>
							<th>Nativelanguage:</th>
							<td>'.$nativelanguage .'</td>
						</tr>

						<tr>
							<th>Targetlanguage:</th>
							<td>'.$targetlanguage .'</td>
						</tr>
						<tr>
							<th>Country:</th>
							<td>'.$country .'</td>
						</tr>
						<tr>
							<th>House:</th>
							<td>'.$house .'</td>
						</tr>
						<tr>
							<th>City:</th>
							<td>'.$city .'</td>
						</tr>
						<tr>
							<th>Postcode:</th>
							<td>'.$postcode .'</td>
						</tr>
						<tr>
							<th>Message:</th>
							<td>'.$message .'</td>
						</tr>
						<tr>
							<th>Website:</th><td><a href="http://aussietranslations.com.au/">aussietranslations.com.au</a></td>
						</tr>
					</table>
				</body>
				</html>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->Send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }
    echo 'Message has been sent';
}else if(isset($_FILES["fileho"]["type"])) {
    if ($_FILES['fileho']['size'] != 0)
    {
        $sourcePath = $_FILES['fileho']['tmp_name']; // Storing source path of the file in a variable
        $targetPath = 'upload/' . date('Y-m-d-H-i-s') . '_' . uniqid() .$_FILES['fileho']['name'];
        //$targetPath = "upload/".$_FILES['fileho']['name']; // Target path where file is to be stored
        move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
    }

    $to = $_POST['email'];
    $name = $_POST['username'];
    $msg = $_POST['txtmsg'];
    $phone = $_POST['txtphn'];
    $company = $_POST['txtcompany'];
    $mail->From = $to;
    $mail->FromName = $to;
    //$mail->AddAddress($to,$name);  // Add a recipient
    $mail->AddAddress('office@aussietranslations.com.au');               // Name is optional
    if ($_FILES['fileho']['size'] != 0) {
        $mail->AddAttachment($targetPath);
    }
    //$mail->AddAttachment($_FILES['file']['tmp_name'],$_FILES['file']['name']);

    $mail->IsHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Online Enquiry at Aussie Translations ';
    $mail->Body    = '<html>
				<head>
					<title>Online Enquiry at Aussie Translations</title>
				</head>
				<body>
					<h1>Online Enquiry</h1>
					<table cellspacing="1" style="border: 2px dashed #FB4314; height: 200px;">
						<tr>
							<th>Name:</th><td>'.$name.'</td>
						</tr>
						<tr style="background-color: #e0e0e0;">
							<th>Email:</th><td>'.$to.'</td>
						</tr>
						<tr>
							<th>Company:</th>
							<td>'.$company .'</td>
						</tr>
						<tr>
							<th>Phone:</th>
							<td>'.$phone .'</td>
						</tr>
						<tr>
							<th>Message:</th>
							<td>'.$msg .'</td>
						</tr>
						<tr>
							<th>Website:</th><td><a href="http://aussietranslations.com.au/">aussietranslations.com.au</a></td>
						</tr>
					</table>
				</body>
				</html>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->Send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }
    echo 'Message has been sent';
} else {
    echo "Invalid file Size or Type";
}

?>
