<?php

require_once __DIR__ . '/../models/Produto.php';

class ProdutoFactory {

    public static function criar($tipo) {

        switch ($tipo) {
            case "pastel":
                return new Produto("Pastel", 5);

            case "caldo":
                return new Produto("Caldo", 7);

            case "refrigerante":
                return new Produto("Refrigerante", 4);

            case "suco":
                return new Produto("Suco", 6);

            default:
                return new Produto("Desconhecido", 0);
        }
    }
}
