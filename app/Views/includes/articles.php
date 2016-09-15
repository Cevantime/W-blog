<?php foreach ($articles as $article): ?>
	<div class="post-preview">
		<a href="<?php echo baseUrl('article/see/'.$article['id']); ?>">
			<h2 class="post-title">
				<?php echo $article['title']; ?>
			</h2>
			<h3 class="post-subtitle">
				<?php echo substr($article['content'], 0, 100); ?>...
			</h3>
		</a>
		<p class="post-meta">Publié par <a href="#"><?php echo $article['author']; ?></a> <?php echo zero_date($article['date_add']); ?></p>
	</div>
	<hr>
<?php endforeach; ?>


