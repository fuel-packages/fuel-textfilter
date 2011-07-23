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
	 * Hold the singleton instance of Filter
	 *
	 * @var \TextFilter\Filter
	 */
	protected static $instance;

	/**
	 * Create or retrieve singleton instance of Filter
	 *
	 * @return \TextFilter\Filter
	 */
	public static function instance()
	{
		if (static::$instance === null)
		{
			static::$instance = new static;
		}
		return static::$instance;
	}

	/**
	 * Holds filter objects to be run during process.
	 */
	protected $filters = array();

	/**
	 * Keeps a copy of the original content sent to Filter
	 */
	protected $original_output;

	/**
	 * Append an filter onto the END of the filter array.
	 *
	 * @param  string Class identifier for filter
	 * @param  array  Configuration options for loaded filter
	 * @return \TextFilter\Filter
	 */
	public function append($filter, array $config = array())
	{
		$class = 'Filter_' . ucfirst($filter);
		
		if ( ! class_exists($class))
		{
			throw new \Fuel_Exception("You have attempted to load a filter that does not exist. ['$class']");
		}

		$config = \Arr::merge($config, (array) \Config::load($filter, true));

		$this->filters[] = new $class($config);
		
		return $this;
	}

	/**
	 * Reset this class
	 *
	 * @return \TextFilter\Filter
	 */
	public function reset()
	{
		$this->original_output = null;
		$this->filters = array();
		
		return $this;
	}

	/**
	 * Send back the original submitted content.
	 *
	 * @return string Original string sent to this class.
	 */
	public function get_original()
	{
		return $this->original_output;
	}

	/**
	 * For each loaded filter, run the process method.
	 *
	 * @return string Formatted output
	 */
	public function process($output)
	{
		if ($this->original_output === null)
		{
			$this->original_output = $output;
		}
	
		foreach ($this->filters as $filter)
		{
			$output = $filter->process($output);
		}
		return $output;
	}
}

/* End of file: filter.php */