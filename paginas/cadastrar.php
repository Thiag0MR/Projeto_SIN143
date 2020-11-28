<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastrar</title>
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/cadastro.css">
        <link rel="stylesheet" href="../css/darkMode.css">
        <script type="text/javascript" src="../JavaScript/darkMode.js"></script>
        <script src="https://kit.fontawesome.com/107c433e36.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../JavaScript/ValidaFormularioCriarConta.js"></script>
    <body>
        <?php require './header.php'; ?>
        <div id="botaoDark">
            <button class="buttonDark buttonDark1" onclick="myFunction()">Dark Mode</button>
        </div>
        <div class="container">

            <?php
            require_once '../classes/Usuario.class.php';
            $usuario = new Usuario();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Armazena as mensagens de erro
                $arrayErro = array(
                    "geral" => NULL,
                    "sucesso" => NULL,
                    "nome" => NULL,
                    "email" => NULL,
                    "senha" => NULL,
                    "telefone" => NULL
                );
                
                // Verifica se todos os campos foram preenchidos
                if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['telefone'])) {
                    if ($usuario->setNome($_POST['nome'] , $arrayErro) &&
                        $usuario->setEmail($_POST['email'] , $arrayErro) &&
                        $usuario->setSenha($_POST['senha'] , $arrayErro) &&
                        $usuario->setTelefone($_POST['telefone'] , $arrayErro)) {

                        $usuario->cadastrarUsuario($arrayErro);
                    }
                } else {
                    $arrayErro['geral'] = "Todos os campos são requeridos!";
                }
            }
            ?>
            <div class = "Cadastro">
                <h1 id="itens">Cadastrar</h1>

                <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                    <span class="erroGeral"><?php if(isset($arrayErro['geral'])) echo $arrayErro['geral']."<br>"; ?></span>

                    <span class="sucesso"><?php if(isset($arrayErro['sucesso'])) echo $arrayErro['sucesso']."<br>"; ?></span>

                    <div id="itens">
                        <label for="nome">&nbsp&nbsp&nbspNome</label>
                        <input id="nome" type="text" name="nome" value=""> <br>
                        <span class="erro"> <?php if (isset($arrayErro['nome'])) echo $arrayErro['nome']."<br>"; ?></span>
                    </div>
                    <div id="itens">
                        <label for="email">&nbsp&nbsp&nbspEmail</label>
                        <input id="email" type="text" name="email" value=""> <br>
                        <span class="erro"> <?php if (isset($arrayErro['email'])) echo $arrayErro['email']."<br>"; ?></span>
                    </div>
                    <div id="itens">
                        <label for="senha">&nbsp&nbspSenha</label>
                        <input id="senha" type="password" name="senha" value=""> <br>
                        <span class="erro"> <?php if (isset($arrayErro['senha'])) echo $arrayErro['senha']."<br>"; ?></span>
                    </div>
                    <div id="itens">
                        <label for="telefone">Telefone</label>
                        <input id="telefone" type="text" name="telefone" value=""> <br>
                        <span class="erro"> <?php if (isset($arrayErro['telefone'])) echo $arrayErro['telefone']."<br>"; ?></span>
                    </div>
                    <div id="botao">
                    <input class="button button1" type="submit" name="submit" onclick="validar();" value="Enviar" >
                    </div>
                </form>
            </div>
        </div>

        <?php require './footer.php' ?>
    </body>
</html>