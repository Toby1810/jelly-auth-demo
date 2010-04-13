<?php defined('SYSPATH') or die('No direct access allowed.');

return array
(

	// Default instance (PDO)
	'default' => array
	(
		'type'            => 'pdo',
		'charset'         => 'utf8',
		'table_prefix'    => '',
		'profiling'       => TRUE,
		'caching'         => FALSE,
		'connection'      => array
		(
			'username'      => '',
			'password'      => '',
			'persistent'    => FALSE,
			'dsn'           => 'mysql:host=localhost;dbname=jelly_auth_demo',
		),
	), // End default instance (PDO)

	/*
	
	// Default instance (MySQL)
	'default' => array
	(
		'type'            => 'mysql',
		'charset'         => 'utf8',
		'table_prefix'    => '',
		'profiling'       => TRUE,
		'caching'         => FALSE,
		'connection'      => array
		(
			'hostname'      => 'localhost',
			'username'      => '',
			'password'      => '',
			'persistent'    => FALSE,
			'database'      => 'jelly_auth_demo',
		),
	), // End default instance (MySQL)
	
	*/

);
