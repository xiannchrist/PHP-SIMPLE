<?php

class FacultyController extends Controller
{
    public function __construct(
        private Faculty $facultyModel,
        private Validator $validator,
        private string $appName
    ) {
    }

    public function index(array $errors = [], array $old = [], ?int $editingId = null): void
    {
        $record = $editingId !== null ? $this->facultyModel->find($editingId) : null;
        $this->render('faculty/index', [
            'title' => $this->appName,
            'records' => $this->facultyModel->all(),
            'errors' => $errors,
            'old' => $old !== [] ? $old : ($record ?? $this->emptyFaculty()),
            'formAction' => $editingId === null ? 'store' : 'update',
            'formTitle' => $editingId === null ? 'Add Faculty' : 'Edit Faculty',
            'editingId' => $editingId,
        ]);
    }

    public function store(): void
    {
        $old = $this->collectInput();
        $errors = $this->validator->validateFaculty($old);

        if ($errors !== []) {
            $this->index($errors, $old);
            return;
        }

        $this->facultyModel->create($old);
        $this->redirect('index.php?message=Faculty record added successfully');
    }

    public function edit(int $id): void
    {
        if ($this->facultyModel->find($id) === null) {
            $this->redirect('index.php?message=Faculty record not found');
        }

        $this->index([], [], $id);
    }

    public function update(int $id): void
    {
        if ($this->facultyModel->find($id) === null) {
            $this->redirect('index.php?message=Faculty record not found');
        }

        $old = $this->collectInput();
        $errors = $this->validator->validateFaculty($old);

        if ($errors !== []) {
            $this->index($errors, $old, $id);
            return;
        }

        $this->facultyModel->update($id, $old);
        $this->redirect('index.php?message=Faculty record updated successfully');
    }

    public function destroy(int $id): void
    {
        $this->facultyModel->delete($id);
        $this->redirect('index.php?message=Faculty record deleted successfully');
    }

    private function collectInput(): array
    {
        return [
            'first_name' => trim($_POST['first_name'] ?? ''),
            'middle_name' => trim($_POST['middle_name'] ?? ''),
            'last_name' => trim($_POST['last_name'] ?? ''),
            'age' => trim($_POST['age'] ?? ''),
            'gender' => trim($_POST['gender'] ?? ''),
            'address' => trim($_POST['address'] ?? ''),
            'position' => trim($_POST['position'] ?? ''),
            'salary' => trim($_POST['salary'] ?? ''),
        ];
    }

    private function emptyFaculty(): array
    {
        return [
            'first_name' => '',
            'middle_name' => '',
            'last_name' => '',
            'age' => '',
            'gender' => '',
            'address' => '',
            'position' => '',
            'salary' => '',
        ];
    }
}
