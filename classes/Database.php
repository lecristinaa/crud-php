<?php

// as variáveis são relacionadas com o banco de dados criadas
class Database{
    private $host = 'localhost: 3399';
    private $usuario = 'root';
    private $senha = '';
    private $banco = 'crud';
    private $conexao;


    // função pública (iremos usar em outros arquivos
    public function conectar() {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco); // chamda uma nova conexão do mysql
        if ($this->conexao->connect_error){ // acontece a conexão, se der erro ou não
            die("Erro na conexão: " . $this->conexao->connect_error); // conexão "morre"
        }
        return $this->conexao; // retorna a conexão com os campos da classe
    }
}

?>