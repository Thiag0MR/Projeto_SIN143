<?php
class Categoria {

    public function getCategorias () {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM Categoria");
        $sql->execute();

        $array = NULL;

        if ($sql->execute() == true) {
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
            }
        }

        return $array;
    }

    public function getNomeDasCategorias () {
        global $pdo;
        $sql = $pdo->prepare("SELECT nome FROM Categoria");
        $sql->execute();

        $array = NULL;

        if ($sql->execute() == true) {
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_COLUMN);
            }
        }

        return $array;
    }

    public function getNomeDasCategoriasPorAnuncio($idAnuncio) {
        global $pdo;
        $sql = $pdo->prepare("SELECT c.nome FROM Anuncio_Categoria AS ac JOIN Categoria AS c ON  ac.Categoria_idCategoria = c.idCategoria
                            WHERE Anuncio_idAnuncio = ?");
        $sql->bindParam(1, $idAnuncio);
        $sql->execute();

        $array = NULL;

        if ($sql->execute() == true) {
            if ($sql->rowCount() > 0) {
                // O fetchAll retorna cada resultado como um array, é usado o FETCH_COLUMN para retornar um array com uma coluna de cada array
                $array = $sql->fetchAll(PDO::FETCH_COLUMN);
            }
        }

        return $array;
    }

    public function getIdDaCategoriaPeloNome ($nome) {
        global $pdo;

        $sql = $pdo->prepare ("SELECT idCategoria FROM Categoria WHERE nome = ? LIMIT 1");
        $sql->bindParam(1, $nome);

        $id = NULL;

        if ($sql->execute() == true) {
            if ($sql->rowCount() == 1) {
                $id = $sql->fetch();
            }
        }
        return $id;
    }
}
?>
