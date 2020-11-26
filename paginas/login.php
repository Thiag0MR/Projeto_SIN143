<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/header.css">
        <script src="https://kit.fontawesome.com/107c433e36.js" crossorigin="anonymous"></script>
    <body>
        <?php
            require '../config.php';
            require './header.php'
        ?>

        <div class="container">
            <?php
            require '../classes/Usuario.class.php';
            $usuario = new Usuario();
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Armazena as mensagens de erro
                $arrayErro = Array(
                    "geral" => NULL,
                );

                // Verifica se todos os campos foram preenchidos
                if (!empty($_POST['email']) && !empty($_POST['senha'])) {
                    if ($usuario->login($_POST['email'], $_POST['senha'])){
                        echo "
                            <script type='text/javascript'>window.location.href='../index.php'</script>
                        ";
                    } else {
                        $arrayErro['geral'] = "Email ou senha inválidos";
                    }

                } else {
                    $arrayErro['geral'] = "Todos os campos são requeridos!";
                }
            }
            ?>

            <h1>Login</h1>

            <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                <span class="erroGeral"><?php if(isset($arrayErro['geral'])) echo $arrayErro['geral']."<br>"; ?></span>

                <label for="email">Email</label>
                <input type="text" name="email" value=""> <br>
                <span class="erro"> <?php if (isset($arrayErro['email'])) echo $arrayErro['email']."<br>"; ?></span>

                <label for="senha">Senha</label>
                <input type="password" name="senha" value=""> <br>
                <span class="erro"> <?php if (isset($arrayErro['senha'])) echo $arrayErro['senha']."<br>"; ?></span>

                <input type="submit" name="submit" value="Enviar">
                <span>Não tem uma conta ainda? <a href="./cadastrar.php"> Clique aqui</a> e crie uma</span>
            </form>
        </div>

        <?php require './footer.php' ?>
    </body>
</html>
