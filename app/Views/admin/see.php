<?php $this->layout('bo', ['title' => 'Lecture de l\'article "'.$this->e($article['title']).'"']); ?>
<?php $this->start('main_content') ?>
<div class="row blog-post">
    <div class="col-md-12 main-content">
        <p class="muted small">
            publié <?php echo zero_date($article['date_add']); ?>
        </p>
		<h3>
			<?php echo $this->e($article['title']); ?>
		</h3>
        <p>
			<?php echo $this->e($article['content']); ?>
		</p>
		<p>
			<a class="btn btn-primary" href="<?php echo baseUrl('admin/all'); ?>" title="Revenir à la liste des articles">Revenir à la liste des articles</a>
		</p>
    </div>

</div>

<?php $this->stop('main_content') ?>