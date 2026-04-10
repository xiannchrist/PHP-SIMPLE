<?php

class PersonController extends Controller
{
    public function __construct(
        private Person $personModel,
        private Validator $validator,
        private string $appName,
        private string $basePath
    ) {
    }

    public function index(array $errors = [], array $old = [], string $successMessage = '', string $databaseError = ''): void
    {
        $defaultData = [
            'first_name' => '',
            'middle_name' => '',
            'last_name' => '',
            'age' => '',
            'gender' => '',
            'email' => '',
            'address' => '',
            'contact_number' => '',
        ];

        $this->render('people/index', [
            'title' => $this->appName,
            'basePath' => $this->basePath,
            'errors' => $databaseError !== '' ? ['database' => $databaseError] + $errors : $errors,
            'old' => $old === [] ? $defaultData : $old,
            'successMessage' => $successMessage,
            'people' => $databaseError === '' ? $this->personModel->all() : [],
        ]);
    }

    public function store(): void
    {
        $old = [
            'first_name' => trim($_POST['first_name'] ?? ''),
            'middle_name' => trim($_POST['middle_name'] ?? ''),
            'last_name' => trim($_POST['last_name'] ?? ''),
            'age' => trim($_POST['age'] ?? ''),
            'gender' => trim($_POST['gender'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'address' => trim($_POST['address'] ?? ''),
            'contact_number' => trim($_POST['contact_number'] ?? ''),
        ];

        $errors = $this->validator->validatePerson($old);
        if ($errors !== []) {
            $this->index($errors, $old);
            return;
        }

        $this->personModel->create($old);
        $this->index([], [
            'first_name' => '',
            'middle_name' => '',
            'last_name' => '',
            'age' => '',
            'gender' => '',
            'email' => '',
            'address' => '',
            'contact_number' => '',
        ], 'Record inserted successfully.');
    }
}
