/************************
 * GUARDAR PREFERENCIAS DEL TEMA DEL USUARIO
 */
const root = document.documentElement;
const logo=document.getElementById('logo');
let user={
    colorbg:''
};

//Funcion para cambiar colores del tema
const changeThemeUser = (user) => {
   
    if (user.colorbg == 'default-theme') {
       
        root.style.setProperty('--main-color', '#258FE8');
        root.style.setProperty('--second-color', '#E8C11A');
       
        root.style.setProperty('--light-color', '#FFF');
        root.style.setProperty('--dark-color', '#828282');
        logo.setAttribute('src','assets/images/logo.PNG');
    }else if(user.colorbg=='second-theme'){
        
        root.style.setProperty('--main-color', '#E8C11A');
        root.style.setProperty('--second-color', '#258FE8');
        
        root.style.setProperty('--light-color', '#828282');
        root.style.setProperty('--dark-color', '#FFF');
        logo.setAttribute('src','assets/images/logo-yellow.PNG');
        checkbox.checked = true;
    } 
};

//Si no hay un tema guardado
if(!localStorage.getItem('user')) {
    //Establecemos el valor por defecto y o guardamos en localStorage
    user.colorbg='default-theme';
    localStorage.setItem('user',JSON.stringify(user));
}else{
    user.colorbg=JSON.parse(localStorage.getItem('user')).colorbg;
} 
changeThemeUser(user);

//Evento para marcar el tema de color
checkbox.addEventListener('change', (e) => {
	if (!e.target.checked) {
        user.colorbg='default-theme';
        
	} else {
        user.colorbg='second-theme';
	}
    localStorage.setItem('user',JSON.stringify(user))
    changeThemeUser(user);
});
