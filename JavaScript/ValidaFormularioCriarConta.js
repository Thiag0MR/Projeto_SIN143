
//Valida cada campo do formulário
function validar() {
    //pega o valor de cada campo
    var nome = document.getElementById("nome");
    var email = document.getElementById("email");
    var senha = document.getElementById("senha");
    var telefone = document.getElementById("telefone");
    
    var nome1 = 0;
    var email1 = 0;
    var senha1 = 0;
    var telefone1 = 0;
    
    //Verifica nome, nome1 != 0 -> erro
    for(var i = 0;  i < nome.length; i++){
        if(nome[i] == ' ' || nome[i] == 'a' || nome[i] == 'b' || nome[i] == 'c' ||nome[i] == 'd' || nome[i] == 'e' || nome[i] == 'f' || nome[i] == 'g' ||
        nome[i] == 'h' || nome[i] == 'i' || nome[i] == 'j' || nome[i] == 'k' ||nome[i] == 'l' || nome[i] == 'm' || nome[i] == 'n' || nome[i] == 'o' ||
        nome[i] == 'p' || nome[i] == 'q' || nome[i] == 'r' || nome[i] == 's' ||nome[i] == 't' || nome[i] == 'u' || nome[i] == 'v' || nome[i] == 'v' ||
        nome[i] == 'x' || nome[i] == 'y' || nome[i] == 'w' || nome[i] == 'z'|| nome[i] == 'A' || nome[i] == 'B' || nome[i] == 'C' ||nome[i] == 'D' || nome[i] == 'E' || nome[i] == 'F' || nome[i] == 'G' ||
        nome[i] == 'H' || nome[i] == 'I' || nome[i] == 'J' || nome[i] == 'K' ||nome[i] == 'L' || nome[i] == 'M' || nome[i] == 'N' || nome[i] == 'O' ||
        nome[i] == 'P' || nome[i] == 'Q' || nome[i] == 'R' || nome[i] == 'S' ||nome[i] == 'T' || nome[i] == 'U' || nome[i] == 'v' || nome[i] == 'V' ||
        nome[i] == 'X' || nome[i] == 'Y' || nome[i] == 'W' || nome[i] == 'Z'){
            
        }else{
            nome1++;
        }
    }
    //verifica email email!= 0 -> erro
    for(var i = 0;  i < email.length; i++){
        if(email[i] == ' ' || email[i] == 'a' || email[i] == 'b' || email[i] == 'c' ||email[i] == 'd' || email[i] == 'e' || email[i] == 'f' || email[i] == 'g' ||
        email[i] == 'h' || email[i] == 'i' || email[i] == 'j' || email[i] == 'k' ||email[i] == 'l' || email[i] == 'm' || email[i] == 'n' ||email[i] == 'o' ||
        email[i] == 'p' || email[i] == 'q' || email[i] == 'r' || email[i] == 's' ||email[i] == 't' || email[i] == 'u' || email[i] == 'v' ||email[i] == 'v' ||
        email[i] == 'x' || email[i] == 'y' || email[i] == 'w' || email[i] == 'z' ||email[i] == 'A' || email[i] == 'B' || email[i] == 'C' ||email[i] == 'D' || email[i] == 'E' || email[i] == 'F' || email[i] == 'G' ||
        email[i] == 'H' || email[i] == 'I' || email[i] == 'J' || email[i] == 'K' ||email[i] == 'L' || email[i] == 'M' || email[i] == 'N' ||email[i] == 'O' ||
        email[i] == 'P' || email[i] == 'Q' || email[i] == 'R' || email[i] == 'S' ||email[i] == 'T' || email[i] == 'U' || email[i] == 'v' ||email[i] == 'V' ||
        email[i] == 'X' || email[i] == 'Y' || email[i] == 'W' || email[i] == 'Z'){
            
        }else{
            email1++;
        }
        if(!(email.match(/@/))){
            email1++;
        }
    }
    //verifica senha, senha != 0 -> erro
    for(var i = 0;  i < senha.length; i++){
        if(senha.length < 3){
            senha1++;
        }
        if(senha[i] == '\\' || senha[i] == '/' || senha[i] == '|' ){
            senha1++;
        }
    }
    //verifica telefone, senha != 0 -> erro
    for(var i = 0;  i < telefone.length; i++){
        if(telefone.length > 11 || telefone.length < 11){
            telefone1++;
        }
        if(telefone[i] != 0 ||telefone[i] != 1 ||telefone[i] != 2 ||telefone[i] != 3 ||telefone[i] != 4 ||telefone[i] != 5 ||telefone[i] != 6 ||telefone[i] != 7 ||telefone[i] != 8 ||telefone[i] != 9 ){
            telefone++;
        }
        
    }


    if (nome1 != 0){
        alert("Nome invalido");
        nome.focus();
        return;
    }
    if (senha1 != 0){
        alert("Senha invalida");
        senha.focus();
        return;
    }
    if (email1 != 0){
        alert("Email invalido");
        email.focus();
        return;
    }
    if (telefone1 != 0){
        alert("Telefone invalido");
        telefone.focus();
        return;
    }
    alert("Cadastro realizado! enviado!");
    formulario.submit();
}
