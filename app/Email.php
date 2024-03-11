<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once './vendor/autoload.php';

class Email
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->configure();
    }

    private function configure()
    {
        $this->mail->isSMTP();
        $this->mail->Host = 'live.smtp.mailtrap.io';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'api';
        $this->mail->Password = 'b51a3f05877a23f61ba88109e6688826';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = '587';
    }

    public function sendMail($to, $subject, $body, $from = 'info@demomailtrap.com', $fromName = 'FC United')
    {
        $this->mail->setFrom($from, $fromName);
        $this->mail->addAddress($to);
        $this->mail->Subject = $subject;
        $this->mail->isHTML(true);
        $this->mail->Body = $body;

        if (!$this->mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error' . $this->mail->ErrorInfo;
        } else {

            return true;
        }
    }
}

