<?php
require_once __DIR__ . '/../src/Router.php';
$router = new Router();
$router->get('/', fn() => print('Memphis Business Directory Home'));
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
