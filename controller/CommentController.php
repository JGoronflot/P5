<?php

require_once 'model/CommentManager.php';

/**
 * Function to submit a comment
 */
function submitComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->submitComment($postId, $author, $comment);
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
    $commentManager = new CommentManager();
    $commentapprove = $commentManager->approveComment($_GET['id']);
    header('Location: index.php?action=manageComments');
}

/**
 * Function to disapprove a comment
 */
function disapproveComment()
{
    $commentManager = new CommentManager();
    $commentdelete = $commentManager->disapproveComment($_GET['id']);
    header('Location: index.php?action=manageComments');
}

/**
 * Function to manage a comment
 */
function manageComments()
{
    $commentManager = new CommentManager(); // Création d'un objet
    $comments = $commentManager->getAllComments();
    require('view/frontend/commentsPannelView.php');
}