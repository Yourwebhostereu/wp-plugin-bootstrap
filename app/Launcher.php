<?php

namespace Mrkoopie\Wp_Plugin_Boilerplate;

use Mrkoopie\Wp_Plugin_Boilerplate\Admin\Admin;
use Mrkoopie\Wp_Plugin_Boilerplate\Front\Front;
use Mrkoopie\Wp_Plugin_Boilerplate\General\General;

class Launcher
{
    /**
     * Launch the plugin!
     *
     * @return void
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    public function __construct()
    {
        // Register general functions
        $this->launch_general();

        // Register public functions
        $this->launch_front();

        // Register admin functions
        $this->launch_admin();
    }

    /**
     * Launch the general class.
     *
     * @return void
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    private function launch_general()
    {
        /*
         * The general actions and filters are alway applied.
         */
        new General();
    }

    /**
     * Launch the public class.
     *
     * @return void
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    private function launch_front()
    {
        if (is_admin()) {
            return;
        }
        new Front();
    }

    /**
     * Launch the private class.
     *
     * @return void
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    private function launch_admin()
    {
        // Only run when we are in the back-end
        if (!is_admin()) {
            return;
        }
        new Admin();
    }
} // END class Launcher
