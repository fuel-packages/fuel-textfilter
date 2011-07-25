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
 * Provides a unified interface to add output filters.
 *
 * @package    Text Filter
 * @author     Frank Bardon Jr. <frank@nerdsrescue.me>
 * @version    1.0
 */
class Filter {

	/**
	 * Name and class of loaded filter
	 */
	public $name = array();

	/**
	 * Configuration
	 */
	public $config = array();

	/**
	 * Holds filter object to be run during process.
	 */
	protected $filter = array();

	/**
	 * Class constructor
	 *
	 * @return \TextFilter\Filter
	 */
	public function __construct($filter, $config = array())
	{
		$class = 'Filter_' . ucfirst($filter);
		
		if ( ! class_exists($class))
		{
			throw new \Fuel_Exception("You have attempted to load a filter that does not exist. ['$class']");
		}

		$this->filter = new $class;

		// Lets configure the configuration!!! lol.
		$baseconfig   = \Config::load($filter, true);
		
		if (is_array($baseconfig))
		{
			$this->config = \Arr::merge($baseconfig, $config);
		}
		else
		{
			$this->config = $config;
		}
		$this->name   = array($filter => $class);

		return $this;
	}

	/**
	 * Process this filter.
	 *
	 * @return string Formatted output
	 */
	public function process($output)
	{
		return $this->filter->process($output, $this->config);
	}
}

/* End of file: filter.php */