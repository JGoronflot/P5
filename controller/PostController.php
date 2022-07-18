<?php

require_once 'model/PostManager.php';

/**
 * Function to list home posts
 */
function listHomePosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getHomePosts();
    require('view/frontend/homeView.php');
}

/**
 * Function to list all posts
 */
function listAllPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getAllPosts();
    require('view/frontend/listPostsView.php');
}

/**
 * Function to view post
 */
function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require('view/frontend/postView.php');
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
    $postManager = new PostManager();
    $post = $postManager->editPost($_GET['id']);
    require('view/frontend/editPostView.php');
}

/**
 * Function to confirm edit a post
 */
function confirmEditPost($author, $title, $content)
{
    $postManager = new PostManager();
    $affectedLines = $postManager->confirmEditPost($_GET['id'], $author, $title, $content);
    if ($affectedLines === false) {
        throw new Exception("Impossible de modifier l'article !");
    }
}

/**
 * Function to delete a post
 */
function deletePost()
{
    $postManager = new PostManager();
    $postdelete = $postManager->deletePost($_GET['id']);
    header('Location: index.php?action=listPosts');
}