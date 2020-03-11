<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'solides-server.coizjp8kk45g.us-east-1.rds.amazonaws.com',
	'username' => 'solides_usr',
	'password' => 'm2T4Gu5YeQk9BTdG',
	'database' => 'data_solides',
	'dbdriver' => 'mysqli', 
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
$db['solides_master_devel'] = array(
	'dsn'	=> '',
	'hostname' => 'solides.adm.br',
	'username' => 'aless608_mixa',
	'password' => 'AcessoTi@19',
	'database' => 'aless608_sg',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => FALSE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
$db['tracker'] = array(
	'dsn'	=> '',
	'hostname' => 'testedev.clcgxnmb17iy.us-east-1.rds.amazonaws.com',
	'username' => 'admin',
	'password' => 'trackerup',
	'database' => 'trackerup',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['gcloud_data_db'] = array(
	'dsn'	=> '',
	'hostname' => 'solides-server.coizjp8kk45g.us-east-1.rds.amazonaws.com',
	'username' => 'solides_usr',
	'password' => 'm2T4Gu5YeQk9BTdG',
	'database' => 'data_solides',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);