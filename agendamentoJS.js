//#region imagem
const inputfile = document.getElementById('inputfile');
const btnalt = document.getElementById('altimgpet');
const imgpet = document.getElementById('imgpetbox');

// Quando o botão é clicado, dispara o clique no input de arquivo
btnalt.addEventListener('click', () => {
    inputfile.click();
});

// Quando um arquivo é selecionado
inputfile.addEventListener('change', function() {
    const file = inputfile.files[0];
    if (file) {
        const reader = new FileReader(); 

        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;

            imgpet.innerHTML = '';
            imgpet.appendChild(img);
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

//#region contato

 function sobre(){
    var container = document.querySelector(".subfooter");
   
        container.style.display = 'flex';
        document.getElementById("locationsobre").scrollIntoView(true);
    };
   
   
//#endregion

//#region formatacao
 //#region cpf
 const cpfinput = document.getElementById("cpfresp");

 cpfinput.addEventListener('keypress', () => {
     let inputlength = cpfinput.value.length;

     if (inputlength === 3 || inputlength === 7){
         cpfinput.value += '.';
     }else if (inputlength === 11){
         cpfinput.value += '-';
     }


});
//#endregion

//#endregion