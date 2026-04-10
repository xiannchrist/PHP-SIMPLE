<?php

declare(strict_types=1);

$config = require __DIR__ . '/config/app.php';

$scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '/index.php');
$basePath = rtrim(str_replace('/index.php', '', $scriptName), '/');
$basePath = $basePath === '' ? '/' : $basePath;

require __DIR__ . '/app/core/Env.php';
require __DIR__ . '/app/core/Database.php';
require __DIR__ . '/app/core/Controller.php';
require __DIR__ . '/app/core/Validator.php';
require __DIR__ . '/app/models/Person.php';
require __DIR__ . '/app/controllers/PersonController.php';

$env = Env::load(__DIR__ . '/.env');

try {
    $database = new Database($env);
    $personModel = new Person($database->connection());
    $validator = new Validator();
    $controller = new PersonController($personModel, $validator, $config['name'], $basePath);

    $action = $_GET['action'] ?? 'index';

    if ($action === 'store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->store();
    } else {
        $controller->index();
    }
} catch (Throwable $exception) {
    $fallbackController = new class extends Controller {
        public function show(array $data): void
        {
            $this->render('people/index', $data);
        }
    };

    $fallbackController->show([
        'title' => $config['name'],
        'basePath' => $basePath,
        'errors' => ['database' => 'Database connection failed. Please check your .env values and MySQL service.'],
        'old' => [
            'first_name' => '',
            'middle_name' => '',
            'last_name' => '',
            'age' => '',
            'gender' => '',
            'email' => '',
            'address' => '',
            'contact_number' => '',
        ],
        'successMessage' => '',
        'people' => [],
    ]);
}
