<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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

$route['default_controller'] = 'home';

// Custom Routing
$route['/'] = 'home';

$route['register'] = 'register';

$route['login'] = 'login';

$route['products'] = 'products';
$route['products/(:num)'] = 'products/getProducts/$1';

$route['product'] = 'product';
$route['product/(:num)'] = 'product/getProduct/$1';

// search results
$route['products/search'] = 'products/getProductsBySearch/$1';
$route['products/search/(:num)'] = 'products/getProductsBySearch/$1';

// API
$route['api/user/register'] = 'api/register';
$route['api/user/login'] = 'api/login';
$route['api/user/logout'] = 'api/logout';
$route['api/user/check/duplicate'] = 'api/check_duplicate';

$route['api/prouducts'] = 'api/products';
$route['api/prouducts/(:num)'] = 'api/products/$1';

$route['api/products/search'] = 'api/products_search';
$route['api/products/search/(:num)'] = 'api/products_search/$1';

$route['api/product'] = 'api/product';
$route['api/product/(:num)'] = 'api/product/$1';
$route['api/product/buy/(:num)'] = 'api/product_buy/$1';

// Default Routing
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
