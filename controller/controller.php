<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/MailManager.php');

function listHomePosts(){

    $postManager = new PostManager();
    $posts = $postManager->getHomePosts();

    require('view/frontend/homeView.php');

}

function listAllPosts(){

    $postManager = new PostManager();
    $posts = $postManager->getAllPosts();

    require('view/frontend/listPostsView.php');

}

function post(){

    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');

}

function addPost($author, $title, $content){

    $postManager = new PostManager();
    $affectedLines = $postManager->addPost($author, $title, $content);

    if ($affectedLines === false) {

        throw new Exception("Impossible d'ajouter l'article !");

    } 

}

function editPost(){

    $postManager = new PostManager();
    $post = $postManager->editPost($_GET['id']);
    require('view/frontend/editPostView.php');

}

function confirmEditPost($author, $title, $content){

    $postManager = new PostManager();
    $affectedLines = $postManager->confirmEditPost($_GET['id'], $author, $title, $content);

    if ($affectedLines === false) {

        throw new Exception("Impossible de modifier l'article !");

    } 

}

function deletePost(){

    $postManager = new PostManager();
    $postdelete = $postManager->deletePost($_GET['id']);

    header('Location: index.php?action=listPosts');

}

function submitComment($postId, $author, $comment){

    $commentManager = new CommentManager();

    $affectedLines = $commentManager->submitComment($postId, $author, $comment);

    if ($affectedLines === false) {

        throw new Exception("Impossible d'ajouter le commentaire !");

    } else {

        header('Location: index.php?action=post&id=' . $postId);

    }
}

function approveComment(){

    $commentManager = new CommentManager();
    $commentapprove = $commentManager->approveComment($_GET['id']);

    header('Location: index.php?action=manageComments');

}

function disapproveComment(){

    $commentManager = new CommentManager();
    $commentdelete = $commentManager->disapproveComment($_GET['id']);

    header('Location: index.php?action=manageComments');

}

function manageComments(){

    $commentManager = new CommentManager(); // Création d'un objet
    $comments = $commentManager->getAllComments(); 

    require('view/frontend/commentsPannelView.php');
    
}

function connectUser($username, $password){

    $userManager = new UserManager();

    $userInfos = $userManager->connectUser($username, $password);

    if ($userInfos === false) {

        $error = 'Nom d\'utilisateur et/ou mot de passe incorrect :(';
        require('view/frontend/loginView.php');

    } else {

        $_SESSION['id'] = $userInfos['id'];
        $_SESSION['username'] = $userInfos['username'];
        $_SESSION['rank'] = $userInfos['rank'];

        header('location: index.php');

    }

}

function registerUser($username, $email, $password, $password2){

    $userManager = new UserManager();

    $UserRegistration = $userManager->registerUser($username, $email, $password, $password2);

}

function logoutUser(){

    if (isset($_SESSION)) {

        session_destroy();
        header('location: index.php');
            
    } 

}

function sendMail($name, $f_name, $email, $subject, $message){

    if (!empty($name) && !empty($f_name) && !empty($email) && !empty($message)) {

        $_SESSION['mail_msg'] = array('Merci, votre message a bien été envoyé !', 'success') ;

        $mailManager = new MailManager();
        $affectedLines = $mailManager->sendMail($name, $f_name, $email, $subject, $message);

        listHomePosts();         

    } else {
        
        $_SESSION['mail_msg'] = array('Veuillez completer tous les champs obligatoires.', 'danger') ;

        listHomePosts();
                        
    }


}