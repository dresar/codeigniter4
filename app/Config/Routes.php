<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Frontend Routes
$routes->get('/', 'PortfolioController::index');
$routes->get('/blog', 'PortfolioController::blog');
$routes->get('/blog/(:segment)', 'PortfolioController::blogDetail/$1');
$routes->post('/contact', 'PortfolioController::contact');
$routes->get('/contact', 'PortfolioController::contact');

// Debug Routes (untuk troubleshooting)
$routes->get('debug/login', 'DebugController::login');
$routes->get('test-login', 'TestLoginController::index');

// Auth Routes
$routes->group('auth', function($routes) {
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::login');
    $routes->get('logout', 'AuthController::logout');
});

// Admin Routes (Protected by AuthGuard Filter)
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Admin\DashboardController::index');
    
    // Projects
    $routes->get('projects', 'Admin\ProjectsController::index');
    $routes->get('projects/create', 'Admin\ProjectsController::create');
    $routes->post('projects/create', 'Admin\ProjectsController::create');
    $routes->get('projects/edit/(:num)', 'Admin\ProjectsController::edit/$1');
    $routes->post('projects/edit/(:num)', 'Admin\ProjectsController::edit/$1');
    $routes->get('projects/delete/(:num)', 'Admin\ProjectsController::delete/$1');
    
    // Blogs
    $routes->get('blogs', 'Admin\BlogsController::index');
    $routes->get('blogs/create', 'Admin\BlogsController::create');
    $routes->post('blogs/create', 'Admin\BlogsController::create');
    $routes->get('blogs/edit/(:num)', 'Admin\BlogsController::edit/$1');
    $routes->post('blogs/edit/(:num)', 'Admin\BlogsController::edit/$1');
    $routes->get('blogs/delete/(:num)', 'Admin\BlogsController::delete/$1');
    
    // Settings
    $routes->get('settings', 'Admin\SettingsController::index');
    $routes->post('settings', 'Admin\SettingsController::index');
    
    // Messages
    $routes->get('messages', 'Admin\MessagesController::index');
    $routes->get('messages/delete/(:num)', 'Admin\MessagesController::delete/$1');
});
