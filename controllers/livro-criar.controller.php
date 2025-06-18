<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('location: /meus-livros');
        exit();
}

if (!auth()) {
        abort(403);
}

$usuario_id = auth()->id;

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$descricao = $_POST['descricao'];
$ano_de_lancamento = $_POST['ano_de_lancamento'];


$validacao = Validacao::validar([
        'titulo' => ['required', 'min:3'],
        'autor' => ['required'],
        'descricao' => ['required'],
        'ano_de_lancamento' => ['required']
], $_POST);

if ($validacao->naoPassou()) {
        header('location: /meus-livros');
        exit();
}

//criando e salvando imagens
$dir = 'images';
$arquivo = $dir . basename($_FILES['imagem']['name']);
$extensao = pathinfo($arquivo, PATHINFO_EXTENSION);
$novoNome = md5(rand());
$imagem = "$dir/$novoNome.$extensao";

//dd($_FILES['imagem'], __DIR__ . '../public/' . $imagem);

move_uploaded_file($_FILES['imagem']['tmp_name'], __DIR__ . '/../public/' . $imagem);


$database->query(
        query: "INSERT INTO livros(titulo, autor, descricao, ano_de_lancamento, usuario_id, imagem) VALUES(:titulo, :autor, :descricao, :ano_de_lancamento, :usuario_id, :imagem)",
        params: compact('titulo', 'autor', 'descricao', 'ano_de_lancamento', 'usuario_id', 'imagem')
);

flash()->push('mensagem', 'Livro cadastrado com sucesso!!');
header('location: /meus-livros');
exit();
