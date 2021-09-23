$(document).ready(function(){

    listaTabla();
    listAmigos();
 



});

function listaTabla(){
    $.ajax({
        url:'tabla.php',
        type:'POST',
        success:function(e){
            let task =JSON.parse(e);
            let nuevo = '';

            task.forEach(a => {
                    nuevo +=`
                    <div class="card" style="width: 18rem;" edIdname="${a.name}" edIdlastname="${a.lastname}">
                        <div class="card-body">
                        <h5 class="card-title">${a.id}</h5>
                        <h5 class="card-title">${a.name}</h5>
                        <h5 class="card-title">${a.lastname}</h5>
                        <button class="btn btn-primary valida" >Validar</button>
                        </div>
                    </div>`
            });
            $('#lista-solicitudes').html(nuevo);

        }

    })    

 }

 function listAmigos(){

 $.ajax({
    url:'aceptados.php',
    type:'POST',
    success:function(e){
        let task =JSON.parse(e);
        let nuevo = '';

        task.forEach(a => {
                nuevo +=`<tr  edIdremove="${a.nombre}" edIdlastremove="${a.apellido}"> 
                    <td>${a.id}</td>
                    <td>${a.nombre}</td>
                    <td>${a.apellido}</td>
                    <td><button class="btn btn-danger elimina" >Eliminar</button></td>

                    </tr>`
        });
        $('#amigos').html(nuevo);

    }

})    

}

$(document).on('click','.valida',function(){
    let element1 = $(this)[0].parentElement.parentElement;
    let element2 = $(this)[0].parentElement.parentElement;
    console.log(element1);

    let nombre = $(element1).attr('edIdname');
    let apellido = $(element2).attr('edIdlastname');

    const datos = {
        nombre: nombre,
        apellido: apellido
    }

    $.post('enviados-solicitud.php',datos,function(){
        console.log(datos);
        listaTabla();
        listAmigos();   
    });
})

$(document).on('click','.elimina',function(){
    let element1 = $(this)[0].parentElement.parentElement;
    let element2 = $(this)[0].parentElement.parentElement;

    let nombre = $(element1).attr('edIdremove');
    let apellido = $(element2).attr('edIdlastremove');

    const datos = {
        nombre: nombre,
        apellido: apellido
    }
    $.post('eliminar-amigo.php',datos,function(){
        console.log(datos);
        listAmigos();   
    });
})


