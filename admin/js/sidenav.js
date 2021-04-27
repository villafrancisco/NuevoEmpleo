document.querySelector('.fa-times').addEventListener('click',(e)=>{
   
    document.querySelector('.grid-container').classList.add('grid-container-close');
    document.querySelector('.sidenav').classList.add('sidenav-close');

});

document.querySelector('.fa-bars').addEventListener('click',(e)=>{
   
    document.querySelector('.grid-container').classList.remove('grid-container-close');
    document.querySelector('.sidenav').classList.remove('sidenav-close');

});