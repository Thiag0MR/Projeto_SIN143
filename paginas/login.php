<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/Login.css">
        <link rel="stylesheet" href="../css/darkMode.css">
        <script type="text/javascript" src="../JavaScript/darkMode.js"></script>
        <script src="https://kit.fontawesome.com/107c433e36.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../JavaScript/ValidaLogin.js"></script>
    <body>
        <?php require './header.php'; ?>
        <div id="botaoDark">
            <button class="buttonDark buttonDark1" onclick="myFunction()">Dark Mode</button>
        </div>
        <div class="container">
            <?php
            require_once '../classes/Usuario.class.php';
            $usuario = new Usuario();
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Armazena as mensagens de erro
                $arrayErro = array(
                    "geral" => NULL,
                );

                // Verifica se todos os campos foram preenchidos
                if (!empty($_POST['email']) && !empty($_POST['senha'])) {
                    if ($usuario->login($_POST['email'], $_POST['senha'])){
                        // Redirecionamento:
                        echo "
                            <script type='text/javascript'>window.location.href='./anunciosUsuario.php'</script>
                        ";
                    } else {
                        $arrayErro['geral'] = "Email ou senha inválidos";
                    }

                } else {
                    $arrayErro['geral'] = "Todos os campos são requeridos!";
                }
            }
            ?>
            <div class="Cadastro" class="container">
                <h1 id="itens">Login</h1>

                <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                    <span class="erroGeral"><?php if(isset($arrayErro['geral'])) echo $arrayErro['geral']."<br>"; ?></span>
                    <div id="itens">
                        <label for="email">Email</label>
                        <input id="email" type="text" name="email" value=""> <br>
                        <span class="erro"> <?php if (isset($arrayErro['email'])) echo $arrayErro['email']."<br>"; ?></span>
                    </div>
                    <div id="itens">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" value=""> <br>
                    </div>
                    <div id="botao">
                        <span class="erro"> <?php if (isset($arrayErro['senha'])) echo $arrayErro['senha']."<br>"; ?></span>
                        <input class="button button1" type="submit" name="submit" onclick="validar();" value="Enviar">
                    </div>
                    
                        <span><br> <h4 id="itens">Não tem uma conta ainda?</h4>  <a href="./cadastrar.php"> <br><h4 id="itens">Clique aqui</a> e crie uma</h4></span>
                    
                    
                </form>
            </div>
        </div>

        <?php require './footer.php' ?>
    </body>
</html>
