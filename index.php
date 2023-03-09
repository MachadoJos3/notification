<?php
require __DIR__ . "/lib_ext/autoload.php";

use Notification\Email;

// $email = new PHPMailer;

$novo_email = new Email;
$novo_email->sendEmail("Assunto de teste", "<p>Esse é um e-mail de <b>Teste</>", "machadodev03@gmail.com", "Jose", "machadodev03@gmail.com", "J Machado");

var_dump($novo_email);
