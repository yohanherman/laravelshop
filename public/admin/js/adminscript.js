
// confirmation messages
const messages = document.querySelector('#messages')
// console.log(messages)

 function removeMessage(){
    setTimeout(() => {
        // console.log('je disparais mainteant')
        messages.style.display ='none'
    }, 4000);
 }
 removeMessage()