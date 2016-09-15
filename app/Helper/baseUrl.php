<?php
if (!function_exists('baseUrl')) {

	function baseUrl($url) {
		return getApp()->getBasePath().'/'.$url;
	}

}

