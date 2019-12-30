<?php

require_once __DIR__.'//..//Database.php';
require_once __DIR__.'//..//Controllers//PlanController.php';
require_once __DIR__.'//..//Controllers//MainController.php';
session_start();

class Connection {
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }
}


