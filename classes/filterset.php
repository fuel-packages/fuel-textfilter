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
 * Provides a unified interface to add output filters to re-usable sets.
 *
 * @package    Text Filter
 * @author     Frank Bardon Jr. <frank@nerdsrescue.me>
 * @version    1.0
 */
class FilterSet {

	/**
	 * Array of FilterSets
	 */
	protected static $instances = array();

	/**
	 * Factory: Creates new instances of the FilterSet class and adds
	 * them to the instances array by group for later use. If you only
	 * plan on using one instance of this class you do not need to
	 * define a group, a default will be used.
	 *
	 * @param string Filter group name
	 * @param array  Optional array of filters to auto-add
	 @ @return \TextFilter\FilterSet
	 */
	public static function factory($group = 'default', $filters = array())
	{
		if (array_key_exists($group, static::$instances))
		{
			throw new \Fuel_Exception("The filterset group name '$group' is already in use.");
		}
		
		static::$instances[$group] = new static;

		// If filters have been passed in, add them now.
		if (count($filters) > 0)
		{
			foreach ($filters as $filter)
			{
				static::instance($group)->append($filter);
			}
		}

		return static::$instances[$group];
	}

	/**
	 * Retrieve a FilterSet instance. If you wish to pull only the
	 * default instance, no group is necessary.
	 *
	 * @param  string Optional group name
	 * @return \TextFilter\FilterSet||null
	 */
	public static function instance($group = 'default')
	{
		if (array_key_exists($group, static::$instances))
		{
			return static::$instances[$group];
		}
		return null;
	}


	/**
	 * Array of filters to be processed.
	 */
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

	/**
	 * Run a single filter from $this FilterSet
	 *
	 * @param  string Name of filter to run
	 * @param  string Output to be processed
	 * @return string
	 */
	public function process($filter, $output)
	{
		if (array_key_exists($this->filter, $filter))
		{
			return $this->filters[$filter]->process($output);
		}
		return null;
	}

	/**
	 * Run output through all filters.
	 *
	 * @param  string Output to be processed
	 * @return string Processed output
	 */
	public function process_all($output)
	{
		foreach ($this->filters as $filter)
		{
			$output = $filter->process($output);
		}
		
		return $output;
	}

	/**
	 * Lists all filters currently added.
	 * 
	 * @return array List of filters.
	 */
	public function filters()
	{
		$list = array();
		
		foreach ($this->filters as $filter)
		{
			$list[key($filter->name)] = current($filter->name);
		}
		return $list;
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