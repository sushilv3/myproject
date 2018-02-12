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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Registration_Ctrl/loginForm';

// $route['(.*)'] = 'RootFilter_Ctrl/validate';
// $route['colleges'] = 'College_Ctrl/list';
$route['colleges/list'] = 'College_Ctrl/list';
$route['colleges/action'] = 'College_Ctrl/executeAction';
$route['search'] = 'College_Ctrl/searchBy';
$route['updateForm'] = 'College_Ctrl/UpdateForm';
$route['colleges/edit'] = 'College_Ctrl/edit';
$route['colleges/addf'] = 'College_Ctrl/addForm';
$route['colleges/add'] = 'College_Ctrl/add';
$route['colleges/page/(:any)'] = 'College_Ctrl/paginate/$1';
// $route['colleges/previous/(:any)'] = 'College_Ctrl/previous/$1';
$route['students/list'] = 'Student_Ctrl/list';
$route['students/(:any)'] = 'Student_Ctrl/list/$1';
$route['searchstudent'] = 'Student_Ctrl/searchBy';
$route['courses/(:any)'] = 'Courses_Ctrl/list/$1';
$route['registration'] = 'Registration_Ctrl/regForm';
$route['registration/add'] = 'Registration_Ctrl/add';
$route['login'] = 'Registration_Ctrl/loginForm';
$route['login/status'] = 'Registration_Ctrl/login';
$route['logout'] = 'Registration_Ctrl/logout';
$route['kodecamp'] = 'Registration_Ctrl/kodeCampForm';
$route['kodecamp/login'] = 'Registration_Ctrl/kodeCampLogin';
$route['kodecamp/list'] = 'Registration_Ctrl/registrationList';
$route['test/view'] = 'Registration_Ctrl/testview';
$route['test'] = 'Registration_Ctrl/do_upload';
$route['uform'] = 'Upload/uForm';
$route['upload_form'] = 'Upload/upload_form';

// ajax routes
$route['ajaxResource'] = 'Registration_Ctrl/serveAjaxRequest';

$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
