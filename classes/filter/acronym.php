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
 * Filter: Formats predefined abbreviations into <abbr> tags, complete
 * with titles.
 *
 * @package    Text Filter
 * @author     Frank Bardon Jr. <frank@nerdsrescue.me>
 * @version    1.0
 */
class Filter_Acronym {

	/**
	 * Process the input and return processed string
	 *
	 * @param  string Incoming string
	 * @param  array  Configuration array
	 * @return string Formatted string
	 */
	public function process($output, $config = array())
	{
		$acronyms = $config['acronyms'];
		
		$search  = array_keys($acronyms);
		$replace = array_values($acronyms);
		
		unset($acronyms);
		
		foreach ($replace as $key => $value)
		{
			$replace[$key] = "<abbr title=\"$value\">{$search[$key]}</abbr>";
		}
		
		return str_replace($search, $replace, $output);
	}
}

/* End of file: acronym.php */