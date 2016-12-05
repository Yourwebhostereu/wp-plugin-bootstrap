<?php

namespace Mrkoopie\Wp_Plugin_Boilerplate\Admin;

use Mrkoopie\Wp_Plugin_Boilerplate\Helpers\Plugin;

/**
 * The acf class.
 *
 * @author Daniel Koop <mail@danielkoop.me>
 **/
class Acf
{
    /**
     * Register ACF-json path.
     *
     * @since    1.0.0
     */
    public function define_acf_json_path($paths)
    {
        $paths[] = Plugin::get_assets_path('admin/acf-json');

        // return
        return $paths;
    }
} // END class admin
