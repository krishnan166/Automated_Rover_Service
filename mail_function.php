<?php	
	function sendOTP($email,$otp) {
		require('class.phpmailer.php');
		require('class.smtp.php');
	
		$message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp;
		$mail = new PHPMailer();
	   $mail->AddReplyTo('niranjanasaahe166@gmail.com','Niranjana Saahe');
                                $mail->SetFrom('niranjanasaahe166@gmail.com','Niranjana Saahe');
                                $mail->AddAddress($email);
                                $mail->Subject= "OTP to Login";
                                $mail->MsgHTML($message_body);
                                $result=$mail->Send();
                                if(!$result) {
                                    echo "Mailer Error: " . $mail->ErrorInfo;
                                }else {
                                    	return $result;  
                                } 
		
	
		
		
		
	
                             
		
		
		
		
		
		
		
		
		
		
	}
?>