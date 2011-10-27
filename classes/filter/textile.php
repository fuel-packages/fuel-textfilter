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

// Include the textile class from the vendor folder
require_once __DIR__.'/../../vendor/textile/textile.php';

/**
 * Filter: Parse Textile markup to HTML
 *
 * @package    Text Filter
 * @author     Frank Bardon Jr. <frank@nerdsrescue.me>
 * @version    1.0
 */
class Filter_Textile {

	/**
	 * Process the input and return processed string
	 *
	 * @param  string Incoming string
	 * @param  array  Configuration array
	 * @return string Formatted string
	 */
	public function process($output, $config = array())
	{
		$textile = new \Textile();

		return ($config['trusted']) ? $textile->TextileThis($output) : $textile->TextileRestricted($output);
	}
}

/* End of file: textile.php */