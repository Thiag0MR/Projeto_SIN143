<?php
$serverDocRoot = str_replace ("\\", "/", $_SERVER['DOCUMENT_ROOT']);
$dirName = str_replace ("\\", "/", dirname(__FILE__, 2));
$pathRoot = str_replace($serverDocRoot, "", $dirName);?>

<div id="cabecalho">
    <div class="logo">
        <div id="slide">
            <a href="/Projeto_SIN143">
                <img id="tamanhoImg" src="<?php echo $pathRoot."/images/logo.png" ?>">
            </a>
        </div>
    </div>
    <?php if (isset($_SESSION["login"]) && !empty($_SESSION["login"])): ?>
        <ul>
            <li><span><i class="fas fa-user" style="margin-right:10px;"></i><?php echo "Nome usuário" ?></span></li>
            <li><a href="<?php echo $pathRoot."/paginas/sair.php" ?>">Sair</a></li>
        </ul>
    <?php else: ?>
        <ul>
            <li>
                <a class="entrar" href="<?php echo $pathRoot."/paginas/login.php"?>"><i class="fas fa-sign-in-alt" style="margin-right:10px;"></i></i></i>Entrar</a>
            </li>
            <li>
                <a class="btnAnunciarVaga" href="<?php echo $pathRoot."/paginas/cadastrar.php"?>">Anunciar Vaga</a>
            </li>
        </ul>
    <?php endif; ?>
</div>
