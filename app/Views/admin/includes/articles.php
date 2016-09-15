<div class="padding-bottom">

	<form class="form-inline" action="<?php echo baseUrl('admin/search'); ?>" method="post">
		<div class="form-group">
			<label for="search">Rechercher un article</label>
			<input class="form-control" name="search" id="search"/>
			<input class="btn btn-primary" type="submit" value="Rechercher"/>
		</div>
	</form>
</div>
<?php foreach ($articles as $article): ?>
	<div class="row padding-bottom">
		<div class="col-md-12">
			<div class="post-summary">   
				<?php
				$articleTitle = $this->e($article['title']);
				if (isset($search)) {
					$articleTitle = preg_replace('/(' . preg_quote($search) . ')/i', '<span style="background-color: yellow">$1</span>', $articleTitle);
				}
				?>
				<h3 class="article-title" style="margin-top: 0px;"><a href="<?php echo baseUrl('admin/see/' . $article['id']); ?>"><?php echo $articleTitle; ?></a></h3>
				<p class="text-sm"><?php echo zero_date($article['date_add']); ?></p>
				<p>
					<?php echo substr($this->e($article['content']), 0, 150); ?>...
				</p>
				<p><a class="btn btn-default btn-sm" href="<?php echo baseUrl('admin/see/' . $article['id']); ?>">Lire</a></p>
			</div>
		</div>
	</div>
<?php endforeach; ?>