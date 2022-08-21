<?php
class User extends Entity {

    protected $tableName = 'users';
  
    public $id;
  
    public $username;
  
    public $email;
  
    public $password;
  
    public $avatar;
  
    public $rank;

    public function setID($id){
      $this->id = $id;
    }
    public function getID(){
      return $this->id;
    }
    public function setUsername($username){
      $this->username = $username;
    }
    public function getUsername(){
      return $this->username;
    }
    public function setEmail($email){
      $this->email = $email;
    }
    public function getEmail(){
      return $this->email;
    }
    public function setPassword($password){
      $this->password = $password;
    }
    public function getPassword(){
      return $this->password;
    }
    public function setAvatar($avatar){
      $this->avatar = $avatar;
    }
    public function getAvatar(){
      return $this->avatar;
    }
    public function setRank($rank){
      $this->rank = $rank;
    }
    public function getRank(){
      return $this->rank;
    }

    public static function getUser($username, $password)
    {
      $db = new Connection();
      $con = $db->db_connect()->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
      $con->execute(array($username, $password));
      $result = $con->fetch();
      return $result;
    }
  }
