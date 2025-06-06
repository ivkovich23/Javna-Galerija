<?php
session_start();
require_once '../app/controllers/UserController.php';

$controller = new UserController();
$controller->login();
