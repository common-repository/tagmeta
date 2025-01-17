<?php
/*
Plugin Name: TagMeta
Plugin URI: http://www.geeks2null.de/1331/tagmeta-meta-keywords-aus-tags-generieren-lassen/
Description: TagMeta - Using your tags as meta keywords.
Version: 1.1
Author: Timo Schlueter
Author URI: http://wordpress.org/extend/plugins/profile/tmuh
Update Server: http://wordpress.org/extend/plugins/tagmeta/
Min WP Version: 2.7.0
Max WP Version: 2.7.1
*/
 
/*  Copyright 2009  Timo Schlueter  (email : timo.schlueter@me.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function tagstometa() {

	if (is_home())
	{
		$tags = get_tags('orderby=count&order=DESC&number=10');
		$array_count = count($tags);
		$count = 0;
	
		for ($count = 0; $count < $array_count; $count++)
		{
			$tagstring = $tagstring.$tags[$count]->name.", ";
		}	
	
		$tagstring = substr($tagstring, 0, -2);
		
		echo "<!-- Meta keywords generated by TagMeta -->";
		echo "<meta name=\"keywords\" content=\"$tagstring\" />";
	}
}

add_action ( 'wp_head', 'tagstometa');
?>