<?php

/**
 * Text Filter
 *
 * The text filter package is a collection of filters meant to apply 
 * changes to your response output. However, it is by no means limited 
 * to that use. It can be used on any string value.
 *
 * @package    Text Filter
 * @version    1.0
 * @author     Ninjarite Development Group
 * @license    MIT License
 * @copyright  2011 Ninjarite Development
 */
namespace TextFilter;

// Load the HTMLPurifier AutoLoader
require_once __DIR__.'/../../vendor/htmlpurifier-4.3.0/HTMLPurifier.standalone.php';

/**
 * Filter: Basic integration with the htmlpurifier library...
 *
 * @package    Text Filter
 * @author     Frank Bardon Jr. <frank@nerdsrescue.me>
 * @version    1.0
 */
class Filter_Htmlpurifier {

	/**
	 * Process the input and return processed string
	 *
	 * @param  string Incoming string
	 * @return string Formatted string
	 */
	public function process($output, $config = array())
	{
		$config = HTMLPurifier_Config::createDefault();
		$config->set('Core', 'Encoding', $config['encoding']); // replace with your encoding
		$config->set('HTML', 'Doctype', $config['doctype']); // replace with your doctype

		$purifier = new HTMLPurifier($config);

		return $purifier->purify($output);
	}
}

/* End of file: htmlpurifier.php */