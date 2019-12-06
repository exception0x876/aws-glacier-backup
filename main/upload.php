<?php

require(__DIR__ . '/vendor/autoload.php');

$config = parse_ini_file('config.ini');

$app = new \App\App($config);
$app->init();