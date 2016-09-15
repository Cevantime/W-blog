<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('header'); ?>
<div class="flexslider">
	<ul class="slides">
		<li>
			<p class="title-slide">Il me fallait 5 images...</p>
			<img class="img-slide" src="<?php echo baseUrl('assets/img/about-bg-slide.jpg'); ?>">
		</li>
		<li>
			<p class="title-slide">...pour le slider...</p>
			<img class="img-slide" src="<?php echo baseUrl('assets/img/contact-bg-slide.jpg'); ?>">
		</li>
		<li>
			<p class="title-slide">...et ça tombe bien...</p>
			<img class="img-slide" src="<?php echo baseUrl('assets/img/home-bg-slide.jpg'); ?>">
		</li>
		<li>
			<p class="title-slide">...le theme que j'ai choisi en compte exactement 4!</p>
			<img class="img-slide" src="<?php echo baseUrl('assets/img/post-bg-slide.jpg'); ?>">
		</li>
	</ul>
</div>
<script type="text/javascript" charset="utf-8">
	$(window).load(function () {
		$('.flexslider').flexslider();
	});
</script>

<?php $this->stop('header'); ?>

<?php $this->start('main_content') ?>

<?php $this->insert('includes/flashmessages', array('fmsg' => $fmsg)); ?>

<div class="container" id="articles-container">
	<div class="text-center"><img class="loader" src="<?php echo baseUrl('assets/img/balls.svg'); ?>"/></div>
</div>
<script>
	var articlesLoaded = false;
	$(window).scroll(function () {
		if (isScrolledIntoView('#articles-container') && !articlesLoaded) {
			articlesLoaded = true;
			setTimeout(function () {
				$.get(baseUrl + '/article/partial/0', function (rep) {
					$('#articles-container').html(rep);
				});
			}, 500);
		}
	});
</script>
<?php $this->stop('main_content') ?>
