<?php

namespace Mrkoopie\Wp_Plugin_Boilerplate;

/**
 * Bootstrap file.
 *
 * Brings
 *
 * @link              http://www.danielkoop.me/
 * @since             1.0.0
 *
 * @author 		      Daniel Koop <mail@danielkoop.me>
 *
 * @wordpress-plugin
 * Plugin Name:       Wp_Plugin_Boilerplate
 * Plugin URI:        http://danielkoop.me/wp-plugin-bootstrap/
 * Description:       A simple plugin bootstrap for WordPress
 * Version:           1.0.0
 * Author:            Daniel Koop
 * Author URI:        http://www.danielkoop.me/
 * License:           Proprietary
 * License URI:       http://www.danielkoop.me/
 * Text Domain:       wp-plugin-bootstrap
 * Domain Path:       /languages
 */

/* Include composer */
include 'vendor/autoload.php';

/* Launch the plugin! */
(new Launcher());
