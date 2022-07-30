<?php

require_once('../model/Manager.php');
require_once('../entity/Entity.php');
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
		if (!empty($username_connect) and !empty($mdp_connect)) {
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
			var_dump($user);
			if (!$user) {
				if ($password == $password2) {
					$user = new User();
					$user->username = $username;
					$user->email = $email;
					$user->password = sha1($password);
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
