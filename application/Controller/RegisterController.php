<?php

namespace Mini\Controller;

use Mini\Model\UserType;
use Mini\Model\User;
use Mini\Model\Log;
use Mini\Model\UserActivate;
use Mini\Libs\PHPMailer;

class RegisterController
{
    public function index()
    {
        require APP . 'view/register/index.php';
    }

    public function kayit(){
    	if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
    		$username = htmlspecialchars($_POST["username"]);
			$email = htmlspecialchars($_POST["email"]);
			$password = htmlspecialchars($_POST["password"]);

			$user = new User();
			$user->addUser(5, 0, $username, $password, $email, 0, 0);

			$mail = new PHPMailer;
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'cpanel01.netiyi.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'testmail@uozturk.com';                 // SMTP username
			$mail->Password = '665783asd';                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 465;   
			$mail->CharSet = 'UTF-8';                                 // TCP port to connect to

			$generatedKey = sha1(mt_rand(10000,99999).time().$email);	

			$mail->setFrom('testmail@uozturk.com', 'Ask Others');
			$mail->addAddress($email);  // Add a recipient
			$mail->isHTML(true);                                  			// Set email format to HTML

			$mail->Subject = 'Aktivasyon Maili';
			$mail->Body    = '<a href="http://askothers.net/profile/activate/'.$username . "-" .$generatedKey.'">Aktivasyon için tıklayınız.<a/>';

			if(!$mail->send()) {
				$log = new Log;
				$log->addLog(4,"Kayıt olda ki " . $mail->ErrorInfo);
			} else {
    			$log = new Log;
				$log->addLog(2, $username . "-" . $generatedKey);

				$userobj = $user->getUserFromUsername($username);
				$useractivate = new UserActivate;
				$useractivate->addUserActivate($userobj->user_id, $generatedKey);
			}
    	}
    	header('location:' . URL);
    }
}
