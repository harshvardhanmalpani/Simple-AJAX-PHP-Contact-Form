<?php
$mailtobesent="Enter your Email Address here, where you want to receive the mails through this form";
$yourwebsite="Enter the name of your website here";
$out='';
$result=100;
if($_POST)
{
    //Check the request type
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest')
	{
		$reason='Request must come from Ajax';$result=1;
    }
	else
	{
		//check if blank varibles are sent
		if(!isset($_POST["userName"]) || !isset($_POST["userEmail"]) || !isset($_POST["userMessage"]))
			$result=2;
		else 
		{
			//filter and sanitize the strings
			$user_Name= filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
			$user_Email= filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
			$user_Message= filter_var($_POST["userMessage"], FILTER_SANITIZE_STRING);
			//check the length of the variables sent through POST data
			if(strlen($user_Message)<6)
				$result=5;
			//filter the email variable
			if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL))
			{
				$result=4;
				#pregmatch().. + regex; //to be done;
			}
			//check the length of the name string
			if(strlen($user_Name)<4)
				$result=3;
			/* the reason why name, email and message are in opposite order is that if any of the data is invalid, the result variable "$result" should be updates accordingly and the statements in the Switch case statements will run accordingly */
			if($result==100) 
			{
				//mail to be sent
				$to_Email = $mailtobesent;
				//sebject header if the mail
				$subject = $user_Name.' contacted you through Contact Form';
				//header to be sent over SMTP
				$headers = 'From: '.$user_Email.'' . "\r\n".'Reply-To: '.$user_Email.'' . "\r\n" .'X-Mailer: PHP/' . phpversion();
				//real mail query, check function "mail" for more info
				$sentMail = @mail($to_Email, $subject, $user_Message ."\r\n-".$user_Name, $headers);
				//check if the mail was sent or any error occured.
				if(!$sentMail)
					$result=6;
				//extra validation output // this script will never return $result =7 //but in case...
				else
					$result=7;
			}
		}
	}
	//switch for checking the $result.
	switch($result)
	{
		case 1 : $out= 'Request must come from Ajax';break;
		case 2 : $out= 'Input fields are empty!';break;
		case 3 : $out= 'Name is too short or empty!';break;
		case 4 : $out= 'Please enter a valid email address!';break;
		case 5 : $out= 'Too short message! Please enter something.';break;
		case 6 : $out= 'Could not send mail! Please mail us manually at <a href="mailto:'.$mailtobesent.'" title="mail to '.$yourwebsite.'">'.$mailtobesent.'</a>';break;
		case 7 : $out= 'Hi <strong>'.$user_Name .'</strong> ! Thank you for your email. We will respond to you asap.';break;
		//never gonna produce default:
		default : $out= 'Oops! An error occured';
	}
	//output in json format  // for more info read json_encode()
	//produce error in output json
	if ($result<7)
		echo json_encode(array('type'=>'error', 'text' => $out));
	//produce success in output json
	else 
		echo json_encode(array('type'=>'success', 'text' => $out));
}
//if this php page was accessed directly through URL like tutes.club/contact.php-> must produce an error
else 
{
	//produce the meta data to redirect this page to any other URL
	echo '<meta http-equiv="Refresh" content="5" url="'.$yourwebsite.'" />This page is supposed to be used as a Contact Form, So please use it that way<br>You\'re being redirected to our site :<a href="'.$yourwebsite.'" title="'.$yourwebsite.'">'.$yourwebsite.'</a>';
}
?>