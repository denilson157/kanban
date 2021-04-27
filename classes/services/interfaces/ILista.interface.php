<?php


interface ILista {
    public function gravaLista(array $dados):bool;
    public function listar(): array;
    public function verificarTotal(int $totalPermitido): bool;
    public function setDados(array $dados);
}