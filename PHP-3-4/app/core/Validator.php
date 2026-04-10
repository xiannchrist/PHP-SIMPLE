<?php

class Validator
{
    public function validatePerson(array $data): array
    {
        $errors = [];

        foreach ([
            'first_name' => 'First name',
            'middle_name' => 'Middle name',
            'last_name' => 'Last name',
            'address' => 'Address',
        ] as $field => $label) {
            if (trim($data[$field] ?? '') === '') {
                $errors[$field] = $label . ' is required.';
            }
        }

        $age = filter_var($data['age'] ?? null, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1, 'max_range' => 120],
        ]);
        if ($age === false) {
            $errors['age'] = 'Age must be a valid number from 1 to 120.';
        }

        if (!in_array($data['gender'] ?? '', ['Male', 'Female', 'Prefer not to say'], true)) {
            $errors['gender'] = 'Please select a valid gender.';
        }

        if (!filter_var($data['email'] ?? '', FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email address is not valid.';
        }

        if (!preg_match('/^[0-9+\-\s]{7,20}$/', (string) ($data['contact_number'] ?? ''))) {
            $errors['contact_number'] = 'Contact number should contain 7 to 20 valid characters.';
        }

        return $errors;
    }
}
