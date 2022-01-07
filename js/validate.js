// Variables


nameField = document.querySelector('#name');
emailField = document.querySelector('#email');
phoneField = document.querySelector('#phone');
messageField = document.querySelector('#message');

nameField.onblur = () => {
    if(nameField.value.length > 3 ){
        nameField.classList.remove("is-invalid");
        nameField.classList.add("is-valid");
    }
    else {

        nameField.classList.add("is-invalid");

    }
}


messageField.onblur = () => {
    if(messageField.value.length > 10 ){
        messageField.classList.remove("is-invalid");

        messageField.classList.add("is-valid");
    }
    else {

        messageField.classList.add("is-invalid");

    }
}


phoneField.onblur = () => {
    if(phoneField.value.length == 10 && Number.isInteger(phoneField.value) == true ){
        phoneField.classList.remove("is-invalid");
        phoneField.classList.add("is-valid");
    }
    else {

        phoneField.classList.add("is-invalid");

    }
}



emailField.onblur = () => {
    if(emailField.value.includes('@') && emailField.value != ''){
        email.classList.remove("is-invalid");
        email.classList.add("is-valid");
    }
    
    else {
        email.classList.add("is-invalid");
    }
    }

