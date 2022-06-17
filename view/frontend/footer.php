<div class="footer"
<?php if (isset($page_size) AND $page_size == 1){
	echo "style='position: absolute; bottom: 0;width: 100%;'";
}?>
>
	<div class="footer-content row col-md-8">
		<div class="links col-md-6">
			<h1>Navigation</h1>
			<hr>
			<ul>
				<li><a href="index.php">Blog</a></li>
				<li><a href="#">Portfolio</a></li>
				<li><a href="#">A propos</a></li>
				<li><a href="index.php#contact">Contact</a></li>
				<li><a href="index.php?action=manageComments">Administration</a></li>
			</ul>
		</div>
		<div class="social col-md-6">
			<h1>Réseaux sociaux</h1>
			<hr>
			<ul>
				<li><a href="https://github.com/JGoronflot/" target="_blank"><i class="fab fa-github fa-2x"></i></a></li>
				<li><a href="https://www.linkedin.com/in/jimmygoronflot/" target="_blank"><i class="fab fa-linkedin-in fa-2x"></i></a></li>
			</ul>
			<span>© 2022 Jimmy GORONFLOT</span>
		</div>
	</div>
</div>