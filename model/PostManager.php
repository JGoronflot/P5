<?php

require_once('../model/Manager.php');
require_once('../entity/Entity.php');
require_once('../entity/Post.php');

class PostManager extends Manager
{
	function __construct()
	{
		$this->db = $this->dbConnect();
	}

	// Fonction to get 3 lasts posts
	function getHomePosts()
	{
		$posts = Post::getLastestPosts(3);
		return $posts;
	}

	// Fonction to get all posts
	function getAllPosts()
	{
		$posts = Post::getAll();
		return $posts;
	}

	// Fonction to get a post
	function getPost($postId)
	{
		$post = Post::getbyID($postId);
		return $post;
	}

	// Fonction to add post
	function addPost($author, $title, $content)
	{
		$post = new Post();
		$post->title = $title;
		$post->content = $content;
		$post->author = $author;
		$post->save();
		if (isset($_FILES['thumbnail']) and !empty($_FILES['thumbnail']['name'])) {
			$path = 'img/blog/thumbnails/' . $post->id . '.jpg';
			move_uploaded_file($_FILES['thumbnail']['tmp_name'], $path);
		}
		header('location: index.php?action=listPosts');
	}

	// Fonction to confirm edit post
	function confirmEditPost($postId, $author, $title, $content)
	{
		$editpost = $this->db->prepare('UPDATE posts SET title = ?, content = ?, author = ?, update_date = NOW() WHERE id = ? ');
		$affectedLines = $editpost->execute(array($title, $content, $author, $postId));
		if (isset($_FILES['thumbnail'])  and !empty($_FILES['thumbnail']['name'])) {
			$path = 'img/blog/thumbnails/' . $postId . '.jpg';
			move_uploaded_file($_FILES['thumbnail']['tmp_name'], $path);
		}
		header('location: index.php?action=post&id=' . $postId);
	}

	// Fonction to delete post
	function deletePost($postId)
	{
		Post::getbyID($postId)->remove();
		$path = 'img/blog/thumbnails/' . $postId . '.jpg';
		unlink($path);
	}
}
