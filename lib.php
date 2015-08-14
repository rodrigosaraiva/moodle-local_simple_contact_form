<?php

/**
 * Functions for component 'simple_contact_form'.
 *
 * @package   simple_contact_form
 * @copyright 2014 Rodrigo Saraiva  {@link http://moodle.com}, Carlos Eduardo Alves {@link http://github.com/kmiksi}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
function mountSelect($name, $label, $no_option, $elements) {
    
    $select = HTML_QuickForm::createElement('select', $name, $label);
    $select->addOption($no_option, null, array('disabled' => 'disabled'));
    $selected = '';
    foreach ($elements as $name) {
        if (!empty($name)) {
            if (strpos($name, '*') === 0) {
                $name = trim(trim($name, '*'));
                $selected = $name;
            }
            $select->addOption($name, $name);
        }
    }
    $select->setSelected($selected);
    return $select;
    
}

function redirectIndex($setting) {
    
    if (!$setting) {
        $returnurl = new moodle_url('/index.php');
        redirect($returnurl);
    }
    
}
