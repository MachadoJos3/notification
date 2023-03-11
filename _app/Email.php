<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use stdClass;

class Email
{
    private $mail = stdClass::class;

    public function __construct($smtp_debug, $host, $user, $pass, $smtp_secure, $port, $set_from_email, $set_from_name)
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = $smtp_debug;
        $this->mail->CharSet = 'UTF-8';
        $this->mail->isSMTP();
        $this->mail->Host = $host;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $user;
        $this->mail->SMTPSecure = $smtp_secure;
        $this->mail->Password = $pass;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = $port;
        $this->mail->setFrom($set_from_email, $set_from_name);
        // $this->mail->addAddress('gengarpkm03@gmail.com', 'José');

        $this->mail->isHTML(true);
    }
    public function sendEmail($subject, $body, $replay_email, $replay_name, $address_email, $address_name)
    {
        $this->mail->Subject = (string)$subject;
        $this->mail->Body = $body;

        $this->mail->addReplyTo($replay_email, $replay_name);
        $this->mail->addAddress($address_email, $address_name);

        try {
            $this->mail->send();
        } catch (Exception $e) {
            echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";
        }
    }
}
