<?php

require_once '../model/CommentManager.php';

$resultat = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

/**
 * Function to submit a comment
 */
function submitComment($postId, $author, $message)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->submitComment($postId, $author, $message);
    if ($affectedLines === false) {
        throw new Exception("Impossible d'ajouter le commentaire !");
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

/**
 * Function to approve a comment
 */
function approveComment()
{
    $resultat = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $commentManager = new CommentManager();
    $commentapprove = $commentManager->approveComment($resultat);
    header('Location: index.php?action=manageComments');
}

/**
 * Function to disapprove a comment
 */
function disapproveComment()
{
    $resultat = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $commentManager = new CommentManager();
    $commentdelete = $commentManager->disapproveComment($resultat);
    header('Location: index.php?action=manageComments');
}

/**
 * Function to manage a comment
 */
function manageComments()
{
    $commentManager = new CommentManager(); // Création d'un objet
    $comments = $commentManager->getAllComments();
    require '../view/frontend/commentsPannelView.php';
}