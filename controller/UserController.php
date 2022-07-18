<?php

require_once 'model/UserManager.php';

/**
 * Function to connect a user
 */
function connectUser($username, $password)
{
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

/**
 * Function to create a user
 */
function registerUser($username, $email, $password, $password2)
{
    $userManager = new UserManager();
    $UserRegistration = $userManager->registerUser($username, $email, $password, $password2);
}

/**
 * Function to logout user
 */
function logoutUser()
{
    if (isset($_SESSION)) {

        session_destroy();
        header('location: index.php');
    }
}