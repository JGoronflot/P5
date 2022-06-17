<?php

require_once('model/Manager.php');

class MailManager extends Manager {

	function __construct() {

		$this->db = $this->dbConnect();

	}

	function sendMail($name, $f_name, $email, $subject, $message){

		$sendmail = $this->db->prepare('INSERT INTO mails (name, f_name, email, message) VALUES (?, ?, ?, ?)');
	    $affectedLines = $sendmail->execute(array($name, $f_name, $email, $message));

	    $receiver = 'contact@avrgn.fr';
        $name = htmlspecialchars($name);
        $f_name = htmlspecialchars($f_name);
       	$mail = htmlspecialchars($email);
        $subject = htmlspecialchars($subject);
        $message = nl2br(htmlspecialchars($message));
        $content = '<html><head><title> '.htmlspecialchars($subject) .' </title></head><body>';
        $content .= '<p>' .$message .'<p>';
        $content .= '-------------------' .'<br>';
        $content .= 'De: ' .$name .' ' .$f_name .' (' .$mail .')';
        $content .= '<p>' .'Formulaire de contact envoyé depuis le site jimmygoronflot.fr/blog' .'<p>';
        $content .= '</body></html>';
     
        $headers  = 'MIME-Version: 1.0' . "\n";
        $headers .= 'From:' .$name .' ' .$f_name .'  <'.$mail.'>' . "\n" .
            		'Content-Type: text/html; charset=iso-8859-1; Content-Transfer-Encoding: 8bit '."\n" .
            		'Content-Disposition: inline'. "\n" .
            		'X-Mailer:PHP/'.phpversion();
 
        mail($receiver, $subject, $content, $headers); // Fonction principale qui envoi l'email

	}

}