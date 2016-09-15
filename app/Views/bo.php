<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
		<link href="<?php echo baseUrl('assets/css/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo baseUrl('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
		
		<script src="<?php echo baseUrl('assets/js/jquery/jquery.min.js'); ?>"></script>
		<script src="<?php echo baseUrl('assets/js/bo.min.js'); ?>" type="text/javascript"></script>

		<link rel="stylesheet" type="text/css" href="<?php echo baseUrl('assets/css/bo.min.css'); ?>">


        <title><?= $this->e($title) ?></title>
    </head>
	<body class=" theme-blue">


		<!-- Demo page code -->

		<script type="text/javascript">
			$(function () {
				var match = document.cookie.match(new RegExp('color=([^;]+)'));
				if (match)
					var color = match[1];
				if (color) {
					$('body').removeClass(function (index, css) {
						return (css.match(/\btheme-\S+/g) || []).join(' ')
					})
					$('body').addClass('theme-' + color);
				}

				$('[data-popover="true"]').popover({html: true});

			});
		</script>
		<style type="text/css">
			#line-chart {
				height:300px;
				width:800px;
				margin: 0px auto;
				margin-top: 1em;
			}
			.navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
				color: #fff;
			}
		</style>

		<script type="text/javascript">
			$(function () {
				var uls = $('.sidebar-nav > ul > *').clone();
				uls.addClass('visible-xs');
				$('#main-menu').append(uls.clone());
			});
		</script>

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="../assets/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">


		<!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
		<!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
		<!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
		<!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
		<!--[if (gt IE 9)|!(IE)]><!--> 

		<!--<![endif]-->

		<div class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="" href="index.html"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> Administration des	articles</span></a></div>

			<div class="navbar-collapse collapse" style="height: 1px;">
				<ul id="main-menu" class="nav navbar-nav navbar-right">
					<li class="dropdown hidden-xs">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> 
								<?php echo $w_user['username']; ?>
							<i class="fa fa-caret-down"></i>
						</a>

						<ul class="dropdown-menu">
							<li><a tabindex="-1" href="<?php echo baseUrl('logout'); ?>">Se déconnecter</a></li>
						</ul>
					</li>
				</ul>

			</div>
		</div>


		<div class="sidebar-nav">
			<ul>

				<li><a href="<?php echo baseUrl('home'); ?>" class="nav-header"><i class="fa fa-fw fa-tv"></i> Revenir au site</a></li>
				<li><a href="#" data-target=".articles-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-book"></i> Articles</a></li>
				<li>
					<ul class="articles-menu nav nav-list collapse">
						<li ><a href="<?php echo baseUrl('admin/all'); ?>"><span class="fa fa-caret-right"></span> Liste des articles</a></li>
						<li ><a href="<?php echo baseUrl('admin/add'); ?>"><span class="fa fa-caret-right"></span> Ajouter un article</a></li>
					</ul>
				</li>
			</ul>
		</div>

		<div class="content">
			<div class="header">
				<!--				<div class="stats">
									<p class="stat"><span class="label label-info">5</span> Tickets</p>
									<p class="stat"><span class="label label-success">27</span> Tasks</p>
									<p class="stat"><span class="label label-danger">15</span> Overdue</p>
								</div>-->

				<h1 class="page-title"><?= $this->e($title) ?></h1>

			</div>
			<div class="main-content">
				
				<?= $this->section('main_content') ?>

				<div id="modal-from-dom" class="modal small fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<a href="#" class="close" data-dismiss="modal">&times;</a>
								<h3></h3>
							</div>
							<div class="modal-body">

							</div>
							<div class="modal-footer">
								<a href="" class="btn btn-danger">OK</a>
								<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
							</div>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					<script type="text/javascript">
					function parseModal() {
						$('.confirm').click(function (e) {
							var url = $(this).data('url');
							var body = $(this).data('body');
							var header = $(this).data('header');
							var $modal = $('#modal-from-dom');
							$modal.modal('show');
							var $removeBtn = $modal.find('.btn-danger');
							$removeBtn.attr('href', url);

							var $body = $modal.find(".modal-body");
							$body.html(body);
							
							var $header = $modal.find(".modal-header h3");
							$header.html(header);
							return false;
						});
					}
					$(function () {
						parseModal();
						$(document).ajaxComplete(parseModal);
					});
				</script>
				<footer>
					<hr>

					<!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
					<p>© 2015 <a href="#" target="_blank">Core</a></p>
				</footer>
			</div>
		</div>

		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo baseUrl('assets/js/bootstrap/bootstrap.min.js'); ?>"></script>
		
		<script type="text/javascript">
					$("[rel=tooltip]").tooltip();
					$(function () {
						$('.demo-cancel-click').click(function () {
							return false;
						});
					});
		</script>

		
	</body></html>
