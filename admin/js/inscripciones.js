
var tabla=document.getElementById('tabla_inscripciones');
cargar_tabla_inscripciones();
function cargar_tabla_inscripciones(){
    tabla.innerHTML='';
    const data = new FormData();
    
    data.append('idtitulado',document.getElementById('idtitulado').value);
    fetch('../ajax/cargar_inscripciones.php',{
        method: "POST",
        body: data
    }).then(res=> res.json())
    .then(data=> {
            if(data.length!=0){
                
                let fragment;;
                fragment='<thead>'+
                            '<tr>'+
                                '<th scope="col">Logotipo</th>'+
                                '<th scope="col">Empresa</th>'+
                                '<th scope="col">Descripcion</th>'+
                                '<th scope="col">Fecha de publicacion</th>'+
                                '<th scope="col">Fecha de inscripcion</th>'+
                                
                            '</tr>'+
                        '</thead>'+
                        '<tbody>';
                data.forEach(result => {
                    fragment+='<tr>'+
                                '<td><img class="img-fluid foto-imagen" src="../archivos_subidos/'+result.logo+'"></td>'+
                                '<td>'+result.nombre_empresa+'</td>'+
                                '<td>'+result.descripcion+'</td>'+
                                '<td>'+result.fecha_publicacion+'</td>'+
                                '<td>'+result.fecha_inscripcion+'</td>'+
                            '</tr>';
                });
                tabla.innerHTML=fragment;            
            }
        });
    
}