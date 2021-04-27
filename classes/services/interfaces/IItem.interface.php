<?php


interface IITem {
    public function gravaItem(array $dados):bool;
    public function getItem():array;
    public function setDados(array $dados);
    public function apagar(): bool;
    public function concluir(): bool;
}