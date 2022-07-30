<?php
class User extends Entity {

    protected $tableName = 'users';
  
    public $id;
  
    public $username;
  
    public $email;
  
    public $password;
  
    public $avatar;
  
    public $rank;

    public static function getUser($username, $password)
    {
      require('../config/db_config.php');
      try {
          $db = new \PDO('mysql:host=' .$db_infos['db']['db_host'] .';dbname=' .$db_infos['db']['db_name'], $db_infos['db']['db_username'], $db_infos['db']['db_password']);
      } catch (\Exception $e) {
          throw new \Exception('Error creating a database connection ');
      }
      $con = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
      $con->execute(array($username, $password));
      $result = $con->fetch();
      return $result;
    }
  }