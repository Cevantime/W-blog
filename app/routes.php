<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/home', 'Default#home', 'default_home2'],
		['GET|POST', '/admin', 'Admin#home', 'admin_home'],
		['GET|POST', '/admin/add', 'Admin#add', 'admin_add'],
		['POST', '/admin/search', 'Admin#search', 'admin_search'],
		['GET', '/admin/all', 'Admin#all', 'admin_all'],
		['GET|POST', '/admin/all/[i:limit]', 'Admin#all', 'admin_all_paginated'],
		['GET', '/admin/see/[i:id]', 'Admin#see', 'admin_see'],
		['GET', '/article/see/[i:id]', 'Article#see', 'article_see'],
		['GET', '/article/partial/[i:offset]', 'Article#partial', 'article_partial_1'],
		['GET', '/article/partial/[i:offset]/[i:limit]', 'Article#partial', 'article_partial_2'],
		['GET|POST', '/article/allJson', 'Article#allJson', 'article_all_json'],
		['GET', '/articles', 'Article#home', 'article_home'],
		['GET', '/logout', 'Logout#index', 'logout'],
		['GET|POST', '/login', 'Login#form', 'login'],
		['GET|POST', '/register', 'Register#form', 'register_form'],
	);