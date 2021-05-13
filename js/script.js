/************************
 * GUARDAR PREFERENCIAS DEL TEMA DEL USUARIO
 */
const root = document.documentElement;
const logo=document.getElementById('logo');
let user={
    colorbg:''
};
cargar_titulacion();
function cargar_titulacion(){
    const data = new FormData();
    fetch('ajax/cargar_titulacion.php',{
        method: "POST",
        body: data
    }).then(response => response.json())
    .then(data => {
        if(data!=null){
            var div=document.createElement(div);
            div.innerHTML=data;
            var padre=document.getElementById('agregar_titulacion').parentElement;
            padre.insertBefore(div,document.getElementById('agregar_titulacion'));
        }
    });
}

//Funcion para cambiar colores del tema
const changeThemeUser = (user) => {
   
    if (user.colorbg == 'default-theme') {
       
        root.style.setProperty('--main-color', '#258FE8');
        root.style.setProperty('--second-color', '#E8C11A');
       
        root.style.setProperty('--light-color', '#FFF');
        root.style.setProperty('--dark-color', '#828282');
        logo.setAttribute('src','assets/images/logo.PNG');
    }else if(user.colorbg=='second-theme'){
        
        root.style.setProperty('--main-color', '#E8C11A');
        root.style.setProperty('--second-color', '#258FE8');
        
        root.style.setProperty('--light-color', '#828282');
        root.style.setProperty('--dark-color', '#FFF');
        logo.setAttribute('src','assets/images/logo-yellow.PNG');
        checkbox.checked = true;
    } 
};

//Si no hay un tema guardado
if(!localStorage.getItem('user')) {
    //Establecemos el valor por defecto y o guardamos en localStorage
    user.colorbg='default-theme';
    localStorage.setItem('user',JSON.stringify(user));
}else{
    user.colorbg=JSON.parse(localStorage.getItem('user')).colorbg;
} 
changeThemeUser(user);

//Evento para marcar el tema de color
checkbox.addEventListener('change', (e) => {
	if (!e.target.checked) {
        user.colorbg='default-theme';
        
	} else {
        user.colorbg='second-theme';
	}
    localStorage.setItem('user',JSON.stringify(user))
    changeThemeUser(user);
});

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
    let curriculum=document.getElementById('curriculum');
    let foto=document.getElementById('foto');
    let titulaciones=document.getElementsByClassName("select-titulacion");
    let arrayidtitulaciones=[];
    for (titulacion of titulaciones) {
        arrayidtitulaciones.push(titulacion.value);
      }
      
    
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
    if(!validarNumero(telefono.value) && telefono.value!=""){
        error=true;
        telefono.classList.add('errorform');
    }else{
        telefono.classList.remove('errorform');
    }
    if(!validarDNI(dni.value) && dni.value!=""){
        error=true;
        dni.classList.add('errorform');
    }else{
        dni.classList.remove('errorform');
    }
    //validar titulaciones
    if(validarTitulaciones(titulaciones)!=true){
        error=true;
        for(errorselect of validarTitulaciones(titulaciones)){
            errorselect.classList.add('errorform');
            // errorselect.id.classList.add('errorform');
        }
    }else{
        for(titulacion of titulaciones){
            titulacion.classList.remove('errorform');
        }
    }
    if(error==true){
        //muestro mensaje de toast de error
        toastr.error('Compruebe los campos');
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
        data.append('curriculum',curriculum.value);
        data.append('foto',foto.value);
        data.append('titulaciones', arrayidtitulaciones);

        fetch('ajax/guardar_titulado.php',{
            method: "POST",
            body: data
        }).then(res=> res.text())
        .then(data=> {
                if(data){
                    //datos actualizados correctamente
                    toastr.success('Datos Guardados');
                }else{
                    //datos no actualizados
                    toastr.error('Datos incorrectos');
                    
                }
            });
    }
});

let eliminarTitulacion=document.querySelector('.detalle-titulado.select');
    eliminarTitulacion.addEventListener('click',(e)=>{
        e.preventDefault();
        const data = new FormData();
        data.append('idtitulacion',e.target.nextElementSibling.getAttribute('id_titulacion'));
        e.target.parentElement.remove();
        //borrar titulacion del usuario
        fetch('ajax/eliminar_titulacion.php',{
            method: "POST",
            body: data
        }).then(response => response.json())
    });


let btn_agregar_titulacion=document.getElementById('agregar_titulacion').addEventListener('click',(e)=>{
    e.preventDefault();
    const data = new FormData();
    data.append('i',1);
    fetch('ajax/agregar_titulacion.php',{
        method: "POST",
        body: data
    }).then(response => response.json())
    .then(data => {
        var div=document.createElement(div);
        div.innerHTML=data;
        e.target.parentElement.insertBefore(div,document.getElementById('agregar_titulacion'));
    });

});
