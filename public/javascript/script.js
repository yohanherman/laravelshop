document.addEventListener('DOMContentLoaded', function() {
    // sidebar
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

 // registration field
const password = document.querySelector('#password')
const passwordConfirm = document.querySelector('#passwordConfirm')
const message = document.querySelector('.message')
const registerButton =document.querySelector('#registerButton')
// const email = document.querySelectorAll('input[type="email"]')
const emailRegister = document.querySelector('#email_register');
const emailLogin = document.querySelector('#email_login');
// console.log(emails)

registerButton.disabled = true
registerButton.style.opacity = '0.4'

function checkpassword(){
    passwordConfirm.addEventListener('keyup', function(){
        if(password.value !== passwordConfirm.value){
            // console.log("doesn't match")
            message.textContent = "Passwords don't match"
            message.style.color = 'red'
            registerButton.disabled= true
            registerButton.style.opacity = '0.4' 
              password.style.borderColor ='red'
            passwordConfirm.style.borderColor ='red'
        }else{
            //  console.log('match')
            message.textContent ='Passwords are similar'
            message.style.color = 'green'
            registerButton.disabled= false
            registerButton.style.opacity ='1'
            password.style.borderColor ='green'
            passwordConfirm.style.borderColor ='green'
        }
    })
}
checkpassword()

function validateEmail(email){
    const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,4}$/;
    return regex.test(email)
}

emailRegister.addEventListener('keyup' , function(){
        if(validateEmail(emailRegister.value)){
             // console.log('email correct')
           emailRegister.style.borderColor = 'green'
        }else{
            // console.log('email incorrect')
           emailRegister.style.borderColor = 'red'
        }
    })



//  //login field
//  emailLogin.addEventListener('keyup' , function(){
//         if(validateEmail(emailLogin.value)){
//             // console.log('email correct')
//             emailLogin.style.borderColor = 'green'
//         }else{
//             // console.log('email incorrect')
//             emailLogin.style.borderColor = 'red'
//           }
//      })








    

