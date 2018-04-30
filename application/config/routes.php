<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// $route['admin'] = 'admin/index';
// $route['admin/(:any)'] = 'admin/view/$1';

$route['komplain'] = 'komplain/index';
$route['komplain/tambahkomplain'] = 'komplain/tambahkomplain';
$route['komplain/(:any)'] = 'komplain/view/$1';

$route['unit'] = 'unit/index';
$route['unit/editstatus'] = 'unit/editstatus';
$route['unit/(:any)'] = 'unit/view/$1';

$route['katkomplain'] = 'katkomplain/index';
$route['katkomplain/tambahkatkom'] = 'katkomplain/tambahkatkom';
$route['katkomplain/edit'] = 'katkomplain/editkatkomplain';
$route['katkomplain/(:any)'] = 'katkomplain/view/$1';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
