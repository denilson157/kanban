<?php
require_once(__DIR__ . '/../classes/services/Item.class.php');
require_once(__DIR__ . '/../classes/services/Lista.class.php');

$lista = new Lista();

$listas = $lista->listar();

$dados['id'] = $_GET['idItem'];

$itemLista = new Item();


if (!empty($dados['id'])) {
    $itemLista->setDados(['id' => $dados['id']]);
    $itemEdit = $itemLista->getItem();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body {
            height: 100vh;

        }

        .content {
            display: -moz-box;
            display: -webkit-flexbox;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: -moz-flex;
            display: flex;
            -webkit-flex-direction: row;
            -moz-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
        }

        .lista {
            background-color: #e6e8ed;
            box-shadow: 0 0 0 1px rgb(20 20 31 / 5%), 0 1px 3px 0 rgb(20 20 31 / 15%);
            border-radius: .25rem;
            padding: 0 10px 10px 10px;
            margin-right: 10px;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div>
        <form class="form-group" method="post" action="/KANBAN/views/createItem.php">
            <div class="modal-body">
                <div class="col-12">
                    <div class="row mx-0 d-none">
                        <label for="titulo">Titulo</label>
                        <input type="text" id="id" class="form-control" required name="id" value="<?= $itemEdit['id'] ?>" />
                    </div>

                    <div class="row mx-0">
                        <label for="titulo">Titulo</label>
                        <input type="text" id="titulo" class="form-control" required name="titulo" value="<?= $itemEdit['titulo'] ?>" />
                    </div>
                    <div class="row mx-0">
                        <label for="subtitulo">Sub título</label>
                        <input type="text" id="subtitulo" class="form-control" required name="subtitulo" value="<?= $itemEdit['subtitulo'] ?>" />
                    </div>
                    <div class="row mx-0">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="7" required><?= $itemEdit['titulo'] ?></textarea>
                    </div>
                    <div class="row mx-0">
                        <label>Lista</label>
                        <select class="form-select" name="listaId" multiple required>
                            <?php foreach ($listas as $lista) : ?>
                                <option value="<?= $lista['id'] ?>" <?= ($lista['id'] === $itemEdit['listaId']) ? 'selected' : ''  ?>>
                                    <?= $lista['title'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>

                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <a href="/KANBAN/views/index.php" class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                <button type="submit" class="btn btn-primary">Salvar </button>
            </div>
        </form>
    </div>
</body>

</html>