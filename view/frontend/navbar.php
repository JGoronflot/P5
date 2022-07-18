<div class="navbar">
	<a href="index.php" class="navbar-logo">
		<img src="public/img/logo_orange.png" alt="">
	</a>
	<nav class="navbar-menu">
		<a href="index.php" class="<?php if ($page == 'home'){ echo 'active'; } ?>">Accueil</a>
		<a href="index.php?action=listPosts" class="<?php if ($page == 'blog'){ echo 'active'; } ?>">blog</a>
		<!-- <a  class="<?php if ($page == 'portfolio'){ echo 'active'; } ?>" style="cursor: not-allowed">portfolio</a> -->
	</nav>
	<div class="sign">
		
		<?php if (isset($_SESSION['id'])): ?>

		<div class="btn-group">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= htmlentities($_SESSION['username']) ?></button>
            <div class="dropdown-menu dropdown-menu-right">
               	<a class="dropdown-item nav-my-profile" href="#">Mon profil</a>
               	<div class="dropdown-divider"></div>

               	<?php if ($_SESSION['rank'] == 2): ?>
               	<a class="dropdown-item nav-manage-comments" href="index.php?action=manageComments">Gestion des commentaires</a>
               	<div class="dropdown-divider"></div>
               	<?php endif ?>

                <a class="dropdown-item nav-logout" href="index.php?action=logout">Déconnexion</a>
            </div>
        </div>

		<?php else : ?>
			
			<a href="index.php?action=login" class="btn-signin">Se connecter</a>
			
		<?php endif ?>

	</div>
</div>