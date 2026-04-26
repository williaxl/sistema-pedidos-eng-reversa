<?php

require_once __DIR__ . '/../models/Pedido.php';

class PedidoSingleton {

    private static $instance = null;
    private $pedido;

    private function __construct() {
        $this->pedido = new Pedido(1);
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new PedidoSingleton();
        }

        return self::$instance->pedido;
    }

    public function getPedido() {
        return $this->pedido;
    }

    public function adicionar($item) {
    $this->pedido->adicionarItem($item);
}
}
