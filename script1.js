
/*
form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});
*/
const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}



const validateloginInputs = () => {
    const form = document.getElementById('form');
    const email = document.getElementById('email');
    const password = document.getElementById('password');

    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    let s=0;

 
    if(emailValue === '') {
        setError(email, 'Email is required');
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
    } else {
        setSuccess(email);
        s++;
    }
    
    
    if(passwordValue === '') {
        setError(password, 'Password is required');
    } else if (false ) {
        setError(password, 'Password must be at least 8 character.')
    } else {
        setSuccess(password);
        s++;
    }
    
    if(s==2){
    form.action="index.php";
    return true;

}
    else{ 
    event.preventDefault();
    return false;
    
}

};
const validateInputs = () => {
    const form = document.getElementById('form');
    const username = document.getElementById('Name');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const password2 = document.getElementById('password2');

    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    let s=0;

    if(usernameValue === '') {
        setError(username, 'Username is required');
    } else {
        setSuccess(username);
        s++;
    }
    if(emailValue === '') {
        setError(email, 'Email is required');
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
    } else {
        setSuccess(email);
        s++;
    }
    
    
    if(passwordValue === '') {
        setError(password, 'Password is required');
    } else if (false) {
        setError(password, 'Password must be at least 8 character.')
    } else {
        setSuccess(password);
        s++;
    }
    
    
    if(password2Value === '') {
        setError(password2, 'Please confirm your password');
    } else if (password2Value !== passwordValue) {
        setError(password2, "Passwords doesn't match");
    } else {
        setSuccess(password2);
        s++;
    }

    if(s==4){
    form.method="post";
    return true;

}
    else{ 
    event.preventDefault();
    return false;
    
}


};


