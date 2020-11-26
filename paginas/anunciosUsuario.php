<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Meus Anúncios</title>
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/header.css">
        <script src="https://kit.fontawesome.com/107c433e36.js" crossorigin="anonymous"></script>
        <script language=javascript type="text/javascript">
            function addAnuncio(){
                // newWindow = window.open ('', 'popup', "width=350, height=255, top=100, left=110, scrollbars=no ");
                newWindow = window.open ('', 'pagina', "width=250 height=250");
                newWindow.document.write("asdfasdf");
            }
        </script>
    </head>
    <body>
        <?php require "./header.php"; ?>

        <div class="container">
            <h2>Meus anúncios</h2>
            <button type="button" name="addAnuncio" onclick="javascript:addAnuncio()">Adicionar anúncio</button>
            <div class="table-anuncios">
                <table>
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Categoria</th>
                            <th>Valor</th>
                            <th>Imagens</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../classes/Anuncio.class.php';
                        $a = new Anuncio();
                        $anuncios = $a->getAnunciosPorUsuario($_SESSION['login'], $arrayErro);

                        if (isset($anuncios) && !empty($anuncios)):
                            foreach ($anuncios as $anuncio):
                            ?>
                             <tr>
                                 <td><?php echo $anuncio['titulo'] ?></td>
                                 <td><?php echo $anuncio['descricao'] ?></td>
                                 <td></td>
                                 <td>R$ <?php echo $anuncio['valor'] ?></td>
                                 <div class="imagens">
                                    <?php
                                        $imagens = $a->getImagensPorAnuncio($anuncio['idAnuncio']);
                                        if (isset($imagens) && !empty($imagens)):
                                            foreach ($imagens as $imagem):
                                        ?>
                                            <td> <img src="../imagens/anuncios/<?php echo $imagem['url'] ?>" alt=""></td>
                                            <!-- <td> <img src="http://dummyimage.com/68x68/000/fff" alt=""> </td> -->
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                 </div>
                                 <td></td>
                             </tr>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php require "./footer.php"; ?>

    </body>
</html>
