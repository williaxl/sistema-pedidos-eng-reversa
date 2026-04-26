<?php

require_once '../models/Pedido.php';
require_once '../models/ItemPedido.php';
require_once '../models/Produto.php';
require_once '../repositories/PedidoRepository.php';
require_once '../services/SemDesconto.php';

class PedidoController {

    private $pedido;
    private $repo;
    private $desconto;

    public function __construct() {
        $this->pedido = PedidoSingleton::getInstance();
        $this->repo = new PedidoRepository();
        $this->desconto = new SemDesconto();
    }

    public function listar() {
        header('Content-Type: application/json');

        echo json_encode([
            "itens" => $this->pedido->getItens(),
            "total" => $this->pedido->getTotal()
        ]);
    }
    public function adicionar($tipoProduto, $quantidade) {

    $produto = ProdutoFactory::criar($tipoProduto);

    $item = new ItemPedido(
        $produto->getNome(),
        $quantidade,
        $produto->getPreco()
    );

    $this->pedido->adicionarItem($item);

    echo json_encode(["mensagem" => "Item adicionado"]);
}

    public function finalizar() {
        $total = $this->pedido->getTotal();
        $totalFinal = $this->desconto->calcular($total);
$this->subject = new Subject();
$this->subject->addObserver(new LoggerObserver());
$this->subject->notify($this->pedido);
        $this->repo->salvar($this->pedido);

        echo json_encode([
            "total" => $total,
            "totalFinal" => $totalFinal
        ]);
    }
}
