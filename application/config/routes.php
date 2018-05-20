<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['home'] = 'home/index';
$route['home/(:any)'] = 'home/view/$1';

$route['komplain/index'] = 'komplain/index';
$route['komplain/indexadm'] = 'komplain/indexadm';
$route['komplain/komsay'] = 'komplain/komsay';
$route['komplain/tambahkomplain'] = 'komplain/tambahkomplain';
$route['komplain/(:any)'] = 'komplain/view/$1';

$route['unit/index'] = 'unit/index';
$route['unit/editstatus'] = 'unit/editstatus';
$route['unit/(:any)'] = 'unit/view/$1';

$route['katkomplain/index'] = 'katkomplain/index';
$route['katkomplain/tambahkatkom'] = 'katkomplain/tambahkatkom';
$route['katkomplain/edit'] = 'katkomplain/editkatkomplain';
$route['katkomplain/(:any)'] = 'katkomplain/view/$1';

$route['dashboard'] = 'dashboard/index';
$route['dashboard/(:any)'] = 'dashboard/view/$1';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
