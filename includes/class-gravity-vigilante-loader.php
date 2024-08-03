<?php

/**
 *  Registrar todas los filters y actions del plugin
 * 
 * @link       https://www.linkedin.com/in/arr-dev
 * @since      1.0.0
 *
 * @package    Gf_Vigilante
 * @subpackage Gf_Vigilante/includes
 * 
 */



class Gravity_Vigilante_Loader
{

    protected $actions;

    protected $filters;

    public function __construct()
    {
    }

    /**
     * Registrar action hooks
     * @since 1.0.0
     * @param    string               $hook             El nombre del hook de acción de WordPress que se está registrando.
     * @param    object               $component        Una referencia de la instancia del objeto donde los actions son definidos.
     * @param    string               $callback         El nombre de la funcion que esta definida en el $component
     * @param    int                  $priority         Opcional. La prioridad en la que la función debe ser ejecutada. El valor predeterminado es 10.
     * @param    int                  $accepted_args    Opcional. El numero de argumentos que deben ser pasados a la funcion de $callback. Por defecto es 1.
     */
    public function add_action($hook, $component, $callback, $priority = 10, $accepted_args = 1)
    {
        $this->actions = $this->add($this->actions, $hook, $component, $callback, $priority, $accepted_args);
    }

    /**
     * Registrar filter hooks
     * @since 1.0.0
     * @param    string               $hook             El nombre del hook de acción de WordPress que se está registrando.
     * @param    object               $component        Una referencia de la instancia del objeto donde los actions son definidos.
     * @param    string               $callback         El nombre de la funcion que esta definida en el $component
     * @param    int                  $priority         Opcional. La prioridad en la que la función debe ser ejecutada. El valor predeterminado es 10.
     * @param    int                  $accepted_args    Opcional. El numero de argumentos que deben ser pasados a la funcion de $callback. Por defecto es 1.
     */
    public function add_filter($hook, $component, $callback, $priority = 10, $accepted_args = 1)
    {
        $this->filters = $this->add($this->filters, $hook, $component, $callback, $priority, $accepted_args);
    }

    /**
     * Una funcion de utilidad que sera usada para registrar los actions y filters en una coleccion
     * 
     * @since 1.0.0
     * @param array                 $hooks
     * @param string                $hook
     * @param object                $component
     * @param string                $callback
     * @param int                   $priority
     * @param int                   $accepted_args
     * @return array                La coleccion de actions y filters registrados en wordpress
     * 
     */

    private function add($hooks, $hook, $component, $callback, $priority, $accepted_args)
    {

        $hooks[] = array(
            'hook'          =>  $hook,
            'component'     =>  $component,
            'callback'      =>  $callback,
            'priority'      =>  $priority,
            'accepted_args' =>  $accepted_args
        );

        return $hooks;
    }

    /**
     *  Registrar filters y actions con Wordpress
     * @since 1.0.0
     */
    public function run()
    {
        foreach ($this->actions as $hook) {
            add_filter($hook['hook'], array($hook['component'], $hook['callback']), $hook['priority'], $hook['accepted_args']);
        }

        foreach ($this->filters as $hook) {
            add_filter($hook['hook'], array($hook['component'], $hook['callback']), $hook['priority'], $hook['accepted_args']);
        }
    }
}
