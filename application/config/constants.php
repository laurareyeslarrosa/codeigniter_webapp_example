<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
define('EXIT_SUCCESS', 0); // no errors
define('EXIT_ERROR', 1); // generic error
define('EXIT_CONFIG', 3); // configuration error
define('EXIT_UNKNOWN_FILE', 4); // file not found
define('EXIT_UNKNOWN_CLASS', 5); // unknown class
define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
define('EXIT_USER_INPUT', 7); // invalid user input
define('EXIT_DATABASE', 8); // database error
define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/* nombres de las clases y de las tablas de la db */

define('INFORMACION_CLASS', 'informacionEmpresa');
define('TRABAJOS_CLASS', 'trabajosRealizados');
define('SERVICIOS_CLASS', 'servicios');
define('SUBSERVICIOS_CLASS', 'subservicios');
define('PARTNERS_CLASS', 'partners');
define('ALIANZAS_CLASS', 'alianzas');
define('USUARIOS_CLASS', 'usuarios');
define('NOTICIAS_CLASS', 'noticias');
define('ABOUT_CLASS', 'sobreduodyn');
define('CONFIG_CLASS', 'configuration');


define('INICIO_CLASS', 'inicio');
define('CONTACTO_CLASS', 'contacto');
define('AUTH_CLASS', 'auth');

/* titulo de las paginas */

define('INFORMACION_TITLE', 'Información sobre la empresa');
define('TRABAJOS_TITLE', 'Trabajos realizados');

/* mensajes de alerta */

define('CREADO_MESSAGE', 'Elemento creado');
define('MODIFICADO_MESSAGE', 'Elemento modificado');
define('ELIMINADO_MESSAGE', 'Elemento eliminado');

define('LOGGED_IN', 'logged_in');

//remover todos cuando este pronto lo de la redireccion
define('INDEX_FILE', 'index.php/');

/* rutas de las imagenes */

define('TRABAJOS_IMAGE_ROUTE','imagenes/' . ucfirst(TRABAJOS_CLASS) . '_logoEmpresa/');
define('ALIANZAS_IMAGE_ROUTE','imagenes/' . ucfirst(ALIANZAS_CLASS) . '_logoEmpresa/');
define('PARTNERS_IMAGE_ROUTE','imagenes/' . ucfirst(PARTNERS_CLASS) . '_logoEmpresa/');
define('SERVICIOS_IMAGE_ROUTE_ICON','imagenes/' . ucfirst(SERVICIOS_CLASS) . '_imagenIcono/');
define('SERVICIOS_IMAGE_ROUTE','imagenes/' . ucfirst(SERVICIOS_CLASS) . '_imagenInicio/');
define('SUBSERVICIOS_IMAGE_ROUTE','imagenes/' . ucfirst(SUBSERVICIOS_CLASS) . '_imagen/');
     