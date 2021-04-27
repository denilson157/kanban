<?php
require_once(__DIR__ . '/../classes/services/Item.class.php');

$dados['id'] = $_GET['idItem'];

$itemLista = new Item();


if (!empty($dados['id'])) {
    $itemLista->setDados(['id' => $dados['id']]);
    $itemEdit = $itemLista->concluir();
}


Header("Location: /KANBAN/views/index.php");
