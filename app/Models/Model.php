<?php

namespace App\Models;

use Core\Database;

class Model
{
    private $where = [];

    private function pdo()
    {
        return Database::pdo();
    }

    public static function query(): static
    {
        return new static();
    }

    public function where($column, $value, $operator = '='): self
    {
        $this->where[] = "$column $operator '$value'";
        return $this;
    }

    public function find($id, $attributes = []): ?object
    {
        $attributes = $attributes ? implode(', ', $attributes) : '*';

        $query = "SELECT $attributes FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo()->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_OBJ) ?: null;
    }

    public function first($attributes = []): ?object
    {
        $attributes = $attributes ? implode(', ', $attributes) : '*';

        $result = $this->all($attributes, 1);
        return count($result) > 0  ? $result[0] : null;
    }

    public function create($attributes, $find = true): ?object
    {
        $columns = implode(', ', array_keys($attributes));
        $q = array_fill(0, count($attributes), '?');
        $placeholders = implode(', ', $q);
        $query = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->pdo()->prepare($query);
        $stmt->execute(array_values($attributes));
        if (!$find) {
            return null;
        }
        return $this->find($this->pdo()->lastInsertId());
    }

    public function sync($attributes): bool
    {
        try {
            $this->create(attributes: $attributes, find: false);
        } catch (\Exception $e) {
            if ($e->getCode() === '23000') {
                return true;
            }
        }
        return true;
    }

    public function update($id, $attributes): ?object
    {
        $columns = '';
        foreach ($attributes as $key => $value) {
            $columns .= "$key = '$value', ";
        }
        $columns = rtrim($columns, ', ');
        $query = "UPDATE {$this->table} SET $columns WHERE id = :id";
        $stmt = $this->pdo()->prepare($query);
        $stmt->execute(array_merge($attributes, ['id' => $id]));
        return $this->find($id);
    }

    public function all($attributes = [], $limit = null): array
    {
        $attributes = is_array($attributes) && $attributes ? implode(', ', $attributes) : '*';

        $query = "SELECT $attributes FROM {$this->table}";
        if (!empty($this->where)) {
            $where = implode(' AND ', $this->where);
            $query .= " WHERE $where";
        }
        $this->where = [];
        if ($limit) {
            $query .= " LIMIT $limit";
        }

        $stmt = $this->pdo()->query($query);
        return $stmt->fetchAll(\PDO::FETCH_OBJ) ?: [];
    }
}