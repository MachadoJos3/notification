<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use stdClass;

class Email
{
    private $mail = stdClass::class;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->CharSet = 'UTF-8';
        $this->mail->isSMTP();
        $this->mail->Host = 'sandbox.smtp.mailtrap.io';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = '760a5bc13a1778';
        $this->mail->Password = 'e39b93b2b6cea1';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 2525;

        $this->mail->setFrom('machadodev03@gmail.com', 'Atendimento');
        $this->mail->addAddress('gengarpkm03@gmail.com', 'José');

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
