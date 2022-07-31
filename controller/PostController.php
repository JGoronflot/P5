<?php

require_once '../model/PostManager.php';

/**
 * Function to list home posts
 */
function listHomePosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getHomePosts();
    require('../view/frontend/homeView.php');
}

/**
 * Function to list all posts
 */
function listAllPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getAllPosts();
    require('../view/frontend/listPostsView.php');
}

/**
 * Function to view post
 */
function post()
{
    $resultat = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($resultat);
    $comments = $commentManager->getComments($resultat);
    require('../view/frontend/postView.php');
}

/**
 * Function to add a post
 */
function addPost($author, $title, $content)
{
    $postManager = new PostManager();
    $affectedLines = $postManager->addPost($author, $title, $content);
    if ($affectedLines === false) {
        throw new Exception("Impossible d'ajouter l'article !");
    }
}

/**
 * Function to edit a post
 */
function editPost()
{
    $resultat = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $post = Post::getByID($resultat);
    require('../view/frontend/editPostView.php');
}

/**
 * Function to confirm edit a post
 */
function confirmEditPost($author, $title, $content)
{
    $resultat = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $postManager = new PostManager();
    $affectedLines = $postManager->confirmEditPost($resultat, $author, $title, $content);
    if ($affectedLines === false) {
        throw new Exception("Impossible de modifier l'article !");
    }
}

/**
 * Function to delete a post
 */
function deletePost()
{
    $resultat = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $postManager = new PostManager();
    $postdelete = $postManager->deletePost($resultat);
    header('Location: index.php?action=listPosts');
}
