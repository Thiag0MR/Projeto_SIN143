<?php
class Anuncio {

    public function getAnuncios() {

    }

    public function getAnunciosPorUsuario($idUsuario, &$arrayErro) {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM Anuncio WHERE Usuario_idUsuario = ?");
        $sql->bindParam(1, $idUsuario);
        $sql->execute();

        $array = NULL;

        if ($sql->execute() == true) {
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
            }
        }

        return $array;
    }

    public function getImagensPorAnuncio ($idAnuncio) {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM Imagem WHERE Anuncio_idAnuncio = ?");
        $sql->bindParam(1, $idAnuncio);
        $sql->execute();

        $array = NULL;

        if ($sql->execute() == true) {
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
            }
        }

        return $array;
    }
}
?>
