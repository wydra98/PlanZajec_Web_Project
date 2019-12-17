<?php

require_once 'Controllers\LoginController.php';
require_once 'Controllers\PlanController.php';
require_once 'Controllers\ChoiceController.php';
require_once 'Controllers\RegisterController.php';
require_once 'Controllers\MainController.php';

class Routing {
    private $routes = [];

    public function __construct()
    {
        $this->routes = [
            'login' => [
                'controller' => 'LoginController',
                'action' => 'login'
            ],

            'registration' => [
                'controller' => 'RegistrationController',
                'action' => 'registration'
            ],

            'main' => [
                'controller' => 'MainController',
                'action' => 'main'
            ],

            'plan' => [
                'controller' => 'PlanController',
                'action' => 'plan'
            ],

            'choice' => [
                'controller' => 'ChoiceController',
                'action' => 'choice'
            ],

            'logout' => [
                'controller' => 'LoginController',
                'action' => 'logout'
            ]
        ];
    }

    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'index';

        if (isset($this->routes[$page])) {
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $controller;
            $object->$action();
        }
    }
}