<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastrar</title>
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
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Armazena as mensagens de erro
                $arrayErro = Array(
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

                        $usuario->cadastrar($arrayErro);
                    }
                } else {
                    $arrayErro['geral'] = "Todos os campos são requeridos!";
                }
            }
            ?>

            <h1>Cadastrar</h1>

            <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                <span class="erroGeral"><?php if(isset($arrayErro['geral'])) echo $arrayErro['geral']."<br>"; ?></span>

                <span class="sucesso"><?php if(isset($arrayErro['sucesso'])) echo $arrayErro['sucesso']."<br>"; ?></span>


                <label for="nome">Nome</label>
                <input type="text" name="nome" value=""> <br>
                <span class="erro"> <?php if (isset($arrayErro['nome'])) echo $arrayErro['nome']."<br>"; ?></span>

                <label for="email">Email</label>
                <input type="text" name="email" value=""> <br>
                <span class="erro"> <?php if (isset($arrayErro['email'])) echo $arrayErro['email']."<br>"; ?></span>

                <label for="senha">Senha</label>
                <input type="password" name="senha" value=""> <br>
                <span class="erro"> <?php if (isset($arrayErro['senha'])) echo $arrayErro['senha']."<br>"; ?></span>

                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" value=""> <br>
                <span class="erro"> <?php if (isset($arrayErro['telefone'])) echo $arrayErro['telefone']."<br>"; ?></span>

                <input type="submit" name="submit" value="Enviar">
            </form>
        </div>

        <?php require './footer.php' ?>
    </body>
</html>
