<?php


use Illuminate\Database\Capsule\Manager as Capsule;
use Whoops\Run;
use Twig_Autoloader;


session_start();


// composer autoloader
require __DIR__ . '/../vendor/autoload.php';


/**
 * Debug setup
 */
$whoops = new Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


/**
 * Views/Templates setup
 */
$templatesPath = __DIR__ . '/../resources/views';
$compiledTemplatesPath = __DIR__ . '/../resources/cache/views';

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem($templatesPath);
$twig = new Twig_Environment(
	$loader,
	[
		'cache'	=> $compiledTemplatesPath,
	]);

/**
 * Database setup
 */
// $capsule = new Capsule;
// $capsule -> addConnection([
// 	'driver' => $fields['DB_CONNECTION'],
// 	'host' => $fields['DB_HOST'],
// 	'database' => $fields['DB_DATABASE'],
// 	'username' => $fields['DB_USERNAME'],
// 	'password' => $fields['DB_PASSWORD'],
// 	'charset' => 'utf8',
// 	'collation' => 'utf8_unicode_ci',
// 	'prefix' => '',
// 	]);

// $capsule -> setAsGlobal();
// $capsule -> bootEloquent();