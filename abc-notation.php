<?php
/*
Plugin Name: ABC Notation
Plugin URI: http://wordpress.paulrosen.net/plugins/abc-notation
Description: Include sheet music on your WordPress site by simply specifying the ABC style string in the shortcode <strong>[abcjs]</strong>. For a complete description of the syntax, see the <a href="http://wordpress.paulrosen.net/plugins/abc-notation">Plugin Site</a>.
Version: 2.1
Author: Paul Rosen
Author URI: http://paulrosen.net
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

/*
Copyright (C) 2015 Paul Rosen

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

//-- Add the javascript.
add_action('wp_enqueue_scripts','abcjs_loader');

function abcjs_loader() {
	wp_enqueue_script( 'abcjs-plugin', plugins_url( '/abcjs_basic_2.1-min.js', __FILE__ ));
}

//-- Interpret the [abcjs] shortcode
function create_music( $atts, $content ) {
	$a = shortcode_atts( array(
		'class' => 'abc-paper',
		'parser' => '{}',
		'engraver' => '{}'
	), $atts );

	$content2 = preg_replace("&<br />\n&", "\x01", $content);
	$content2 = preg_replace("&\r\n&", "\x01", $content2);
	$content2 = preg_replace("&\n&", "\x01", $content2);
	$content2 = preg_replace("-&#8221;-", "\\\"", $content2);
	$content2 = preg_replace("-&#8217;-", "'", $content2);
	$content2 = preg_replace("-&#8243;-", "\\\"", $content2);
	$content2 = preg_replace("-&#8220;-", "\\\"", $content2);

	$id = 'abc-paper-' . uniqid();
	$output = '<div id="' . $id . '" class="' . $a['class'] . '"></div>' .
		'<script type="text/javascript">' .
		'ABCJS.renderAbc("' . $id . '", "' . $content2 . '".replace(/\x01/g,"\n"), ' . $a['parser'] . ', ' . $a['engraver'] . ');' .
		'</script>';

	return $output;
}
add_shortcode( 'abcjs', 'create_music' );
