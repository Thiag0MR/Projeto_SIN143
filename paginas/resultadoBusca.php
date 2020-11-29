<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Tem Vaga Aí</title>
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/resultadoBusca.css">
        <link rel="stylesheet" href="../css/darkMode.css">
        <script type="text/javascript" src="../JavaScript/darkMode.js"></script>
        <script src="https://kit.fontawesome.com/107c433e36.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php require './header.php'; ?>

        <div class="conteudoPrincipal">
            <div class="buscaAvancada">
                <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" id ='formID'>
                    <input type="text" name="buscar" value="">
                    <input type="submit" name="" value="Buscar">
                </form>
            </div>
            <div>
                <div class="refinarBusca">
                    <h2>Refinar busca</h2>


                    <div class="categorias">
                        <h4>Categorias</h4>
                        <?php

                        $pastaImagens = __ROOT__.'/imagens/anuncios/';

                        require '../classes/Categoria.class.php';
                        $c = new Categoria();
                        $categorias = $c->getNomeDasCategorias();
                        if (isset($categorias) && !empty($categorias)) {

                            foreach ($categorias as $cat){
                                echo "<input  name='categoria[]' form='formID' type='checkbox' style='margin-right: 7px;' value=".$cat.">".$cat."</input> <br>";
                            }
                        }
                        ?>
                    </div>

                    </form>
                </div>
                <div class="resultadoAnuncios">
                    <h2>Resultado busca</h2>
                    <?php
                    require '../classes/Anuncio.class.php';
                    $a = new Anuncio();


                    if (isset($_GET)) :
                        if (isset($_GET['categoria']) && count($_GET['categoria']) != 0) {
                            $resultadoBusca = $a->getAnunciosPorCategoria($_GET['categoria'], $_GET['buscar']);
                        } else {
                            if (!empty($_GET['buscar'])) {
                                $resultadoBusca = $a->getAnuncios($_GET['buscar']);
                            }
                        }

                        if (isset($resultadoBusca) && !empty($resultadoBusca)):
                            foreach ($resultadoBusca as $anuncio):
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
                                    <div class='info'>
                                        <span class="titulo"><?php echo $anuncio['titulo'] ?></span>
                                        <span class="descricao"><?php echo $anuncio['descricao'] ?></span>
                                        <span class="valor"><?php echo "R$ ".$anuncio['valor'] ?></span>
                                        <span class="detalhes"><a href="<?php echo __ROOT__."/paginas/detalhesAnuncios.php?idAnuncio=".$anuncio['idAnuncio'] ?>">Detalhes</a></span>
                                    </div>
                                </div>
                            <?php
                            endforeach;
                        else:
                            echo "<h4 style='padding-top: 20px;'>Nada encontrado</h4>";
                        endif;
                    else:
                        echo "<h4 style='padding-top: 20px;'>Nada encontrado</h4>";
                    endif;
                    ?>
                </div>
            </div>
        </div>


        <?php require './footer.php' ?>
    </body>
</html>
