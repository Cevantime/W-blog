<?php $this->layout('layout', ['title' => $article['title'], 'subdescription' => 'publié par '.$article['author'].' '.zero_date($article['date_add'])]) ?>

<?php $this->start('main_content') ?>
<article>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<?php echo $article['content']; ?>
			</div>
			<p class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<a href="<?php echo baseUrl('articles'); ?>" class="btn btn-default">Revenir aux articles</a>
			</p>
		</div>
	</div>
<?php $this->stop('main_content') ?>