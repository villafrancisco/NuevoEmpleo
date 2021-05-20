
let guardar_inscripcion=document.getElementsByClassName('guardar_inscripcion');
for (let index = 0; index < guardar_inscripcion.length; index++) {
    guardar_inscripcion[index].addEventListener('click',(e)=>{
       
        if(!(e.target.innerHTML=="Inscrito")){
            guardarInscripcion(e);
        }
    });
    
}

function guardarInscripcion(e){
   
    const data = new FormData();
    data.append('idempleo',e.target.getAttribute('idempleo'));
    fetch('ajax/guardar_inscripcion.php',{
        method: "POST",
        body: data
     }).then(res=> res.json())
     .then(data=> {
           e.target.innerHTML="Inscrito";
           e.target.classList.remove('btn-primary')
           e.target.classList.add('btn-outline-primary')
             if(data.status=='ok'){
    
                 toastr.success('Inscrito correctamente');
                    
             }
    });


}
