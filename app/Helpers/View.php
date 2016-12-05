<?php

namespace Mrkoopie\Wp_Plugin_Boilerplate\Helpers;

/**
 * Create custom views.
 *
 * @link       http://www.danielkoop.me/
 * @since      1.0.0
 */
class View
{
    /**
     * Alter the template_include path if it matches $post_type.
     *
     * @param string $template
     *
     * @return string $templates
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    public function template_include($template, $post_type)
    {
        $find = [];
        $file = '';

        if (is_embed()) {
            return $template;
        }

        /* Check if we are going to override a single or archive template */
        if (is_single() && get_post_type() == $post_type) {
            $file = 'single.php';
            $find[] = $this->dir_prefix.'/'.$file;
        } elseif (is_post_type_archive($post_type)) {
            $file = 'archive.php';
            $find[] = $this->dir_prefix.'/'.$file;
        }

        /* Only do something when we have a file */
        if ($file) {
            $template = locate_template(array_unique($find));
            if (!$template) {
                $template = Plugin::get_resources_path('view/front').$file;
            }
        }

        return $template;
    }
}
