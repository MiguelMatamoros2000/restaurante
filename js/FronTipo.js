//Capturamos los compnentes que esten dedtro del formulario
var formulario = document.getElementById('Formulario');

//eventos capturados dentro del formulario
formulario.addEventListener('submit', function(e){
    e.preventDefault();//rvita que se ejecute en el navegaador
//los fuction son funciones parecidas a lo que hacemos en java
    console.log("me diste un this.click");

    //nueva informacion del formulario
    var datos = new FormData(formulario);

    fetch('ConsultasTipoComida.php',{
        method: 'POST',
        body: datos
    })
        .then(res => res.json())
        .then(data => {
            console.log(data)
        })

})

