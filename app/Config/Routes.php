<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Views
$routes->get('/', 'Home::index');

// Pages
$routes->get('pages/about', 'Pages::about');
$routes->get('pages/contact', 'Pages::contact');

// Register
$routes->get('pages/register', 'Auth::showRegister');
$routes->post('pages/register', 'Auth::register');

// Login
$routes->get('pages/login', 'Auth::showLogin');
$routes->post('pages/login', 'Auth::login');

// Profile
$routes->get('pages/profile/(:num)', 'Profile::index/$1');

// Settings
$routes->get('pages/settings', 'Settings::index');
$routes->post('/settings/update', 'Settings::update');

// History
$routes->get('pages/history', 'LoginHistory::showLoginHistory');

// Logout
$routes->get('auth/logout', 'Auth::logout');



// Tasks
$routes->get('pages/tasks', 'TaskController::index');

// Create
$routes->get('pages/create', 'TaskController::create');
$routes->post('pages/create', 'TaskController::store');

// Edit Task
$routes->get('pages/edit/(:num)', 'TaskController::edit/$1'); 
$routes->post('pages/update/(:num)', 'TaskController::update/$1');

// Update Task Status
$routes->post('pages/tasks', 'TaskController::updateStatus');

// Delete task
$routes->post('pages/delete/(:num)', 'TaskController::delete/$1');
