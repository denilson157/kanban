<?php

require_once(__DIR__ . '/../abstratas/RepositoryDatabase.class.php');


class ListaModel extends RepositoryDatabase
{
    protected $id;
    protected $title;

    public function executarSql(): bool
    {
        return parent::executarSql();
    }

    public function buscarSql(): array
    {
        return parent::buscarSql();
    }

    protected function atualiza(): bool
    {
        $this->stmt = $this->prepare('UPDATE lista 
        SET 
        title = :title
        WHERE
            id = :id');

        $this->arrayExecucao = [
            ':id' => $this->id,
            ':title' => $this->title
        ];

        return $this->executarSql();
    }

    protected function insere(): bool
    {
        $this->stmt = $this->prepare('INSERT INTO lista 
        (title) 
        VALUES 
        (:title)');

        $this->arrayExecucao = [
            ':title' => $this->title
        ];

        return $this->executarSql();
    }

    protected function apaga(): bool
    {
        $this->stmt = $this->prepare('DELETE FROM lista WHERE id = :id');

        $this->arrayExecucao = [':id' => $this->id];

        return $this->executarSql();
    }

    protected function set(array $dados)
    {
        $this->id = $dados['id'] ?? null;
        $this->title = $dados['title'] ?? null;
    }

    public function list(): array
    {
        $this->stmt = $this->prepare('SELECT * from lista');
        $this->arrayExecucao = [];

        return $this->buscarSql();
    }

    public function last(): array
    {
        $this->stmt = $this->prepare('SELECT * from lista ORDER BY id DESC LIMIT 1');
        $this->arrayExecucao = [];

        return $this->buscarSql();
    }
}
