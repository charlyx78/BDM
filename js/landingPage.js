const formLogin = document.getElementById("formLogin");
    formLogin.addEventListener("submit", e=> {
        e.preventDefault();

        const usernameL = document.getElementById("usernameL");
        const passwordL = document.getElementById("passwordL");

        if(usernameL.value.length <= 0){
            alert("Nombre de Usuario Vacio");
        }
        else if(passwordL.value.length <= 0){
            alert("Contasena Vacio");
        }
    })

const formSignup = document.getElementById("formSignup");
    formSignup.addEventListener("submit", e=> {
        e.preventDefault();
        
        const namesR = document.getElementById("namesR");
        const lastnamesR = document.getElementById("lastnamesR");
        const birthdateR = document.getElementById("birthdateR");
        const sexR = document.getElementById("sexR").value;
        const usernameR = document.getElementById("usernameR");
        const emailR = document.getElementById("emailR");
        const passwordR = document.getElementById("passwordR");
        const confirmpasswordR = document.getElementById("confirmpasswordR");

        const accounttypeRadio = document.getElementsByName("accounttype");
        var accounttype = null;
        for (var radio of accounttypeRadio)
        {
            if (radio.checked) {
                accounttype = radio.value;
            }
        }

        let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        let regexPass = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;

        if(namesR.value.length <= 0){
            alert("Nombre(s) vacio");
        }
        else if(lastnamesR.value.length <= 0){
            alert("Apellidos vacio");
        }
        else if(birthdateR.value.length <= 0){
            alert("Fecha Nacimiento vacia");
        }
        else if(sexR == ""){
            alert("Sexo vacio");
        }
        else if(usernameR.value.length <= 0){
            alert("Nombre de Usuario vacio");
        }
        else if(emailR.value.length <= 0){
            alert("Correo vacio");
        }
        else if (!regexEmail.test(emailR.value)){
            alert("Correo invalido");
        }
        else if(passwordR.value.length <= 0){
            alert("Contrasena vacia");
        }
        else if (!regexPass.test(passwordR.value)){
            alert("Contasena invalida, 7 a 15 caracteres, con minimo un numero y un caracter especial");
        }
        else if(confirmpasswordR.value.length <= 0){
            alert("Confirmar Contrasena vacia");
        }
        else if(confirmpasswordR.value != passwordR.value){
            alert("Contrasenas No Coindicen");
        }
        else if(accounttype == null){
            alert("Tipo de Cuenta vacio");
        }
    })