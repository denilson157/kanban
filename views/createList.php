<?php
require_once(__DIR__ . '/../classes/services/Lista.class.php');

$titleList = $_POST['title'];

$list = new Lista();

$permitirCriarListaNova = $list->verificarTotal(4);

if (!empty($titleList) && $permitirCriarListaNova) {
    $list->gravaLista(['title' => $titleList]);
}

Header("Location: /KANBAN/views/index.php");
