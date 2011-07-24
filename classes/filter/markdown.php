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

// Load the markdown class from the vendor folder.
require_once __DIR__.'/../../vendor/markdown/markdown.php';

/**
 * Filter: Parses markdown and returns XHTML.
 *
 * Uses PHP-Markdown package located at 
 * http://michelf.com/projects/php-markdown/
 * See the vendor/markdown folder for licensing information.
 *
 * @package    Text Filter
 * @author     Frank Bardon Jr. <frank@nerdsrescue.me>
 * @version    1.0
 */
class Filter_Markdown {

	/**
	 * Process the input and return processed string
	 *
	 * @param  string Incoming string
	 * @return string Formatted string
	 */
	public function process($output, $config = array())
	{
		$parser = new \MarkdownExtra_Parser;

		return $parser->transform($output);
	}
}

/* End of file: markdown.php */