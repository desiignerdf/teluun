<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//////////////////////////////////////
////////     Front-end     ///////////
//////////////////////////////////////

// Content detail
$route['n/detail/(:num)'] = 'content/detail/$1';


//////////////////////////////////////
////////       Admin     ///////////
//////////////////////////////////////

//admin
$route['admin'] = 'admin/admin';
$route['admin/logout'] = 'admin/admin/logout';

//admin-login
$route['admin/user'] = 'admin/user';
$route['admin/login'] = 'admin/admin/login';
$route['admin/dashboard'] = 'admin/admin/dashboard';