<?php $pathRoot = str_replace($_SERVER['DOCUMENT_ROOT'], "", dirname(__FILE__, 2));?>

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
            <li>Nome usuário</li>
            <li><a href="#">Sair</a></li>
        </ul>
    <?php else: ?>
        <ul>
            <li><a href="<?php echo $pathRoot."/paginas/cadastrar.php"?>">Anunciar Vaga</a></li>
            <li>

                <!-- <a href="">Entrar<span class="arrow-down"></span></a> -->
                <a href="<?php echo $pathRoot."/paginas/login.php"?>"><i class="fas fa-sign-in-alt" style="margin-right:10px;"></i></i></i>Entrar</a>


                <!-- <div class="dropdown-content">
                  <form action="" method="POST">
                    <input class="block" type="email" name="Email" placeholder="Email" required>
                    <input class="block" type="password" name="Password" placeholder="Senha" required>
                    <div class="block checkbox">
                        <input  type="checkbox" name="lembrar-me">
                        <label for="lembrar-me">Lembrar-me ?</label>
                    </div>
                    <input class="block" type="submit" value="Entrar">
                    <div class="block forgot-password">
                        <a href="#">Esqueceu a senha ?</a>
                    </div>
                  </form>
                </div> -->
            </li>
        </ul>
    <?php endif; ?>
</div>
