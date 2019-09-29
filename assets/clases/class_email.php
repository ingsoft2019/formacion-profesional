<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ('mail/Exception.php');
require ('mail/PHPMailer.php');
require ('mail/SMTP.php');

class Email {
    private $email = "voea.orientacion.profesional@gmail.com";
    private $password = "Oracle123";
    private $name = "Orientación Profesional";
    private $email_to;
    private $name_to;
    private $subject;
    private $html_content;

    public function __construct($email_to, $name_to, $subject, $html_content){
        $this->email_to = $email_to;
        $this->name_to = $name_to;
        $this->subject = $subject;
        $this->html_content = $html_content;
    }

    public function enviarCorreo(){
        $mail = new PHPMailer;
        $mail->isSMTP(); 
        $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
        $mail->Port = 587; // TLS only
        $mail->SMTPSecure = 'tls'; // ssl is deprecated
        $mail->SMTPAuth = true;
        $mail->Username = $this->email; // email
        $mail->Password = $this->password; // password
        $mail->setFrom($this->email, $this->name); // From email and name
        $mail->addAddress($this->email_to, $this->name_to); // to email and name
        $mail->Subject = $this->subject;
        $mail->msgHTML($this->html_content); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
        $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
        // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
        
        $mail->CharSet = 'UTF-8';

        if(!$mail->send()){
            return "Mailer Error: " . $mail->ErrorInfo;
        }else{
            return "Message sent!";
        }

    }
}

?>