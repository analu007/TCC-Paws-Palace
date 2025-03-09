//#region imagem
const inputfile = document.getElementById('inputfile');
const btnalt = document.getElementById('btnaltimg');
const imgconta = document.getElementById('imgcontabox');

btnalt.addEventListener('click', () => {
    inputfile.click();
});


inputfile.addEventListener('change', function() {
    const file = inputfile.files[0]; 
    if (file) {
        const reader = new FileReader(); 

        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result; 

            imgconta.innerHTML = '';
            imgconta.appendChild(img);
        };

        reader.readAsDataURL(file); 
    }
});
//#endregion

//#region botoes
var btnlogo = document.getElementById("btnlogo");


btnlogo.addEventListener("click", function(){
    window.open("index.html", "_self")

});
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

//#region contato

function sobre(){
    var container = document.querySelector(".subfooter");

        container.style.display = 'flex';
        document.getElementById("locationsobre").scrollIntoView(true);
    };
   
   //#endregion