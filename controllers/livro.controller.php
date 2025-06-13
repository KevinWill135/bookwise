<?php


$id = $_REQUEST['id'];
$livro = $DataBase->query("SELECT * FROM livros  WHERE id = :id", Livro::class, ['id' => $id])->fetch();



views('livro', compact('livro'));
