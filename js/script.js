/************************
 * GUARDAR PREFERENCIAS DEL TEMA DEL USUARIO
 */
const root = document.documentElement;
const logo=document.getElementById('logo');
let user={
    colorbg:''
};

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
    let nombre=document.getElementById('nombre');
    let apellidos=document.getElementById('apellidos');
    let email=document.getElementById('email');
    let direccion=document.getElementById('direccion');
    let dni=document.getElementById('dni');
    let telefono=document.getElementById('telefono');
    let curriculum=document.getElementById('curriculum');
    let foto=document.getElementById('foto');
    let titulaciones=document.getElementsByClassName("select-titulado");
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
    if(error==true){
        //muestro mensaje de toast de error
        toastr.error('Compruebe los campos');
    }
});



function loginAjax($datos){
    //Hacemos las peticion ajax
    document.getElementById('loader').classList.toggle('hide');
    fetch('ajax/login.php',{
        method: "POST",
        body: $datos
    }).then(response => response.json())
    .then(data => {
        document.getElementById('loader').classList.toggle('hide');
            if(data.status=='ok'){
                if(data.tipousuario=='administrador'){
                    window.location.href="admin/dashboard.php";
                }else if(data.tipousuario=="empresa"){
                    window.location.href="empresa.php";
                }else if(data.tipousuario=='titulado'){
                    window.location.href="titulado.php";
                }
            }else{
                msjalert.innerText='Login Incorrecto'; 
                msjalert.classList.add('show');
                setTimeout(function(){ msjalert.classList.remove('show'); }, 3000);
            }
        })
        .catch(function(error){
            msjalert.innerText='No se pudo procesar la solicitud'; 
            msjalert.classList.add('show');
            setTimeout(function(){ msjalert.classList.remove('show'); }, 3000);
    });
}
