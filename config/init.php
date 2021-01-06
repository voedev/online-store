<?php

define("DEBUG", 1); // Режим разработки true / false
define("ROOT", dirname(__DIR__));
define("APP", ROOT . '/app');
define("WWW", ROOT . '/public');
define("CORE", ROOT . '/vendor/shop/core');
define("LIBS", ROOT . '/vendor/shop/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONFIG", ROOT . '/config');
define("VENDOR", ROOT . '/vendor');
define("LAYOUT", 'watches'); // Имя шаблона по умолчанию

define("QUARANTINE", 0);

$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";

$app_path = preg_replace('#[^/]+$#', '', $app_path);

$app_path = str_replace('/public/', '', $app_path);

define("PATH", $app_path);
define("ADMIN", PATH . '/admin');

require_once VENDOR . '/autoload.php';




