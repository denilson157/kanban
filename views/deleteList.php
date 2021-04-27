<?php
require_once(__DIR__ . '/../classes/services/Lista.class.php');

$dados['id'] = $_GET['idList'];

$lista = new Lista();


if (!empty($dados['id'])) {
    $lista->setDados(['id' => $dados['id']]);
    $itemEdit = $lista->apagar();
}


Header("Location: /KANBAN/views/index.php");
