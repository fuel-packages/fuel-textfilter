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

class FilterSet {

	protected static $instances = array();

	public static function factory($group)
	{
		if (array_key_exists($group, static::$instances))
		{
			throw new \Fuel_Exception("The filterset group name '$group' is already in use.");
		}	
	}

	public static function instance($group = 'default')
	{}
}

/* End of file: filterset.php */