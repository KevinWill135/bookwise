<?php

class Validacao
{
        public $validacoes = [];

        public static function validar($regras, $dados)
        {
                $validacao = new self;

                foreach ($regras as $campo => $regrasDoCampo) {
                        foreach ($regrasDoCampo as $regra) {

                                $valorDoCampo = $dados[$campo];

                                if ($regra === 'confirmed') {
                                        $validacao->$regra($campo, $valorDoCampo, $dados["{$campo}_confirm"]);
                                } elseif (str_contains($regra, ':')) {
                                        $temp = explode(':', $regra);
                                        /**
                                         * This is like ⬇️⬇️⬇️
                                         * min:8 ➡️ ['min', 8]
                                         */

                                        $regra = $temp[0];
                                        $regraArg = $temp[1];
                                        $validacao->$regra($regraArg, $campo, $valorDoCampo);
                                } else {
                                        $validacao->$regra($campo, $valorDoCampo);
                                }
                        }
                }

                return $validacao;
        }

        private function unique($tabela, $campo, $valor)
        {
                if (strlen($valor) == 0) {
                        return;
                }

                $db = new Database(config('database'));

                $resultado = $db->query(
                        query: "SELECT * FROM $tabela WHERE $campo = :valor",
                        params: ['valor' => $valor]
                )->fetch();

                if ($resultado) {
                        $this->validacoes[] = "O $campo já está sendo utilizado";
                }
        }

        private function required($campo, $valor)
        {
                if (strlen($valor) == 0) {
                        $this->validacoes[] = "O $campo é obrigatório";
                }
        }

        private function email($campo, $valor)
        {
                if (!filter_var($valor, FILTER_VALIDATE_EMAIL)) {
                        $this->validacoes[] = "O $campo é inválido";
                }
        }

        private function confirmed($campo, $valor, $confirmacao)
        {
                if ($valor != $confirmacao) {
                        $this->validacoes[] = "O $campo de confirmação está diferente";
                }
        }

        private function min($min, $valor, $campo)
        {
                if (strlen($valor) < $min) {
                        $this->validacoes[] = "A $campo deve conter mais do que $min caracteres";
                }
        }

        private function max($max, $valor, $campo)
        {
                if (strlen($valor) > $max) {
                        $this->validacoes[] = "A $campo deve conter menos que $max caracteres";
                }
        }

        private function strong($campo, $valor)
        {
                if (!strpbrk($valor, '!@#$%&/(=)?*')) {
                        $this->validacoes[] = "A $campo deve conter pelo menos um * dentre os caracteres";
                }
        }

        public function naoPassou($customName = null)
        {

                $chave = 'validacoes';

                if ($customName) {
                        $chave .= '_' . $customName;
                }

                flash()->push($chave, $this->validacoes);

                //$_SESSION['validacoes'] = $this->validacoes;

                return sizeof($this->validacoes) > 0;
        }
}
