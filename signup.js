function campiPieni(){
    const nome=document.getElementById('nome');
    const cognome=document.getElementById('cognome');
    const email=document.getElementById('eMail');
    const username=document.getElementById('username');
    const password=document.getElementById('password');
    const confermaPassword=document.getElementById('conferma_password');
    if(nome.value.length>0){
        count++;
        stato['nome']=true;
    }
    if(cognome.value.length>0){
        count++;
        stato['cognome']=true;
    }
    if(email.value.length>0){
        count++;
        stato['email']=true;
    }
    if(username.value.length>0){
        count++;
        stato['username']=true;
    }
    if(password.value.length>0){
        count++;
        stato['password']=true;
    }
    if(confermaPassword.value.length>0){
        count++;
        stato['conferma_password']=true;
    }
}

function onSubmit(event){
    count=0;
    for(const campo in stato){
        if(stato[campo]===true){
            count++;
        }
    }
    if(count<6){
        console.log('errore');
        event.preventDefault();
    }
    else if(count===6){
        console.log('bene');
    }
    console.log(stato);
    console.log(count);
    count=0;
}

function checkConfermaPassword(event){
    const input=event.currentTarget;
    const campo=document.getElementById('conferma_password2');
    const password=document.getElementById('password');
    if(input.value.length>0){
        if(input.value===password.value){
            stato['conferma_password']=true;
            input.classList.remove('errore');
            campo.classList.remove('opaco');
            campo.classList.add('nonOpaco');
        }
        else{
            stato['conferma_password']=false;
            input.classList.add('errore');
            campo.innerHTML='';
            campo.textContent='Le due password non coincidono!';
            campo.classList.remove('nonOpaco');
            campo.classList.add('opaco');
        }
    }
    else{
        stato['conferma_password']=false;
        input.classList.add('errore');
        campo.innerHTML='';
        campo.textContent='Campo obbligatorio';
        campo.classList.remove('nonOpaco');
        campo.classList.add('opaco');
    }
}

function checkPassword(event) {
    const input=event.currentTarget;
    const campo=document.getElementById('password2');
    if(input.value.length>=10){
        stato['password']=true;
        input.classList.remove('errore');
        campo.classList.remove('opaco');
        campo.classList.add('nonOpaco');
    }
    else{
        stato['password']=false;
        input.classList.add('errore');
        campo.classList.remove('nonOpaco');
        campo.classList.add('opaco');
        campo.innerHTML='';
        if(stato[password]=input.value.length>=1){
            campo.textContent='Password troppo corta!';
        }
        else{
            campo.textContent='Campo obbligatorio';
        }
        
    }
}

function jsonCheckEmail(json){
    const eMail=document.getElementById('eMail');
    const campo=document.getElementById('email2');
    if (json.exists===false) {
        stato['email']=true;
        eMail.classList.remove('errore');
        campo.classList.add('nonOpaco');
        campo.classList.remove('opaco');
    } else{
        stato['email']=false;
        eMail.classList.add('errore');
        campo.classList.add('opaco');
        campo.classList.add('nonOpaco');
        campo.innerHTML='';
        campo.textContent='E-mail già utilizzata!';
    }

}

function fetchResponse(response){
    return response.json();
}

function checkEmail(event) {
    const input = event.currentTarget;
    const campo=document.getElementById('email2');
    if(input.value.length>0){
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(input.value).toLowerCase())){
        stato['email']=false;
        campo.innerHTML='';
        campo.textContent='E-mail non valida!';
        campo.classList.remove('nonOpaco');
        campo.classList.add('opaco');
    }else {
        fetch("checkEmail.php?q="+encodeURIComponent(String(input.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}   else{
        stato['email']=false;
        input.classList.add('errore');
        campo.classList.add('opaco');
        campo.classList.remove('nonOpaco');
        campo.innerHTML='';
        campo.textContent='Campo obbligatorio';
}  

}

function jsonCheckUsername(json){
    const username=document.getElementById('username');
    const campo=document.getElementById('username2');
    if (json.exists===false){
        stato['username']=true;
        username.classList.remove('errore');
        campo.classList.add('nonOpaco');
        campo.classList.remove('opaco');
    } else {
        stato['username']=false;
        username.classList.add('errore');
        campo.classList.add('opaco');
        campo.classList.add('nonOpaco');
        campo.innerHTML='';
        campo.textContent='Username già utilizzato!';
    }

}

function fetchResponse(response){
    return response.json();
}

function checkUsername(event) {
    const input = event.currentTarget;
    const campo=document.getElementById('username2');
    if(input.value.length>0){
        fetch("checkUsername.php?q="+encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckUsername);
    }
    else{
        stato['username']=false;
        input.classList.add('errore');
        campo.classList.add('opaco');
        campo.classList.remove('nonOpaco');
        campo.innerHTML='';
        campo.textContent='Campo obbligatorio';
    }
    
}    

function checkNome(event) {
    const input = event.currentTarget;
    const campo=document.getElementById('nome2');
    if (input.value.length > 0) {
        stato['nome']=true;
        input.classList.remove('errore');
        campo.classList.add('nonOpaco');
        campo.classList.remove('opaco');
        
    } else {
        stato['nome']=false;
        input.classList.add('errore');
        campo.classList.add('opaco');
        campo.classList.remove('nonOpaco');
    
    }

}

function checkCognome(event) {
    const input = event.currentTarget;
    const campo=document.getElementById('cognome2');
    if (input.value.length > 0) {
        stato['cognome']=true;
        input.classList.remove('errore');
        campo.classList.add('nonOpaco');
        campo.classList.remove('opaco');
    
    } else {
        stato['cognome']=false;
        input.classList.add('errore');
        campo.classList.add('opaco');
        campo.classList.remove('nonOpaco');

    }
    
}

let stato = {
    'name':false,
    'surname':false,
    'email':false,
    'username':false,
    'password':false,
    'conferma_password':false
};


const nome=document.getElementById('nome');
nome.addEventListener('blur', checkNome);
const cognome=document.getElementById('cognome');
cognome.addEventListener('blur', checkCognome);
const username=document.getElementById('username');
username.addEventListener('blur', checkUsername);
const eMail=document.getElementById('eMail');
eMail.addEventListener('blur', checkEmail);
const password=document.getElementById('password');
password.addEventListener('blur', checkPassword);
const confermaPassword=document.getElementById('conferma_password');
confermaPassword.addEventListener('blur', checkConfermaPassword);

const form=document.getElementById('signup');
form.addEventListener('submit', onSubmit);

let count=0;
const campi=campiPieni();