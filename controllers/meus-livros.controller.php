<?php

if (!auth()) {
        header('location: /');
        exit;
}

$livros = Livro::meusLivros(auth()->id);

views('meus-livros', compact('livros'));
