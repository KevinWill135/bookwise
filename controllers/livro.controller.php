<?php

$db = new DB();
$id = $_REQUEST['id'];
$livro = $db->livro($id);


views('livro', compact('livro'));
