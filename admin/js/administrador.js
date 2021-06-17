


 //Guardar los datos de un administrador
 let save=document.querySelectorAll('.save')
 for (const s of save) {
     s.addEventListener('click',(e)=>{
        e.preventDefault();
        const id=e.target.parentElement.getAttribute('href');
        const tableInputs=document.getElementById(id).getElementsByTagName('input');
        //Enviar los datos para guardarlos en la BBDD, comprobar que todos los datos estan correctos
        var error=false;
        var idusuario=tableInputs.idusuario.value;
        var nombre=tableInputs.nombre.value;
        var apellidos=tableInputs.apellidos.value;
        var email=tableInputs.email.value;
        if(!validarEmail(email)){
            error=true;
            tableInputs.email.classList.add('errorform');
        }else{
            tableInputs.email.classList.remove('errorform');
        }
        if(!validarTexto(nombre)){
            error=true;
            tableInputs.nombre.classList.add('errorform');
        }else{
            tableInputs.nombre.classList.remove('errorform');
        }
        if(!validarTexto(apellidos)){
            error=true;
            tableInputs.apellidos.classList.add('errorform');
        }else{
            tableInputs.apellidos.classList.remove('errorform');
        }
        if(error==true){
            Swal.fire({
                icon: 'error',
                title: 'Comprueba los campos',
                showConfirmButton: false,
                timer: 2000
              });
            
            
        }else{
            //guardo los datos
            
            const data = new FormData();
            data.append('idusuario',idusuario);
            data.append('nombre',nombre);
            data.append('apellidos',apellidos);
            data.append('email',email);
            fetch('../ajax/guardar_administrador.php',{
                method: "POST",
                body: data
            }).then(res=> res.text())
            .then(data=> {
                console.log(data);
                    if(data){
                        
                        Swal.fire({
                            icon: 'success',
                            title: 'Datos Guardados',
                            showConfirmButton: false,
                            timer: 2000
                          });
                        

                    }else{
                        //datos no actualizados
                        Swal.fire({
                            icon: 'error',
                            title: 'Datos incorrectos',
                            showConfirmButton: false,
                            timer: 2000
                          });
                        
                        tableInputs.email.classList.add('errorform');
                    }
                });
        }
    
     });
 }

