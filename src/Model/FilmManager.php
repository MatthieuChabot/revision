<?php

namespace App\Model;

class FilmManager extends AbstractManager
{
    public const TABLE = 'film';

    public function insert(array $film): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (title, description, year, category_id) VALUES (:title, :description, :year, :category_id)");
        $statement->bindValue(':title', $film['title'], \PDO::PARAM_STR);
        $statement->bindValue(':description', $film['description'], \PDO::PARAM_STR);
        $statement->bindValue(':year', $film['year'], \PDO::PARAM_INT);
        $statement->bindValue(':category_id', $film['category_id'], \PDO::PARAM_INT);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function update(array $film): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET title = :title, description = :description, year = :year, category_id = :category_id WHERE id=:id");
        $statement->bindValue(':id', $film['id'], \PDO::PARAM_INT);
        $statement->bindValue(':title', $film['title'], \PDO::PARAM_STR);
        $statement->bindValue(':description', $film['description'], \PDO::PARAM_STR);
        $statement->bindValue(':year', $film['year'], \PDO::PARAM_INT);
        $statement->bindValue(':category_id', $film['category_id'], \PDO::PARAM_INT);


        return $statement->execute();
    }
}
