<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['home/index'] = 'home/index';
$route['home/homelogin'] = 'home/homelogin';
$route['home/(:any)'] = 'home/view/$1';

$route['komplain/index'] = 'komplain/index';
$route['komplain/indexadm'] = 'komplain/indexadm';
$route['komplain/searchadm'] = 'komplain/searchadm';
$route['komplain/komsay'] = 'komplain/komsay';
$route['komplain/tambahkomplain'] = 'komplain/tambahkomplain';
$route['komplain/(:any)'] = 'komplain/view/$1';

$route['unit/index'] = 'unit/index';
$route['unit/editstatus'] = 'unit/editstatus';
$route['unit/proseskom'] = 'unit/proseskom';
$route['unit/(:any)'] = 'unit/view/$1';

$route['katkomplain/index'] = 'katkomplain/index';
$route['katkomplain/tambahkatkom'] = 'katkomplain/tambahkatkom';
$route['katkomplain/detail'] = 'katkomplain/detail';
$route['katkomplain/addkatU'] = 'katkomplain/addkatU';
$route['katkomplain/(:any)'] = 'katkomplain/view/$1';

$route['dashboard'] = 'dashboard/index';
$route['dashboard/(:any)'] = 'dashboard/view/$1';

$route['default_controller'] = 'home/index';
$route['(:any)'] = 'home/index/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
