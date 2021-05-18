
let guardar_empresa=document.getElementById("guardar_empresa");
guardar_empresa.addEventListener('click',(e)=>{
     e.preventDefault();
    //comprobar datos
    let idusuario=document.getElementById('idusuario');
    let nombre=document.getElementById('nombre');
    let email=document.getElementById('email');
    let direccion=document.getElementById('direccion');
    let telefono=document.getElementById('telefono');
    let logo=document.getElementById('logoinput');
   
    error=false;
    if(!validarEmail(email.value)){
        error=true;
        email.classList.add('errorform');
    }else{
       email.classList.remove('errorform');
    }
    if(nombre.value==''){
        error=true;
        nombre.classList.add('errorform');
    }else{
        nombre.classList.remove('errorform');
    }
    if(!validarNumero(telefono.value)){
        error=true;
        telefono.classList.add('errorform');
    }else{
        telefono.classList.remove('errorform');
    }
    
    if(direccion.value==''){
        error=true;
        direccion.classList.add('errorform');
    }else{
        direccion.classList.remove('errorform');
    }
    
    if(logo.getAttribute('fotocargada')!='true' && logo.value==''){
        
        error=true;
        logo.parentElement.parentElement.classList.add('errorform');
    }else{
        logo.parentElement.parentElement.classList.remove('errorform');
    }
   
    
    if(error==true){
        //muestro mensaje de toast de error
        toastr.error('Comprueba los campos','Error');
    }else{
        //actualizo el titulado
        //guardo los datos
        const data = new FormData();
        
        data.append('idusuario',idusuario.value);
        data.append('nombre',nombre.value);
        data.append('email',email.value);
        data.append('direccion',direccion.value);
        
        data.append('telefono',telefono.value);
        
        data.append('logo',logo.files[0]);
       
        
       

        fetch('ajax/guardar_empresa.php',{
            method: "POST",
            body: data
        }).then(res=> res.json())
        .then(data=> {
                if(data.status=='ok'){
                    //datos actualizados correctamente
                    toastr.success('Guardado')
                }else{
                    //datos no actualizados
                    if(data.email=='error'){
                        email.classList.add('errorform');
                    }
                    toastr.error('Datos incorrectos');
                    
                }
            });
    }
});


let logoinput=document.getElementById('logoinput');
let dropZoneLogo = document.getElementById('drop-zone-logo');
let imagenlogo=document.getElementById('imagen-logo');

//Evento que se dispara al hacer click en la zona del file
dropZoneLogo.addEventListener('click', (e) =>{
   logoinput.click()
}); 



 logoinput.addEventListener('change',(e)=>{
    e.preventDefault();
    
    var archivo=e.target.files;
    comprobarArchivo(archivo);
});
 


dropZoneLogo.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropZoneLogo.classList.add('drop-zone--active');
});

dropZoneLogo.addEventListener('dragleave', (e) => {
    e.preventDefault();
    dropZoneLogo.classList.remove('drop-zone--active');
});
//Cogemos los archivos
dropZoneLogo.addEventListener('drop', (e) => {
    e.preventDefault();
    var archivos = e.dataTransfer.files;
    comprobarArchivo(archivos);
});


//Comprobamos el tipo de archivo y los cargamos
function comprobarArchivo(archivo) {
    for (const a of archivo) {
        
        if (a.type.match('image.*')) {
            var reader = new FileReader();
            reader.addEventListener('load', (e) => {
                cargaImagen(e, a);
            });
            reader.readAsDataURL(a);
        }else{
            toastr.error('Solo archivos de imagen','No se ha podido cargar');
        }
    }
}
//Cargamos un archivo en la pagina
function cargaImagen(e, archivo) {
    imagenlogo.innerHTML='';
    div = document.createElement('div');
    div.setAttribute('class', 'img-fotoperfil');
    img = document.createElement('img');
    img.setAttribute('src', e.target.result);
    img.setAttribute('class',' img-fluid');
   
    
    
    div.appendChild(img);
    
    imagenlogo.appendChild(div);
}

