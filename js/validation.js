const expresiones={
    texto: /^[A-Z ñáéíóú]+$/i, //Letras y espacios pueden llevar acentos
    contrasena: /^.{4,16}$/,  //Entre 4 y 12 digitos
    email: /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
    dni: /^\d{8}[a-zA-Z]$/,
    telefono:/^\d{9,12}$/ //Entre 7 y 14 numeros
}
function reverseString(str) {
    return str.split("").reverse().join("");
}

function validarEmail(email) {
    if(email!=""){
        if(!expresiones.email.test(email)) {
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
    if(!expresiones.dni.test(dni)){
        return false;
    }
    return true;
   
}

function validarContrasena(contrasena){
    if(contrasena!=''){
        if(expresiones.contrasena.test(contrasena)){
            msjerror='';
            return true;
        }else{
            msjerror='Entre 4 y 12 caracteres';
            return false;
        }
    }else{
        msjerror='Contraseña vacia';
        return false;
    }
}

function validarTexto(txt){
    if(!expresiones.texto.test(txt)){
        return false;
    }
    return true;
}

function validarNumero(numero) {
    if (!expresiones.telefono.test(numero)) {
      return false;
    } else {
      return true;
    }
  }

