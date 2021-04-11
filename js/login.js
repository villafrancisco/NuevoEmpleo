const formLogin=document.getElementById('formLogin');
var msjerror='';  

//Enviamos el formulario de login
formLogin.addEventListener('submit',(e)=>{
    e.preventDefault();
    //recogemos los datos  
    const datosForm=new FormData(formLogin);
    //Validamos el usuario y la contraseña
    if(validarEmail(datosForm.get('email'))==true && validarContrasena(datosForm.get('contrasena'))==true){
        $('#alert').removeClass('show');
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
                    $('#alert').text('Contraseña erronea'); 
                    $('#alert').addClass('show');
                }
            });
    }else{
        $('#alert').text(msjerror);
        $('#alert').addClass('show');
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
  
 