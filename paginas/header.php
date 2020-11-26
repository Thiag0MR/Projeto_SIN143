<?php
$serverDocRoot = str_replace ("\\", "/", $_SERVER['DOCUMENT_ROOT']);
$dirName = str_replace ("\\", "/", dirname(__FILE__, 2));
define('__ROOT__', str_replace($serverDocRoot, "", $dirName));
require $serverDocRoot.__ROOT__.'/config.php';
?>

<div id="cabecalho">
    <div class="logo">
        <div id="slide">
            <a href="/Projeto_SIN143">
                <img id="tamanhoImg" src="<?php echo __ROOT__."/images/logo.png" ?>">
            </a>
        </div>
    </div>
    <?php if (isset($_SESSION["login"]) && !empty($_SESSION["login"])): ?>
        <ul>
            <?php
            require_once $serverDocRoot.__ROOT__.'/classes/Usuario.class.php';
            $usuario = new Usuario();
            $nomeUsuario = $usuario->buscarNomeUsuario($_SESSION['login']);
            ?>
            <li><span><i class="fas fa-user" style="margin-right:10px;"></i><?php echo $nomeUsuario ?></span></li>
            <li><a href="<?php echo __ROOT__."/paginas/sair.php" ?>">Sair</a></li>
        </ul>
    <?php else: ?>
        <ul>
            <li>
                <a class="entrar" href="<?php echo __ROOT__."/paginas/login.php"?>"><i class="fas fa-sign-in-alt" style="margin-right:10px;"></i></i></i>Entrar</a>
            </li>
            <li>
                <a class="btnAnunciarVaga" href="<?php echo __ROOT__."/paginas/cadastrar.php"?>">Anunciar Vaga</a>
            </li>
        </ul>
    <?php endif; ?>
</div>
