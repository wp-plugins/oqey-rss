<?php
// oQey Rss
// Copyright (c) 2010 www.qusites.com
// This is an plugin for WordPress
// http://wordpress.org/
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// *****************************************************************

/*
Plugin Name: oQey Rss
Version: 0.1
Description: oQey Rss plugin, will help to have a nice rss feed with images.
Author: Dorin D. | www.qusites.com
Author URI: http://www.qusites.com
*/
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'oqeyrss.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

add_filter('the_content', 'oqey_clear_rss');
function oqey_clear_rss($content){
if (is_feed()) {
$content = oqey_process_txt($content);
}
return $content;
}


function oqey_process_txt($content){
$content = preg_replace_callback( "/<img[^>]*>/i", "oqey_add_css", $content );
return $content;
}

function oqey_add_css($gasite){
	echo '<span class="oqeyimage">'.$gasite[0].'</span><br/>';
}
?>