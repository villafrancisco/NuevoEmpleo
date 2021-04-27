document.querySelector('.fa-times').addEventListener('click',(e)=>{
   
    
    document.querySelector('.sidenav').classList.remove('open');
    document.querySelector('.sidenav').classList.remove('open-main-mobile');
    document.querySelector('.fa-times').classList.add('hide');
    document.querySelector('.fa-bars').classList.remove('hide');
    
    document.querySelector('.header').classList.remove('open-main');
    document.querySelector('.main').classList.remove('open-main');
    document.querySelector('.footer').classList.remove('open-main');

});

document.querySelector('.fa-bars').addEventListener('click',(e)=>{
   
    document.querySelector('.sidenav').classList.add('open');
    document.querySelector('.sidenav').classList.add('open-main-mobile');
    document.querySelector('.fa-times').classList.remove('hide');
    document.querySelector('.fa-bars').classList.add('hide');
    document.querySelector('.header').classList.add('open-main');
    document.querySelector('.main').classList.add('open-main');
    document.querySelector('.footer').classList.add('open-main');

   
    
    

});