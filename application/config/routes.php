<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

/*

$route['informacionEmpresa/create'] = 'informacionEmpresa/create';
$route['informacionEmpresa/modify/(:any)'] = 'informacionEmpresa/modify/$1';
$route['informacionEmpresa/delete'] = 'informacionEmpresa/delete';
$route['informacionEmpresa'] = 'informacionEmpresa';

$route['trabajosRealizados/create'] = 'trabajosRealizados/create';
$route['trabajosRealizados/modify/(:any)'] = 'trabajosRealizados/modify/$1';
$route['trabajosRealizados/delete'] = 'trabajosRealizados/delete';
$route['trabajosRealizados'] = 'trabajosRealizados';

$route['Backend/servicios/create'] = 'Backend/servicios/create';
$route['Backend/servicios/modify/(:any)'] = 'Backend/servicios/modify/$1';
$route['servicios/delete'] = 'servicios/delete';
$route['servicios'] = 'servicios';

$route['alianzas/create'] = 'alianzas/create';
$route['alianzas/modify/(:any)'] = 'alianzas/modify/$1';
$route['alianzas/delete'] = 'alianzas/delete';
$route['alianzas'] = 'alianzas';

$route['partners/create'] = 'partners/create';
$route['partners/modify/(:any)'] = 'partners/modify/$1';
$route['partners/delete'] = 'partners/delete';
$route['partners'] = 'partners';

$route['usuarios/create'] = 'usuarios/create';
$route['usuarios/modify/(:any)'] = 'usuarios/modify/$1';
$route['usuarios/delete'] = 'usuarios/delete';
$route['usuarios'] = 'usuarios';
*/


$route['login'] = 'Auth/login';


$route['backend'] = 'Backend/trabajosRealizados';


$route['default_controller'] = 'inicio';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
