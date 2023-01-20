<?php
require_once __DIR__ . '/../vendor/autoload.php';

use FdlAmericano\MhdFadhilAp\App\Handler;
use FdlAmericano\MhdFadhilAp\Controller\HomeController;


//Handler::add('GET', '/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z])*)', ProductController::class,'categories');
Handler::method_amrc('GET', '/', HomeController::class, 'index', []);


Handler::run();













