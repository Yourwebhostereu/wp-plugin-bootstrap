<?php

namespace Mrkoopie\Wp_Plugin_Boilerplate\General;

use Mrkoopie\Wp_Plugin_Boilerplate\Helpers\Base;

/**
 * The general class.
 *
 * @author Daniel Koop <mail@danielkoop.me>
 **/
class General extends Base
{
    /**
     * Launch the actions.
     *
     * @return void
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    protected function actions()
    {
        $this->loader->add_action('init', 'Mrkoopie\Wp_Plugin_Boilerplate\General\Language', 'load_files');
    }
} // END class general
