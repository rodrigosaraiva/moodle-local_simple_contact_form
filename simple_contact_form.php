<?php 
/**
 * Form for component 'simple_contact_form'.
 *
 * @package   simple_contact_form
 * @copyright 2014 Rodrigo Saraiva  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once($CFG->libdir.'/formslib.php');

class simple_contact_form extends moodleform {

	function definition() {
        global $CFG, $USER;

        $mform =& $this->_form;
        $mform->addElement('header', 'contact', get_string('contact', 'local_simple_contact_form'));
        $mform->addElement('hidden', 'sesskey', sesskey());
        if (isloggedin() && (!isguestuser($USER))) {           
            $mform->addElement('static', 'p_name', get_string('name', 'local_simple_contact_form'), fullname($USER));
            $mform->addElement('hidden', 'f_name', fullname($USER));
        
            $mform->addElement('static', 'p_email', get_string('email', 'local_simple_contact_form'), $USER->email);
            $mform->addElement('hidden', 'f_email', $USER->email);            
        } else {            
            $attributes = array('size'=>'52');
            $mform->addElement('text', 'f_name', get_string('name', 'local_simple_contact_form'), $attributes);
            $mform->addRule('f_name', get_string('requiredname','local_simple_contact_form'), 'required', null, 'client');

            $attributes = array('size'=>'52');
            $mform->addElement('text', 'f_email', get_string('email', 'local_simple_contact_form'), $attributes);
            $mform->addRule('f_email', get_string('requiredemail','local_simple_contact_form'), 'required', null, 'client');            
        }        

        if ($CFG->enable_city_state) {
            $attributes = array('size'=>'40');
            $mform->addElement('text', 'f_city', get_string('city', 'local_simple_contact_form'), $attributes);
            $mform->addRule('f_city', get_string('requiredcity','local_simple_contact_form'), 'required', null, 'client');   

            $astates = array( 
                                get_string('01_state', 'local_simple_contact_form'), 
                                get_string('02_state', 'local_simple_contact_form'), 
                                get_string('03_state', 'local_simple_contact_form'), 
                                get_string('04_state', 'local_simple_contact_form'), 
                                get_string('05_state', 'local_simple_contact_form'), 
                                get_string('06_state', 'local_simple_contact_form'), 
                                get_string('07_state', 'local_simple_contact_form'), 
                                get_string('08_state', 'local_simple_contact_form'), 
                                get_string('09_state', 'local_simple_contact_form'), 
                                get_string('10_state', 'local_simple_contact_form'), 
                                get_string('11_state', 'local_simple_contact_form'), 
                                get_string('12_state', 'local_simple_contact_form'), 
                                get_string('13_state', 'local_simple_contact_form'), 
                                get_string('14_state', 'local_simple_contact_form'), 
                                get_string('15_state', 'local_simple_contact_form'), 
                                get_string('16_state', 'local_simple_contact_form'), 
                                get_string('17_state', 'local_simple_contact_form'), 
                                get_string('18_state', 'local_simple_contact_form'), 
                                get_string('19_state', 'local_simple_contact_form'), 
                                get_string('20_state', 'local_simple_contact_form'), 
                                get_string('21_state', 'local_simple_contact_form'), 
                                get_string('22_state', 'local_simple_contact_form'), 
                                get_string('23_state', 'local_simple_contact_form'), 
                                get_string('24_state', 'local_simple_contact_form'), 
                                get_string('25_state', 'local_simple_contact_form'), 
                                get_string('26_state', 'local_simple_contact_form'),                                 
                                get_string('27_state', 'local_simple_contact_form')
                            );
            $mform->addElement(mountSelect('f_state', get_string('state', 'local_simple_contact_form'), get_string('none_state', 'local_simple_contact_form'), $astates));                
            $mform->addRule('f_state', get_string('requiredstate','local_simple_contact_form'), 'required', null, 'client');                           
        }
        
        $asubjects = array(get_string('01_subject', 'local_simple_contact_form'), get_string('02_subject', 'local_simple_contact_form'), get_string('03_subject', 'local_simple_contact_form'), get_string('04_subject', 'local_simple_contact_form'));
        $mform->addElement(mountSelect('f_subject', get_string('subject', 'local_simple_contact_form'), get_string('none_subject', 'local_simple_contact_form'), $asubjects));                
        $mform->addRule('f_subject', get_string('requiredsubject','local_simple_contact_form'), 'required', null, 'client');
			
		$attributes = array('wrap'=>'virtual', 'rows'=>'10', 'cols'=>'50');
		$mform->addElement('textarea', 'f_message', get_string('message','local_simple_contact_form'), $attributes);		
		$mform->addRule('f_message', get_string('requiredmessage','local_simple_contact_form'), 'required', null, 'client');				

 		$this->add_action_buttons(true, get_string('send','local_simple_contact_form'));
    }
}