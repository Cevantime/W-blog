<?php $this->layout('bo', ['title' => 'Les articles']) ?>
<?php $this->start('main_content') ?>
	<?php $this->insert('includes/flashmessages', array('fmsg' => $fmsg)); ?>
	<div class="text-center">
		<?php echo pagination($articlesCount, 'admin/all', $index); ?>
	</div>

	<div id="blog-posts">
		<?php $this->insert('admin/includes/articles', array('articles'=> $articles)); ?>

	</div>

	<div class="text-center">
		<?php echo pagination($articlesCount, 'admin/all', $index); ?>
	</div>


<?php $this->stop('main_content'); ?>