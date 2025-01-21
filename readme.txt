=== Accessible Accordion Block ===
Contributors: Evan Scheingross  
Tags: accessible, a11y, accessibility, accordion, ACF, Beaver Builder  
Tested up to: 6.7.1
Stable tag: 1.0.0  
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

An accessible accordion module for WordPress installations using Beaver Builder, built with Advanced Custom Fields.

== Description ==

The Accessible Accordion Block is a flexible and fully accessible Beaver Builder module for creating expandable accordion sections. This plugin uses ACF (Advanced Custom Fields) to provide a user-friendly interface for managing accordion content, while ensuring it meets WCAG 2.1 accessibility standards. ACF and Beaver Builder are required for this plugin to run, but you do not need to do any configuration within ACF or Beaver Builder. All of that is already handled for you.

The plugin dynamically genereates FAQPage schema mark-up based on the accordion contents and adds the resulting JSON to your page. 

Features:
- Dynamic accordion creation using ACF fields.
- Heading level control to maintain semantic structure.
- Fully accessible with ARIA roles and keyboard navigation.
- Compatible with Beaver Builder for seamless integration.

Use this plugin to create visually appealing and functional accordions that are accessible to all users.

== Installation ==

1. Upload the `accessible-accordion` folder to the `/wp-content/plugins/` directory or install the plugin via the WordPress Plugin Installer.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Add the Accessible Accordion block in the Block Editor or Beaver Builder.

== Frequently Asked Questions ==

= Does this plugin work without ACF? =  
No. ACF (Advanced Custom Fields) is required for the plugin to work. The plugin includes an exported JSON file to set up the required fields.

= Can I customize the accordion styles? =  
Yes, you can customize the styles using your theme’s CSS or modify the included CSS file.

= Is this plugin WCAG-compliant? =  
Yes, the accordion is built to meet WCAG 2.1 AA standards for accessibility to the best of my abilities. However I make no guarantees and will not be held liable for any accessibility shortcomings. 

== Changelog ==

= 1.0.0 =
* Initial release.
* Added dynamic accordion rendering using ACF fields.
* Implemented accessible functionality with ARIA roles and keyboard navigation.

== Roadmap ==

Here are the planned features and improvements for future releases:
- Create a custom field that allows users to choose whether or not to generate FAQPage schema for each accordion instance.
- Create custom fields to easily customize the colors of the accordion. 

== Upgrade Notice ==

= 1.0.0 =
This is the initial release. Please report any bugs or feature requests.

== Credits ==

This plugin was developed by [Evan Scheingross](https://minimalchaosweb.com/). It makes use of the [W3C's accessible accordion example](https://www.w3.org/WAI/ARIA/apg/patterns/accordion/examples/accordion/).

== License ==

This plugin is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This plugin is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this plugin. If not, see [https://www.gnu.org/licenses/gpl-2.0.html](https://www.gnu.org/licenses/gpl-2.0.html).