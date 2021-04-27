<?php
require_once(__DIR__ . '/../classes/services/Lista.class.php');

$lista = new Lista();

$listas = $lista->listar();
$tamanhoColuna = 100;

if (count($listas) !== 0)
    $tamanhoColuna = 100 / count($listas);

?>

<!DOCTYPE html>
<html lang="pt-BR">

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
</head>

<body>

    <div class="container">

        <div>
            <form class="form-group" method="post" action="/KANBAN/views/createList.php">
                <div class="row">
                    <label for="title">Nova Lista</label>
                    <input type="text" id="title" class="form-control" required name="title" />
                </div>
                <div class="d-grid gap-2 d-md-block my-2">

                    <button class="btn btn-success mr-2 btn-sm my-sm-0" type="submit">
                        inserir lista
                    </button>

                    <button class="btn btn-success mr-2 btn-sm my-sm-0" type="button" data-toggle="modal" data-target="#modalItem">
                        inserir item
                    </button>

                </div>
            </form>
        </div>

        <div class="content">


            <?php foreach ($listas as $lista) : ?>


                <div class="lista" style="width: <?= $tamanhoColuna ?>%;">
                    <p class="my-2 font-weight-bold">
                        <?= $lista['title'] ?>
                    </p>

                    <?php if (!empty($lista['itens'])) : ?>

                        <?php foreach ($lista['itens'] as $item) : ?>

                            <div class="card col-12 px-2" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $item['titulo'] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= $item['subtitulo'] ?></h6>
                                    <p class="card-text"><?= $item['descricao'] ?></p>
                                    <div class="d-flex">
                                        <form class="my-2 mx-1 my-lg-0" method="GET" action="../views/editItem.php">
                                            <input type="text" name="idItem" class="d-none" value="<?= $item['id'] ?>">
                                            <button class="btn btn-sm btn-primary" type="submit">
                                                Editar
                                            </button>
                                        </form>

                                        <form class="my-2 mx-1 my-lg-0" method="GET" action="../views/deleteItem.php">
                                            <input type="text" name="idItem" class="d-none" value="<?= $item['id'] ?>">
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                Apagar
                                            </button>
                                        </form>

                                        <form class="my-2 mx-1 my-lg-0" method="GET" action="../views/updateItem.php">
                                            <input type="text" name="idItem" class="d-none" value="<?= $item['id'] ?>">
                                            <button class="btn btn-sm btn-success" type="submit">
                                                Concluir
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        <?php endforeach ?>

                    <?php endif ?>



                </div>

            <?php endforeach ?>

            <div class="modal fade" id="modalItem" tabindex="-1" role="dialog" aria-labelledby="modalItemLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalItemLabel">Novo Item</h5>
                            <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-group" method="post" action="/KANBAN/views/createItem.php">
                            <div class="modal-body">
                                <div class="col-12">

                                    <div class="row mx-0">
                                        <label for="titulo">Titulo</label>
                                        <input type="text" id="titulo" class="form-control" required name="titulo" />
                                    </div>
                                    <div class="row mx-0">
                                        <label for="subtitulo">Sub título</label>
                                        <input type="text" id="subtitulo" class="form-control" required name="subtitulo" />
                                    </div>
                                    <div class="row mx-0">
                                        <label for="descricao">Descrição</label>
                                        <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="7" required>
                                        </textarea>
                                    </div>
                                    <div class="row mx-0">
                                        <label>Lista</label>
                                        <select class="form-select" name="listaId" multiple required>
                                            <?php foreach ($listas as $lista) : ?>
                                                <option value="<?= $lista['id'] ?>">
                                                    <?= $lista['title'] ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>

                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Savar </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>