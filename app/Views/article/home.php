<?php $this->layout('layout', ['title' => 'Les derniers articles', 'subdescription' => 'Laissez-vous scroller']) ?>
<?php $this->start('main_content'); ?>
<div class="container">
	<form class="form form-inline">
		<div class="form-group">
			<label>Rechercher par titre : </label>
			<input class="form-control typeahead" name="search" id="InputSearch"/>
		</div>
	</form>
</div>
<div class="container" id="articles-container">

</div>
<div class="text-center" id="loader-article"><img class="loader" src="<?php echo baseUrl('assets/img/balls.svg'); ?>"/></div>
<script>
	var articlesOffset = 0;
	var articlesLimit = 5;
	var articlesLoaded = false;
	var loading = false;

	$(window).scrollTop(0);

	function getLastArticles() {
		if (!loading) {
			loading = true;
			articlesOffset += articlesLimit;
			setTimeout(function () {
				$.get(baseUrl + '/article/partial/' + articlesOffset, function (rep) {
					var index = 0;
					var $articleConctainer = $('#articles-container');
					$posts = $('<div>' + rep + '</div>').find('.post-preview');
					if ($posts.length < articlesLimit) {
						articlesLoaded = true;
						$('#loader-article').html('');
					}
					$posts.each(function () {
						var $post = $(this);
						setTimeout(function () {
							$articleConctainer.append($post.addClass('slidein')).append('<hr/>');
						}, (index++) * 100);
					});
					loading = false;
				});
			}, 500);
		}
	}

	getLastArticles();

	var engine = new Bloodhound({
		prefetch: {
			url : baseUrl+'/article/allJson',
			cache: false
		},
		identify: function (obj) {
			return obj.id;
		},
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		datumTokenizer: function(d) {
			return Bloodhound.tokenizers.whitespace(d.title);
		}
	});
	
	var typeahead = $('.typeahead').typeahead({
		minLength: 2,
		highlight: true
		
	}, {
		name: 'my-articles',
		source: engine,
		display: function(rep) {return rep.title;},
		templates : {
			suggestion: function(value) {
				return '<div class="search-suggestion">'+value.title+'</div>'
			}
		}
	}).bind('typeahead:select', function(ev, suggestion) {
		window.location = baseUrl+'article/see/'+suggestion.id;
	});
	

	$(window).scroll(function () {
		if (isScrolledIntoView('#loader-article') && !articlesLoaded) {
			getLastArticles();
		}
	});
</script>

<?php $this->stop('main_content'); ?>


