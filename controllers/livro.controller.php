<?php


$id = $_REQUEST['id'];
$livro = Livro::get($id);

$avaliacoes = $database->query("SELECT * FROM avaliacoes WHERE livro_id = :id", Avaliacao::class, ['id' => $id])->fetchAll();



views('livro', compact('livro', 'avaliacoes'));
