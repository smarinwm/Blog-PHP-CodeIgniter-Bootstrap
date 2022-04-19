<?php
defined('BASEPATH') OR exit('No direct script access allowed');

# BLOG
$route['/'] = "PostController/index";
$route['post/(:num)'] = "PostController/post";
$route['author/(:num)'] = "PostController/author";


# POST
$route['new_post'] = 'AdminController/new_post';
$route['add'] = 'AdminController/add';
$route['autores'] = 'AdminController/autores';
$route['edit/(:num)'] = 'AdminController/edit';
$route['update'] = 'AdminController/update';
$route['edit_autor/(:num)'] = 'AdminController/edit_autor';
$route['update_autor'] = 'AdminController/update_autor';
$route['delete/(:any)'] = 'AdminController/delete';
$route['delete_author/(:any)'] = 'AdminController/delete_author';


$route['admin'] = 'AdminController/index';

# LOGIN
$route['login/error'] = 'AdminController/login';
$route['admin/login'] = 'AdminController/login';
$route['login2'] = 'AdminController/login2';
$route['admin/registro'] = 'AdminController/registro';
$route['add_autor'] = 'AdminController/add_autor';
$route['list'] = 'AdminController/list';


$route['default_controller'] = 'PostController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
