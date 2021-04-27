<?php

require_once(__DIR__ . '/../models/Lista.php');
require_once(__DIR__ . '/../models/Item.php');
require_once(__DIR__ . '/interfaces/ILista.interface.php');

class Lista extends ListaModel implements ILista
{
    public function __construct()
    {
        parent::__construct();
    }

    public function gravaLista(array $dados): bool
    {
        $this->setDados($dados);

        if (empty($this->id))
            return $this->insere();
        else
            return $this->atualiza();
    }

    public function listar(): array
    {
        $lista = $this->list();

        foreach ($lista as $key => $item) {
            $itemLista = new ItemModel();
            $itemLista->set(['listaId' => $item['id']]);
            $lista[$key]['itens'] = $itemLista->getByList();
        }
        

        return $lista;
    }


    private function setDados(array $dados)
    {
        $this->set($dados);
    }

    public function verificarTotal(int $totalPermitido): bool
    {
        $totalLista = $this->listar();

        if ($totalPermitido > count($totalLista))
            return true;
        else
            return false;
    }
}
