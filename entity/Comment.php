<?php
class Comment extends Entity {

    protected $tableName = 'comments';
  
    public $id;
  
    public $author;
  
    public $comment;
  
    public $comment_date;
  
    public $post_id;
  
    public $status;

    public function setID($id){
      $this->id = $id;
    }
    public function getID(){
      return $this->id;
    }
    public function setAuthor($author){
      $this->author = $author;
    }
    public function getAuthor(){
      return $this->author;
    }
    public function setComment($comment){
      $this->comment = $comment;
    }
    public function getComment(){
      return $this->comment;
    }
    public function setCommentDate($comment_date){
      $this->comment_date = $comment_date;
    }
    public function getCommentDate(){
      return $this->comment_date;
    }
    public function setPostID($post_id){
      $this->post_id = $post_id;
    }
    public function getPostID(){
      return $this->post_id;
    }
    public function setStatus($status){
      $this->status = $status;
    }
    public function getStatus(){
      return $this->status;
    }

    public static function getAllCommentsStatus0()
    {
      $db = new Connection();
      $con = $db->dbConnect()->prepare("SELECT * FROM comments WHERE status =  0 ORDER BY comment_date DESC");
      $con->execute();
      
      $result = $con->fetchAll(PDO::FETCH_CLASS, 'Comment');
      return $result;
    }

    public static function getFromPost($postId)
    {
      $db = new Connection();
      $con = $db->dbConnect()->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY comment_date DESC");
      $con->bindValue(1, $postId, PDO::PARAM_INT);
      $con->execute();
      
      $result = $con->fetchAll(PDO::FETCH_CLASS, 'Comment');
      return $result;
    }

    public static function getByID($id)
    {
      $db = new Connection();
      $con = $db->dbConnect()->prepare("SELECT * FROM comments WHERE id = ?");
      $con->bindValue(1, $id, PDO::PARAM_INT);
      $con->execute();

      $con->setFetchMode(PDO::FETCH_CLASS, 'Post');
      $result = $con->fetch();
      return $result;
    }
  }
