=== Get Permalink ===
Contributors: Justin Tadlock
Donate: http://justintadlock.com
Tags: permalink
Requires at least: 2.0
Tested up to: 2.7
Stable tag: 0.1

== Description ==

The permalink shortcode plugin allows you to link to posts/pages within your blog by using the post/page ID.  This way, any future changes won't leave you with broken links in your posts.

You use a WordPress shortcode to accomplish this:

`[permalink]content[/permalink]`

You can use the permalink shortcode easily.  Think of it just like you would hyperlinks.

Here are some example uses (100 is the ID of your post/page):

/*
* Basic link
*/

Use this in the Write Post panel:

`[permalink href="100"]Hello world[/permalink]`

The output would be something like this:

`<a href="http://yoursite.com/link-to-post" title="Title of permalink post" rel="bookmark">Hello world</a>`

/*
* More attributes (just like normal links)
*/

`[permalink href="100" title="Super cool post title" rel="nofollow" class="red-class"]I like this post[/permalink]`


/*
* Enclose image
*/

`[permalink href="100"]<img src="image.jpg" alt="Example image" />[/permalink]`

== Installation ==

1. Unzip the `get-permalink.zip` folder.
2. Upload the `get-permalink`folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.