<?php


interface ILista {
    public function list(): array;
    public function last(): array;
    public function verificarTotal(int $totalPermitido): bool;
}