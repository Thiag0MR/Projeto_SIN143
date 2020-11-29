<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Detalhes anúncio</title>
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/darkMode.css">
        <link rel="stylesheet" href="../css/detalhesAnuncio.css">
        <script type="text/javascript" src="../JavaScript/darkMode.js"></script>
        <script src="https://kit.fontawesome.com/107c433e36.js" crossorigin="anonymous"></script>
    <body>
        <?php require './header.php'; ?>

        <div class="detalhesAnuncio">
            <?php
            require '../classes/Anuncio.class.php';
            $a = new Anuncio();

            $pastaImagens = __ROOT__.'/imagens/anuncios/';

            if (isset($_GET)) :
                if (isset($_GET['idAnuncio']) && !empty($_GET['idAnuncio'])) {
                    $anuncio = $a->getAnuncio($_GET['idAnuncio']);
                }

                if (isset($anuncio) && !empty($anuncio)):
                    ?>
                        <div class='anuncio'>
                            <div class='imagem'>
                                <?php
                                $imagens = $a->getImagensPorAnuncio($anuncio['idAnuncio']);
                                if (isset($imagens) && !empty($imagens)) {
                                    foreach ($imagens as $img) {
                                        echo "<img src='".$pastaImagens.$img['url']."' alt=''>";
                                    }
                                }
                                ?>
                            </div>
                            <div class='infoAnuncio'>
                                <h4>Informações do anúncio: </h4>
                                <span class="titulo"><?php echo $anuncio['titulo'] ?></span>
                                <span class="descricao"><?php echo $anuncio['descricao'] ?></span>
                                <span class="valor"><?php echo "R$ ".$anuncio['valor'] ?></span>
                            </div>
                        </div>
                        <div class="contato">
                            <?php
                            require_once '../classes/Usuario.class.php';
                            $u = new Usuario();

                            $user = $u->getUsuario($anuncio['Usuario_idUsuario']);
                            if (isset($user) && !empty($user)):
                            ?>
                                <div class="infoUsuario">
                                    <h4>Informações de contato:</h4>
                                    <ul>
                                        <li><span class="nome"><?php echo $user['nome'] ?></span></li>
                                        <li><span class="email"><?php echo $user['email'] ?></span></li>
                                        <li><span class="telefone"><?php echo "Telefone: ".$user['telefone'] ?></span></li>
                                    </ul>



                                </div>
                            <?php endif; ?>
                        </div>
                    <?php
                else:
                    echo "<h4 style='padding-top: 20px;'>Nada encontrado</h4>";
                endif;
            else:
                echo "<h4 style='padding-top: 20px;'>Nada encontrado</h4>";
            endif;
            ?>
        </div>

        <?php require './footer.php' ?>
    </body>
</html>
