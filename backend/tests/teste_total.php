<?php

require_once __DIR__ . '/../models/Pedido.php';
require_once __DIR__ . '/../models/ItemPedido.php';

$pedido = new Pedido(1);

$item1 = new ItemPedido("Pastel", 2, 5);
$item2 = new ItemPedido("Suco", 1, 6);

$pedido->adicionarItem($item1);
$pedido->adicionarItem($item2);

$total = $pedido->getTotal();

if ($total == 16) {
    echo "TESTE TOTAL OK";
} else {
    echo "FALHA TOTAL - Valor: " . $total;
}
