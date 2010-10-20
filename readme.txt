=== Organ Donor Register ===
Contributors: dartiss
Donate link: http://artiss.co.uk/donate
Tags: Organ, Donor, Register, NHS, Advert, Promote
Requires at least: 2.0.0
Tested up to: 2.9.2
Stable tag: 1.1

Help promote the UK NHS Organ Donor Register. This plugin will display 1 of 5 advertising images, complete with link to the Organ Donor register.

== Description ==

Right now more than 10,000 people in the UK need an organ transplant that could save or dramatically improve their lives. But each year around 1,000 people die while waiting for a transplant. Help us to give these people the chance for a new life.

This plugin will add 1 of 5 promotional images to your WordPress blog, complete with a link to the organ donor registry. This can be done with a sidebar widget, shortcode within a blog or post, or a function call anywhere within your code.

Thank you for supporting organ donation.

There are 3 ways to display an Organ Donor image on your blog.

*1. Function Call*

For those with access to their theme PHP a function calls adds total flexibility as it can be added anywhere within your theme.

`<?php if (function_exists('organ_donor_register')) {organ_donor_register('image','style','options');} ?>`

Where `image` is the image number (see below), `style` is an optional list of stylesheet elements that you wish to apply to the resulting image and `options` is a list of further options. Two options are currently available - if both are specified, they must be seperated by an ampersand...

**target=** : This specifies the link target - e.g. `_blank`

**nofollow=** : If set to `Yes`, this will set the `rel=nofollow` element to your link, preventing search engines from following the link

Here's an example...

`<?php if (function_exists('organ_donor_register')) {organ_donor_register('3','text-align: right','target=_blank&nofollow=yes');} ?>`

This displays image number 3, floating the image to the right hand side and specified a `target` of `_blank` and sets `rel=nofollow`

*2. Short Code*

Within any post or page, simply type the following...

`[organ_donor image=x]`

Where x is the number of the required image. This will display the image in the post/page at the current position. 

There are 3 further options available and work the same as those mentioned above. They are `target`, `nofollow` and `style`.

So for the same result at the function call example, you'd put...

`[organ_donor image=3 style="text-align: right" target=_"blank" nofollow="yes"]`

*3. Sidebar Widget*

The Widget is available from the Appearance->Widgets menu within Administation. Drag it to the appropriate sidebar and click on the down arrow to modify the options.

These options need to be set for the sidebar widget to display properly as you have to specify the image.

== Installation ==

1. Upload the entire `organ-donor-register` folder to your `wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. If using the widget, browse to Appearance->Widgets, add the widget, and configure the options

== Screenshots ==

1. Image 1 - 69x69 pixels
2. Image 2 - 110x110 pixels, animated 
3. Image 3 - 138x138 pixels
4. Image 4 - 138x138 pixels
5. Image 5 - 220x220 pixels, animated

== Frequently Asked Questions ==

= How can I get help or request possible changes =

Feel free to report any problems, or suggestions for enhancements, to me either via [my contact form](http://www.artiss.co.uk/contact "Contact Me") or by [the plugins homepage](http://www.artiss.co.uk/youtube-embed "YouTube Embed").

== Changelog ==  
  
= 1.0 =
* Initial release

= 1.1 =
* Replaced ID of "donor" with a CLASS instead, as is correct for HTML validity

== Upgrade Notice ==

= 1.0 =
* Initial release

= 1.1 =
* Upgrade if you wish to assign your own stylesheet properties to the output