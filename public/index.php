<?php
setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR@euro', 'fr_FR.utf8', 'fr-FR', 'fra');
require('../controller/controller.php');

session_start();

$action = filter_input(INPUT_GET, 'action');
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

try {
	if (isset($action)) {
		if ($action == 'listPosts') {
			listAllPosts();
		} elseif ($action == 'post') {
			if (isset($id) && $id > 0) {
				post();
			} else {
				// Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		} elseif ($action == 'addPost') {
			if (!$_POST) {
				require('../view/frontend/addPostView.php');
			} else {
				if (!empty(filter_input(INPUT_POST, 'author')) && !empty(filter_input(INPUT_POST, 'title')) && !empty(filter_input(INPUT_POST, 'content'))) {
					addPost(filter_input(INPUT_POST, 'author'), filter_input(INPUT_POST, 'title'), filter_input(INPUT_POST, 'content'));
				} else {
					throw new Exception('Tous les champs ne sont pas remplis !');
				}
			}
		} elseif ($action == 'editPost') {
			if (isset($id) && $id > 0) {
				if (!$_POST) {
					editPost();
				} else {
					if (!empty(filter_input(INPUT_POST, 'author')) && !empty(filter_input(INPUT_POST, 'title')) && !empty(filter_input(INPUT_POST, 'content'))) {
						confirmEditPost(filter_input(INPUT_POST, 'author'), filter_input(INPUT_POST, 'title'), filter_input(INPUT_POST, 'content'));
					} else {
						$error = 'test';
						editPost();
					}
				}
			} else {
				// Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
				throw new Exception('Aucun identifiant de commentaire envoyé');
			}
		} elseif ($action == 'deletePost') {
			if (isset($id) && $id > 0) {
				deletePost();
			} else {
				// Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
				throw new Exception('Aucun identifiant de commentaire envoyé');
			}
		} elseif ($action == 'submitComment') {
			if (isset($id) && $id > 0) {
				if (!empty(filter_input(INPUT_POST, 'author')) && !empty(filter_input(INPUT_POST, 'comment'))) {
					submitComment($id, filter_input(INPUT_POST, 'author'), filter_input(INPUT_POST, 'comment'));
				} else {
					// Autre exception
					throw new Exception('Tous les champs ne sont pas remplis !');
				}
			} else {
				// Autre exception
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		} elseif ($action == 'manageComments') {
			if ($_SESSION['rank'] == 2) {
				manageComments();
			} else {
				header('location: index.php');
			}
		} elseif ($action == 'approveComment') {
			if (isset($id) && $id > 0) {
				approveComment();
			} else {
				// Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
				throw new Exception('Aucun identifiant de commentaire envoyé');
			}
		} elseif ($action == 'disapproveComment') {
			if (isset($id) && $id > 0) {
				disapproveComment();
			} else {
				// Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
				throw new Exception('Aucun identifiant de commentaire envoyé');
			}
		} elseif ($action == 'login') {
			if (!$_POST) {
				require('../view/frontend/loginView.php');
			} else {
				if (!empty(filter_input(INPUT_POST, 'username')) && !empty(filter_input(INPUT_POST, 'password'))) {
					connectUser(filter_input(INPUT_POST, 'username'), filter_input(INPUT_POST, 'password'));
				} else {
					$error = 'Veuillez completer tous les champs !';
					require('../view/frontend/registerView.php');
				}
			}
		} elseif ($action == 'register') {
			if (!$_POST) {
				require('../view/frontend/registerView.php');
			} else {
				if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2'])) {
					registerUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['password2']);
				} else {
					$error = 'Veuillez completer tous les champs !';
					require('../view/frontend/registerView.php');
				}
			}
		} elseif ($action == 'logout') {
			logoutUser();
		}
	} else {
		if ($_POST) {
			$sendEmail = filter_input(INPUT_POST, 'send-email');
			if (isset($sendEmail)) {

				sendMail($_POST['name'], $_POST['f-name'], $_POST['email'], $_POST['subject'], $_POST['message']);
			}
		} else {
			unset($_SESSION['mail_msg']);
			listHomePosts();
		}
	}
} catch (Exception $e) { // S'il y a eu une erreur, alors...
	echo 'Erreur : ' . $e->getMessage();
}
