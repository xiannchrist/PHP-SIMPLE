<?php

class Person
{
    public function __construct(private PDO $connection)
    {
    }

    public function create(array $data): void
    {
        $statement = $this->connection->prepare(
            'INSERT INTO registered_people
            (first_name, middle_name, last_name, age, gender, email, address, contact_number)
            VALUES (:first_name, :middle_name, :last_name, :age, :gender, :email, :address, :contact_number)'
        );

        $statement->execute([
            ':first_name' => $data['first_name'],
            ':middle_name' => $data['middle_name'],
            ':last_name' => $data['last_name'],
            ':age' => (int) $data['age'],
            ':gender' => $data['gender'],
            ':email' => $data['email'],
            ':address' => $data['address'],
            ':contact_number' => $data['contact_number'],
        ]);
    }

    public function all(): array
    {
        $statement = $this->connection->prepare(
            'SELECT id, first_name, middle_name, last_name, age, gender, email, address, contact_number, created_at
             FROM registered_people
             ORDER BY id DESC'
        );
        $statement->execute();

        return $statement->fetchAll();
    }
}
