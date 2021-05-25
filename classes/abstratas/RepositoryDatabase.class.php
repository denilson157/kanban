<?php

require_once(__DIR__ . '/Database.class.php');


abstract class RepositoryDatabase extends Database
{
    protected $stmt;
    protected $arrayExecucao;

    protected function executarSql(): bool
    {
        if ($this->stmt->execute($this->arrayExecucao))
            return true;
        else
            return false;
    }

    protected function buscarSql()
    {
        if ($this->stmt->execute($this->arrayExecucao))
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return [];
    }
}
