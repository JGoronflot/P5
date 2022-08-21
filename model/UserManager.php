<?php

require_once('../model/Manager.php');
require_once('../entity/Entity.php');
require_once('../entity/Connection.php');
require_once('../entity/User.php');

class UserManager extends Manager
{

	function __construct()
	{
		$this->db = $this->dbConnect();
	}

	// fonction to connect a user
	function connectUser($username, $password)
	{
		$username_connect = htmlspecialchars($username);
		$mdp_connect = sha1($password);
		if (!empty($username_connect) && !empty($mdp_connect)) {
			$user = User::getUser($username_connect, $mdp_connect);
			return $user;
		}
	}

	// fonction to register a user
	function registerUser($username, $email, $password, $password2)
	{
		$username_lenght = strlen($username);
		if ($username_lenght <= 255) {
			$user = User::getUser($username, $password);
			if (!$user) {
				if ($password == $password2) {
					$user = new User();
					$user->setUsername($username);
					$user->setEmail($email);
					$user->setPassword(sha1($password));
					$user->save();
					$success = 'Votre compte a bien été crée :)';
					require('../view/frontend/registerView.php');
				} else {
					$error = 'Les mots de passe ne correspondent pas :(';
					require('../view/frontend/registerView.php');
				}
			} else {
				$error = 'Ce nom d\'utilisateur est déjà pris :(';
				require('../view/frontend/registerView.php');
			}
		} else {
			$error = 'Le nom d\'utilisateur est trop long, <br> (maximum 255 caractères)';
			require('../view/frontend/registerView.php');
		}
	}
}
