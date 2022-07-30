<?php
$title = 'Jimmy GORONFLOT - Développeur PHP';
$description = '';
$page = 'home';
?>

<?php ob_start(); ?>

<div class="header">
	<div class="profil-card col-lg-4 col-md-8 col-sm-8 col-10">
		<img src="img/photo.jpg" alt="">
		<h1>Jimmy GORONFLOT</h1>
		<p>
			Le développeur qu’il vous faut !<br />
			Étudiant à Openclassrooms - Parcours PHP / Symfony
		</p>

		<a href="pdf/CV.pdf" target="_blank" class="open-cv"><i class="fal fa-file-pdf fa-lg"></i><span>Voir mon CV</span></a>
		<ul class="col-3">
			<li><a href="https://github.com/JGoronflot/" target="_blank"><i class="fab fa-github fa-lg"></i></a></li>
			<li><a href="https://www.linkedin.com/in/jimmygoronflot/" target="_blank"><i class="fab fa-linkedin-in fa-lg"></i></a></li>
		</ul>
	</div>
</div>
<div class="preview-blog">
	<div class="lasts-posts col-lg-10 col-md-6">
		<?php
		foreach ($posts as $post) {
		?>
			<div class="h-post col-12 col-lg-3">
				<div class="thumbnail-post" style="background-image: url(img/blog/thumbnails/<?= ($post->id) ?>.jpg)"></div>
				<div class="h-post-content">
					<h1>
						<?php
						if (strlen($post->title) > 50) {
							$post->title = substr($post->title, 0, 50) . '...';
							echo (htmlspecialchars($post->title));
						} else {
							echo (htmlspecialchars($post->title));
						}
						?>
					</h1>
					<p>
						<?php
						if (strlen($post->content) > 260) {
							$post->content = substr($post->content, 0, 260) . '...';
							echo (nl2br(htmlspecialchars($post->content)));
						} else {
							echo (nl2br(htmlspecialchars($post->content)));
						}
						?>
					</p>
					<a href="index.php?action=post&amp;id=<?= ($post->id) ?>">Lire l'article</a>
				</div>
				<div class="h-post-infos">
					<span><i class="fas fa-user"></i><?= $post->author ?></span>
					<span><?= (strftime("%d %B %Y", strtotime($post->creation_date))) ?><i class="fas fa-calendar-alt"></i></span>
				</div>
			</div>

		<?php
		}
		?>
	</div>
</div>

<div class="form-contact" id="contact">
	<form action="index.php" method="POST" class="col-10 col-lg-6 mx-auto">
		<?php if (isset($_SESSION['mail_msg'])) : ?>
			<div class="alert alert-<?= ($_SESSION['mail_msg'][1]) ?> alert-explode" role="alert">
				<span><?= ($_SESSION['mail_msg'][0]) ?></span>
			</div>
		<?php endif ?>
		<h1>Me contacter</h1>
		<p>Les champs indiqués par un asterisque (*) sont obligatoires.</p>
		<div class="row">
			<div class="form-group col-12 col-lg-6">
				<label for="form-contact-name">Votre nom*</label>
				<input type="text" class="form-control" name="name" id="form-contact-name" required>
			</div>
			<div class="form-group col-12 col-lg-6">
				<label for="form-contact-name">Votre prénom*</label>
				<input type="text" class="form-control" name="f-name" id="form-contact-f-name" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-12">
				<label for="form-contact-email">Votre email*</label>
				<input type="email" class="form-control" name="email" id="form-contact-email" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-12">
				<label for="form-contact-subject">Sujet*</label>
				<input type="text" class="form-control" name="subject" id="form-contact-subject" required>
			</div>
		</div>
		<div class="form-group">
			<label for="form-contact-message">Votre message*</label>
			<textarea class="form-control" name="message" id="form-contact-message" required></textarea>
		</div>
		<button type="submit" class="col-6 col-lg-3" name="send-email" id="form-contact-send">Envoyer</button>
	</form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>