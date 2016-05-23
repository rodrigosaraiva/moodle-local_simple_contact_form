<?php

/**
 * Version info for 'simple_contact_form' plugin.
 *
 * @package   simple_contact_form
 * @copyright 2014 Rodrigo Saraiva  {@link http://moodle.com}, Carlos Eduardo Alves {@link http://github.com/kmiksi}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
$plugin->component = 'local_simple_contact_form';  // To check on upgrade, that module sits in correct place
$plugin->version = 2014052700;   // The (date) version of this plugin
/*
 * Moodle versions to requires
 * Moodle 2.7 = 2014041100
 * Moodle 2.6 = 2013101800
 * Moodle 2.5 = 2013040500
 * Moodle 2.4 = 2012110900
 * Moodle 2.3 = 2012062500
 * Moodle 2.2 = 2012062500
 * Moodle 2.1 = 2011070100
 * Moodle 2.0 = 2010112400
 * Moodle 1.9 = 2007101509
 * @see http://docs.moodle.org/dev/Moodle_Versions
 * @see https://moodle.org/plugins/registerplugin.php
 */
$plugin->requires = 2013040500; // Requires this Moodle version
$plugin->maturity = MATURITY_STABLE; //MATURITY_ALPHA, MATURITY_BETA, MATURITY_RC, MATURITY_STABLE
