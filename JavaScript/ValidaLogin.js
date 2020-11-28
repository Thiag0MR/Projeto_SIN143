function validar() {
    //pega o valor de cada campo
    var email = document.getElementById("email").value;
    var senha = document.getElementById("senha").value;
    
    var email1 = 0;
    var senha1 = 0;
    var vazio = 0;

    //verifica email email!= 0 -> erro
    for(var i = 0;  i < email.length; i++){
        if(email[i] == ' ' || email[i] == 'a' || email[i] == 'b' || email[i] == 'c' ||email[i] == 'd' || email[i] == 'e' || email[i] == 'f' || email[i] == 'g' ||
        email[i] == 'h' || email[i] == 'i' || email[i] == 'j' || email[i] == 'k' ||email[i] == 'l' || email[i] == 'm' || email[i] == 'n' ||email[i] == 'o' ||
        email[i] == 'p' || email[i] == 'q' || email[i] == 'r' || email[i] == 's' ||email[i] == 't' || email[i] == 'u' || email[i] == 'v' ||email[i] == 'v' ||
        email[i] == 'x' || email[i] == 'y' || email[i] == 'w' || email[i] == 'z' ||email[i] == 'A' || email[i] == 'B' || email[i] == 'C' ||email[i] == 'D' || email[i] == 'E' || email[i] == 'F' || email[i] == 'G' ||
        email[i] == 'H' || email[i] == 'I' || email[i] == 'J' || email[i] == 'K' ||email[i] == 'L' || email[i] == 'M' || email[i] == 'N' ||email[i] == 'O' ||
        email[i] == 'P' || email[i] == 'Q' || email[i] == 'R' || email[i] == 'S' ||email[i] == 'T' || email[i] == 'U' || email[i] == 'v' ||email[i] == 'V' ||
        email[i] == 'X' || email[i] == 'Y' || email[i] == 'W' || email[i] == 'Z' ||email[i] == '@' || email[i] == '.'){

        }else{
            email1++;
        }
        if(!(email.match(/@/))){
            email1++;
        }
        if(!(email.match(/./))){
            email1++;
        }
    }
    //verifica senha, senha != 0 -> erro
    for(var i = 0;  i < senha.length; i++){
        if(senha.length < 6){
            senha1++;
        }
        if(senha[i] == '\\' || senha[i] == '/' || senha[i] == '|' ){
            senha1++;
        }
    }

    //Verifica se os campos estão vazios
    if(senha.length == 0 ||email.length == 0){
        vazio++;
    }

    if (vazio != 0){
        alert("Campos vazios não são permitidos!");
    }

    if (senha1 != 0){
        alert("Senha invalida");
        senha.focus();
    }
    if (email1 != 0){
        alert("Email invalido");
        email.focus();
    }
    
    if(erro == 0){
        alert(erro);
    formulario.submit();
    }


}