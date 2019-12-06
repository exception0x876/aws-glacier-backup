<?php

require(__DIR__ . '/vendor/autoload.php');

$config = parse_ini_file(getenv('HOME') . '/.aws-glacier-backup.ini');

$app = new \App\App($config);
$app->init();