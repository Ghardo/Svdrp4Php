<?php
define('BASEDIR', realpath(dirname(__FILE__)));
define('LIBDIR', BASEDIR . '/lib');

function __autoload($class) {
	debug_print_backtrace();
	echo '<hr>';
	require_once LIBDIR  . '/' . strtr($class, '\\', '/') . '.php';
}

echo '<pre>';

$svdrp = new \Svdrp\Svdrp('192.168.0.245', 2001);
$svdrp->connect();

$lstc = new Svdrp\Commands\LSTC();
$custom = new Svdrp\Commands\Custom('FOOO');

$result = $svdrp->send($lstc);

var_dump($result);
echo '<hr>';
echo $result;