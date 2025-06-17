<?php


$id = $_REQUEST['id'];
$livro = $database->query("SELECT * FROM livros  WHERE id = :id", Livro::class, ['id' => $id])->fetch();

$avaliacoes = $database->query("SELECT * FROM avaliacoes WHERE livro_id = :id", Avaliacao::class, ['id' => $id])->fetchAll();



views('livro', compact('livro', 'avaliacoes'));
