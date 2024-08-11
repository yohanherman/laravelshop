document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.querySelector('.sidebar');
    const burgerremove = document.querySelector('.burger-remove')
    const burger = document.querySelector('.fa-bars')

    burger.addEventListener('click' , function(){
    sidebar.style.transform = 'translateX(0)'
    })

    burgerremove.addEventListener('click', function(){
        sidebar.style.transform = 'translateX(-100%)'
    })

    window.addEventListener('load', function(){
         sidebar.style.display= 'flex'
         sidebar.style.visibility= 'visible'
    })

})


    

