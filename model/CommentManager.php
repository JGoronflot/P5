<?php

require_once('../model/Manager.php');
require_once('../entity/Entity.php');
require_once('../entity/Connection.php');
require_once('../entity/Comment.php');

class CommentManager extends Manager
{
	function __construct()
	{
		$this->db = $this->dbConnect();
	}

	// Fonction to get a comment
	function getComments($postId)
	{
		$comments = Comment::getFromPost($postId);
		return $comments;
	}

	// Fonction to get all comments
	function getAllComments()
	{
		$allcomments = Comment::getAllCommentsStatus0();
		return $allcomments;
	}

	// Fonction to submit a comment
	function submitComment($postId, $author, $message)
	{
		$comment = new Comment();
		$comment->setAuthor($author);
		$comment->setComment($message);
		$comment->setPostID($postId);
		$comment->setCommentDate(date("y-m-d h:i:s"));
		$comment->save();
		return $comment;
	}

	// Fonction to approve a comment
	function approveComment($id)
	{
		$approvecomment = $this->db->prepare('UPDATE comments SET status = 1 WHERE id = ?');
		$affectedLines = $approvecomment->execute(array($id));
	}

	// Fonction to disapprove a comment
	function disapproveComment($id)
	{
		Comment::getbyID($id)->remove();
	}
}
