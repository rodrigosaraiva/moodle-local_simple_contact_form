Moodle Simple Contact Form
==========================


Introduction
------------
This plugin is a very simple implementation of a contact page for Moodle.

This send an email to a preconfigured address (defauls to admin).

We recommend that you put a menu link to `/local/simple_contact_form/` using `custommenuitems` theme configurations.


Features
--------
* Send email to configurable user (defaults to admin)
* Get name and email of a logged user, otherwise this information is added by user.
* Ask user about city, if configured. Administrator can input a list of preconfigured cityes, and user allways can input an unlisted option.
* Ask user about state/province/region, if configured by admin. The itens are configurable.
* Ask user a subject and text message.
* The messages are logged.


Download
--------
1. Download the plugin code from https://github.com/rodrigosaraiva/moodle-local_simple_contact_form and put into /local/simple_contact_form/
2. Use git:

`git clone git://github.com/rodrigosaraiva/moodle-local_simple_contact_form.git /path/to/moodle/local/simple_contact_form`


Installation
------------
- Add the plugin code into folder `/local/simple_contact_form/`.
- Link to contact page (`/local/simple_contact_form/`). See "[Linking to page](https://github.com/rodrigosaraiva/moodle-local_simple_contact_form/#linking-to-page)".
- Configuration is available through Administration > "Plugins" > "Local plugins" > "Simple Contact Form".


Linking to page
--------------
Here we show methods to tell users where is the contact page.

The link must point to `MOODLE_URL/local/simple_contact_form/`.

1. Put a banner or text info inside an HTML block in your Moodle
2. Customize your theme, like put the link inside header or footer
2. **[Recommended]** put in the Moodle menu bar. Access Administration > "Appearance" > "Themes" > "Theme settings" section. Inside the "Custom menu items" option, you must put a line like this:

`Contact|/local/simple_contact_form/`



About
----
* [Rodrigo Saraiva](https://github.com/rodrigosaraiva) (creator, coder)
* [Carlos Eduardo Alves](https://github.com/kmiksi) (maintainer, coder)
* [Simple Contact Form Moodle plugin](https://github.com/rodrigosaraiva/moodle-local_simple_contact_form) project at GitHub.com
