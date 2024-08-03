<?php

/**
 * 
 * 
 */

class Gravity_Vigilante
{
    /**
	 * El objeto que se encarga de mantener y registrar todos los hooks que usara el plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      Import_Members_Loader    $loader    Mantiene y registra todo los hooks del plugin.
     */
    protected $loader;

    /**
     * El identificador unico del plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $plugin_name    Este string es usado como identificador unico del plugin.
     */
    protected $plugin_name;

    /**
     * La version actual del plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $version    La version actual del plugin.
     */
    protected $version;


    public function __construct()
    {

        $this->loader = new Gravity_Vigilante_Loader;

        if (defined('GV_PLUGIN_VERSION')) {
            $this->version = GV_PLUGIN_VERSION;
        } else {
            $this->version = '1.0.0';
        }

        $this->plugin_name = 'gravity-vigilante';
    }


    public function load_dependencies()
    {
        /**
         * Clase responsable de manejar los actions y filters del nucleo del plugin.
         */
    }
}
