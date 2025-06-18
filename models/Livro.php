<?php

/**
 * Representação de 1 registro no bando de dados
 * Em forma de CLASSE!!
 */

class Livro
{
        public $id;
        public $titulo;
        public $autor;
        public $descricao;
        public $usuario_id;
        public $ano_de_lancamento;
        public $imagem;
        public $notaAvaliacao;
        public $countAvaliacoes;

        public function query($where, $params)
        {
                $database = new Database(config('database'));
                return $database->query(
                        "SELECT l.id, l.titulo, l.autor, l.descricao, l.ano_de_lancamento, l.imagem,
                        ifnull(round(sum(a.nota) / 5), 0) AS notaAvaliacao,
                        ifnull(count(a.id), 0) AS countAvaliacoes
                FROM livros l
                LEFT JOIN avaliacoes a ON l.id = a.livro_id
                WHERE $where
                GROUP BY l.id, l.titulo, l.autor, l.descricao, l.ano_de_lancamento, l.imagem",
                        self::class,
                        $params
                );
        }

        public static function get($id)
        {
                return (new self)->query('l.id = :id', ['id' => $id])->fetch();
        }

        public static function all($filtro)
        {
                return (new self)->query('titulo LIKE :filtro', ['filtro' => "%$filtro%"])->fetchAll();
        }

        public static function meusLivros($id)
        {
                return (new self)->query('l.usuario_id = :id', ['id' => $id])->fetchAll();
        }
}
