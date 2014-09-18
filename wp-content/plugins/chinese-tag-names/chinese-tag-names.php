<?php 
/*
Plugin Name: Chinese Tag Names
Plugin URI: http://nutsland.cn/blog/archives/177.html
Description: 解决中文标签名(已支持所有含中文的固定链接)不能访问的问题。
Author: Coconut
Version: 1.1
Author URI: http://nutsland.cn
*/

add_action('parse_request', 'coco_chinese_tag_names_parse_request');
add_filter('get_pagenum_link', 'coco_chinese_tag_names_get_pagenum_link');

function coco_chinese_convencoding($str, $to = 'UTF-8', $from = 'GBK') {
	if (function_exists('mb_convert_encoding')) {
		$str = mb_convert_encoding($str, $to, $from);
	} else if (function_exists('iconv')) {
		$str = iconv($from, $to . "//IGNORE", $str);
	}
	return $str;
}

function coco_chinese_tag_names_parse_request($obj) {
    if ($obj->did_permalink == false) return;
	if(isset($obj->request))
		$obj->request = coco_chinese_convencoding($obj->request, get_option('blog_charset'));
	if(isset($obj->query_vars)) foreach ($obj->query_vars as $key => &$value) {
		if ($key == 's') continue;
		$value = coco_chinese_convencoding($value, get_option('blog_charset'));
	}
}

function coco_chinese_tag_names_get_pagenum_link($result) {
	$result =  coco_chinese_convencoding($result, get_option('blog_charset'));
	return $result;
}


?>