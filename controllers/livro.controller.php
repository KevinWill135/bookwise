<?php


$id = $_REQUEST['id'];
$livro = $database->query(
        "SELECT 
        l.id,
        l.titulo,
        l.autor,
        l.descricao,
        l.ano_de_lancamento,
        round(sum(a.nota) / 5) AS notaAvaliacao,
        count(a.id) AS countAvaliacoes
        FROM livros l
        LEFT JOIN avaliacoes a ON l.id = a.livro_id
        WHERE l.id = :id
        GROUP BY l.id, l.titulo, l.autor, l.descricao, l.ano_de_lancamento",
        Livro::class,
        ['id' => $id]
)->fetch();

$avaliacoes = $database->query("SELECT * FROM avaliacoes WHERE livro_id = :id", Avaliacao::class, ['id' => $id])->fetchAll();



views('livro', compact('livro', 'avaliacoes'));
