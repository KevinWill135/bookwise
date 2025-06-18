<?php

$pesquisa = $_REQUEST['pesquisar'] ?? '';
$livros = Livro::all($pesquisa);


views('index', compact('livros'));
