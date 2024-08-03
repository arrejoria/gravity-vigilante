<?php

/**
 * @link              "https://www.linkedin.com/in/arr-dev/"
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Gravity Form Vigilante
 * Plugin URI:        "https://arrejorialucas.com/"
 * Description:       Vigilante te será de utilidad para manejar todo tipo de validacion de los diferentes campos de un formulario en gravityforms. Las validaciones más simples hasta el uso de expresiones regulares para decirle "ALTO" a los datos inconsistentes y molestos que se filtran en tu web.
 * Version:           1.0.0
 * Author:            Lucas E. Arrejoria
 * Author URI:        "https://www.linkedin.com/in/arr-dev/?"
 * License:           GPL-2.0+
 * License URI:       "http://www.gnu.org/licenses/gpl-2.0.txt"
 * Text Domain:       gravity-vigilante
 * Domain Path:       /languages
 */


if (!defined('WPINC')) {
    die;
}

/**
 * Version actual del plugin
 * Se inicia con 1.0.0 y usa SemVer - https://semver.org
 * 
 */
if (!defined('GV_PLUGIN_VERSION')) {
    define('GV_PLUGIN_VERSION', '1.0.0');
}

// Definir constantes del plugin
if(! defined( 'GV_PLUGIN_DIR') ){
    define('GV_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

if(! defined( 'GV_PLUGIN_URL' )){
    define('GV_PLUGIN_URL', plugin_dir_url(__FILE__));
}

/**
 * El codigo que se ejecutara durante la activacion del plugin.
 * Esta accion se encuentra documentada includes/class-gravity-vigilante-activator.php
 */
function activate_gravity_vigilante()
{
    require_once GV_PLUGIN_DIR . 'includes/class-gravity-vigilante-activator.php';
    Activate_Gravity_Vigilante::activate();
}

/**
 * El codigo que se ejecutara durante la desactivacion del plugin
 * Esta accion se encuentra documentada en includes/class-gravity-vigilante-deactivator.php
 */
function deactivate_gravity_vigilante()
{
    require_once GV_PLUGIN_DIR . 'includes/class-gravity-vigilante-deactivator.php';
    Deactivate_Gravity_Vigilante::deactivate();
}

register_activation_hook(__FILE__, 'activate_gravity_vigilante');
register_deactivation_hook(__FILE__, 'deactivate_gravity_vigilante');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require_once GV_PLUGIN_DIR . 'includes/class-gravity-vigilante.php';
