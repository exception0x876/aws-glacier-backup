<?php

require(__DIR__ . '/vendor/autoload.php');

$config = parse_ini_file('config.ini');

if (isset($argv[1])) {
    $filename = realpath($argv[1]);
    if (file_exists($filename)) {
        $config['filename'] = $filename;
    } else {
        throw new Exception('Could not find the file');
    }
} else {
    throw new Exception('Please pass the path to the file as a parameter to the script');
}

$app = new \App\App($config);
$app->init();