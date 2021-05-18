
let guardar_inscripcion=document.getElementsByClassName('guardar_inscripcion');
for (let index = 0; index < guardar_inscripcion.length; index++) {
    guardar_inscripcion[index].addEventListener('click',(e)=>{
        guardar_inscripcion(e);
    });
    
}

function guardar_inscripcion(e){
    const data = new FormData();
    data.append('idempleo',e.target.getAttribute('idempleo'));
    fetch('ajax/guardar_inscripcion.php',{
        method: "POST",
        body: data
    }).then(res=> res.json())
    .then(data=> {
            if(data.status=='ok'){
                //datos eliminados correctamente
                toastr.success('Eliminado')
                cargar_tabla_empleos();

            }else{
                toastr.error('Error al borrar la oferta de empleo');
            }
        });


}
