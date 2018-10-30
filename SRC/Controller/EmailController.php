<?php
/**
 * Created by PhpStorm.
 * User: raylison100
 * Date: 30/10/18
 * Time: 08:27
 */

namespace SRC\Controller;

use PHPMailer\PHPMailer\PHPMailer;

class EmailController
{

    private $headers;
    private $mail;

    public static $instance;

    private function __construct()
    {
        self::$instance = $this;
    }

    public static function get()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function load($httpHeaders)
    {
        $this->headers = $httpHeaders;
        $this->mail = new PHPMailer; //Create a new PHPMailer instance
    }

    public function index()    {


        $this->mail->isSMTP();//Tell PHPMailer to use SMTP
        $this->mail->SMTPDebug = 0; //Enable SMTP debugging 0 = off (for production use),1 = client messages, 2 = client and server messages
        $this->mail->Host = 'smtp.gmail.com'; //Set the hostname of the mail server
        $this->mail->Port = 587; //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $this->mail->SMTPSecure = 'tls'; //Set the encryption system to use - ssl (deprecated) or tls
        $this->mail->SMTPAuth = true; //Whether to use SMTP authentication
        $this->mail->Username = $this->headers[Username]; //Username to use for SMTP authentication - use full email address for gmail
        $this->mail->Password = $this->headers[Password]; //Password to use for SMTP authentication
        $this->mail->setFrom($this->headers[Sender],$this->headers[SenderName]); //Set who the message is to be sent from
        $this->mail->addAddress($this->headers[Recipient], $this->headers[RecipientName]); //Set who the message is to be sent to
        $this->mail->Subject = $this->headers[Subject]; //Set the subject line
        $this->mail->Body = $this->headers[Body];
        $this->mail->AltBody = $this->headers[AltBody]; //Replace the plain text body with one created manually
        $this->mail->ConfirmReadingTo;
        //send the message, check for errors
        if (!$this->mail->send()) {
            echo "Mailer Error: " . $this->mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
    }
}