<?php

require_once(__DIR__ . '/Database.class.php');


abstract class RepositoryDatabase extends Database
{
    protected $stmt;
    protected $arrayExecucao;

    public function executarSql(): bool
    {
        if ($this->stmt->execute($this->arrayExecucao))
            return true;
        else
            return false;
    }

    public function buscarSql(): array
    {
        if ($this->stmt->execute($this->arrayExecucao))
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return [];
    }
}
