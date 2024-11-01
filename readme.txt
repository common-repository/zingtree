=== zingtree ===
Contributors: Zingtree
Donate link: https://zingtree.com
Tags: decision tree, call center, contact center, agent scripting, interactive decision tree, support, interactive faq, troubleshooter, medical scheduling, call script
Requires at least: 3.0
Tested up to: 5.11
Stable tag: 6.11
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

Embed interactive decision trees from Zingtree into your web site. Great for support, call centers, retail product finders, medical diagnosis and triage, and more.

== Description ==

> **[Learn more about Zingtree](http://zingtree.com)** 

Zingtree is a toolkit that lets you embed interactive decision trees into any web page.  It's useful for helping people find answers in a simple Q&A format. Your end-users are prompted with questions and then click answer buttons to navigate through an interactive decision tree you build. You can start building trees now at Zingtree.com for free.

To embed a Zingtree into your web page, enter a short code like this:

`[zingtree id="148196706"]`

or as a button which triggers a pop-up tree:

`[zingtree display="popup" id="148196706"]`

or to display in "panels" style and add persistent buttons to the bottom of each page:

`[zingtree id="148196706" style="panels" persist_names="Restart|Submit Ticket" persist_node_ids="1|5"]`


Including a real-time History:

`[zingtree id="148196706" show_history="yes"]`


Hiding the name of the tree:

`[zingtree id="148196706" hide_title="yes"]`


Hiding the back button:

`[zingtree id="148196706" hide_back_button="yes"]`


Adding a 400 msec Fade transition effect:

`[zingtree id="148196706" transition="fade" speed="400"]`

Adding a 1000 msec Slide transition effect:

`[zingtree id="148196706" transition="slide" speed="1000"]`




= The parameters: =
* **id** - The Tree ID which you want to embed.
* **style** - The style used to display the tree. Can be "buttons" or "panels". Buttons is the default if not specified. (optional)
* **show_history** - Set this to "yes" to include a real-time history display (optional).
* **show_breadcrumbs** - Set this to "yes" to include a contextual "breadcrumbs" display (optional).
* **persist_names** - Names of persistent buttons on each page (optional)
* **persist_node_ids** - The Node #s of persistent buttons on each page (optional).
* **hide_title** - Set this to "yes" to not display the name of the tree (optional).
* **hide_back_button** - Set this to "yes" to not display the Back button (optional).
* **transition** - Set a special effect for moving from node to node. Can be "fade" or "slide" (optional).
* **speed** - For transition effects, set the speed of the effect in milliseconds. 400 is default. (optional).
* **disable_scroll** - Disables the automatic scrolling that occurs when embedding trees into web pages. Defaults to "yes" (optional).
* **other_parameters** - Add other Publishing URL parameters to the code thatlaunches your tree. See the Zingtree FAQ for details. (optional)

* **display** - Set to "embed" or "popup". Embed embeds the tree into your page. Popup makes a button which when clicked opens the tree in a popup over your page. Default is embed (optional).
* **button_color** - If in Popup mode, this is the color of the button in hex. (I.e. "#FF0000"). Defaults to blue. (optional)
* **button_text_color** - If in Popup mode, sets the color of the button text in hex. Defaults to white. (optional)
* **button_text** - Sets the text that appears in the button. (optional)




== Changelog ==

= 6.1 =
Added other_parameters, disable_scroll, scroll_parent_to_top options

= 5.0 =
Added show_history, show_breadcrumbs options

= 4.0 =
Added options for pop-up decision tree display

= 3.1 =
* Uses esc_html instead of wp_specialchars


= 2.1 =
* Added hide_title, hide_back_button options
* Uses latest tree rendering engine


= 2.0.0 =
* Added support for Panels style


= 1.0.0 =
* Initial release

== Installation ==

1. Install and activate the plugin on the Plugins page
2. Add shortcode `[zingtree name="My Tree" id="148196706" ]` to the page or the post content. Substitute for the name and ID of your tree.
