<?php

class Faculty
{
    public function __construct(private PDO $connection)
    {
    }

    public function all(): array
    {
        $statement = $this->connection->query('SELECT * FROM faculty ORDER BY id DESC');
        return $statement->fetchAll();
    }

    public function find(int $id): ?array
    {
        $statement = $this->connection->prepare('SELECT * FROM faculty WHERE id = :id');
        $statement->execute([':id' => $id]);
        $record = $statement->fetch();

        return $record ?: null;
    }

    public function create(array $data): void
    {
        $statement = $this->connection->prepare(
            'INSERT INTO faculty
            (first_name, middle_name, last_name, age, gender, address, position, salary)
            VALUES (:first_name, :middle_name, :last_name, :age, :gender, :address, :position, :salary)'
        );

        $statement->execute([
            ':first_name' => trim($data['first_name']),
            ':middle_name' => trim($data['middle_name']),
            ':last_name' => trim($data['last_name']),
            ':age' => (int) $data['age'],
            ':gender' => trim($data['gender']),
            ':address' => trim($data['address']),
            ':position' => trim($data['position']),
            ':salary' => (float) $data['salary'],
        ]);
    }

    public function update(int $id, array $data): void
    {
        $statement = $this->connection->prepare(
            'UPDATE faculty
             SET first_name = :first_name,
                 middle_name = :middle_name,
                 last_name = :last_name,
                 age = :age,
                 gender = :gender,
                 address = :address,
                 position = :position,
                 salary = :salary
             WHERE id = :id'
        );

        $statement->execute([
            ':id' => $id,
            ':first_name' => trim($data['first_name']),
            ':middle_name' => trim($data['middle_name']),
            ':last_name' => trim($data['last_name']),
            ':age' => (int) $data['age'],
            ':gender' => trim($data['gender']),
            ':address' => trim($data['address']),
            ':position' => trim($data['position']),
            ':salary' => (float) $data['salary'],
        ]);
    }

    public function delete(int $id): void
    {
        $statement = $this->connection->prepare('DELETE FROM faculty WHERE id = :id');
        $statement->execute([':id' => $id]);
    }
}
