<?php

require_once('../model/Manager.php');
require_once('../entity/Entity.php');
require_once('../entity/Post.php');
require_once('../entity/Connection.php');

class PostManager extends Manager
{
	// Fonction to get 3 lasts posts
	public function getHomePosts()
	{
		$posts = Post::getLastestPosts(3);
		return $posts;
	}

	// Fonction to get all posts
	public function getAllPosts()
	{
		$posts = Post::getAll();
		return $posts;
	}

	// Fonction to get a post
	public function getPost($postId)
	{
		$post = Post::getbyID($postId);
		return $post;
	}

	// Fonction to add post
	public function addPost($author, $title, $content)
	{
		$post = new Post();
		$post->setTitle($title);
		$post->setContent($content);
		$post->setAuthor($author);
		$post->setCreationDate(date("y-m-d H:i:s"));
		$post->setUpdateDate(date("y-m-d H:i:s"));
		$post->save();
		if (isset($_FILES['thumbnail']) && !empty($_FILES['thumbnail']['name'])) {
			$path = 'img/blog/thumbnails/' . $post->id . '.jpg';
			move_uploaded_file($_FILES['thumbnail']['tmp_name'], $path);
		}
		header('location: index.php?action=listPosts');
	}

	// Fonction to confirm edit post
	public function confirmEditPost($postId, $author, $title, $content)
	{
		$db = new Connection();
		$editpost = $db->dbConnect()->prepare('UPDATE posts SET title = ?, content = ?, author = ?, update_date = NOW() WHERE id = ? ');
		$affectedLines = $editpost->execute(array($title, $content, $author, $postId));
		if (isset($_FILES['thumbnail']) && !empty($_FILES['thumbnail']['name'])) {
			$path = 'img/blog/thumbnails/' . $postId . '.jpg';
			move_uploaded_file($_FILES['thumbnail']['tmp_name'], $path);
		}
		header('location: index.php?action=post&id=' . $postId);
	}

	// Fonction to delete post
	public function deletePost($postId)
	{
		Post::getbyID($postId)->remove();
		$path = 'img/blog/thumbnails/' . $postId . '.jpg';
		unlink($path);
	}
}