let guardarEmpleo=document.getElementById('guardar_empleo');
guardarEmpleo.addEventListener('click',(e)=>{
    e.preventDefault();
    errorEmpleo=false;
    var descripcion=document.getElementById('descripcion');
    var familia=document.getElementById('familia');
    var idempleo=document.getElementById('idempleo');
    if(descripcion.value==''){
        errorEmpleo=true;
        descripcion.classList.add('errorform');
    }else{
        descripcion.classList.remove('errorform');
    }
    if(familia.value=='0'){
        errorEmpleo=true;
        familia.classList.add('errorform');
    }else{
        familia.classList.remove('errorform');
    }
   

    if(errorEmpleo==true){
        //muestro mensaje de toast de error
        toastr.error('Comprueba los campos','Error');
    }else{
        
        //guardo los datos
        const data = new FormData();
        
        data.append('descripcion',descripcion.value);
        data.append('familia',familia.value);
        data.append('idempleo',idempleo.value);

        fetch('ajax/guardar_empleo.php',{
            method: "POST",
            body: data
        }).then(res=> res.json())
        .then(data=> {
                if(data.status=='ok'){
                    //datos actualizados correctamente
                    toastr.success('Guardado')
                    //borrar formulario y cargar las ofertas en la pagina princpal
                    document.getElementById('form_guardar_empleo').reset();
                    $('#exampleModal').modal('hide');
                    document.getElementById('idempleo').value='';
                    cargar_tabla_empleos();
                }else{
                   toastr.error('No se ha podido guardar el empleo');
                   document.getElementById('form_guardar_empleo').reset();
                }
            });
        
       
    }

});

$('#exampleModal').on('hidden.bs.modal', function (event) {
    document.getElementById('form_guardar_empleo').reset();
  });
var tabla=document.getElementById('tabla_empleos');
cargar_tabla_empleos();
function cargar_tabla_empleos(){
    tabla.innerHTML='';
    const data = new FormData();
    fetch('ajax/cargar_empleos.php',{
        method: "POST",
        body: data
    }).then(res=> res.json())
    .then(data=> {
        
            if(data.length!=0){
               
                let fragment;;
                fragment='<thead>'+
                            '<tr>'+
                                '<th scope="col">Ver Inscritos</th>'+
                                '<th scope="col">Familia</th>'+
                                '<th scope="col">Descripcion</th>'+
                                '<th scope="col">Fecha de publicación</th>'+
                                '<th scope="col">Editar</th>'+
                                '<th scope="col">Eliminar</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>';

                data.forEach(empleo => {
                
                    fragment+='<tr>'+
                                '<th scope="row"><a href="'+empleo.id+'">Inscritos</a></th>'+
                                '<td>'+empleo.familia+'</td>'+
                                '<td>'+empleo.descripcion.substr(0,50)+'</td>'+
                                '<td>'+empleo.fecha_publicacion+'</td>'+
                                '<td><a class="editar_empleo" href="'+empleo.id+'"><i class="fas fa-edit"></i></a></td>'+
                                '<td><a class="eliminar_empleo" href="'+empleo.id+'"><i class="fas fa-trash-alt"></i></a></td>'+
                            '</tr>';
                    
                });
                tabla.innerHTML=fragment;            
            }
        });
    
}
tabla.addEventListener('click',(e)=>{
    e.preventDefault();

    if(e.target.parentElement.getAttribute('class')=='eliminar_empleo'){
        const data = new FormData();
        data.append('idempleo',e.target.parentElement.getAttribute('href'));
        fetch('ajax/eliminar_empleo.php',{
            method: "POST",
            body: data
        }).then(res=> res.json())
        .then(data=> {
                if(data.status=='ok'){
                    //datos eliminados correctamente
                    toastr.success('Eliminado')
                    cargar_tabla_empleos();

                }else{
                    toastr.error('Error al borrar la oferta de empleo');
                }
            });
    }else if(e.target.parentElement.getAttribute('class')=='editar_empleo'){
       //abrir modal
       const data = new FormData();
       data.append('idempleo',e.target.parentElement.getAttribute('href'));
      
       fetch('ajax/editar_empleo.php',{
        method:"POST",
        body:data
       }).then(res=>res.json()).then(data=>{
            if(data.status=='ok'){
                $('#exampleModal').modal('show');
                document.getElementById('descripcion').value=data.descripcion;
                document.getElementById('familia').value=data.idfamilia;
                document.getElementById('idempleo').value=data.idempleo;
            }
       });
    }
});



    









