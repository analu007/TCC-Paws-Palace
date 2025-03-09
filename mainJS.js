//#region subheader

var btnclube = document.getElementById("btnclube");

btnclube.addEventListener("click", function(){
    window.open("clube.html", "_self");

});

var btnagendamento = document.getElementById("btnagendamento");

btnagendamento.addEventListener("click", function(){
    window.open("agendamento.html", "_self");

});

//#region contato

 function sobre(){

 var container = document.querySelector(".subfooter");


     container.style.display = 'flex';
     document.getElementById("locationsobre").scrollIntoView(true);
 };

//#endregion


//#region location
document.querySelectorAll('card-item').forEach(card => {

  card.addEventListener('click', () => {

    const id = card.id;
    window.location.href = 'produto.html?id=' + id;

  });

});

//#endregion