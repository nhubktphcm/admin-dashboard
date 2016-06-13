<?php defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['administration'] = 'admin/administration/index';
$route['logout'] = 'admin/administration/logout';
$route['login'] = 'admin/administration/login_submit';

$route['user-management'] = 'admin/user_management/index';
$route['load-user-list'] = 'admin/user_management/load_data_table';
$route['save-user'] = 'admin/user_management/submit_create_user';
$route['update-user'] = 'admin/user_management/submit_update_user';
$route['update-user/:num'] = 'admin/user_management/get_update_user';
$route['delete-user/:num'] = 'admin/user_management/submit_delete_user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
