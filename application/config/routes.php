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
$route['service-provider/login'] = 'login/login_service_provider';
$route['service-provider/register'] = 'login/signup_service_provider';
$route['consumer/login'] = 'login/login_consumer';
$route['consumer/register'] = 'login/signup_consumer';
$route['social-login/google-callback'] = 'login/google_login_callback';
$route['social-login/facebook-callback'] = 'login/facebook_login_callback';
$route['logout'] = 'login/logout';
$route['my-account'] = 'account';
$route['my-account/edit'] = 'account/edit_profile';
$route['my-business-profile'] = 'account/my_business_profile';
$route['password-and-security'] = 'account/change_password';
$route['password-and-security/edit'] = 'account/change_password_edit';
$route['terms_of_use'] = 'welcome/terms_of_use';
$route['privacy_policy'] = 'welcome/privacy_policy';
$route['verify/(:any)'] = 'login/verify_user_email/$1';
$route['home/switchLanguage/(:any)'] = 'home/switchLanguage/$1';
$route['search'] = 'home/searchDetails';
$route['view-specialist-profile/(:any)'] = 'home/specialistProfile/$1';
$route['send-message/(:any)'] = 'home/sendMessageToUser/$1';
$route['give-review/(:any)'] = 'home/sendReviewToUser/$1';
$route['give-endorsement/(:any)'] = 'home/sendEndorsementToUser/$1';
$route['event-details/(:any)'] = 'events/details/$1';
$route['list-your-business'] = 'login/success_screen';
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
