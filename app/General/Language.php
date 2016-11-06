<?php
namespace Mrkoopie\Wp_Plugin_Boilerplate\General;
use Mrkoopie\Wp_Plugin_Boilerplate\Helpers\Plugin;

/**
 * Manages the language options
 *
 * @package default
 * @author Daniel Koop <mail@danielkoop.me>
 **/
class Language
{
	/**
	 * Load the language files
	 *
	 * @return void
	 * @author Daniel Koop <mail@danielkoop.me>
	 **/
	public function load_files()
	{
		load_plugin_textdomain( Plugin::get_slug(), false, Plugin::get_resources_path('languages')); 
	}
} // END class general