<?php
require_once dirname(__FILE__).'/PHPMailerAutoload.php';

class MailSendingWorker {
    
    private $mailCommunication;

    public function send($from='denschools2016@gmail.com',$fromName='support',$to='',$toName='',$subject='hii',$message='feel free to talk',$attachment=NULL,$atachmentName='',$signup='',$name='',$email='',$phonenumber='',$location='') {
        $results_messages = array();
 
        $mail = new PHPMailer(true);
        $mail->CharSet = 'utf-8';
        ini_set('default_charset', 'UTF-8');

        try {
            if(!PHPMailer::validateAddress($to)) {
                $results_messages[] =  "Email address " . $to . " is invalid -- aborting!";
            }
            $mail->isSMTP();
            //$mail->SMTPDebug  = 2;
            $mail->Host       = "smtp.gmail.com";
            $mail->Port       = "465";
            $mail->SMTPSecure = "ssl";
            $mail->SMTPAuth   = true;
            $mail->Username   = "denschools@gmail.com";
            $mail->Password   = "Den30";
            $mail->addReplyTo($from, $fromName);
            $mail->setFrom($from, $fromName);
            $mail->addAddress($to, $toName);
            $mail->Subject  = $subject;
            $body = $message;
			
			//<<<'EOT'Hellloooooooooooooo 'EOT';
            $mail->WordWrap = 78;
            $mail->msgHTML($body);//, dirname(__FILE__), true); //Create message bodies and embed images
            if($attachment != NULL && $attachment != "") {
				$mail->addAttachment($attachment,$atachmentName);  // optional name
			 
                                
            }
            
            try {
              $mail->send();
              //$results_messages[] = "Message has been sent using SMTP";
		?>	
    

  

<?php

            }
            catch (Exception $e) {
              $results_messages[] =  'Unable to send to: ' . $to. ': '.$e->getMessage();
            }
			
			
			
        }
        catch (Exception $e) {
          $results_messages[] = $e->errorMessage();
        }
        if(count($results_messages) == 0) {
            return TRUE;
        }
        return $results_messages;
    }
    
}

