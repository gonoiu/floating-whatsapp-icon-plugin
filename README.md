=== Floating WhatsApp Icon ===
Contributors: georgian.o
Tags: whatsapp, floating icon, contact, chat, social, support
Requires at least: 5.0
Tested up to: 6.5
Requires PHP: 5.6
Stable tag: 1.1.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A simple plugin to display a floating WhatsApp contact button on your WordPress site.

== Description ==

This lightweight plugin adds a floating WhatsApp icon on your site, allowing users to contact you instantly via WhatsApp. The phone number is configurable via the WordPress admin panel.

Features:
- Clean and minimal design
- Mobile-optimized floating WhatsApp icon
- Phone number settings via the admin panel
- Automatically cleans phone number format to comply with WhatsApp API

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory or install it via the WordPress admin dashboard (Plugins > Add New > Upload Plugin).
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to **Settings > WhatsApp Icon** in your WordPress dashboard.
4. Enter your WhatsApp phone number in **international format** (e.g., `+1234567890`). The plugin will clean it automatically (removes `+`, spaces, etc.).
5. Save changes.
6. Visit your site — you’ll see a floating WhatsApp button in the bottom-left corner.

== Frequently Asked Questions ==

= My link opens a WhatsApp error page. =
Make sure the number is in international format and includes the country code (e.g., `+40...`). The plugin removes symbols like `+` automatically.

= Can I add a default message in the WhatsApp chat? =
Not yet, but you can customize the plugin code to add a `text` parameter to the link.

== Screenshots ==

1. WhatsApp icon on frontend
2. Admin settings page for phone number

== Changelog ==

= 1.1.1 =
* Fixed bug where `+` in the phone number caused an invalid WhatsApp link.
* Improved formatting and sanitization.

= 1.1.0 =
* Initial release with floating WhatsApp icon and admin settings page.

== Upgrade Notice ==

= 1.1.2 =
Fixes phone number formatting issue. Update recommended.
Also added the README

== License ==

This plugin is free software and distributed under the GPL2 license.
