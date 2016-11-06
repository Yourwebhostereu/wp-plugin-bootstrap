<?php
namespace Mrkoopie\Wp_Plugin_Boilerplate\General;
use Mrkoopie\Wp_Plugin_Boilerplate\Helpers\Base;

/**
 * The general class
 *
 * @package default
 * @author Daniel Koop <mail@danielkoop.me>
 **/
class General Extends Base
{
	/**
	 * Launch the actions
	 *
	 * @return void
	 * @author Daniel Koop <mail@danielkoop.me>
	 **/
	protected function actions()
	{
		$this->loader->add_action( 'init', 'Mrkoopie\Wp_Plugin_Boilerplate\General\Language', 'load_files' );
	}
} // END class general