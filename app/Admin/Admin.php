<?php
namespace Mrkoopie\Wp_Plugin_Boilerplate\Admin;
use Mrkoopie\Wp_Plugin_Boilerplate\Helpers\Base;

/**
 * The general class
 *
 * @package default
 * @author Daniel Koop <mail@danielkoop.me>
 **/
class Admin Extends Base
{
	/**
	 * Launch the actions
	 *
	 * @return void
	 * @author Daniel Koop <mail@danielkoop.me>
	 **/
	protected function filters()
	{	
		// ACF
		$this->loader->add_filter( 'acf/settings/load_json', 'Mrkoopie\Wp_Plugin_Boilerplate\Admin\Acf', 'define_acf_json_path' );
	}
} // END class admin