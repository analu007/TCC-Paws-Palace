//#region alttela
var btnfazerlogin = document.querySelector("#fazerlogin");
var btnfazercadastro = document.querySelector("#fazercadastro");

var body = document.querySelector("body");



btnfazerlogin.addEventListener("click", function () {
    body.className = "login";
});


btnfazercadastro.addEventListener("click", function () {
    body.className = "cadastro";

});

//#endregion

//#region pass
function mostrarsenha1(){
    var inputPass1 = document.getElementById("senha1");

    var btnlh1 = document.getElementById("btnsenha1");

    if(inputPass1.type === 'password'){
        inputPass1.setAttribute('type','text');
        btnlh1.classList.replace('bi-eye', 'bi-eye-slash');

    }else{
        inputPass1.setAttribute('type','password');
        btnlh1.classList.replace('bi-eye-slash','bi-eye');

    }

    
}

function mostrarsenha2(){
    var inputPass2 = document.getElementById("senha2");

    var btnlh2 = document.getElementById("btnsenha2");

    if(inputPass2.type === 'password'){
        inputPass2.setAttribute('type','text');
        btnlh2.classList.replace('bi-eye', 'bi-eye-slash');

    }else{
        inputPass2.setAttribute('type','password');
        btnlh2.classList.replace('bi-eye-slash','bi-eye');

    }
}


function mostrarcsenha(){
    var inputPass3 = document.getElementById("csenha");

    var btnlh3 = document.getElementById("btncsenha");

    if(inputPass3.type === 'password'){
        inputPass3.setAttribute('type','text');
        btnlh3.classList.replace('bi-eye', 'bi-eye-slash');

    }else{
        inputPass3.setAttribute('type','password');
        btnlh3.classList.replace('bi-eye-slash','bi-eye');

    }

}
//#endregion

//#region formatacao
 //#region cpf
    const cpfinput = document.getElementById("cpf");

    cpfinput.addEventListener('keypress', () => {
        let inputlength = cpfinput.value.length;

        if (inputlength === 3 || inputlength === 7){
            cpfinput.value += '.';
        }else if (inputlength === 11){
            cpfinput.value += '-';
        }


});
 //#endregion

  //#region tel
  const telinput = document.getElementById("telefone");

  telinput.addEventListener('keypress', () => {
    let inputlength = telinput.value.length;

    if (inputlength === 2){
        telinput.value += ' ';
    }else if(inputlength === 8){
        telinput.value += '-';
    }

  });


  //#endregion
//#endregion