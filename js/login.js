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
        msjalert.classList.remove('show');
        //Hacemos las peticion ajax
        fetch('ajax/login.php',{
            method: "POST",
            body: datosForm
        }).then(res=> res.text())
        .then(data=> {
                if(data==1){
                    //login correcto
                    //Ir al panel de administracion
                    window.location.href="admin/dashboard.php";
                }else{
                    msjalert.innerText='Contraseña erronea'; 
                    msjalert.classList.add('show');
                    setTimeout(function(){ msjalert.classList.remove('show'); }, 3000);
                }
            });
    }else{
        msjalert.innerText=msjerror;
        msjalert.classList.add('show');
        setTimeout(function(){ msjalert.classList.remove('show'); }, 3000);
    }
})

function validarEmail(email) {
    if(email!=""){
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
            msjerror="Email incorrecto";
            return false;
        }else{
            msjerror='';
            return true;
        }
    }else{
        msjerror="Email incorrecto";
        return false;
    }
  }

function validarContrasena(contrasena){
    if(contrasena!=''){
        if(contrasena.length>5){
            msjerror='';
            return true;
        }else{
            msjerror='Contraseña demasiado corta';
            return false;
        }
    }else{
        msjerror='Contraseña vacia';
        return false;
    }
}
  
 