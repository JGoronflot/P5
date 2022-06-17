<?php

require_once('model/Manager.php');

class CommentManager extends Manager {

	function __construct() {

		$this->db = $this->dbConnect();

	}

	function getComments($postId){

		$comments = $this->db->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));

		return $comments;

	}

	function getAllComments(){

		$allcomments = $this->db->query('SELECT * FROM comments WHERE status =  0 ORDER BY comment_date DESC');

		return $allcomments;

	}

	function submitComment($postId, $author, $comment){

	    $submitcomment = $this->db->prepare('INSERT INTO comments (post_id, author, comment, comment_date) VALUES (?, ?, ?, NOW())');
	    $affectedLines = $submitcomment->execute(array($postId, $author, $comment));

	    return $affectedLines;
	}

	function approveComment($id){

		$approvecomment = $this->db->prepare('UPDATE comments SET status = 1 WHERE id = ?');
		$affectedLines = $approvecomment->execute(array($id));

	}

	function disapproveComment($id){

		$deletecomment = $this->db->prepare('DELETE FROM comments WHERE id = ?');
		$affectedLines = $deletecomment->execute(array($id));

	}

}