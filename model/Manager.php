<?php

class Manager{

    // Fonction to connect to the database
    protected function dbConnect() {
    	require('../config/db_config.php');
        $db = new PDO('mysql:host=' .$db_infos['db']['db_host'] .';dbname=' .$db_infos['db']['db_name'], $db_infos['db']['db_username'], $db_infos['db']['db_password']);
		return $db;
    }
}
