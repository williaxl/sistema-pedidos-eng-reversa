<?php

class ItemPedido {
    private $produto;
    private $quantidade;
    private $preco;

    public function __construct($produto, $quantidade, $preco) {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->preco = $preco;
    }

    public function getSubtotal() {
        return $this->quantidade * $this->preco;
    }
}
