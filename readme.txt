=== ABC Notation ===
Contributors: paulrosen
Donate link: http://wordpress.paulrosen.net/plugins/abc-notation
Tags: music abc-notation sheet-music abcjs
Requires at least: 4.0
Tested up to: 4.2
Stable tag: 2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Include sheet music on your WordPress site by simply specifying the ABC style string.

== Description ==

This includes the abcjs system on your WordPress site. To produce sheet music, put a valid ABC Notation string between the shortcodes [abcjs] and [/abcjs] on your page or post.

== Installation ==

1. Upload this folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Click 'Settings' in the dashboard, then 'ABC Notation' to customize.

== Frequently Asked Questions ==

= Where can this be used? =

Anywhere that shortcodes are accepted. That is, on pages, post, and widgets. It will not work on comments.

= How does it work? =

The plugin includes the [abcjs](http://abcjs.net/) JavaScript library. The string that is put in the shortcode is passed to that library, which translates it and renders it in an SVG element that it places on the page instead of the shortcode.

= What can be put in the ABC string that is placed in the shortcode? =

There is much written about ABC Notation around the web. You can start [here](http://abcnotation.com)

== Upgrade Notice ==

= 2.1 =
* Upgrade to use the abcjs 2.1 code.

* Allow the shortcode to appear inside a <pre> tag.

= 2.0 =
* Upgrade to use the abcjs 2.0 code.

= 1.12.1 =
* Get rid of smart quotes.

= 1.12 =
* Initial version

== Screenshots ==

1. An example of a shortcode and the resultant music that is produced.

== Changelog ==

= 1.12 =
* Initial version of this plugin. (Version numbers are in sync with the version of abcjs that is included.)

= 2.0 =
* Upgrade abcjs version.

= 2.1 =
* Upgrade abcjs version.
