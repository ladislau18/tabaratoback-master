
// ALTERANDO VISIBILIDADE DO HEADER
var nav = document.querySelector('nav');
window.addEventListener('load',function(){
  if(window.location.href == 'http://127.0.0.1:8000/')
  {
    nav.classList.remove('bg-dark', 'shadow');
  }
  
});

window.addEventListener('scroll', function () {
  if(window.location.href == 'http://127.0.0.1:8000/')
  {
    
    if (window.pageYOffset > 100) {
      nav.classList.add('bg-dark', 'shadow');
    } else {
      nav.classList.remove('bg-dark', 'shadow');
    }
  }

});

