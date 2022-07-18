<?php

require_once 'model/MailManager.php';

/**
 * Function to send a mail
 */
function sendMail($name, $f_name, $email, $subject, $message)
{
    if (!empty($name) && !empty($f_name) && !empty($email) && !empty($message)) {

        $_SESSION['mail_msg'] = array('Merci, votre message a bien été envoyé !', 'success');
        $mailManager = new MailManager();
        $affectedLines = $mailManager->sendMail($name, $f_name, $email, $subject, $message);
        listHomePosts();
    } else {
        $_SESSION['mail_msg'] = array('Veuillez completer tous les champs obligatoires.', 'danger');
        listHomePosts();
    }
}