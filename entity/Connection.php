<?php
class Connection extends Entity {

    public static function db_connect()
    {
      require('../config/db_config.php');
      try {
          $db = new \PDO('mysql:host=' .$db_infos['db']['db_host'] .';dbname=' .$db_infos['db']['db_name'], $db_infos['db']['db_username'], $db_infos['db']['db_password']);
          return $db;
      } catch (\Exception $e) {
          throw new \Exception('Error creating a database connection');
      }
    }
  }
