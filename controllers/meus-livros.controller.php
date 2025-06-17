<?php

if (!auth()) {
        header('location: /');
        exit;
}

$livros = $database->query("SELECT * FROM livros WHERE usuario_id = :id", Livro::class, ['id' => auth()->id])->fetchAll();

views('meus-livros', compact('livros'));
