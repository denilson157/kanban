<?php

require_once(__DIR__ . '/../models/Item.php');
require_once(__DIR__ . '/../models/Lista.php');
require_once(__DIR__ . '/interfaces/IItem.interface.php');

class Item extends ItemModel implements IITem
{
    public function __construct()
    {
        parent::__construct();
    }

    public function gravaItem(array $dados): bool
    {
        $this->setDados($dados);

        return $this->salva();
    }

    private function salva()
    {
        if (empty($this->id))
            return $this->insere();
        else
            return $this->atualiza();
    }

    public function getItem(): array
    {
        if (empty($this->id))
            return [];

        $retorno = $this->get();
        return $retorno[0];
    }

    public function setDados(array $dados)
    {
        $this->set($dados);
    }

    public function apagar(): bool
    {
        if (!empty($this->id))
            return $this->apaga();
        else
            return false;
    }

    public function concluir(): bool
    {
        if (!empty($this->id)) {
            $item = $this->getItem();

            $lista = new ListaModel();
            $listas = $lista->last('LIMIT 1', 'DESC');

            $this->set($item);
            $this->listaId = $listas[0]['id'];
            return $this->salva();
            
        } else
            return false;
    }
}
