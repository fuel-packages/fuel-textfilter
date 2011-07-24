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
	 * Which tags, if any, do you wish to keep? Comment this line
	 * and uncomment just below it to set it to remove ALL HTML.
	 */
	'whitelist' => '<b><i><em><strong><del>',
	//'whitelist' => '',

	/**
	 * Would you like this filter to remove HTML comments as well.
	 * Be warned, this includes IE conditionals.
	 */
	'strip_comments' => false,
);