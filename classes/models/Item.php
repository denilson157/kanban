<?php

require_once(__DIR__ . '/../abstratas/Database.class.php');


class ItemModel extends Database
{
    protected $id;
    protected $titulo;
    protected $subtitulo;
    protected $descricao;
    protected $listaId;

    protected function atualiza(): bool
    {
        $stmt = $this->prepare('UPDATE item 
        SET 
        titulo = :titulo, 
        subtitulo = :subtitulo,
        descricao = :descricao,
        listaId = :listaId
        WHERE
            id = :id');

        if ($stmt->execute(
            [
                ':id' => $this->id,
                ':titulo' => $this->titulo,
                ':subtitulo' => $this->subtitulo,
                ':descricao' => $this->descricao,
                ':listaId' => $this->listaId,
            ]
        ))
            return true;
        else
            return false;
    }

    protected function insere(): bool
    {

        $stmt = $this->prepare('INSERT INTO item 
        (titulo, subtitulo, descricao, listaId) 
        VALUES 
        (:titulo, :subtitulo, :descricao, :listaId)');

        if ($stmt->execute([
            ':titulo' => $this->titulo,
            ':subtitulo' => $this->subtitulo,
            ':descricao' => $this->descricao,
            ':listaId' => $this->listaId,
        ]))
            return true;
        else
            return false;
    }

    protected function apaga(): bool
    {
        $stmt = $this->prepare('DELETE FROM item WHERE id = :id');

        if ($stmt->execute([':id' => $this->id]))
            return true;
        else
            return false;
    }

    public function get(): array
    {
        $stmt = $this->prepare('SELECT * from item WHERE id = :id');
        if ($stmt->execute([':id' => $this->id]))
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return [];
    }

    public function getByList(): array
    {
        $stmt = $this->prepare('SELECT * from item WHERE listaId = :listaId');

        if ($stmt->execute([':listaId' => $this->listaId]))
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return [];
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
