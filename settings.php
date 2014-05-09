<?php
/**
 * Admin settings for component 'simple_contact_form'.
 *
 * @package   simple_contact_form
 * @copyright 2014 Rodrigo Saraiva  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

if ($hassiteconfig) {
    $settings = new admin_settingpage('simple_contact_form', 'Simple Contact Form');
    $ADMIN->add('localplugins', $settings);
    $settings->add(new admin_setting_configcheckbox('enable_form', get_string('enable_form_name', 'local_simple_contact_form'), get_string('enable_form_description', 'local_simple_contact_form'), 1));
    $settings->add(new admin_setting_configtext('email_form', get_string('email_form_name', 'local_simple_contact_form'), get_string('email_form_description', 'local_simple_contact_form'), '', PARAM_EMAIL));
    $settings->add(new admin_setting_configtext('name_form', get_string('name_form_name', 'local_simple_contact_form'), get_string('name_form_description', 'local_simple_contact_form'), ''));
    $settings->add(new admin_setting_configcheckbox('enable_city_state', get_string('enable_city_state_name', 'local_simple_contact_form'), get_string('enable_city_state_description', 'local_simple_contact_form'), 0));
}