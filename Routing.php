<?php

require_once 'Controllers\LoginController.php';
require_once 'Controllers\PlanController.php';
require_once 'Controllers\ChoiceController.php';
require_once 'Controllers\RegistrationController.php';
require_once 'Controllers\MainController.php';
require_once 'Controllers\InformationController.php';


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

            'verifyregistration' => [
                'controller' => 'RegistrationController',
                'action' => 'verifyregistration'
            ],

            'main' => [
                'controller' => 'MainController',
                'action' => 'mainFunction'
            ],

            'plan' => [
                'controller' => 'PlanController',
                'action' => 'plan'
            ],

            'choice' => [
                'controller' => 'ChoiceController',
                'action' => 'choice'
            ],

            'verifylesson' => [
                'controller' => 'ChoiceController',
                'action' => 'verifylesson'
            ],

            'logout' => [
                'controller' => 'LoginController',
                'action' => 'logout'
            ],

            'delete' => [
                'controller' => 'MainController',
                'action' => 'delete'
            ],

            'information' => [
                'controller' => 'InformationController',
                'action' => 'information'
            ],

            'weekOne' => [
                'controller' => 'PlanController',
                'action' => 'weekOne'
            ],

            'weekTwo' => [
                'controller' => 'PlanController',
                'action' => 'weekTwo'
            ],

            'verifyNewPlan' => [
                'controller' => 'MainController',
                'action' => 'verifyNewPlan'
            ],

            'verifySharePlan' => [
                'controller' => 'MainController',
                'action' => 'verifySharePlan'
            ],

            'removeLesson' => [
                'controller' => 'PlanController',
                'action' => 'removeLesson'
            ]

        ];
    }

    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'login';

        if (isset($this->routes[$page])) {
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $controller;
            $object->$action();
        }
    }
}