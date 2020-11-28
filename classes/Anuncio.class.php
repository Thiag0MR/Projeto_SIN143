<?php
class Anuncio {
    private $titulo;
    private $descricao;
    private $valor;
    private $nomeDasCategorias;
    private $imagens;


    public function cadastrarAnuncio($idUsuario, &$arrayErro) {
        global $pdo;

        $sql = $pdo->prepare ("INSERT INTO Anuncio (titulo, descricao, valor, Usuario_idUsuario) VALUES (?,?,?,?)");
        $sql->bindParam(1, $this->titulo);
        $sql->bindParam(2, $this->descricao);
        $sql->bindParam(3, $this->valor);
        $sql->bindParam(4, $idUsuario);

        if ($sql->execute() == true) {

            $lastIdAnuncio = $pdo->lastInsertId();

            if (isset($this->imagens) && !empty($this->imagens)) {
                for ($i = 0; $i < count($this->imagens['name']); $i++) {


                    $filename = $this->imagens["name"][$i];
                    if ($i > 1) {
                        $arrayErro['falha'] = $filename;
                    }

                    // $arrayErro['falha'] = $filename;
                    // DIRETORIO ONDE SERÁ ARMAZENADO AS IMAGENS
                    $uploaddir = '/var/www/uploads/';
                    $uploadfile = $uploaddir. basename($filename);

                    move_uploaded_file($this->imagens["tmp_name"][$i], $uploadfile);

                    $sql = $pdo->prepare ("INSERT INTO Imagem (url, Anuncio_idAnuncio) VALUES (?,?)");

                    $sql->bindParam(1, $filename);
                    $sql->bindParam(2, $lastIdAnuncio);
                    if ($sql->execute() == false) {
                        $arrayErro['falha'] = $filename;
                        return false;
                    }
                }
            }
            return true;
        }


        return false;
    }

    public function updateAnuncio($idAnuncio) {
        global $pdo;

        $sql = $pdo->prepare ("UPDATE Anuncio SET titulo = ?, descricao = ?, valor = ? WHERE idAnuncio = ?");
        $sql->bindParam(1, $this->titulo);
        $sql->bindParam(2, $this->descricao);
        $sql->bindParam(3, $this->valor);
        $sql->bindParam(4, $idAnuncio);
        if ($sql->execute() == true) {
            return true;
        }
        return false;
    }

    public function updateCategoriaDosAnuncios($idAnuncio) {
        global $pdo;

        // Deleta todas categorias para determinado anúncio
        $sql = $pdo->prepare("DELETE FROM Anuncio_Categoria WHERE Anuncio_idAnuncio = ?");
        $sql->bindParam(1, $idAnuncio);

        $categoria = new Categoria();

        if ($sql->execute() == true) {
            // Insere as novas categorias

            if (isset($this->nomeDasCategorias) && !empty($this->nomeDasCategorias)) {
                foreach($this->nomeDasCategorias as $c) {
                    $id = $categoria->getIdDaCategoriaPeloNome($c);
                    $sql = $pdo->prepare("INSERT INTO Anuncio_Categoria VALUES(?,?)");
                    $sql->bindParam(1, $idAnuncio);
                    $sql->bindParam(2, $id['idCategoria']);
                    if ($sql->execute() == false) {
                        return false;
                    }
                }
                return true;
            } else {
                // Não tem categoria para adicionar
                return true;
            }

        }

        return false;

    }

    public function anuncioPertenceUsuario($idAnuncio, $idUsuario) {
        global $pdo;
        $sql = $pdo->prepare("SELECT Usuario_idUsuario FROM Anuncio WHERE idAnuncio = ? LIMIT 1");
        $sql->bindParam(1, $idAnuncio);
        $sql->execute();

        $array = NULL;

        if ($sql->execute() == true) {
            if ($sql->rowCount() == 1) {
                $array = $sql->fetch();

                if ($array['Usuario_idUsuario'] == $idUsuario) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    public function getAnuncio($idAnuncio) {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM Anuncio WHERE idAnuncio = ? LIMIT 1");
        $sql->bindParam(1, $idAnuncio);

        $array = NULL;

        if ($sql->execute() == true) {
            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
                return $array;
            }
        }

        return $array;
    }

    public function getAnunciosPorUsuario($idUsuario) {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM Anuncio WHERE Usuario_idUsuario = ?");
        $sql->bindParam(1, $idUsuario);

        $array = NULL;

        if ($sql->execute() == true) {
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
            }
        }

        return $array;
    }

    // Busca as imagens referentes a um anuncio
    public function getImagensPorAnuncio ($idAnuncio) {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM Imagem WHERE Anuncio_idAnuncio = ?");
        $sql->bindParam(1, $idAnuncio);

        $array = NULL;

        if ($sql->execute() == true) {
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
            }
        }

        return $array;
    }

    // Exclui em cascata
    public function excluirAnuncio($idAnuncio) {
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM Anuncio WHERE idAnuncio = ?");
        $sql->bindParam(1, $idAnuncio);

        if ($sql->execute() == true) {
            return true;
        }

        return false;
    }

    public function setTitulo($titulo, &$arrayErro) {
        if (strlen($titulo) > 45) {
            $arrayErro['titulo'] = "Título contém mais de 45 caracteres!";
            return 'false';
        } else {
            $this->titulo = $this->test_input($titulo);
        }
    }

    public function setDescricao($descricao, &$arrayErro) {
        if (strlen($descricao) > 150) {
            $arrayErro['descricao'] = "Descrição contém mais de 150 caracteres!";
            return 'false';
        } else {
            $this->descricao = $this->test_input($descricao);
        }
    }

    public function setValor($valor, &$arrayErro) {
        if (!is_numeric($valor)) {
            $arrayErro['valor'] = "Valor incorreto!";
            return 'false';
        } else {
            $this->valor = $this->test_input($valor);
        }
    }

    public function setCategoria($categorias, &$arrayErro) {
        $this->nomeDasCategorias = $categorias;
    }

    public function setImagens($imagens) {
        $this->imagens = $imagens;
    }

    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}
?>
