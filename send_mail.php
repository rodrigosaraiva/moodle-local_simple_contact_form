<?php

/**
 * Sendmail for component 'simple_contact_form'.
 *
 * @package   simple_contact_form
 * @copyright 2014 Rodrigo Saraiva  {@link http://moodle.com}, Carlos Eduardo Alves {@link http://github.com/kmiksi}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
// sender infos
$from = new object;
$from->firstname = strip_tags($fromform->f_name);
$from->lastname = '';
$from->email = $fromform->f_email;
$from->maildisplay = true;
$from->mailformat = 1;

$to = new object;
$to->id = 1;
$to->firstname = $CFG->name_form;
$to->lastname = '';
$to->email = $CFG->email_form;
$to->maildisplay = true;
$to->mailformat = 1;

// clean potencial html and php tags
$subject = utf8_decode($fromform->f_subject);
$message = strip_tags($fromform->f_message);

if ($CFG->enable_city) {
    $city = strip_tags($fromform->f_city);
    if ($city == '-') {
        $city = strip_tags($fromform->f_city_helper);
    }
}
if ($CFG->enable_region) {
    $region = $fromform->f_region;
}

$subjecttext = "[" . $subject . "] " . get_string('name', 'local_simple_contact_form') . ": " . $from->firstname;

$messagetext = "";

$fullnamesender = fullname($from);
$fullnamerecipient = fullname($to);

$messagetext .= get_string('name', 'local_simple_contact_form') . ": " . $fullnamesender . "\n";
if ($CFG->enable_city) {
    $messagetext .= get_string('city', 'local_simple_contact_form') . ": " . $city . "\n";
}
if ($CFG->enable_region) {
    $messagetext .= get_string('region', 'local_simple_contact_form') . ": " . $region . "\n";
}
$messagetext .= get_string('subject', 'local_simple_contact_form') . ": " . $subject . "\n";
$messagetext .= get_string('message', 'local_simple_contact_form') . ": " . $message . "\n";

if (email_to_user($to, $from, $subjecttext, $messagetext)) {
    add_to_log(0, 'simple_contact_form', 'send mail', '', 'To: ' . $fullnamerecipient . '; From: ' . $fullnamesender . '; Subject: ' . $subjecttext);
} else {
    add_to_log(0, 'simple_contact_form', 'send mail failure', '', 'To: ' . $fullnamerecipient . '; From: ' . $fullnamesender . '; Subject:' . $subjecttext);
    throw new moodle_exception('messagenotsent', 'local_simple_contact_form');
}
