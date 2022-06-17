<?php

require_once('model/Manager.php');

class UserManager extends Manager {

	function __construct() {

		$this->db = $this->dbConnect();

	}

	function connectUser($username, $password) {

		$username_connect = htmlspecialchars($username);
     	$mdp_connect = sha1($password);
         
        if(!empty($username_connect) AND !empty($mdp_connect)) {

	        $requser = $this->db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
	        $requser->execute(array($username_connect, $mdp_connect));
	        $userexist = $requser->rowCount();

	        return $requser->fetch();

        }

	}

	function registerUser($username, $email, $password, $password2){

		$username_lenght = strlen($username);

		if ($username_lenght <= 255) {

			$requsername = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        	$requsername->execute(array($username));
        	$username_exist = $requsername->rowCount();

        	if ($username_exist == 0) {

        		if ($password == $password2) {

        			$registeruser = $this->db->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
		    		$UserRegistration = $registeruser->execute(array($username, $email, sha1($password)));

		    		$success = 'Votre compte a bien été crée :)';
		    		require('view/frontend/registerView.php');

        		} else {

        			$error = 'Les mots de passe ne correspondent pas :(';
        			require('view/frontend/registerView.php');

        		}
        		
        	} else {

        		$error = 'Ce nom d\'utilisateur est déjà pris :(';
        		require('view/frontend/registerView.php');

        	}

		} else {

			$error = 'Le nom d\'utilisateur est trop long, <br> (maximum 255 caractères)';
			require('view/frontend/registerView.php');

		}

	}

}