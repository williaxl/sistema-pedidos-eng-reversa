<?php

require_once __DIR__ . '/../services/DescontoProgressivo.php';

$strategy = new DescontoProgressivo();

$total = 100;
$resultado = $strategy->calcular($total);

if ($resultado == 80) {
    echo "TESTE DESCONTO OK";
} else {
    echo "FALHA DESCONTO - Valor: " . $resultado;
}
