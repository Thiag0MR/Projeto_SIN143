<?php
$serverDocRoot = str_replace ("\\", "/", $_SERVER['DOCUMENT_ROOT']);
$dirName = str_replace ("\\", "/", dirname(__FILE__, 2));
define('__ROOT__', str_replace($serverDocRoot, "", $dirName));
require $serverDocRoot.__ROOT__.'/config.php';

$pastaImagens = __ROOT__.'/imagens/';

?>

<div id="cabecalho">
    <div class="logo">
        <div id="slide">
            <a href="<?php echo __ROOT__ ?>">
                <img id="tamanhoImg" src="<?php echo $pastaImagens."/logo.png" ?>">
            </a>
        </div>
    </div>
        <ul>
            <li>
                <div id="botaoDark">
                    <button class="buttonDark buttonDark1" onclick="myFunction()">Dark Mode</button>
                </div>
            </li>

    <?php if (isset($_SESSION["login"]) && !empty($_SESSION["login"])): ?>

            <?php
            require_once $serverDocRoot.__ROOT__.'/classes/Usuario.class.php';
            $usuario = new Usuario();
            $nomeUsuario = $usuario->buscarNomeUsuario($_SESSION['login']);
            ?>
            <div class="dropdown">
                <li>


                    <button onclick="myFunction()" class="dropbtn">
                        <span><i class="fas fa-user" style="margin-right:10px;"></i><?php echo $nomeUsuario ?></span>
                    </button>
                </li>
                <div id="myDropdown" class="dropdown-content">
                    <a href="<?php echo __ROOT__."/paginas/anunciosUsuario.php" ?>">Meus anúncios</a>
                    <a href="<?php echo __ROOT__."/paginas/sair.php" ?>">Sair</a>
                </div>
            </div>

        </ul>
    <?php else: ?>

            <li>
                <a class="entrar" href="<?php echo __ROOT__."/paginas/login.php"?>"><i class="fas fa-sign-in-alt" style="margin-right:10px;"></i></i></i>Entrar</a>
            </li>
            <li>
                <a class="btnAnunciarVaga" href="<?php echo __ROOT__."/paginas/cadastrar.php"?>">Anunciar Vaga</a>
            </li>
        </ul>
    <?php endif; ?>
</div>
