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
$route['default_controller'] = 'index';
$route['404_override'] = 'page/error';
$route['translate_uri_dashes'] = TRUE;

$route['admin/login'] = 'admin/index/login';
$route['admin/logout'] = 'admin/index/logout';

$route['home'] = 'index';
$route['contact-us'] = 'page/contact';
$route['about-us'] = 'page/about';

$route['help'] = 'page/help';
$route['help-detail/(:num)'] = 'page/help_detail/$1';

$route['terms-conditions'] = 'page/terms_conditions';
$route['privacy-policy'] = 'page/privacy_policy';
$route['cookie-policy'] = 'page/cookie_policy';
$route['guarantee'] = 'page/guarantee';
$route['reservation-protection'] = 'page/reservation-protection';
$route['sitter-guidelines'] = 'page/sitter_guidelines';
$route['safety'] = 'page/safety';
$route['advertise'] = 'page/advertise';
$route['services'] = 'page/services';
$route['newsletter'] = 'ajax/newsletter';

/*** start blog ***/
$route['blog/(:num)'] = 'blog/index/$1';
$route['blog-detail/(:num)'] = 'blog/detail/$1';
/*** end blog ***/

/*** start press ***/
$route['press/(:num)'] = 'press/index/$1';
$route['press-detail/(:num)'] = 'press/detail/$1';
/*** end press ***/

/*** start press ***/
$route['cosplayer-resources'] = 'sitter_resources/categories';
$route['sitter-resource-list/(:num)'] = 'sitter_resources/index/$1';
$route['sitter-resource-list/(:num)/(:num)'] = 'sitter_resources/index/$1/$2';
$route['sitter-resource-detail/(:num)'] = 'sitter_resources/detail/$1';
/*** end press ***/

$route['facebook-login'] = 'index/facebook_login';
$route['google-login'] = 'index/google_login';
$route['google-callback'] = 'ajax/google_callback';

$route['login'] = 'index/login';
$route['logout'] = 'index/logout';
$route['forgot-password'] = 'index/forgot';
$route['verification/(:any)'] = 'index/verification/$1';
$route['reset/(:any)'] = 'index/reset/$1';
$route['reset-password'] = 'index/reset_password';
$route['signup'] = 'index/register';
$route['rs/(:any)'] = 'index/register/$1';
$route['cosplayer-signup'] = 'index/sitter_register';
$route['rts/(:any)'] = 'index/sitter_register/$1';
$route['become-a-cosplayer'] = 'index/become_sitter';
$route['pay-package/(:num)'] = 'index/pay_package/$1';
$route['become-cosplayer'] = 'index/become_pet_sitter';
// $route['search-subject'] = 'ajax/search_subject';

$route['search'] = 'index/search';

$route['upload-attachment'] = 'uploader/save_attachment';
$route['save-profile-image'] = 'uploader/save_profile_image';
$route['save-mul-images'] = 'uploader/save_mul_images';

$route['email-verification'] = 'account/email_verification';
$route['resend-email'] = 'account/resend-email';
$route['phone-verification'] = 'account/phone_verification';
$route['verify-phone'] = 'account/verify_phone';
$route['verify-phone-code'] = 'account/verify_phone_code';
$route['change-phone'] = 'account/change_phone';

$route['dashboard'] = 'account/dashboard';
// $route['profile-settings'] = 'account/account_settings';
$route['player/profile-settings'] = 'account/pro_settings';
$route['buyer/profile-settings'] = 'account/pro_settings';
$route['save-gallery'] = 'account/gallery';
$route['save-availability'] = 'account/availability';
$route['additional-info'] = 'account/additional_info';
$route['services-setting'] = 'account/services';
$route['calendar'] = 'account/calendar';
$route['become-pet-owner'] = 'account/become_pet_owner';
$route['membership'] = 'account/membership';
$route['save-membership'] = 'account/save_membership';
$route['cancel-membership'] = 'account/cancel_membership';

$route['change-password'] = 'account/change_pswd';
$route['invite-friend'] = 'account/invite_friend';

/*** start payments ***/
$route['save-paypal'] = 'payment_methods/save_paypal';
$route['player/bank-accounts'] = 'payment_methods/bank_accounts';
$route['edit-account'] = 'payment_methods/edit_account';
// $route['payment-methods'] = 'payment_methods/index';
$route['buyer/payment-methods'] = 'payment_methods/index';
$route['delete-method/(:any)'] = 'payment_methods/delete/$1';
$route['make-default/(:any)'] = 'payment_methods/make_default/$1';

// $route['earnings'] = 'payment_methods/earnings';
$route['player/earnings'] = 'payment_methods/earnings';
// $route['transactions'] = 'payment_methods/transactions';
$route['buyer/transactions'] = 'payment_methods/transactions';
$route['transaction-detail'] = 'payment_methods/transaction_detail';
// $route['withdraw'] = 'payment_methods/withdraw';
$route['player/withdraw'] = 'payment_methods/withdraw';
/*** end payments ***/


