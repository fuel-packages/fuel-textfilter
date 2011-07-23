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

	public static function factory($group, $filters = array())
	{
		if (array_key_exists($group, static::$instances))
		{
			throw new \Fuel_Exception("The filterset group name '$group' is already in use.");
		}
		
		static::$instances[$group] = new static;

		if (count($filters) > 0)
		{
			foreach ($filters as $filter)
			{
				static::instance($group)->append($filter);
			}
		}

		return static::$instances[$group];
	}

	public static function instance($group = 'default')
	{
		if (array_key_exists($group, static::$instances))
		{
			return static::$instances[$group];
		}
		return null;
	}

	protected $filters = array();

	/**
	 * Append a filter onto the END of the filter array.
	 *
	 * @param  string Class identifier for filter
	 * @param  array  Configuration options for loaded filter
	 * @return \TextFilter\Filter
	 */
	public function append($filter, array $config = array())
	{
		$this->filters[$filter] = new Filter($filter, $config);
		
		return $this;
	}

	/**
	 * Prepend a filter onto the BEGINNING of the filter array.
	 *
	 * @param  string Class identifier for filter
	 * @param  array  Configuration options for loaded filter
	 * @return \TextFilter\Filter
	 */
	public function prepend($filter, array $config = array())
	{
		$temp = new Filter($filter, $config);

		array_unshift($this->filters, array($filter => $temp));
		
		return $this;
	}

	public function process($filter, $output)
	{
		return $this->filters[$filter]->process($output);
	}

	public function process_all($output)
	{
		foreach ($this->filters as $filter)
		{
			$output = $filter->process($output);
		}
		
		return $output;
	}

	/**
	 * Reset this class
	 *
	 * @return \TextFilter\Filter
	 */
	public function reset()
	{
		$this->filters = array();
		
		return $this;
	}
}

/* End of file: filterset.php */