<?php

require_once 'controllers/PedidoController.php';
require_once 'controllers/CursoController.php'; // Novo controller

$pedidoController = new PedidoController();
$cursoController = new CursoController(); // Instanciando o controller do exercício

$action = $_GET['action'] ?? '';

// --- ROTAS DO SISTEMA DE PEDIDOS (ORIGINAL) ---
if ($action == "listar") {
    $pedidoController->listar();
}

if ($action == "adicionar") {
    $tipoProduto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $pedidoController->adicionar($tipoProduto, $quantidade);
}

if ($action == "finalizar") {
    $pedidoController->finalizar();
}

// --- ROTAS DOS EXERCÍCIOS DE CURSOS ---

// Exercício 1: /cursos -> ?action=cursos
if ($action == "cursos") {
    echo $cursoController->index();
}

// Exercício 2: /cursos/novo -> ?action=cursos_novo
if ($action == "cursos_novo") {
    echo $cursoController->create();
}

// Exercício 3: Envio de dados -> ?action=cursos_listagem
if ($action == "cursos_listagem") {
    echo $cursoController->listagem();
}

// Exercício 4: Parâmetro ID -> ?action=cursos_show&id=X
if ($action == "cursos_show") {
    $id = $_GET['id'] ?? 0;
    echo $cursoController->show($id);
}
