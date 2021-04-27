<?php
require_once(__DIR__ . '/../classes/services/Item.class.php');
$dados['id'] = $_POST['id'] ?? null;
$dados['titulo'] = $_POST['titulo'] ?? null;
$dados['subtitulo'] = $_POST['subtitulo'] ?? null;
$dados['descricao'] = $_POST['descricao'] ?? null;
$dados['listaId'] = $_POST['listaId'] ?? null;


$itemLista = new Item();

$itemLista->gravaItem($dados);


 Header("Location: /KANBAN/views/index.php");

?>