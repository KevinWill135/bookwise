<?php

/**
 * 1. Receber o formulário com email e senha
 * 2. fazer consulta no banco de dados com email e senha
 * 3. Se existir nós vamos adicionar na sessão que o usuários está autenticado
 * 4. Mudar a informação no nosso navbar pra mostrar o nome do usuário
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $validacao = Validacao::validar([
                'email' => ['required', 'email'],
                'password' => ['required']
        ], $_POST);

        if ($validacao->naoPassou('login')) {
                header('Location: /login');
                exit;
        }

        $usuario = $database->query(
                query: "SELECT * FROM usuarios WHERE email = :email",
                class: Usuario::class,
                params: [
                        'email' => $email
                ]
        )->fetch();

        if ($usuario) {

                //validando a senha

                $senhaPost = $_POST['password'];
                $senhaDb = $usuario->senha;

                if (!password_verify($senhaPost, $senhaDb)) {
                        flash()->push('validacoes_login', ['Email ou senha estão incorretos']);
                        header('location: /login');
                        exit();
                }


                $_SESSION['auth'] = $usuario;

                flash()->push('mensagem', 'Seja bem vindo ' . $usuario->nome . '!');

                header('location: /');
                exit();
        }
}

views('login');
