<?php

use Siccob\Adist\Backend\AdistKernel;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\HttpFoundation\Request;

require dirname(__DIR__) . '/../../../vendor/autoload.php';

(new Dotenv())->bootEnv(dirname(__DIR__) . '/../../../.env');

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable();
}

$kernel = new AdistKernel($_SERVER['APP_ENV'] , (bool)$_SERVER['APP_DEBUG']);
$request = Request::createFromGlobals();

$response = $kernel->handle($request);

if ($response->isNotFound()) {
    require __DIR__ . '/../../../../../adist3/public/index.php';
} else {
    $response->send();
    $kernel->terminate($request , $response);
}