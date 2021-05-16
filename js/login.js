const formLogin=document.getElementById('formLogin');
const msjalert=document.getElementById('alert');
var msjerror='';  

//Enviamos el formulario de login
formLogin.addEventListener('submit',(e)=>{
    e.preventDefault();
    //recogemos los datos  
    const datosForm=new FormData(formLogin);
    //Validamos el usuario y la contraseña
    if(validarEmail(datosForm.get('email'))==true && validarContrasena(datosForm.get('contrasena'))==true){
       
        loginAjax(datosForm);
    }else{
        msjalert.innerText=msjerror;
       
        
    }
})

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

  
 