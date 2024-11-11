<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Views
// $routes->get('/', 'Home::index');

// Pages
$routes->get('about', 'Pages::about');
$routes->get('contacts', 'Pages::contacts');
$routes->post('contacts', 'Pages::emailContacts');

// Reset Password
$routes->post('resetPassword', 'Auth::emailForgotPassword');
$routes->get('resetPassword', 'Auth::resetPassword');
$routes->post('updatePassword', 'Auth::updatePassword');





// Register
$routes->post('register', 'Auth::showRegister');
$routes->post('register', 'Auth::register');

// Login
$routes->get('/', 'Auth::showLogin');
$routes->post('/', 'Auth::login');

// Profile
$routes->get('profile/(:num)', 'Profile::index/$1');

// Settings
$routes->get('settings', 'Settings::index');

$routes->get('editProfile', 'Settings::showEditProfile');
$routes->post('editProfile', 'Settings::editProfile');
$routes->get('editPassword', 'Settings::showEditPassword');
$routes->post('editPassword', 'Settings::editPassword');





// Tasks
$routes->get('tasks', 'TaskController::index');

// Create
$routes->get('create', 'TaskController::create');
$routes->post('create', 'TaskController::store');

// Edit Task
$routes->get('edit/(:num)', 'TaskController::edit/$1');
$routes->post('update/(:num)', 'TaskController::update/$1');

// Update Task Status
$routes->post('tasks', 'TaskController::updateStatus');

// Delete task
$routes->post('delete/(:num)', 'TaskController::delete/$1');

// History
$routes->get('history', 'LoginHistory::showLoginHistory');

// Logout
$routes->get('logout', 'Auth::logout');