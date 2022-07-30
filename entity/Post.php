<?php
class Post extends Entity {

    protected $tableName = 'posts';
  
    public $id;
  
    public $title;
  
    public $content;
  
    public $author;

    public static function getByID($id)
    {
      require('../config/db_config.php');
      try {
          $db = new \PDO('mysql:host=' .$db_infos['db']['db_host'] .';dbname=' .$db_infos['db']['db_name'], $db_infos['db']['db_username'], $db_infos['db']['db_password']);
      } catch (\Exception $e) {
          throw new \Exception('Error creating a database connection ');
      }
      $con = $db->prepare("SELECT * FROM posts WHERE id=?");
      $con->bindValue(1, $id, PDO::PARAM_INT);
      $con->execute();

      $con->setFetchMode(PDO::FETCH_CLASS, 'Post');
      $result = $con->fetch();
      return $result;
    }

    public static function getAll()
    {
      require('../config/db_config.php');
      try {
          $db = new \PDO('mysql:host=' .$db_infos['db']['db_host'] .';dbname=' .$db_infos['db']['db_name'], $db_infos['db']['db_username'], $db_infos['db']['db_password']);
      } catch (\Exception $e) {
          throw new \Exception('Error creating a database connection ');
      }
      $con = $db->prepare("SELECT * FROM posts");
      $con->execute();
      
      $result = $con->fetchAll(PDO::FETCH_CLASS, 'Post');
      return $result;
    }

    public static function getLastestPosts($int)
    {
      require('../config/db_config.php');
      try {
          $db = new \PDO('mysql:host=' .$db_infos['db']['db_host'] .';dbname=' .$db_infos['db']['db_name'], $db_infos['db']['db_username'], $db_infos['db']['db_password']);
      } catch (\Exception $e) {
          throw new \Exception('Error creating a database connection ');
      }
      $con = $db->prepare("SELECT * FROM posts ORDER BY creation_date DESC LIMIT ".$int);
      $con->execute();
      
      $result = $con->fetchAll(PDO::FETCH_CLASS, 'Post');
      return $result;
    }

    public function remove()
    {
      require('../config/db_config.php');
      try {
          $db = new \PDO('mysql:host=' .$db_infos['db']['db_host'] .';dbname=' .$db_infos['db']['db_name'], $db_infos['db']['db_username'], $db_infos['db']['db_password']);
      } catch (\Exception $e) {
          throw new \Exception('Error creating a database connection ');
      }
      $con = $db->prepare("DELETE FROM posts WHERE id=?");
      $con->bindValue(1, $this->id, PDO::PARAM_INT);
      $con->execute();
    }
  }