<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Views
$routes->get('/', 'Home::index');
//pages
$routes->get('pages/about', 'Pages::about');
$routes->get('pages/contact', 'Pages::contact');
$routes->get('pages/dashboard', 'Auth::dashboard');

//register
$routes->get('auth/register', 'Auth::showRegister');
$routes->post('auth/register', 'Auth::register');



//login
$routes->get('auth/login', 'Auth::showLogin');
$routes->post('auth/login', 'Auth::login');

//logout
$routes->get('auth/logout', 'Auth::logout');
