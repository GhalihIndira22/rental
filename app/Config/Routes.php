<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('customer/register', 'customer\Register::register');
$routes->get('customer/register', 'customer\Register::register');
$routes->get('customer/login', 'customer\Login::login');
$routes->post('customer/login', 'customer\Login::login');

