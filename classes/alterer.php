<?php

/**
 * Alter Output
 *
 * The alter output package is a collection of filters meant to apply 
 * changes to your response output. However, it is by no means limited 
 * to that use. It can be used on any string value.
 *
 * @package    Alter Output
 * @version    1.0
 * @author     Ninjarite Development Group
 * @license    MIT License
 * @copyright  2011 Ninjarite Development
 */
namespace AlterOutput;


/**
 * Provides a unified interface to add output alterers.
 *
 * @package    Alter Output
 * @author     Frank Bardon Jr. <frank@nerdsrescue.me>
 * @version    1.0
 */
class Alterer {

	/**
	 * Hold the singleton instance of Alterer
	 *
	 * @var \AlterOutput\Alterer
	 */
	protected static $instance;

	/**
	 * Create or retrieve singleton instance of Alterer
	 *
	 * @return \AlterOutput\Alterer
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
	 * Reset this entire class
	 *
	 * @return void
	 */ 
	public static function reset()
	{
		static::$instance = null;
	}

	/**
	 * Holds alterer objects to be run during process.
	 */
	protected $alterers = array();

	/**
	 * Keeps a copy of the original content sent to Alterer
	 */
	protected $original_output;

	/**
	 * Append an alterer onto the END of the alterer array.
	 *
	 * @param  string Class identifier for alterer
	 * @param  array  Configuration options for loaded alterer
	 * @return \AlterOutput\Alterer
	 */
	public function append($alterer, array $config = array())
	{
		$class = 'Alterer_' . ucfirst($alterer);
		
		if ( ! class_exists($class))
		{
			throw new \Fuel_Exception("You have attempted to load an alterer that does not exist. ['$class']");
		}

		$config = \Arr::merge($config, (array) \Config::load($alterer, true));

		$this->alterers[] = new $class($config);
		
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
	 * For each loaded alterer, run the process method.
	 *
	 * @return string Formatted output
	 */
	public function process($output)
	{
		if ($this->original_output === null)
		{
			$this->original_output = $output;
		}
	
		foreach ($this->alterers as $alterer)
		{
			$output = $alterer->process($output);
		}
		return $output;
	}
}

/* End of file: alterer.php */