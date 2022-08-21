<?php
class Mail extends Entity {

    protected $tableName = 'mails';
  
    public $id;
  
    public $name;
  
    public $f_name;
  
    public $email;
  
    public $message;

    public function setID($id){
      $this->id = $id;
    }
    public function getID(){
      return $this->id;
    }
    public function setName($name){
      $this->name = $name;
    }
    public function getName(){
      return $this->name;
    }
    public function setFullName($fullname){
      $this->f_name = $fullname;
    }
    public function getFullName(){
      return $this->f_name;
    }
    public function setEmail($email){
      $this->email = $email;
    }
    public function getEmail(){
      return $this->email;
    }
    public function setMessage($message){
      $this->message = $message;
    }
    public function getMessage(){
      return $this->message;
    }
  }
