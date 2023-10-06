<?php 

class Usuario {
    private $db;

    public function _construct($conexao) {
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

    public function adicionarUsuario($nome, $email, $senha, $caminhoImagem) {
            // Verifique se o email já está em uso
            if ($this->verificarEmailExistente($email)) { // chama a função
                return false; // Email já está em uso, não é possível adicionar o usuário
            }
        // Hash da senha para maior segurança
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        
        // Inserir um novo usuário na tabela
        $sql = "INSERT INTO usuarios (usu_nome, usu_email, usu_senha, usu_foto_perfil) VALUES (?, ?, ?, ?)";
        // values são usados em interrogação evitam ataque de sql inject 

        $stmt = $this->db->prepare($sql); // chama o banco e prepara $sql

        $stmt->bind_param("ssss", $nome, $email, $senhaHash, $caminhoImagem); // passa o tipo do campo (varchar - string; s)
        
        if ($stmt->execute()) {
            return true; // Usuário adicionado com sucesso.
        } else {
            return false; // Erro ao adicionar o usuário.
        }
    }

    public function verificarEmailExistente($email) {
        $sql = "SELECT COUNT(*) AS total FROM usuarios WHERE usu_email = ?"; // guarda dentro da variavel um comando sql (conta os resultados da tabela quando o email do usuario tiver informação/parametro $email)
        
        $stmt = $this->db->prepare($sql); // chama o banco e prepara $sql
        $stmt->bind_param("s", $email); // passa o tipo do campo (varchar - string; s)
        $stmt->execute(); // executa comando
        $result = $stmt->get_result(); // pega o resultado
        $row = $result->fetch_assoc(); // lista todos os resultados
        
        return $row['total'] > 0; // retorna apenas se for maior que 0
    }
}

?>