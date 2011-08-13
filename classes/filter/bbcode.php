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

// Include the bbcode class from the vendor folder
require_once __DIR__.'/../../vendor/bbcode/bbcode.php';

/**
 * Filter: Parse BBCode markup to HTML
 *
 * @package    Text Filter
 * @author     Frank Bardon Jr. <frank@nerdsrescue.me>
 * @version    1.0
 */
<<<<<<< HEAD
class Filter_Textile {
=======
class Filter_BBCode {
>>>>>>> master

	/**
	 * Process the input and return processed string
	 *
	 * @param  string Incoming string
	 * @param  array  Configuration array
	 * @return string Formatted string
	 */
	public function process($output, $config = array())
	{
		$bbcoder = new BBCode();

		return $bbcoder->replace($output);
	}
}

/* End of file: textile.php */