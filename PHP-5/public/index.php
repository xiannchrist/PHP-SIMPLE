<?php

declare(strict_types=1);

$config = require __DIR__ . '/../config/app.php';

require __DIR__ . '/../app/core/Env.php';
require __DIR__ . '/../app/core/Database.php';
require __DIR__ . '/../app/core/Controller.php';
require __DIR__ . '/../app/core/Validator.php';
require __DIR__ . '/../app/models/Faculty.php';
require __DIR__ . '/../app/controllers/FacultyController.php';

$env = Env::load(__DIR__ . '/../.env');

try {
    $database = new Database($env);
    $facultyModel = new Faculty($database->connection());
    $validator = new Validator();
    $controller = new FacultyController($facultyModel, $validator, $config['name']);

    $action = $_GET['action'] ?? 'index';
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

    switch ($action) {
        case 'store':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->store();
                break;
            }
            $controller->redirect('index.php');
            break;

        case 'edit':
            $controller->edit($id);
            break;

        case 'update':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->update($id);
                break;
            }
            $controller->redirect('index.php');
            break;

        case 'delete':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->destroy($id);
                break;
            }
            $controller->redirect('index.php');
            break;

        default:
            $controller->index();
            break;
    }
} catch (Throwable $exception) {
    echo '<h1>Database connection failed.</h1>';
    echo '<p>Please verify the values in your .env file.</p>';
}
