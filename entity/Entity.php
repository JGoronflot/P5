<?php

abstract class Entity {

    public static $db;
    protected $tableName;

    public function __construct() {
        require('../config/db_config.php');
        try {
            static::$db = new \PDO('mysql:host=' .$db_infos['db']['db_host'] .';dbname=' .$db_infos['db']['db_name'], $db_infos['db']['db_username'], $db_infos['db']['db_password']);
        } catch (\Exception $e) {
            throw new \Exception('Error creating a database connection ');
        }
    }

    public function save() {

        $class = new \ReflectionClass($this);
        $tableName = '';
        if ($this->tableName != '') {
          $tableName = $this->tableName;
        } else {
          $tableName = strtolower($class->getShortName());
        }
    
        $propsToImplode = [];
    
        foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $key => $property) { // consider only public properties of the providen 
          if ($key != array_key_last($class->getProperties(\ReflectionProperty::IS_PUBLIC))) {
            $propertyName = $property->getName();
            $propsToImplode[] = '`'.$propertyName.'` = "'.$this->{$propertyName}.'"';
          }
        }
    
        $setClause = implode(',',$propsToImplode); // glue all key value pairs together
        $sqlQuery = '';
    
        if ($this->id > 0) {
          $sqlQuery = 'UPDATE `'.$tableName.'` SET '.$setClause.' WHERE id = '.$this->id;
        } else {
          $sqlQuery = 'INSERT INTO `'.$tableName.'` SET '.$setClause;
        }
        
        $result = self::$db->exec($sqlQuery);
        
        $this->id = self::$db->lastInsertId();
    
        if (self::$db->errorCode() > 0) {
            throw new \Exception(self::$db->errorInfo()[2]);
        }
    
        return $result;
    }
  }
