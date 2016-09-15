<?php $this->layout('bo', ['title' => 'Recherche pour "' . $search . '"']) ?>
<?php $this->start('main_content') ?>

<div id="blog-posts">
	<?php if($articles): ?>
	
	<?php $this->insert('admin/includes/articles', array('articles' => $articles, 'search'=>$search)); ?>
	
	<?php else : ?>
	<p>
		Aucun article ne correspond à votre recherche
	</p>
	
	<?php endif; ?>
</div>

<div>
	<p>
		<a class="btn btn-primary" href="<?php echo baseUrl('admin/all'); ?>">Réinitialiser la recherche</a>
	</p>
</div>
<?php $this->stop('main_content'); ?>

