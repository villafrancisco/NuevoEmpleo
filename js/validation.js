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

function validarDNI(dni){
    var regex=/[0-9]{8}[A-Za-z]{1}/;
    if(!regex.test(dni)){
        return false;
    }else{
        return true;
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

function validarNumero(numero) {
    
    let num = parseInt(numero);
    if (!Number.isInteger(num)) {
      return false;
    } else {
      return true;
    }
  }

function validarTitulaciones(listaTitulaciones){
    listaTitulaciones.forEach(titulacion => {
        console.log(titulacion.selectedIndex);
    });
    
}