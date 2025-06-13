<?php

class DB
{
        private $db;

        public function __construct()
        {
                $this->db = new PDO('sqlite:database.sqlite');
        }


        public function livros()
        {
                $query = $this->db->query("SELECT * FROM livros");

                $items = $query->fetchAll();

                return array_map(fn($item) => Livro::make($item), $items);
        }

        public function livro($id)
        {
                $query = $this->db->query("SELECT * FROM livros WHERE id = " . $id);
                $items = $query->fetchAll();
                $retorno = [];

                foreach ($items as $item) {

                        $retorno[] = Livro::make($item);
                }
                return $retorno[0];
        }
}
