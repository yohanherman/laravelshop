document.addEventListener('DOMContentLoaded', function() {
    // SIDEBAR
    const sidebar = document.querySelector('.sidebar');
    const burgerremove = document.querySelector('.burger-remove')
    const burger = document.querySelector('.fa-bars')
   
    
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
    const productCover =document.querySelector('#product-cover')
    const imageSecondaires = document.querySelectorAll('.imageSecondaire')
    
    imageSecondaires.forEach(function(div){
        div.addEventListener('click', function(){
        const image_id = this.getAttribute('data-image-id')
        const url = '/get-product-image/' + image_id

        fetch(url)
        .then(response=>{
            if(!response.ok){
                throw Error('Erreur HTTP :'+ response.status);
            }
            return response.json()
        })
        .then(data=>{
            // console.log(data)
            if(data.image){
                productCover.src = data.image
            }else{
                console.error('No image found')
            }
        })
        .catch(error=>{
            console.error('Error in the request for imageID :'+ image_id , ':', error)
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
const pseudo =document.querySelector('#name');
const nameError = document.querySelector('.nameError')


registerButton.disabled = true
registerButton.style.opacity = '0.4'

function validateName(pseudo){
    const regex = /^[a-zA-Z]+$/;
    return regex.test(pseudo)
}

function NameValidation(){
    pseudo.addEventListener('blur', function(){
        if(pseudo.value.length > 0){
            if(validateName(pseudo.value)){
                pseudo.style.borderColor = 'green'
                nameError.textContent = ''
            }else{
            pseudo.style.borderColor = 'red'
            registerButton.disabled = 'true'
            nameError.innerHTML= 'invalid name field'
            }
        }else{
        nameError.innerHTML= 'field required'
    }})
}
NameValidation()

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
             emailError.textContent = ''
        }else{
            // console.log('email incorrect')
            registerButton.disabled = true
            registerButton.style.opacity = '0.4' 
            emailRegister.style.borderColor = 'red'
            emailError.textContent ='invalid field email'
        }})
}
validateRegistration()

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


// input d'ajout de quantite au panier

