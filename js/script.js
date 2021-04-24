/************************
 * GUARDAR PREFERENCIAS DEL TEMA DEL USUARIO
 */
const root = document.documentElement;
let user={
    colorbg:''
};

//Funcion para cambiar colores del tema
const changeThemeUser = (user) => {
    console.log(user.colorbg);
    if (user.colorbg == 'default-theme') {
        console.log('default');
        root.style.setProperty('--main-color', '#258FE8');
        root.style.setProperty('--second-color', '#E8C11A');
        root.style.setProperty('--third-color', '#828282');
        root.style.setProperty('--light-color', '#FFF');
        root.style.setProperty('--dark-color', '#000');
    }else if(user.colorbg=='second-theme'){
        // console.log('second');
        root.style.setProperty('--main-color', '#E8C11A');
        root.style.setProperty('--second-color', '#258FE8');
        root.style.setProperty('--third-color', '#FFF');
        root.style.setProperty('--light-color', '#000');
        root.style.setProperty('--dark-color', '#FFF');
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
