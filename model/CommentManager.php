<?php

require_once('../model/Manager.php');
require_once('../entity/Entity.php');
require_once('../entity/Connection.php');
require_once('../entity/Comment.php');

class CommentManager extends Manager
{
	// Fonction to get a comment
	public function getComments($postId)
	{
		$comments = Comment::getFromPost($postId);
		return $comments;
	}

	// Fonction to get all comments
	public function getAllComments()
	{
		$allcomments = Comment::getAllCommentsStatus0();
		return $allcomments;
	}

	// Fonction to submit a comment
	public function submitComment($postId, $author, $message)
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
	public function approveComment($id)
	{
		$approvecomment = $this->db->prepare('UPDATE comments SET status = 1 WHERE id = ?');
		$affectedLines = $approvecomment->execute(array($id));
	}

	// Fonction to disapprove a comment
	public function disapproveComment($id)
	{
		Comment::getbyID($id)->remove();
	}
}
