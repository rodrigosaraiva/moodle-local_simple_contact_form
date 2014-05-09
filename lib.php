<?php
/**
 * Functions for component 'simple_contact_form'.
 *
 * @package   simple_contact_form
 * @copyright 2014 Rodrigo Saraiva  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function mountSelect($nameSelect, $labelSelect, $noneOption, $arrayElements) {
    $select = HTML_QuickForm::createElement('select', $nameSelect, $labelSelect);
    $select->addOption($noneOption, null, array('disabled'=>'disabled'));      
    foreach ($arrayElements as $name) {    	
       		$select->addOption($name, $name);
    }
    $select->setSelected('');
    return $select;
}

function redirectIndex($setting) {
	if (!$setting) {
	    $returnurl = new moodle_url('/index.php');
	    redirect($returnurl);
	}
}

?>