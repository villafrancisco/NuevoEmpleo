function reverseString(str) {
    return str.split("").reverse().join("");
}

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

function validarTexto(txt){
    var regex=/^[A-Z]+$/i;
    if(!regex.test(txt)){
        return false;
    }
    return true;
}