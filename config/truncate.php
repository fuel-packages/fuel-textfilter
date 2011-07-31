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
return array(

	/**
	 * What's the word limit you're looking for?
	 */
	'word_limit' => 35,

	/**
	 * Would you like to append text to the end?
	 * 
	 * Example: (elipses)  '...'
	 *          (readmore) '<a href="#">Read More</a>...'
	 */
	'append_text' => '',
);