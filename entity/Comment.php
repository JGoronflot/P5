<?php
class Comment extends Entity {

    protected $tableName = 'comments';
  
    public $id;
  
    public $author;
  
    public $comment;
  
    public $comment_date;
  
    public $post_id;
  
    public $status;

    public static function getAllCommentsStatus0()
    {
      require('../config/db_config.php');
      try {
          $db = new \PDO('mysql:host=' .$db_infos['db']['db_host'] .';dbname=' .$db_infos['db']['db_name'], $db_infos['db']['db_username'], $db_infos['db']['db_password']);
      } catch (\Exception $e) {
          throw new \Exception('Error creating a database connection ');
      }
      $con = $db->prepare("SELECT * FROM comments WHERE status =  0 ORDER BY comment_date DESC");
      $con->execute();
      
      $result = $con->fetchAll(PDO::FETCH_CLASS, 'Comment');
      return $result;
    }

    public static function getFromPost($postId)
    {
      require('../config/db_config.php');
      try {
          $db = new \PDO('mysql:host=' .$db_infos['db']['db_host'] .';dbname=' .$db_infos['db']['db_name'], $db_infos['db']['db_username'], $db_infos['db']['db_password']);
      } catch (\Exception $e) {
          throw new \Exception('Error creating a database connection ');
      }
      $con = $db->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY comment_date DESC");
      $con->bindValue(1, $postId, PDO::PARAM_INT);
      $con->execute();
      
      $result = $con->fetchAll(PDO::FETCH_CLASS, 'Comment');
      return $result;
    }

    public static function getByID($id)
    {
      require('../config/db_config.php');
      try {
          $db = new \PDO('mysql:host=' .$db_infos['db']['db_host'] .';dbname=' .$db_infos['db']['db_name'], $db_infos['db']['db_username'], $db_infos['db']['db_password']);
      } catch (\Exception $e) {
          throw new \Exception('Error creating a database connection ');
      }
      $con = $db->prepare("SELECT * FROM comments WHERE id = ?");
      $con->bindValue(1, $id, PDO::PARAM_INT);
      $con->execute();

      $con->setFetchMode(PDO::FETCH_CLASS, 'Post');
      $result = $con->fetch();
      return $result;
    }
  }
