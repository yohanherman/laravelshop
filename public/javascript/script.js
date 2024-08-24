document.addEventListener('DOMContentLoaded', function() {
    // SIDEBAR
    const sidebar = document.querySelector('.sidebar');
    const burgerremove = document.querySelector('.burger-remove')
    const burger = document.querySelector('.fa-bars')
    const ul = document.querySelector('.ul')
 
    burger.addEventListener('click' , function(e){
        e.preventDefault()
        sidebar.style.transform = 'translateX(0)'
    })
    
    burgerremove.addEventListener('click', function(){
        sidebar.style.transform = 'translateX(-100%)'
    })
    
    window.addEventListener('load', function(){
        sidebar.style.display= 'flex'
        sidebar.style.visibility= 'visible'
    })

    // REQUETE AJAX
    const selectColor = document.querySelectorAll('.colorSelect')
    // const test =document.querySelector('.test')
    const productCover =document.querySelector('#product-cover')
    const colorInput = document.querySelector('#color_id')
    const containerColorName = document.querySelector('.containerColor')
    console.log(containerColorName)


 
    selectColor.forEach(function(div){
        div.addEventListener('click', function(){
            // je recupere la valeur de l'attribut data-colors-id
            const colorsId = this.getAttribute('data-colors-id')

            // je passe cette la valeur de cette id à mon champ caché
            colorInput.value = colorsId

            const url = '/get-product-image/' + colorsId

            fetch(url)
                .then(response => {
                    if(!response.ok){
                        throw new Error('Erreur HTTP :' + response.status)
                    }
                    return response.json();
                })
                .then(data=>{
                    if(data.images){
                        // productCover.src = ''
                        productCover.src = data.images
                    }else{
                        console.error('aucune image trouvé')
                    }
                    containerColorName.innerHTML= data.colors
                    // console.log('Réponse reçue pour colorsId ' + colorsId + ':', data);
                })
                .catch(error =>{
                    console.error('Erreur lors de la requête pour colorsId:' + colorsId, ':', error);
                })
        })

    })

})

// registration field
const password = document.querySelector('#password')
const passwordConfirm = document.querySelector('#passwordConfirm')
const message = document.querySelector('.message')
const registerButton =document.querySelector('#registerButton')
const emailError = document.querySelector('.emailError')
const emailRegister = document.querySelector('#email_register');


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

// registration form client side
function validateRegistration(){
    emailRegister.addEventListener('keyup' , function(){
        if(validateEmail(emailRegister.value)){
            // console.log('email correct')
            emailRegister.style.borderColor = 'green'
        }else{
            // console.log('email incorrect')
            emailRegister.style.borderColor = 'red'
            registerButton.disabled = true
    }})
    registerButton.addEventListener('click', function(e){
        if(!emailRegister.value){
            emailError.textContent = 'The email field is required'
        }
    })
}
validateRegistration()





//login form client side
// const emailLogin = document.querySelector('#login_email');
// console.log(emailLogin)

// function validateLoginForm(){
//     emailLogin.addEventListener('keyup' , function(){
//         if(validateEmail(emailLogin.value)){
//             console.log('email correct')
//             // emailLogin.style.borderColor = 'green'
//         }else{
//             console.log('email incorrect')
//             // emailLogin.style.borderColor = 'red'
//         }})
// }
// validateLoginForm()

