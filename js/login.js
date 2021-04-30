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

  
 