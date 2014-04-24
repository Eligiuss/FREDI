<?php
	require_once 'C:\wamp\www\PPE1\PHPMailer-master\PHPMailerAutoload.php';

	if(isset($_POST["email"])) {
		$to = $_POST["email"];
	} else {
		return 'Veuillez préciser votre adresse e-mail';
	}
	
	$password = 'test';

	$body = 'Le mot de passe M2L que vous aviez choisi est : '.$password;
	$subject = 'Votre mot de passe M2L';

	global $error;
	$username = "eloianthony.contactppe@gmail.com";
	$password = "contactppe1";
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	//$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = $username;
	$mail->Password = $password;
	$mail->Priority = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
	$mail->CharSet = 'UTF-8';
	$mail->Encoding = '8bit';
	$mail->ContentType = 'text/html; charset=utf-8\r\n';
	$mail->SetFrom('eloianthony.contactppe@gmail.com', 'Administration M2L');
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	$mail->IsHTML(true);
	$mail->WordWrap = 900; 
	if (!$mail->Send()) {
		$error = 'Mail error: ' . $mail->ErrorInfo;
		echo 'error';
	} else {
		$error = 'Message sent!';
		$mail->SmtpClose();
                echo 'ok';
	}
        
