<?php

/**
 * Form for component 'simple_contact_form'.
 *
 * @package   simple_contact_form
 * @copyright 2014 Rodrigo Saraiva  {@link http://moodle.com}, Carlos Eduardo Alves {@link http://github.com/kmiksi}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once('../../config.php');
require_once($CFG->libdir . '/formslib.php');

class simple_contact_form extends moodleform {

    function definition() {
        global $CFG, $USER;

        $mform = & $this->_form;
        $mform->addElement('header', 'contact', get_string('contact', 'local_simple_contact_form'));
        $mform->addElement('hidden', 'sesskey', sesskey());
        if (isloggedin() && (!isguestuser($USER))) {
            $mform->addElement('static', 'p_name', get_string('name', 'local_simple_contact_form'), fullname($USER));
            $mform->addElement('hidden', 'f_name', fullname($USER));

            $mform->addElement('static', 'p_email', get_string('email', 'local_simple_contact_form'), $USER->email);
            $mform->addElement('hidden', 'f_email', $USER->email);
        } else {
            $attributes = array('size' => '52');
            $mform->addElement('text', 'f_name', get_string('name', 'local_simple_contact_form'), $attributes);
            $mform->addRule('f_name', get_string('requiredname', 'local_simple_contact_form'), 'required', null, 'client');

            $mform->addElement('text', 'f_email', get_string('email', 'local_simple_contact_form'), $attributes);
            $mform->addRule('f_email', get_string('requiredemail', 'local_simple_contact_form'), 'required', null, 'client');
        }

        if (!empty($CFG->enable_city)) {
            $attributes = array('size' => '40');
            if (empty($CFG->cityes_list)) {
                $mform->addElement('text', 'f_city', get_string('city', 'local_simple_contact_form'), $attributes);
                $mform->addRule('f_city', get_string('requiredcity', 'local_simple_contact_form'), 'required', null, 'client');
            } else {
                $cityes = array_map('trim', explode("\n", $CFG->cityes_list));
                $select = mountSelect('f_city', get_string('city', 'local_simple_contact_form'), get_string('none_state', 'local_simple_contact_form'), $cityes);
                $select->addOption(get_string('option_another', 'local_simple_contact_form'), '-');
                $mform->addElement($select);
                $mform->addRule('f_city', get_string('requiredcity', 'local_simple_contact_form'), 'required', null, 'client');
                $mform->addElement('text', 'f_city_helper', '', $attributes);
                $mform->disabledIf('f_city_helper', 'f_city', 'neq', '-');
                // TODO: How to require only when enabled?
                //$mform->addRule('f_city_helper', get_string('requiredcity', 'local_simple_contact_form'), 'required', null, 'client');
            }
        }

        if (!empty($CFG->enable_region)) {
            if (empty($CFG->region_list)) {
                $attributes = array('size' => '40');
                $mform->addElement('text', 'f_region', get_string('region', 'local_simple_contact_form'), $attributes);
                $mform->addRule('f_region', get_string('requiredstate', 'local_simple_contact_form'), 'required', null, 'client');
            } else {
                $regions = array_map('trim', explode("\n", $CFG->region_list));
                $mform->addElement(mountSelect('f_region', get_string('state', 'local_simple_contact_form'), get_string('none_state', 'local_simple_contact_form'), $regions));
                $mform->addRule('f_region', get_string('requiredstate', 'local_simple_contact_form'), 'required', null, 'client');
            }
        }

        if (!empty($CFG->enable_subject)) {
            if (empty($CFG->subject_list)) {
                $attributes = array('size' => '40');
                $mform->addElement('text', 'f_subject', get_string('subject', 'local_simple_contact_form'), $attributes);
                $mform->addRule('f_subject', get_string('requiredsubject', 'local_simple_contact_form'), 'required', null, 'client');
            } else {
                $asubjects = array_map('trim', explode("\n", $CFG->subject_list));
                $mform->addElement(mountSelect('f_subject', get_string('subject', 'local_simple_contact_form'), get_string('none_subject', 'local_simple_contact_form'), $asubjects));
                $mform->addRule('f_subject', get_string('requiredsubject', 'local_simple_contact_form'), 'required', null, 'client');
            }
        }

        $attributes = array('wrap' => 'virtual', 'rows' => '10', 'cols' => '50');
        $mform->addElement('textarea', 'f_message', get_string('message', 'local_simple_contact_form'), $attributes);
        $mform->addRule('f_message', get_string('requiredmessage', 'local_simple_contact_form'), 'required', null, 'client');

        $this->add_action_buttons(true, get_string('send', 'local_simple_contact_form'));
    }

}
