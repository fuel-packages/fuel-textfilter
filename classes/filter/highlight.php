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

/**
 * Filter: Censor bad words, or replace them with *'s
 *
 * @package    Text Filter
 * @author     Frank Bardon Jr. <frank@nerdsrescue.me>
 * @version    1.0
 */
class Filter_Highlight {

	/**
	 * Process the input and return processed string
	 *
	 * @param  string Incoming string
	 * @param  array  Configuration array
	 * @return string Formatted string
	 */
	public function process($output, $config = array())
	{
		$words   = $config['words'];
		$replace = $config['replace_with'];

		return str_replace($words, str_replace('_WORD_', $replace), $output);
	}
}

/* End of file: censor.php */