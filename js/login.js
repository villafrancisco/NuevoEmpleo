const formLogin=document.getElementById('formLogin');







formLogin.addEventListener('submit',(e)=>{
    e.preventDefault();
    
    const datosForm=new FormData(formLogin);
    
    if(validarEmail(datosForm.get('email'))==true && validarContrasena(datosForm.get('contrasena'))==true){
        $('#alert').removeClass('show');
        fetch('ajax/login.php',{
            method: "POST",
            body: datosForm
        })
            .then(resp=>resp.text())
            .then(data=>{
                console.log(data);
            });
    }else{
        
        $('#alert').text('Comprueba el email y la contraseña');
        $('#alert').addClass('show');
        
        
    }
    
    
})

function validarEmail(email) {
    if(email!=""){
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
            return false;
        }else{
            return true;
        }
    }else{
        
        return false;
    }
  }

function validarContrasena(contrasena){
    if(contrasena!=''){
        return true;
    }else{
       
        return false;
    }
}
  
 