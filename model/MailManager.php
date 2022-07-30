<?php

require_once('../model/Manager.php');
require_once('../entity/Entity.php');
require_once('../entity/Mail.php');

class MailManager extends Manager
{

    function __construct()
    {
        $this->db = $this->dbConnect();
    }

    // Fonction to send a mail
    function sendMail($name, $f_name, $email, $subject, $message)
    {
        $mail = new Mail();
		$mail->name = $name;
		$mail->f_name = $f_name;
		$mail->email = $email;
		$mail->message = $message;
		$mail->save();
        $receiver = 'contact@blabla.fr';
        $name = htmlspecialchars($name);
        $f_name = htmlspecialchars($f_name);
        $mail = htmlspecialchars($email);
        $subject = htmlspecialchars($subject);
        $message = nl2br(htmlspecialchars($message));
        $content = '<html><head><title> ' . htmlspecialchars($subject) . ' </title></head><body>';
        $content .= '<p>' . $message . '<p>';
        $content .= '-------------------' . '<br>';
        $content .= 'De: ' . $name . ' ' . $f_name . ' (' . $mail . ')';
        $content .= '<p>' . 'Formulaire de contact envoyé depuis le site jimmygoronflot.fr/blog' . '<p>';
        $content .= '</body></html>';
        $headers  = 'MIME-Version: 1.0' . "\n";
        $headers .= 'From:' . $name . ' ' . $f_name . '  <' . $mail . '>' . "\n" .
            'Content-Type: text/html; charset=iso-8859-1; Content-Transfer-Encoding: 8bit ' . "\n" .
            'Content-Disposition: inline' . "\n" .
            'X-Mailer:PHP/' . phpversion();
        mail($receiver, $subject, $content, $headers);
    }
}
