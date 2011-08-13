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
 * Filter: Replace smileys in text with image files. 
 *
 * @package    Text Filter
 * @author     Frank Bardon Jr. <frank@nerdsrescue.me>
 * @version    1.0
 */
class Filter_Smileys {

	/**
	 * Process the input and return processed string
	 *
	 * @param  string Incoming string
	 * @param  array  Configuration array
	 * @return string Formatted string
	 */
	public function process($output, $config = array())
	{
		$smileys = $config['smileys'];

		array_walk(&$smileys, function($path, $key)
		{
			$key  = ' '.$key.' ';
			$path = ' '.\Asset::img($path).' ';
		});

		// The spaces are to be sure it's not contained within a word.
		return str_replace(array_keys($smileys), array_values($paths), $output);
	}
}

/* End of file: smileys.php */