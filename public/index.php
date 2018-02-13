<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT.DS.'views');
$request_uri = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$request_uri .= "://".$_SERVER['HTTP_HOST'];
$request_uri .= $_SERVER['REQUEST_URI'];

require_once(ROOT.DS.'libraries'.DS.'init.php');
$request_uri = str_replace(strtolower(Config::get('base_url')), '' , strtolower($request_uri));
define('BASE_URL', Config::get('base_url'));

session_start();

App::run($request_uri);