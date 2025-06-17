<?php

$pesquisa = $_REQUEST['pesquisar'] ?? '';
$livros = $database->query(
        query: "SELECT * FROM livros WHERE titulo LIKE :filtro",
        class: Livro::class,
        params: ['filtro' => "%$pesquisa%"]
)->fetchAll();


views('index', compact('livros'));
