=== VS Meta Description ===
Contributors: Guido07111975
Version: 6.8
License: GNU General Public License v3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Requires PHP: 5.6
Requires at least: 4.7
Tested up to: 6.1
Stable tag: 6.8
Tags: simple, meta description, seo, google, bing


This is a lightweight plugin to add a meta description to your WordPress website.


== Description ==
= About =
This is a lightweight plugin to add a meta description to your WordPress website.

Search engines such as Google and Bing use the meta description when listing search results.

You can use the post and page "Excerpt" and the post category and tag "Description" as meta description.

This plugin also supports the products and product categories and tags of WooCommerce.

= How to use =
After installation go to Settings > Meta Description and set your meta description.

The meta description should reflect the content of your post or page.

The recommended length is roughly between 120 and 160 characters.

= Post and page excerpt =
An excerpt is a summary of your post or page content.

The excerpt is already available for posts and this plugin will activate it for pages as well.

While adding a post or page you can set an excerpt by using the "Excerpt" box.

The "Excerpt" can be used as meta description for that post or page.

= Static page as homepage =
If you have set a static page as homepage, and you have activated the excerpt for posts and pages, the excerpt of that page will override the meta description from settings page.

So only if this page has no excerpt, the meta description from settings page will be used.

= Post category and tag description =
While adding a category or tag you can set a description by using the "Description" box.

The "Description" can be used as meta description for that category or tag page.

= WooCommerce =
This plugin also supports the products and product categories and tags of WooCommerce.

While adding a WooCommerce product you can set an excerpt by using the "Product short description" box.

The "Product short description" can be used as meta description for that product.

While adding a category or tag you can set a description by using the "Description" box.

The "Description" can be used as meta description for that category or tag page.

= Uninstall =
If you uninstall plugin via dashboard all settings will be removed from database.

You can avoid this via Settings > Meta Description.

= Question? =
Please take a look at the FAQ section.

= Translation =
Not included but plugin supports WordPress language packs.

More [translations](https://translate.wordpress.org/projects/wp-plugins/very-simple-meta-description) are very welcome!

The translation folder inside this plugin is redundant but kept for reference.

= Credits =
Without the WordPress codex and help from the WordPress community I was not able to develop this plugin, so: thank you!

Enjoy!


== Installation ==
Please check Description section for installation info.


== Frequently Asked Questions ==
= How do I set plugin language? =
Plugin will use the website language, set in Settings > General.

If plugin isn't translated into this language, language fallback will be English.

= Why a recommended meta description length? =
Because Google and Bing recommend a length roughly between 120 and 160 characters.

This way your meta description will be listed properly in all commonly used devices.

= Why does Google or Bing ignore my meta description? =
After adding a meta description it can take up to a week before Google or Bing have indexed your site again.

But they can also decide not to use it, when your meta description does not match their requirements.

= Why no excerpt box in the editor? =
When using the block editor, click the options icon and select "Preferences".

When using the classic editor, click the "Screen Options" tab.

Probably the checkbox to display the relevant box in the editor is not checked.

= Why no product section on settings page? =
This section is only available if WooCommerce is installed and active.

= Where are the Open Graph and Twitter Cards settings? =
I have removed both features in version 4.1 of this plugin.

= Can I use this plugin with other SEO plugins? =
If you have an active plugin (or theme) that also contains a meta description feature, don't activate or use this feature.

= No Semantic versioning? =
Version number doesn't give you info about the type of update (major, minor, patch). You should check changelog for that.

= How can I make a donation? =
You like my plugin and you're willing to make a donation? Thanks, I really appreciate that! There's a PayPal donate link at my website.

= Other question or comment? =
Please open a topic in plugin forum.


== Changelog ==
= Version 6.8 =
* Removed function load_plugin_textdomain() because redundant
* Plugin uses the WP language packs for its translation
* Kept translation folder for reference

= Version 6.7 =
* Plugin has a new name
* But plugin itself and ownership did not change

= Version 6.6 =
* Fix: character counter
* Minor changes in code

= Version 6.5 =
* Better validating, sanitizing and escaping

= Version 6.4 =
* Minor changes in code

= Version 6.3 =
* Minor changes in code

= Version 6.2 =
* Textual changes

= Version 6.1 =
* New: plugin now also supports tags
* Fix: conditional logic
* Fix: added extra check for WooCommerce

= Version 6.0 =
* Previous version crashes website without WooCommerce
* Fix: added extra check for WooCommerce

= Version 5.9 =
* Fix: meta description of the WooCommerce shop page

For all versions please check file changelog.


== Screenshots ==
1. Settings page (dashboard)
2. Settings page (dashboard)
3. Settings page (dashboard)
4. Page excerpt classic editor (dashboard)
5. Page excerpt block editor (dashboard)
6. Category description (dashboard)
7. WooCommerce product short description (dashboard)