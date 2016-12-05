<?php

namespace Mrkoopie\Wp_Plugin_Boilerplate\Helpers;

/**
 * Simple helper file to provide quick-access information.
 *
 * @link       http://www.danielkoop.me
 * @since      1.0.0
 */
class Plugin
{
    /**
     * Return the plugin slug.
     *
     * @return string The plugin slug
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    public static function get_slug()
    {
        return 'wp-plugin-bootstrap';
    }

    /**
     * Return the plugin version.
     *
     * @return string Version
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    public function get_version()
    {
        return '0.1';
    }

    /**
     * Get the plugin path.
     *
     * @return string $path The path
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    public static function get_path()
    {
        $path = realpath(plugin_dir_path(dirname(__FILE__)).'../').'/';

        return $path;
    }

    /**
     * Get the plugin resources path.
     *
     * @param string $location The location of the resource
     *
     * @return string $path The path
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    public static function get_resources_path($location)
    {
        $path = self::get_path().$location.'/';

        return $path;
    }

    /**
     * Get the plugin assets path.
     *
     * @param string $location The location of the assets
     *
     * @return string $path The path
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    public static function get_assets_path($location)
    {
        $path = self::get_path().$location.'/';

        return $path;
    }

    /**
     * Get the plugin URL.
     *
     * @return string $url The URL
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    public static function get_url()
    {
        $url = plugins_url().'/'.self::get_slug().'/';

        return $url;
    }
}
