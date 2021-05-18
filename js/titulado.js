let guardar_titulado=document.getElementById("guardar_titulado");
guardar_titulado.addEventListener('click',(e)=>{
     e.preventDefault();
    //comprobar datos
    let idusuario=document.getElementById('idusuario');
    let nombre=document.getElementById('nombre');
    let apellidos=document.getElementById('apellidos');
    let email=document.getElementById('email');
    let direccion=document.getElementById('direccion');
    let dni=document.getElementById('dni');
    let telefono=document.getElementById('telefono');
    let curriculum=document.getElementById('curriculuminput');
    let foto=document.getElementById('fotoinput');
    let titulacion=document.getElementById('titulacion');
   
    error=false;
    if(!validarEmail(email.value)){
        error=true;
        email.classList.add('errorform');
    }else{
       email.classList.remove('errorform');
    }
    if(!validarTexto(nombre.value)){
        error=true;
        nombre.classList.add('errorform');
    }else{
        nombre.classList.remove('errorform');
    }
    if(!validarTexto(apellidos.value)){
        error=true;
        apellidos.classList.add('errorform');
    }else{
        apellidos.classList.remove('errorform');
    }
    if(!validarNumero(telefono.value)){
        error=true;
        telefono.classList.add('errorform');
    }else{
        telefono.classList.remove('errorform');
    }
    if(!validarDNI(dni.value)){
        error=true;
        dni.classList.add('errorform');
    }else{
        dni.classList.remove('errorform');
    }
    if(direccion.value==''){
        error=true;
        direccion.classList.add('errorform');
    }else{
        direccion.classList.remove('errorform');
    }
    if(curriculum.getAttribute('fotocargada')!='true' && curriculum.value==''){
        
        error=true;
        curriculum.parentElement.parentElement.classList.add('errorform');
    }else{
        curriculum.parentElement.parentElement.classList.remove('errorform');
    }
    if(foto.getAttribute('fotocargada')!='true' && foto.value==''){
        
        error=true;
        foto.parentElement.parentElement.classList.add('errorform');
    }else{
        foto.parentElement.parentElement.classList.remove('errorform');
    }
    if(titulacion.value==0){
        error=true;
        titulacion.classList.add('errorform');
    }else{
        titulacion.classList.remove('errorform');
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
        data.append('apellidos',apellidos.value);
        data.append('email',email.value);
        data.append('direccion',direccion.value);
        data.append('dni',dni.value);
        data.append('telefono',telefono.value);
        data.append('curriculum',curriculum.files[0]);
        data.append('foto',foto.files[0]);
        data.append('titulacion', titulacion.value);
        
       

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

let fotoInput=document.getElementById('fotoinput');
let dropZoneFoto = document.getElementById('drop-zone-foto');
let imagenfoto=document.getElementById('imagen-foto');


let curriculumInput=document.getElementById('curriculuminput');
let imagencv=document.getElementById('imagen-cv');

dropZoneFoto.addEventListener('click', (e) =>{
    fotoInput.click()
}); 

fotoInput.addEventListener('change',(e)=>{
    e.preventDefault();
    
    var archivo=e.target.files;
    comprobarArchivo(archivo);
});



curriculumInput.addEventListener('change',(e)=>{
    e.preventDefault();
    var archivo=e.target.files;
    for (const a of archivo) {
        
        if (a.type.match('.pdf')) {
            var reader = new FileReader();
            reader.addEventListener('load', (e) => {
                imagencv.innerHTML='';
                
                div = document.createElement('div');
                div.setAttribute('class', 'img-fotoperfil');
                // enlace=document.createElement('a');
               
               
                // enlace.setAttribute('href',);
                
                img = document.createElement('img');
                img.setAttribute('src', 'assets/images/iconopdf.png');
                img.setAttribute('class',' img-fluid img-icon-pdf');
                p = document.createElement('p');
		        textp = document.createTextNode(a.name);
                p.appendChild(textp);
                // enlace.appendChild(img);
               
                
                div.appendChild(img);
                div.appendChild(p);
                
                imagencv.appendChild(div);
                
            });
            reader.readAsDataURL(a);
        }else{
            toastr.error('Solo archivos pdf','No se ha podido cargar');
        }
    }
    
});


dropZoneFoto.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropZoneFoto.classList.add('drop-zone--active');
});

dropZoneFoto.addEventListener('dragleave', (e) => {
    e.preventDefault();
    dropZoneFoto.classList.remove('drop-zone--active');
});
//Cogemos los archivos
dropZoneFoto.addEventListener('drop', (e) => {
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
    imagenfoto.innerHTML='';
    div = document.createElement('div');
    div.setAttribute('class', 'img-fotoperfil');
    img = document.createElement('img');
    img.setAttribute('src', e.target.result);
    img.setAttribute('class',' img-fluid');
   
    
    
    div.appendChild(img);
    
    imagenfoto.appendChild(div);
}
