<?php

/**
 * Admin settings for component 'simple_contact_form'.
 *
 * @package   simple_contact_form
 * @copyright 2014 Rodrigo Saraiva  {@link http://moodle.com}, Carlos Eduardo Alves {@link http://github.com/kmiksi}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
if ($hassiteconfig) {
    $settings = new admin_settingpage('simple_contact_form', 'Simple Contact Form');
    $ADMIN->add('localplugins', $settings);
    $settings->add(new admin_setting_configcheckbox('enable_form', get_string('enable_form_name', 'local_simple_contact_form'), get_string('enable_form_description', 'local_simple_contact_form'), 1));
    $settings->add(new admin_setting_configtext('email_form', get_string('email_form_name', 'local_simple_contact_form'), get_string('email_form_description', 'local_simple_contact_form'), '', PARAM_EMAIL));
    $settings->add(new admin_setting_configtext('name_form', get_string('name_form_name', 'local_simple_contact_form'), get_string('name_form_description', 'local_simple_contact_form'), ''));
    $settings->add(new admin_setting_configcheckbox('enable_city', get_string('enable_city', 'local_simple_contact_form'), get_string('enable_city_description', 'local_simple_contact_form'), 0));
    $settings->add(new admin_setting_configtextarea('cityes_list', get_string('cityes_list', 'local_simple_contact_form'), get_string('cityes_list_description', 'local_simple_contact_form'), '', PARAM_TEXT));
    $settings->add(new admin_setting_configcheckbox('enable_region', get_string('enable_region', 'local_simple_contact_form'), get_string('enable_region_description', 'local_simple_contact_form'), 0));
    $settings->add(new admin_setting_configtextarea('region_list', get_string('region_list', 'local_simple_contact_form'), get_string('region_list_description', 'local_simple_contact_form'), '', PARAM_TEXT));
    $settings->add(new admin_setting_configcheckbox('enable_subject', get_string('enable_subject', 'local_simple_contact_form'), get_string('enable_subject_description', 'local_simple_contact_form'), 0));
    $settings->add(new admin_setting_configtextarea('subject_list', get_string('subject_list', 'local_simple_contact_form'), get_string('subject_list_description', 'local_simple_contact_form'), '', PARAM_TEXT));
}
