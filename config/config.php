<?php
defined('ROOT') or exit('No direct script access allowed');

Config::set('site_name', 'Your Site Name');

/*
| URL to your App root. Typically this will be your base URL,
| WITHOUT a trailing slash:
|
|	http://example.com
|
| WARNING: You MUST set this value!
*/
Config::set('base_url', 'http://pdo-secure-users-crud');

// Routes. Route name => method prefix
Config::set('routes', array(
	'default' => '',
	'admin'   => 'admin_',
));

Config::set('default_route', 'default');
Config::set('default_controller', 'auth');
Config::set('default_action', 'index');

Config::set('db.host', 'localhost');
Config::set('db.user', 'mysql');
Config::set('db.password', 'mysql');
Config::set('db.db_name', 'pdo_users');
Config::set('db.charset', 'utf8');

Config::set('salt', 'wu2laZNXAzTfUM2f9nLifYAg4cxRrYoH');