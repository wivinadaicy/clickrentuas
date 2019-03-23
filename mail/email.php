<?php
		require 'smtp/PHPMailerAutoload.php';
		$mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'ssl://smtp.gmail.com';
		$mail->Port = 465;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "hery.uph@gmail.com";
        $mail->Password = "si123456";
        $mail->setFrom('hery.uph@gmail.com', 'hery.uph@gmail.com');
        $mail->addAddress('andree.widjaja@uph.edu', 'andree.widjaja@uph.edu' );
        $mail->Subject = 'Password Baru Anda dari smtp email';
        $mail->msgHTML("hallo ");
		
		if (!$mail->send()) {
            
        } else {
            echo"berhasil";
        }
?>
