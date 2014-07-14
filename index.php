<?php

/**
 * Component 'simple_contact_form'.
 *
 * @package   simple_contact_form
 * @copyright 2014 Rodrigo Saraiva  {@link http://moodle.com}, Carlos Eduardo Alves {@link http://github.com/kmiksi}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once('../../config.php');
require_once($CFG->dirroot . '/local/simple_contact_form/simple_contact_form.php');
require_once($CFG->dirroot . '/local/simple_contact_form/lib.php');

redirectIndex($CFG->enable_form);

$context = context_system::instance();
$PAGE->set_context($context);

$PAGE->set_pagelayout('standard');
$PAGE->set_heading(get_string('contact', 'local_simple_contact_form'));
$PAGE->set_title(get_string('contact', 'local_simple_contact_form'));
$PAGE->set_url('/local/simple_contact_form/simple_contact_form.php');

$mform = new simple_contact_form($CFG->wwwroot . '/local/simple_contact_form/index.php');

if ($mform->is_cancelled()) {
    $returnurl = new moodle_url('/local/simple_contact_form/index.php');
    redirect($returnurl, get_string('canceled', 'local_simple_contact_form'));
} else if ($fromform = $mform->get_data()) {
    include_once('send_mail.php');
    echo $OUTPUT->header();
    echo $OUTPUT->box_start('generalbox centerpara boxwidthnormal boxaligncenter');
    echo "<h3>" . get_string('thanks', 'core') . ", " . fullname($from) . "</h3>";
    echo "<p>" . get_string('messagesent', 'local_simple_contact_form') . "</p>";
    echo $OUTPUT->single_button("/", get_string('sitehome', 'core'));
    echo $OUTPUT->box_end();
    echo $OUTPUT->footer();
} else {
    echo $OUTPUT->header();
    $mform->display();
    echo $OUTPUT->footer();
}
