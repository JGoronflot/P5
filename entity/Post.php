<?php
class Post extends Entity {

    protected $tableName = 'posts';
  
    public $id;
  
    public $title;
  
    public $content;
  
    public $author;

    public function setID($id){
      $this->id = $id;
    }
    public function getID(){
      return $this->id;
    }
    public function setTitle($title){
      $this->title = $title;
    }
    public function getTitle(){
      return $this->title;
    }
    public function setContent($content){
      $this->content = $content;
    }
    public function getContent(){
      return $this->content;
    }
    public function setAuthor($author){
      $this->author = $author;
    }
    public function getAuthor(){
      return $this->author;
    }
    public function setCreationDate($creation_date){
      $this->creation_date = $creation_date;
    }
    public function getCreationDate(){
      return $this->creation_date;
    }
    public function setUpdateDate($update_date){
      $this->update_date = $update_date;
    }
    public function getUpdateDate(){
      return $this->update_date;
    }

    public static function getByID($id)
    {
      $db = new Connection();
      $con = $db->dbConnect()->prepare("SELECT * FROM posts WHERE id=?");
      $con->bindValue(1, $id, PDO::PARAM_INT);
      $con->execute();

      $con->setFetchMode(PDO::FETCH_CLASS, 'Post');
      $result = $con->fetch();
      return $result;
    }

    public static function getAll()
    {
      $db = new Connection();
      $con = $db->dbConnect()->prepare("SELECT * FROM posts");
      $con->execute();
      
      $result = $con->fetchAll(PDO::FETCH_CLASS, 'Post');
      return $result;
    }

    public static function getLastestPosts($int)
    {
      $db = new Connection();
      $con = $db->dbConnect()->prepare("SELECT * FROM posts ORDER BY creation_date DESC LIMIT ".$int);
      $con->execute();
      
      $result = $con->fetchAll(PDO::FETCH_CLASS, 'Post');
      return $result;
    }

    public function remove()
    {
      $db = new Connection();
      $con = $db->dbConnect()->prepare("DELETE FROM posts WHERE id=?");
      $con->bindValue(1, $this->id, PDO::PARAM_INT);
      $con->execute();
    }
  }
