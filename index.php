<?php
require __DIR__.'/vendor/System/File.php';
require __DIR__.'/vendor/System/Application.php';

use System\File;
use System\Application;

$file = new File(__DIR__);
$app = Application::getInstance($file);
$app->run();

