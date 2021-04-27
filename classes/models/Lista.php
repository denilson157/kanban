<?php

require_once(__DIR__ . '/../abstratas/Database.class.php');


class ListaModel extends Database
{
    protected $id;
    protected $title;

    protected function atualiza(): bool
    {
        $stmt = $this->prepare('UPDATE lista 
        SET 
        title = :title
        WHERE
            id = :id');

        if ($stmt->execute(
            [
                ':id' => $this->id,
                ':title' => $this->title
            ]
        ))
            return true;
        else
            return false;
    }

    protected function insere(): bool
    {
        $stmt = $this->prepare('INSERT INTO lista 
        (title) 
        VALUES 
        (:title)');

        if ($stmt->execute([
            ':title' => $this->title
        ]))
            return true;
        else
            return false;
    }

    protected function apaga(): bool
    {
        $stmt = $this->prepare('DELETE FROM lista WHERE id = :id');
        var_dump($this->id);
        if ($stmt->execute([':id' => $this->id]))
            return true;
        else
            return false;
    }

    protected function set(array $dados)
    {
        $this->id = $dados['id'] ?? null;
        $this->title = $dados['title'] ?? null;
    }

    public function list(): array
    {
        $stmt = $this->prepare('SELECT * from lista');

        if ($stmt->execute())
            return $stmt->fetchAll(PDO::FETCH_BOTH);
        else
            return [];
    }

    public function last(): array
    {
        $stmt = $this->prepare('SELECT * from lista ORDER BY id DESC LIMIT 1');


        if ($stmt->execute())
            return $stmt->fetchAll(PDO::FETCH_BOTH);
        else
            return [];
    }
}
