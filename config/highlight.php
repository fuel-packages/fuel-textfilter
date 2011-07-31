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
	 * What words would you like to censor?
	 */
	'words' => array('fuck','shit','pussy','ass','damn','bitch','dick','cunt','cock'),

	/**
	 * Would you like to replace the words with placeholder characters?
	 */
	'replace_words' => true,

	/**
	 * If true, which character?
	 */
	'replace_with' => '*',
);