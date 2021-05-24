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
        
        var email=tableInputs.email.value;
        var telefono=tableInputs.telefono.value;
        var direccion=tableInputs.direccion.value;
       
        if(!validarEmail(email)){
            error=true;
            tableInputs.email.classList.add('errorform');
        }else{
            tableInputs.email.classList.remove('errorform');
        }
        if(nombre==''){
            error=true;
            tableInputs.nombre.classList.add('errorform');
        }else{
            tableInputs.nombre.classList.remove('errorform');
        }

        if(!validarNumero(telefono)){
            error=true;
            tableInputs.telefono.classList.add('errorform');
        }else{
            tableInputs.telefono.classList.remove('errorform');
        }
        if(direccion==''){
            error=true;
            tableInputs.direccion.classList.add('errorform');
        }else{
            tableInputs.direccion.classList.remove('errorform');
        }

        if(error==true){
            //muestro mensaje de toast de error
            toastr.error('Compruebe los campos');
        }else{
            //guardo los datos
            
            const data = new FormData();
            data.append('idusuario',idusuario);
            data.append('nombre',nombre);
            data.append('email',email);
            data.append('direccion',direccion);
            
            data.append('telefono',telefono);
            fetch('../ajax/guardar_empresa.php',{
                method: "POST",
                body: data
            }).then(res=> res.json())
            .then(data=> {
                    console.log(data);
                    if(data.status=='ok'){
                        //datos actualizados correctamente
                        toastr.success('Datos Guardados');
                    }else{
                        //datos no actualizados
                        toastr.error('Datos incorrectos');
                        tableInputs.email.classList.add('errorform');
                    }
                });
        }
    
     });
 }

