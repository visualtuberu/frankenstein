<?php

namespace App\Application\database;
require_once  __DIR__ . "/../../../vendor/larapack/dd/src/helper.php";
class Model extends Connection
{
    protected int $id;
    protected array $fields = [];
    protected string $table;

    protected array $collection;

    public function find(string $column, mixed $value): mixed
    {
        $query = "SELECT * FROM `$this->table` WHERE `$column`= :value";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['value' => $value]);
        $this->collection = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $this->collection;
    }
    public function findMany(string $column, string $operand, mixed $value): mixed
    {
        $query = "SELECT * FROM `$this->table` WHERE `$column`$operand :value";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['value' => $value]);
        $this->collection = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $this->collection;
    }
    public function store(): void
    {
        $columns = implode(', ', array_map(function ($field) {
            return "`$field`";
        }, $this->fields));
        $binds = implode(', ', array_map(function ($field) {
            return ":$field";
        }, $this->fields));

        $query = "INSERT INTO `$this->table` ($columns) VALUES($binds)";
        $stmt = $this->connect()->prepare($query);

        $params = [];
        foreach ($this->fields as $field) {
            $params[$field] = $this->$field;
        }

        $stmt->execute($params);
    }

    public function update(array $data): void
    {
        $keys = array_keys($data);
        $fields = array_map(function ($field) {
            return "`$field` = :$field";
        }, $keys);
        $updatedFields = implode(', ', $fields);
        $query = "UPDATE `$this->table` SET $updatedFields WHERE `id` = :id";
        $stmt = $this->connect()->prepare($query);
//        $data['id'] = $this->id;

        $stmt->execute($data);
    }
    public function delete(string $id): void
    {
        $query = "DELETE FROM `$this->table` WHERE `id`= :id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['id' => $id]);

    }
}