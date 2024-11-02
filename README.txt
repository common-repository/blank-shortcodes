=== Blank Shortcodes ===
Contributors: Lucrus
Donate link: https://www.virtualbit.it/blankcodes
Tags: shortcodes
Requires at least: 3.0.1
Tested up to: 6.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Renders blank configured shortcodes 

== Description ==

The Blank Shortcodes WordPress plugin lets you blank out any shortcode that you don’t need anymore. Suppose, for example, you have thousands of posts in your site and most of them use a particular shortcode, e.g. this EasyAzon shortcode:

[easyazon_infoblock align=”none” identifier=”B01M7OTFFB” locale=”EN” tag=”sometag”]

Now suppose you switch to a new plugin for Amazon banners and you want to remove all the EasyAzon info blocks from your thousands of posts using it. Either you edit thousands of posts just to remove the EasyAzon shortcodes, or you just remove the EasyAzon plugin and insert the EasyAzon shortcodes names into the Blank Shortcodes configuration, separated by white spaces.

Features:

* It can blank any shortcode, EasyAzon ones are just an example
* Normal blanking (e.g. only configured shortcodes, but keeps their content)
* Total blanking (e.g. configured shortcodes AND their content)
* Shortcodes to blank out can be configured in the backend
* Blazingly FAST
* Self documented in the settings page
* Compatible with latest WordPress releases
* As of this writing, the only existing plugin that does this job
* No affiliation with EasyAzon, nor Amazon, nor anyone else. They are just the reason why I developed this plugin, but it’s not tied to them in any way.

PRO Features:

* Nothing more, but you can always donate for the only existing version of this plugin

Planned features (implementation time depends on received donations):

* Translations
* Integration with caching plugins (by now you have to clean caches manually after you have configured this plugin)
* anything else donors might come up with

== Installation ==

1. Unzip `blankcodes.zip` into the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

Ask me something frequently enough and I'll be glad to put it here...

== Screenshots ==

1. Here you find the plugin settings
1. Here you see how to configure it. You can specify any number of shortcodes in each setting. You can leave empty one or both 
settings. If ypu enter "shortcode" in total blanking it means that [shortcode] some content [/shortcode] will strip also the "some content" string from the page/post.

== Changelog ==

= 1.0.0 =
* First public release

== Upgrade Notice ==

= 1.0.0 =
* No notice
