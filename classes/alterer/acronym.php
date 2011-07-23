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
namespace AlterOutput;

/**
 * Alterer: Formats predefined abbreviations into <abbr> tags, complete
 * with titles.
 *
 * @package    Alter Output
 * @author     Frank Bardon Jr. <frank@nerdsrescue.me>
 * @version    1.0
 */
class Alterer_Acronym {

	/**
	 * Process the input and return processed string
	 *
	 * @param  string Incoming string
	 * @return string Formatted string
	 */
	public function process($output)
	{
		$acronyms = \Config::get('acronym.acronyms');
		
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