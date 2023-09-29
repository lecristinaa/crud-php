<?php 

class Usuario {
    private $db;

    public function_construct($conexao) {
        $this->db = $conexao;
    }

    public function listarUsuarios() {
        $usuarios = array();
        $sql = "SELECT * FROM usuarios"; // prepara a consulta SQL para listar todos os usuarios
        $result = $this->db->query($sql); // prepara e executa a consulta

        if ($result) {
            while ($row = $result->fetch_assoc()){
                $usuarios[] = $row;
            }
            $result->close();
        }
        return $usuarios;
    }

}

?>