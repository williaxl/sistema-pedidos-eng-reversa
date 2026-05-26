<?php

require_once 'controllers/PedidoController.php';
require_once 'controllers/CursoController.php';
require_once 'controllers/ProdutoController.php'; // Incluído

$pedidoController = new PedidoController();
$cursoController = new CursoController();
$produtoController = new ProdutoController(); // Instanciado

$action = $_GET['action'] ?? '';

// --- ROTAS DO SISTEMA DE PEDIDOS (ORIGINAL) ---
if ($action == "listar") { $pedidoController->listar(); }
if ($action == "adicionar") {
    $tipoProduto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $pedidoController->adicionar($tipoProduto, $quantidade);
}
if ($action == "finalizar") { $pedidoController->finalizar(); }


// --- ROTAS DOS EXERCÍCIOS DE CURSOS ---
if ($action == "cursos") { echo $cursoController->index(); }
if ($action == "cursos_novo") { echo $cursoController->create(); }
if ($action == "cursos_listagem") { echo $cursoController->listagem(); }
if ($action == "cursos_show") {
    $id = $_GET['id'] ?? 0;
    echo $cursoController->show($id);
}
// Exercício 5: Rota POST simulada para salvar curso (?action=cursos_store)
if ($action == "cursos_store") {
    $nome = $_POST['nome'] ?? 'Sem nome';
    echo $cursoController->store($nome);
}


// --- ROTAS DA ATIVIDADE DE PRODUTOS ---
// ?action=produtos_create (GET)
if ($action == "produtos_create") {
    echo $produtoController->create();
}
// ?action=produtos_store (POST)
if ($action == "produtos_store") {
    $nome = $_POST['nome'] ?? 'Sem nome';
    echo $produtoController->store($nome);
}
