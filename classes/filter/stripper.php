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
 * Filter: Strips out all HTML tags except those whiltelisted
 * in the configuration file.
 *
 * @package    Text Filter
 * @author     Frank Bardon Jr. <frank@nerdsrescue.me>
 * @version    1.0
 */
class Filter_Stripper {

	/**
	 * Process the input and return processed string
	 *
	 * @param  string Incoming string
	 * @return string Formatted string
	 */
	public function process($output, $config = array())
	{
		$whitelist = $config['whitelist'];

		// Only strip comments if configured to do so.
		if ( ! $config['strip_comments'])
		{
			$output = preg_replace("@<!--@", "#!--#", $output);
  		}
  		if ( ! $config['strip_php'])
  		{
  			$output = preg_replace("@<\?@", "#?#", $output);
  		}
  
		$output = strip_tags($output, $whitelist);
  
		if ( ! $config['strip_comments'])
		{
			$output = preg_replace("@#!--#@", "<!--", $output);
  		}
  		if ( ! $config['strip_php'])
  		{
  			$output = preg_replace("@#\?#@", "<?", $output);
  		}
 
		return $output;
	}
}

/* End of file: acronym.php */