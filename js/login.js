const formLogin=document.getElementById('formLogin');
const msjalert=document.getElementById('alert');
let remember=document.getElementById('remember');
var msjerror='';  


    if(window.location.pathname=='/NuevoEmpleo/admin.php'){
        if(localStorage.getItem('email')!=null && localStorage.getItem('contrasena')!=null){
            const datosForm=new FormData();
            datosForm.append('email',localStorage.getItem('email'));
            datosForm.append('contrasena',localStorage.getItem('contrasena'));
           
            login(datosForm);
        }    
    }

//Enviamos el formulario de login
formLogin.addEventListener('submit',(e)=>{
    e.preventDefault();
    //recogemos los datos  
    const datosForm=new FormData(formLogin);
    //Validamos el usuario y la contraseña
    if(validarEmail(datosForm.get('email'))==true && validarContrasena(datosForm.get('contrasena'))==true){
       
        login(datosForm);
    }else{
        msjalert.innerText=msjerror;
       
        
    }
})

function login($datos){
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
                    if(localStorage.getItem('email')==null && localStorage.getItem('contrasena')==null){
                            let remember=document.getElementById('remember');
                       
                            if(remember.checked){
                                //guardar en localstorage
                            localStorage.setItem('email',$datos.get('email'));
                            localStorage.setItem('contrasena',$datos.get('contrasena'));
                           
                            }else{
                                localStorage.removeItem('email');
                                localStorage.removeItem('contrasena');
                                
                            }
                        }
                    window.location.href="admin/administrador.php";
                }else if(data.tipousuario=="empresa"){
                    window.location.href="empresa.php";
                }else if(data.tipousuario=='titulado'){
                    if(data.redirect==true){
                        window.location.href="index.php";
                    }else{
                        window.location.href="titulado.php";
                    }
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



  
 