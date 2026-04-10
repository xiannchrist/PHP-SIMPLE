<?php

class Validator
{
    public function validateFaculty(array $data): array
    {
        $errors = [];

        foreach ([
            'first_name' => 'First name',
            'middle_name' => 'Middle name',
            'last_name' => 'Last name',
            'address' => 'Address',
            'position' => 'Position',
        ] as $field => $label) {
            if (trim($data[$field] ?? '') === '') {
                $errors[$field] = $label . ' is required.';
            }
        }

        $age = filter_var($data['age'] ?? null, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 18, 'max_range' => 100],
        ]);
        if ($age === false) {
            $errors['age'] = 'Age must be a valid number from 18 to 100.';
        }

        if (!in_array($data['gender'] ?? '', ['Male', 'Female', 'Other'], true)) {
            $errors['gender'] = 'Please choose a valid gender.';
        }

        $salary = filter_var($data['salary'] ?? null, FILTER_VALIDATE_FLOAT);
        if ($salary === false || (float) $salary < 0) {
            $errors['salary'] = 'Salary must be a valid non-negative amount.';
        }

        return $errors;
    }
}
