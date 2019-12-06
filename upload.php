<?php

require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/config.php');

$app = new \App\App($config, $argv);
$app->init();