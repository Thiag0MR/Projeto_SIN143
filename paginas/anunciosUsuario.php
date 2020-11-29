<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Meus Anúncios</title>
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/anunciosUsuario.css">
        <link rel="stylesheet" href="../css/darkMode.css">
        <script type="text/javascript" src="../JavaScript/darkMode.js"></script>
        <script src="https://kit.fontawesome.com/107c433e36.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php require "./header.php"; ?>

        <div class="conteudo-principal">
            <h2>Meus anúncios</h2>

            <?php
            require '../classes/Anuncio.class.php';
            require '../classes/Categoria.class.php';

            $c = new Categoria();
            $a = new Anuncio();

            $pastaImagens = "../imagens/anuncios/";

            $valoresAnuncio = array(
                $titulo = NULL,
                $descricao = NULL,
                $categoria = array(),
                $valor = NULL,
            );

            $arrayErro = array(
                "geral" => NULL,
                "sucesso" => NULL,
                "falha" => NULL,
                "titulo" => NULL,
                "descricao" => NULL,
                "categoria" => NULL,
                "valor" => NULL
            );

            $idAnuncio = NULL;


            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET['mode']) && $_GET['mode'] == 'update' && isset($_GET['ID'])) {

                    $idAnuncio = $_GET['ID'];

                    // Verifica se o anuncio pertence ao usuario logado
                    if ($a->anuncioPertenceUsuario($idAnuncio, $_SESSION['login'])) {

                        $resultado = $a->getAnuncio($idAnuncio);
                        $resultadoCategoria = $c->getNomeDasCategoriasPorAnuncio($idAnuncio);

                        if (isset($resultado) && !empty($resultado)) {

                            $valoresAnuncio['titulo'] = $resultado['titulo'];
                            $valoresAnuncio['descricao'] = $resultado['descricao'];
                            if (isset($resultadoCategoria) && !empty($resultadoCategoria)) {
                                $valoresAnuncio['categoria'] = $resultadoCategoria;
                            }
                            $valoresAnuncio['valor'] = $resultado['valor'];
                        }

                    } else {
                        $arrayErro['falha'] = "Não é possível atualizar este anúncio!";
                    }

                } else {
                    if (isset($_GET['mode']) && $_GET['mode'] == 'exclude' && isset($_GET['ID'])) {

                        $idAnuncio = $_GET['ID'];

                        // Remove o anuncio da tabela Anuncio e também os registros nas outras tabelas que referenciam esse anuncio (CASCADE deve estar configurado no banco)
                        if ($a->excluirAnuncio($idAnuncio)) {
                            $arrayErro['sucesso'] = "Anuncio excluído com sucesso !";
                            $idAnuncio = NULL;
                        } else {
                            $arrayErro['falha'] = "Falha ao excluir anúncio !";
                        }
                    }
                }
            }



            // Significa que o usuário está inserindo um novo anúncio ou atualizando um já existente
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $idAnuncio = $_POST['idAnuncio'];

                // Verifica os campos que não podem ser vazios
                if (!empty($_POST['titulo']) && !empty($_POST['descricao']) && !empty($_POST['valor'])) {
                    $arrayAux['titulo'] = $a->setTitulo($_POST['titulo'] , $arrayErro);
                    $arrayAux['descricao'] = $a->setDescricao($_POST['descricao'] , $arrayErro);
                    if (isset($_POST['categoria'])) {
                        $arrayAux['categoria'] = $a->setCategoria($_POST['categoria'] , $arrayErro);
                    }
                    if (isset($_FILES['imagens']) && !empty($_FILES['imagens']) && $_FILES['imagens']['error'][0] == 0) {
                        $a->setImagens($_FILES['imagens']);
                    }


                    $arrayAux['valor'] = $a->setValor($_POST['valor'] , $arrayErro);

                    // Se não encontrar falso no array
                    if (!in_array('false', $arrayAux)) {

                        if (isset($idAnuncio) && !empty($idAnuncio)) {
                            // Verifica se o anúncio existe
                            if ($a->getAnuncio($idAnuncio)) {
                                if ($a->updateCategoriaDosAnuncios($idAnuncio) && $a->updateAnuncio($idAnuncio)) {
                                    $arrayErro['sucesso'] = "Anúncio atualizado com sucesso!";
                                    $idAnuncio = NULL;
                                } else {
                                    $arrayErro['falha'] = "Falha ao atualizar anúncio!";
                                }
                            } else {
                                $arrayErro['falha'] = "Anúncio não encontrado!";
                            }
                        } else {

                            if($a->cadastrarAnuncio($_SESSION['login'], $arrayErro)) {
                                $arrayErro['sucesso'] = "Anúncio cadastrado com sucesso!";
                            }else {
                                $arrayErro['falha'] = "Falha ao cadastrar anúncio!";
                            }
                        }
                    }

                } else {
                    $arrayErro['geral'] = "Todos os campos são requeridos!";
                }
            }
            ?>

            <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                <table class="table-add-anuncio">
                    <tr>
                        <td><input type="hidden" name="idAnuncio" value="<?php echo $idAnuncio ?>"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label for="titulo">Título</label></td>
                        <td>
                            <input type="text" name="titulo" value="<?php echo isset($valoresAnuncio['titulo']) ? $valoresAnuncio['titulo'] : ""; ?>">
                            <span class="erro"><?php echo $arrayErro['titulo'] ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="descricao">Descrição</label></td>
                        <td>
                            <textarea name="descricao" rows="10" cols="30"><?php echo isset($valoresAnuncio['descricao']) ? $valoresAnuncio['descricao'] : ""; ?></textarea>
                            <span class="erro"><?php echo $arrayErro['descricao'] ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="categoria">Categoria</label></td>
                        <td>

                            <?php
                            $categorias = $c->getNomeDasCategorias();
                            if (isset($categorias) && !empty($categorias)) {

                                foreach ($categorias as $cat){
                                    if (isset($valoresAnuncio['categoria']) && in_array($cat, $valoresAnuncio['categoria'])) {
                                        echo "<input checked name='categoria[]' type='checkbox' style='margin-right: 7px;' value=".$cat.">".$cat."</input> <br>";
                                    } else {
                                        echo "<input  name='categoria[]' type='checkbox' style='margin-right: 7px;' value=".$cat.">".$cat."</input> <br>";
                                    }
                                }
                            }
                            ?>

                        </td>
                    </tr>
                    <tr>
                        <td><label for="valor">Valor</label></td>
                        <td>
                            <input type="number" name="valor" value="<?php echo isset($valoresAnuncio['valor']) ? $valoresAnuncio['valor'] : ""; ?>">
                            <span class="erro"><?php echo $arrayErro['valor'] ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="imagens">Imagens</label></td>
                        <td><input multiple type="file" name="imagens[]" id="fileToUpload"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Adicionar" name="submit"></td>
                        <td>
                            <span class="falha"><?php echo $arrayErro['falha'] ?></span>
                            <span class="sucesso"><?php echo $arrayErro['sucesso'] ?></span>
                            <span class="geral"><?php echo $arrayErro['geral'] ?></span>
                        </td>
                    </tr>
                </table>
            </form>

            <div class="div-table-anuncios">
                <table class="table-anuncios">
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
                        $anuncios = $a->getAnunciosPorUsuario($_SESSION['login']);

                        // Imprime os anúncios
                        if (isset($anuncios) && !empty($anuncios)):
                            foreach ($anuncios as $anuncio):
                            ?>
                            <tr>
                                <td style="width:17%"><?php echo $anuncio['titulo'] ?></td>
                                <td style="width:30%"><?php echo $anuncio['descricao'] ?></td>
                                <td style="width:10%">
                                    <?php
                                        $categorias = $c->getNomeDasCategoriasPorAnuncio($anuncio['idAnuncio']);
                                        if (isset($categorias) && !empty($categorias)) {
                                            foreach ($categorias as $cat){
                                                echo $cat." ";
                                            }
                                        }
                                    ?>
                                </td>
                                <td style="width:5%">R$ <?php echo $anuncio['valor'] ?></td>
                                <td style="width:33%">
                                    <div class="imagens">
                                        <?php
                                            $imagens = $a->getImagensPorAnuncio($anuncio['idAnuncio']);
                                            // Se estiver associado a alguma imagem
                                            if (isset($imagens) && !empty($imagens)) {
                                                foreach ($imagens as $imagem) {
                                                    echo '<img src="'.$pastaImagens.$imagem['url'].'" alt="">';
                                                    // <td> <img src="http://dummyimage.com/68x68/000/fff" alt=""> </td>
                                                }
                                            }
                                        ?>
                                    </div>
                                </td>
                                <td style="width:5%">
                                    <a title="Atualizar" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?mode=update&ID=".$anuncio['idAnuncio'];?>"><i class="fas fa-edit fa-xs" style="color:green"></i></a>
                                    <a title="Deletar" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?mode=exclude&ID=".$anuncio['idAnuncio'];?>"><i class="fas fa-minus-circle fa-xs" style="color:red"></i></a>
                                </td>
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