/*** start pets ***/
$route['my-pets'] = 'my_pets/index';
$route['add-new-pet'] = 'my_pets/add_new';
$route['edit-pet/(:any)'] = 'my_pets/edit/$1';
$route['get-pet'] = 'my_pets/get_pet';
$route['delete-pet/(:num)'] = 'my_pets/delete/$1';
$route['pet-detail'] = 'my_pets/detail';
$route['get-my-pets'] = 'my_pets/get_my_pets';
$route['search-pets'] = 'index/search_pets';
/*** end pets ***/

/*** start bookings ***/
$route['redeem-code'] = 'bookings/redeem_code';
$route['request-detail'] = 'index/request_detail';
$route['booking-request'] = 'bookings/booking_request';
$route['request-detail/(:any)'] = 'bookings/booking_request/$1';

$route['get-admin-request-detail'] = 'admin/bookings/bookin_request_detail';

/*$route['my-sitters'] = 'booking/my_sitters';
$route['my-sitters/(:num)'] = 'booking/my_sitters/$1';*/
$route['book-now/(:any)'] = 'bookings/book_now/$1';
// $route['book-chat-job/(:any)'] = 'bookings/book_chat_job/$1';

/*$route['requests'] = 'bookings/requests';
$route['requests/(:num)'] = 'bookings/requests/$1';
$route['job-requests'] = 'bookings/requests';
$route['job-requests/(:num)'] = 'bookings/requests/$1';*/


$route['get-request-detail'] = 'bookings/booking_request_detail';
$route['reject-booking-request'] = 'bookings/reject_booking_request';
$route['accept-booking-request'] = 'bookings/accept_booking_request';
$route['confirm-booking'] = 'bookings/confirm_booking';
$route['on-location'] = 'bookings/on_location';
$route['mark-complete-booking'] = 'bookings/mark_complete_booking';
$route['leave-review'] = 'bookings/complete_booking';
$route['review-box'] = 'bookings/review_box';


$route['player/jobs'] = 'bookings/jobs';
// $route['jobs'] = 'bookings/jobs';
// $route['job-detail/(:any)'] = 'bookings/booking_detail/$1';

$route['buyer/bookings'] = 'bookings/index';
// $route['bookings'] = 'bookings/index';
// $route['booking-detail/(:any)'] = 'bookings/booking_detail/$1';

$route['mark-cancel-job'] = 'bookings/mark_cancel_job';
$route['cancel-job'] = 'bookings/cancel_job';

/*** end bookings ***/

/*** start jobs ***/
/*$route['my-jobs'] = 'my_jobs/index';
$route['add-new-job'] = 'my_jobs/add_new';
$route['edit-job'] = 'my_jobs/edit';
$route['get-job'] = 'my_jobs/get_job';
$route['delete-job'] = 'my_jobs/delete';
$route['job-detail/(:any)'] = 'my_jobs/detail/$1';
$route['search-jobs'] = 'index/search_jobs';*/
/*** end jobs ***/

/*** start messages ***/
$route['player/messages'] = 'messages/msg';
$route['buyer/messages'] = 'messages/msg';
// $route['messages/(:any)'] = 'messages/index/$1';
// $route['send-msg'] = 'messages/send_msg';
// $route['send-noti-msg'] = 'messages/send_noti_msg';
// $route['get-chat'] = 'messages/get_chat_msgs';
/*** end messages ***/

$route['favorite'] = 'common/favorite';
$route['rate'] = 'common/rate';
$route['subscribe'] = 'common/subscribe';

$route['player/notifications'] = 'notifications/noti';
$route['buyer/notifications'] = 'notifications/noti';
// $route['notifications/(:num)'] = 'notifications/index/$1';
// $route['notifications/(:num)/(:any)'] = 'notifications/index/$1/$2';
// $route['open-notifications'] = 'notifications/mark_seen_noti';
// $route['notification-settings'] = 'notifications/settings';

$route['save-change-dp'] = 'ajax/save_change_dp';
$route['remove-image'] = 'ajax/remove_image';

$route['profile'] = 'account/profile';
// $route['profile'] = 'account/profile';
// $route['profile/(:any)/(:any)'] = 'index/profile/$1/$2';

/*** paypal ***/
$route['pay-now/(:num)'] = 'paypal/pay_now/$1';
$route['success/(:num)'] = 'paypal/success/$1';
$route['cancel/(:num)'] = 'paypal/cancel/$1';
$route['notify'] = 'paypal/notify';



// This is just for yaki
$route['player/dashboard'] = 'page/player_dashboard';
$route['buyer/dashboard'] = 'page/buyer_dashboard';


$route['merchandise'] = 'page/merchandise';
$route['product-detail'] = 'page/product_detail';
$route['player/orders'] = 'account/orders';
