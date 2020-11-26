<?php
class Usuario {
    private $nome;
    private $email;
    private $senha;
    private $telefone;

    public function cadastrar (&$arrayErro) {
        global $pdo;
        $sql = $pdo->prepare("SELECT idUsuario FROM Usuario WHERE email = ?");
        $sql->bindParam(1, $this->email);
        $sql->execute();

        if ($sql->rowCount() == 0) {
            $sql = $pdo->prepare ("INSERT INTO Usuario (nome, email, senha, telefone) VALUES (?,?,?,?)");
            $sql->bindParam(1, $this->nome);
            $sql->bindParam(2, $this->email);
            $sql->bindParam(3, $this->senha);
            $sql->bindParam(4, $this->telefone);
            if ($sql->execute() == true) {
                $arrayErro['sucesso'] = "Cadastrado com sucesso!";
            } else {
                $arrayErro['geral'] = "Erro";
            }


        } else {
            $arrayErro['geral'] = "Email já cadastrado!";
            return false;
        }

        return true;

    }

    public function login ($email, $senha) {
        $email = $this->test_input($email);
        $senha = $this->test_input($senha);

        global $pdo;

        $sql = $pdo->prepare("SELECT idUsuario FROM Usuario WHERE email = ? AND senha = ?");
        $sql->bindParam(1, $email);
        $sql->bindParam(2, $senha);
        if ($sql->execute() == true) {
            if ($sql->rowCount() == 1) {
                $dado = $sql->fetch();
                $_SESSION['login'] = $dado['idUsuario'];
                return true;
            } else {
                return false;
            }
        }

    }

    public static function buscarNomeUsuario($idUsuario) {
        global $pdo;

        $sql = $pdo->prepare("SELECT nome FROM Usuario WHERE idUsuario = ?");
        $sql->bindParam(1, $idUsuario);
        if ($sql->execute() == true) {
            if ($sql->rowCount() == 1) {
                $dado = $sql->fetch();
                return $dado['nome'];
            }
        }
    }


    public function setNome ($nome, &$arrayErro) {
        if (preg_match("/^[a-zA-Z ]*$/", $nome)) {
            $this->nome = $this->test_input($nome);
        } else {
            $arrayErro['nome'] = "Nome deve conter apenas letras e espaços em branco";
            return false;
        }
        return true;
    }

    public function setEmail($email, &$arrayErro) {
        if (filter_var ($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $this->test_input($email);
        } else {
            $arrayErro['email'] = "Email inválido!";
            return false;
        }

        return true;
    }

    public function setSenha($senha, &$arrayErro) {
        if (strlen($senha) > 6) {
            $this->senha = $this->test_input($senha);
        } else {
            $arrayErro['senha'] = "A senha deve ter no mínimo 6 caracteres!";
            return false;
        }
        return true;
    }

    public function setTelefone ($telefone, &$arrayErro) {
        $this->telefone = $this->test_input($telefone);
        return true;
    }

    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>
