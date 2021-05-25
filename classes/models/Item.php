<?php

require_once(__DIR__ . '/../abstratas/RepositoryDatabase.class.php');


class ItemModel extends RepositoryDatabase
{
    protected $id;
    protected $titulo;
    protected $subtitulo;
    protected $descricao;
    protected $listaId;

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
        $this->stmt = $this->prepare('UPDATE item 
        SET 
        titulo = :titulo, 
        subtitulo = :subtitulo,
        descricao = :descricao,
        listaId = :listaId
        WHERE
            id = :id');

        $this->arrayExecucao = [
            ':id' => $this->id,
            ':titulo' => $this->titulo,
            ':subtitulo' => $this->subtitulo,
            ':descricao' => $this->descricao,
            ':listaId' => $this->listaId,
        ];

        return $this->executarSql();
    }

    protected function insere(): bool
    {

        $this->stmt = $this->prepare('INSERT INTO item 
        (titulo, subtitulo, descricao, listaId) 
        VALUES 
        (:titulo, :subtitulo, :descricao, :listaId)');


        $this->arrayExecucao = [
            ':titulo' => $this->titulo,
            ':subtitulo' => $this->subtitulo,
            ':descricao' => $this->descricao,
            ':listaId' => $this->listaId,
        ];

        return $this->executarSql();
    }

    protected function apaga(): bool
    {
        $this->stmt = $this->prepare('DELETE FROM item WHERE id = :id');

        $this->arrayExecucao = [':id' => $this->id];

        return $this->executarSql();
    }

    public function get(): array
    {
        $this->stmt = $this->prepare('SELECT * from item WHERE id = :id');
        $this->arrayExecucao = [':id' => $this->id];

        return $this->buscarSql();
    }

    public function getByList(): array
    {
        $this->stmt = $this->prepare('SELECT * from item WHERE listaId = :listaId');

        $this->arrayExecucao = [':listaId' => $this->listaId];

        return $this->buscarSql();
    }

    public function set(array $dados)
    {
        $this->id = $dados['id'] ?? null;
        $this->titulo = $dados['titulo'] ?? null;
        $this->subtitulo = $dados['subtitulo'] ?? null;
        $this->descricao = $dados['descricao'] ?? null;
        $this->listaId = $dados['listaId'] ?? null;
    }
}
