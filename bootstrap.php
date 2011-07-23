<?php

/**
 * Alter Output
 *
 * The alter output package is a collection of filters meant to apply 
 * changes to your response output. However, it is by no means limited 
 * to that use. It can be used on any string value.
 *
 * @package    Alter Output
 * @version    1.0
 * @author     Ninjarite Development Group
 * @license    MIT License
 * @copyright  2011 Ninjarite Development
 */
Autoloader::add_core_namespace('AlterOutput');

// Define available classes into the Autoloader
Autoloader::add_classes(array(
	'AlterOutput\\Alterer'                 => __DIR__.'/classes/alterer.php',
	'AlterOutput\\Alterer_Acronym'         => __DIR__.'/classes/alterer/acronym.php',
));

/* End of file bootstrap.php */