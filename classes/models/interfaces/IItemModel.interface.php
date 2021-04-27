<?php


interface IITem {
    public function get(): array;
    public function getByList(): array;
    public function set(array $dados);
}