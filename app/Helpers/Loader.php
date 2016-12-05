<?php

namespace Mrkoopie\Wp_Plugin_Boilerplate\Helpers;

/**
 * High performance action and filter loader.
 *
 * Based on https://github.com/devinvinson/WordPress-Plugin-Boilerplate/
 *
 * @author Daniel Koop <mail@danielkoop.me>
 **/
class Loader
{
    /**
     * Array of registered actions.
     *
     * @var array The actions to be fired
     **/
    protected $actions = [];

    /**
     * Array of registered filters.
     *
     * @var array The filters to be applied
     **/
    protected $filters = [];

    /**
     * Array with instances.
     *
     * @var array Instances for a filter or action
     **/
    private $instances;

    /**
     * Add a new action to the $this->array collection.
     *
     * @param string $hook          The name of the WordPress action
     * @param string $class         The full path to the class
     * @param string $function      The function in the class
     * @param int    $priority      Optional. Default 10. Priority of when the function should be launched.
     * @param int    $accepted_args Optional. Default is 1. The number of arguments that is accepted.
     *
     * @return void
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    public function add_action($hook, $class, $function, $priority = 10, $accepted_args = 1)
    {
        $this->actions = $this->add($this->actions, $hook, $class, $function, $priority, $accepted_args);
    }

    /**
     * Add a new filter to the $this->array collection.
     *
     * @param string $hook          The name of the WordPress filter
     * @param string $class         The full path to the class
     * @param string $function      The function in the class
     * @param int    $priority      Optional. Default 10. Priority of when the function should be launched.
     * @param int    $accepted_args Optional. Default is 1. The number of arguments that is accepted.
     *
     * @return void
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    public function add_filter($hook, $class, $function, $priority = 10, $accepted_args = 1)
    {
        $this->filters = $this->add($this->filters, $hook, $class, $function, $priority, $accepted_args);
    }

    /**
     * Add a new filter to the $this->array collection.
     *
     * @param object $hooks         The object with all the hooks.
     * @param string $hook          The name of the WordPress filter
     * @param string $class         The full path to the class
     * @param string $function      The function in the class
     * @param int    $priority      Optional. Default 10. Priority of when the function should be launched.
     * @param int    $accepted_args Optional. Default is 1. The number of arguments that is accepted.
     *
     * @return array The collection of actions and filters registered with WordPress.
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    private function add($hooks, $hook, $class, $function, $priority, $accepted_args)
    {
        $hooks[] = [
            'hook'          => $hook,
            'class'         => $class,
            'function'      => $function,
            'priority'      => $priority,
            'accepted_args' => $accepted_args,
        ];

        return $hooks;
    }

    /**
     * Run every registred filter or array.
     *
     * The filters and actions are registered with this instance. Only when
     * a filter or action is executed, the required class will be initiated
     * and loaded.
     *
     * @return void
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    public function run()
    {
        foreach ($this->filters as $id => $filter) {
            add_filter($filter['hook'], [$this, 'execute_filter_'.$id], $filter['priority'], $filter['accepted_args']);
        }

        foreach ($this->actions as $id => $action) {
            add_action($action['hook'], [$this, 'execute_action_'.$id], $action['priority'], $action['accepted_args']);
        }
    }

    /**
     * Magic method to process execute_action_* and execute_filter_*.
     *
     * @param string $name The called function name
     * @param array  $args The provided arguments
     *
     * @return mixed The return data of the called function.
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    public function __call($name, $args)
    {
        $function_whitelist = ['execute_action_', 'execute_filter_'];
        $function = substr($name, 0, 15);

        if (array_search($function, $function_whitelist) === false) {
            return false;
        }

        // Get the task id
        $task_id = str_replace($function, '', $name);

        if ($function == 'execute_action_') {
            return $this->execute('action', $task_id, $args);
        } else {
            return $this->execute('filter', $task_id, $args);
        }
    }

    /**
     * Execute an action of filter.
     *
     * @param string $type Can be action or filter
     * @param int    $id   The key id or the task
     * @param array  $args The arguments for the function.
     *
     * @return void
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    public function execute($type, $id, $args)
    {
        $type .= 's';
        /* Due to an error in PHP 5.6, we can not do $this->$type[$id] */
        $type = $this->$type;
        $task = $type[$id];

        /**
         * For compatibilty reasons we do allow $task['class'] to be an instance.
         * However, this will reduce the performance of the plugin.
         */
        if (!is_object($task['class'])) {
            $instance = $this->launch_instance($task['class']);
        } else {
            $instance = $task['class'];
        }

        return call_user_func_array([$instance, $task['function']], $args);
    }

    /**
     * Launch an instance of $class.
     *
     * Launches an instance of $class when it is not already.
     *
     * @param string $class The to be launched instance
     *
     * @return object Instance of $class
     *
     * @author Daniel Koop <mail@danielkoop.me>
     **/
    private function launch_instance($class)
    {
        if (!isset($this->instances[$class])) {
            $this->instances[$class] = new $class();
        }

        return $this->instances[$class];
    }
} // END class Loader
