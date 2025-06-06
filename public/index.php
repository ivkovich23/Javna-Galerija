<?php
session_start();

require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/models/Image.php';
require_once __DIR__ . '/../app/controllers/ImageController.php';
require_once __DIR__ . '/../app/models/User.php';
require_once __DIR__ . '/../app/controllers/UserController.php';

$controller = $_GET['controller'] ?? 'image';
$action = $_GET['action'] ?? 'index';

switch ($controller) {
    case 'image':
        $imageController = new ImageController();

        switch ($action) {
            case 'index':
                $imageController->index();
                break;
            case 'upload':
                $imageController->upload();
                break;
            case 'delete':
                $imageController->delete();
                break;
            default:
                echo "Nepoznata akcija: $action";
        }
        break;

    case 'user':
        $userController = new UserController();

        switch ($action) {
            case 'login':
                $userController->login();
                break;
            case 'register':
                $userController->register();
                break;
            case 'logout':
                $userController->logout();
                break;
            default:
                echo "Nepoznata akcija: $action";
        }
        break;

    default:
        echo "Nepoznat kontroler: $controller";
}
