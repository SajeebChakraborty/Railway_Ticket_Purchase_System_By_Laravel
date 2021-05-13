<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login','AuthController@login_page_show');
Route::get('/sign-up','AuthController@sign_up_page_show');
Route::post('/user/sign-up/process','AuthController@sign_up_process');
Route::get('/user/verify-email','AuthController@verify_email');
Route::post('/user/confirm-email','AuthController@confirm_email');
Route::get('user/dashboard/{id}','UserController@dashboard');
Route::post('/user/login/process','AuthController@login_process');
Route::get('logout','AuthController@logout');
Route::get('/verify-ticket','GuestController@verify_ticket');
Route::get('/user/settings','UserController@settings');
Route::get('/contact-us','GuestController@contact_us');
Route::post('/user/change-password/process','UserController@change_password_process');
Route::get('/user/dashboard/edit/{id}','UserController@edit_dashboard');
Route::post('user/dashboard/edit/process/{id}','UserController@edit_dashboard_process');
Route::get('/user/change/profile-picture/{id}','UserController@change_profile_picture');
Route::post('/user/change/profile-picture/process/{id}','UserController@update_profile_picture');
Route::get('contact-us','GuestController@contact_us');
Route::get('/user/forget-password','AuthController@forget_password');
Route::post('/user/forget-password/process','AuthController@reset_password');

$user_link=Session::get('user_link');

Route::get('/user/reset-password/{user_link}/{id}', 'AuthController@reset_password_process');
Route::post('/user/reset-password/confirm','AuthController@reset_password_confirm');


//Admin Route

Route::get('/admin/login','AuthController@admin_login_page_show');
Route::get('/admin/sign-up','AuthController@admin_sign_up_page_show');
Route::post('admin/sign-up/process','AuthController@admin_sign_up_process');
Route::get('/admin/verify-email','AuthController@admin_verify_email');
Route::post('/admin/confirm-email','AuthController@admin_confirm_email');
Route::get('admin/dashboard/{id}','AdminController@dashboard');
Route::get('/admin/settings','AdminController@settings');
Route::post('/admin/change-password/process','AdminController@change_password_process');
Route::get('/admin/dashboard/edit/{id}','AdminController@edit_dashboard');
Route::post('admin/dashboard/edit/process/{id}','AdminController@edit_dashboard_process');
Route::get('/admin/change/profile-picture/{id}','AdminController@change_profile_picture');
Route::post('/admin/change/profile-picture/process/{id}','AdminController@update_profile_picture');
Route::get('admin/logout','AuthController@admin_logout');
Route::post('/admin/login/process','AuthController@admin_login_process');
Route::get('/admin/forget-password','AuthController@admin_forget_password');
Route::post('/admin/forget-password/process','AuthController@admin_reset_password');

$admin_link=Session::get('admin_link');

Route::get('/admin/reset-password/{user_link}/{id}', 'AuthController@admin_reset_password_process');
Route::post('/admin/reset-password/confirm','AuthController@admin_reset_password_confirm');
Route::get('/admin/train/add','AdminController@train_add');
Route::post('/admin/train/add/process','AdminController@train_add_process');
Route::get('/sell-ticket','AdminController@sell_ticket');
Route::get('/sell-ticket/process/{id}','AdminController@sell_ticket_process');
Route::post('/sell-ticket/confirm/{id}','AdminController@sell_ticket_confirm');
Route::post('/train/show','GuestController@train_show');
Route::get('purchase/{id}','UserController@purchase_show');
Route::post('/confirm-booking','UserController@confirm_booking');


// SSLCOMMERZ Start
Route::get('/payment', 'SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

Route::post('/pay', 'SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END


Route::get('/payment-copy/{id}','UserController@payment_copy');

Route::post('/contact-us/confirm','GuestController@message');

Route::post('verify-ticket/confirm','GuestController@verify_check');

Route::get('purchase/history/{id}','UserController@purchase_history');

Route::get('refound/{id}','UserController@refound_show');

Route::post('refound-ticket/confirm/{id}','UserController@refound_confirm');

Route::get('refound-ticket','AdminController@refound_ticket');

Route::get('cash-back/{id}','AdminController@cash_back');

Route::get('admin/list','AdminController@admin_list');

Route::get('change-power/{id}','AdminController@change_power');

Route::post('/admin-power/change/confirm/{id}','AdminController@confirm_power');
