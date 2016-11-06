<?php
namespace Mrkoopie\Wp_Plugin_Boilerplate\Helpers;
/**
 * Base class for Admin, Front and General.
 *
 * @link       http://www.danielkoop.me/
 * @since      1.0.0
 *
 */
class Base {

	/**
	 * Handles filters and functions
	 *
	 * @var string
	 **/
	var $loader;

	/**
	 * Constructor
	 *
	 * @return void
	 * @author Daniel Koop <mail@danielkoop.me>
	 **/
	public function __construct()
	{
		$this->loader = new Loader();

		// Launch the actions
		$this->actions();

		// Launch the filters
		$this->filters();

		// Run everything!
		$this->run();
	}

	/**
	 * Launch the actions
	 *
	 * @return void
	 * @author Daniel Koop <mail@danielkoop.me>
	 **/
	protected function actions()
	{
		// Actions
	}

	/**
	 * Launch the filters
	 *
	 * @return void
	 * @author Daniel Koop <mail@danielkoop.me>
	 **/
	protected function filters()
	{
		// Filters
	}

	/**
	 * Run everything!
	 *
	 * @return void
	 * @author Daniel Koop <mail@danielkoop.me>
	 **/
	public function run()
	{
		$this->loader->run();
	}

}