<?php
/**
 * @package Sige
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
if (!GlobalConfig::$APP_ROOT) GlobalConfig::$APP_ROOT = realpath("./");

/**
 * check is needed to ensure asp_tags is not enabled
 */
if (ini_get('asp_tags')) 
	die('<h3>Server Configuration Problem: asp_tags is enabled, but is not compatible with Savant.</h3>'
	. '<p>You can disable asp_tags in .htaccess, php.ini or generate your app with another template engine such as Smarty.</p>');

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "Model/User.php";

/**
 * RENDER ENGINE
 * You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SavantRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SavantRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),
		
	// example authentication routes
	'GET:loginform' => array('route' => 'Secure.LoginForm'),
	'POST:login' => array('route' => 'Secure.Login'),
	'GET:secureuser' => array('route' => 'Secure.UserPage'),
	'GET:secureadmin' => array('route' => 'Secure.AdminPage'),
	'GET:logout' => array('route' => 'Secure.Logout'),
	
	// Funcoes Autenticacao
	'GET:roles' => array('route' => 'Role.ListView'),
	'GET:role/(:num)' => array('route' => 'Role.SingleView', 'params' => array('id' => 1)),
	'GET:api/roles' => array('route' => 'Role.Query'),
	'POST:api/role' => array('route' => 'Role.Create'),
	'GET:api/role/(:num)' => array('route' => 'Role.Read', 'params' => array('id' => 2)),
	'PUT:api/role/(:num)' => array('route' => 'Role.Update', 'params' => array('id' => 2)),
	'DELETE:api/role/(:num)' => array('route' => 'Role.Delete', 'params' => array('id' => 2)),
		
	// Usuarios Autenticacao
	'GET:users' => array('route' => 'User.ListView'),
	'GET:user/(:num)' => array('route' => 'User.SingleView', 'params' => array('id' => 1)),
	'GET:api/users' => array('route' => 'User.Query'),
	'POST:api/user' => array('route' => 'User.Create'),
	'GET:api/user/(:num)' => array('route' => 'User.Read', 'params' => array('id' => 2)),
	'PUT:api/user/(:num)' => array('route' => 'User.Update', 'params' => array('id' => 2)),
	'DELETE:api/user/(:num)' => array('route' => 'User.Delete', 'params' => array('id' => 2)),
		
		
	// Agenda
	'GET:agendas' => array('route' => 'Agenda.ListView'),
	'GET:agenda/(:num)' => array('route' => 'Agenda.SingleView', 'params' => array('aId' => 1)),
	'GET:api/agendas' => array('route' => 'Agenda.Query'),
	'POST:api/agenda' => array('route' => 'Agenda.Create'),
	'GET:api/agenda/(:num)' => array('route' => 'Agenda.Read', 'params' => array('aId' => 2)),
	'PUT:api/agenda/(:num)' => array('route' => 'Agenda.Update', 'params' => array('aId' => 2)),
	'DELETE:api/agenda/(:num)' => array('route' => 'Agenda.Delete', 'params' => array('aId' => 2)),
		
	// Cliente
	'GET:clientes' => array('route' => 'Cliente.ListView'),
	'GET:cliente/(:num)' => array('route' => 'Cliente.SingleView', 'params' => array('id' => 1)),
	'GET:api/clientes' => array('route' => 'Cliente.Query'),
	'POST:api/cliente' => array('route' => 'Cliente.Create'),
	'GET:api/cliente/(:num)' => array('route' => 'Cliente.Read', 'params' => array('id' => 2)),
	'PUT:api/cliente/(:num)' => array('route' => 'Cliente.Update', 'params' => array('id' => 2)),
	'DELETE:api/cliente/(:num)' => array('route' => 'Cliente.Delete', 'params' => array('id' => 2)),
		
	// Funcionario
	'GET:funcionarios' => array('route' => 'Funcionario.ListView'),
	'GET:funcionario/(:num)' => array('route' => 'Funcionario.SingleView', 'params' => array('id' => 1)),
	'GET:api/funcionarios' => array('route' => 'Funcionario.Query'),
	'POST:api/funcionario' => array('route' => 'Funcionario.Create'),
	'GET:api/funcionario/(:num)' => array('route' => 'Funcionario.Read', 'params' => array('id' => 2)),
	'PUT:api/funcionario/(:num)' => array('route' => 'Funcionario.Update', 'params' => array('id' => 2)),
	'DELETE:api/funcionario/(:num)' => array('route' => 'Funcionario.Delete', 'params' => array('id' => 2)),
		
	// Justica
	'GET:justicas' => array('route' => 'Justica.ListView'),
	'GET:justica/(:num)' => array('route' => 'Justica.SingleView', 'params' => array('id' => 1)),
	'GET:api/justicas' => array('route' => 'Justica.Query'),
	'POST:api/justica' => array('route' => 'Justica.Create'),
	'GET:api/justica/(:num)' => array('route' => 'Justica.Read', 'params' => array('id' => 2)),
	'PUT:api/justica/(:num)' => array('route' => 'Justica.Update', 'params' => array('id' => 2)),
	'DELETE:api/justica/(:num)' => array('route' => 'Justica.Delete', 'params' => array('id' => 2)),

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Agenda","fk_agenda_cliente1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Agenda","fk_agenda_funcionario",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Agenda","fk_agenda_justica1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("User","u_role",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
?>