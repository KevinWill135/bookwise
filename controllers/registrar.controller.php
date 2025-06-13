<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $DataBase->query(
                query: "INSERT INTO usuarios(nome, email, senha) VALUES(:nome, :email, :senha)",
                params: [
                        'nome' => $_POST['nome'],
                        'email' => $_POST['email'],
                        'senha' => $_POST['password']
                ]
        );

        header('Location: /login?mensagem=Sucesso no Registro');
        exit();
}
