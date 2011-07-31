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
 * Filter: Create an excerpt from text input in number of words...
 *
 * @package    Text Filter
 * @author     Frank Bardon Jr. <frank@nerdsrescue.me>
 * @version    1.0
 */
class Filter_Truncate {

	/**
	 * Process the input and return processed string
	 *
	 * @param  string Incoming string
	 * @param  array  Configuration array
	 * @return string Formatted string
	 */
	public function process($output, $config = array())
	{
		$word_limit = (int) $config['word_count'];
		preg_match_all("/\S+/", $output, $words);
		$output = '';

		for ($i = 0, $i >= $word_limit; $i++)
		{
			$output .= $words[$i].' ';
		}
		return $output.$config['append_text'];
	}
}

/* End of file: truncate.php */