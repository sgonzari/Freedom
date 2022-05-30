/* VARIABLES */
const regexUsername = /^[a-z0-9]+$/;
const regexEmail = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
const regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;


/* FUNCTIONS */
const validateUsername = username => {
    username.addEventListener('change', () => {
        if (username.value) {
            if (!regexUsername.test(username.value)) {
                username.classList.add('invalid');
                document.getElementById('invalidUsername').style.display = 'block';
            } else {
                username.classList.remove('invalid');
                document.getElementById('invalidUsername').style.display = 'none';
            }
        } else {
            username.classList.remove('invalid');
            document.getElementById('invalidUsername').style.display = 'none';
        }
    });
};

const validateEmail = email => {
    email.addEventListener('focusout', () => {
        if (email.value) {
            if (!regexEmail.test(email.value)) {
                email.classList.add('invalid');
                document.getElementById('invalidEmail').style.display = 'block';
            } else {
                email.classList.remove('invalid');
                document.getElementById('invalidEmail').style.display = 'none';
            }
        } else {
            email.classList.remove('invalid');
            document.getElementById('invalidEmail').style.display = 'none';
        }
    });
};
const validateConfirmEmail = email => {
    email.addEventListener('focusout', () => {
        if (email.value) {
            if (!regexEmail.test(email.value)) {
                email.classList.add('invalid');
                document.getElementById('invalidConfirmEmail').style.display = 'block';
            } else {
                email.classList.remove('invalid');
                document.getElementById('invalidConfirmEmail').style.display = 'none';
            }
        } else {
            email.classList.remove('invalid');
            document.getElementById('invalidConfirmEmail').style.display = 'none';
        }
    });
};
const comprobationEmail = (email, confirmEmail) => {
    if ((email.value) && (confirmEmail.value)) {
        if (email.value != confirmEmail.value) {
            email.classList.add('invalid');
            confirmEmail.classList.add('invalid');
            document.getElementById('notSameEmails').style.display = 'block';
        } else {
            email.classList.remove('invalid');
            confirmEmail.classList.remove('invalid');
            document.getElementById('notSameEmails').style.display = 'none';
        }
    } else {
        email.classList.remove('card__element--invalidComprobation');
        confirmEmail.classList.remove('card__element--invalidComprobation');
        document.getElementById('notSameEmails').style.display = 'none';
    }
};
const validateEmails = (email, confirmEmail) => {
    email.addEventListener('focusout', () => {
        comprobationEmail(email, confirmEmail);
    });
    confirmEmail.addEventListener('focusout', () => {
        comprobationEmail(email, confirmEmail);
    });
};

const validatePassword = password => {
    password.addEventListener('focusout', () => {
        if (password.value) {
            if (!regexPassword.test(password.value)) {
                password.classList.add('invalid');
                document.getElementById('weakPassword').style.display = 'block';
            } else {
                password.classList.remove('invalid');
                document.getElementById('weakPassword').style.display = 'none';
            }
        } else {
            password.classList.remove('invalid');
            document.getElementById('weakPassword').style.display = 'none';
        }
    });
};
const validateConfirmPassword = password => {
    password.addEventListener('focusout', () => {
        if (password.value) {
            if (!regexPassword.test(password.value)) {
                password.classList.add('invalid');
                document.getElementById('weakConfirmPassword').style.display = 'block';
            } else {
                password.classList.remove('invalid');
                document.getElementById('weakConfirmPassword').style.display = 'none';
            }
        } else {
            password.classList.remove('invalid');
            document.getElementById('weakConfirmPassword').style.display = 'none';
        }
    });
};
const comprobationPassword = (password, confirmPassword) => {
    if ((password.value) && (confirmPassword.value)) {
        if (password.value != confirmPassword.value) {
            password.classList.add('invalid');
            confirmPassword.classList.add('invalid');
            document.getElementById('notSamePasswords').style.display = 'block';
        } else {
            password.classList.remove('invalid');
            confirmPassword.classList.remove('invalid');
            document.getElementById('notSamePasswords').style.display = 'none';
        }
    } else {
        password.classList.remove('invalid');
        confirmPassword.classList.remove('invalid');
        document.getElementById('notSamePasswords').style.display = 'none';
    }
};
const validatePasswords = (password, confirmPassword) => {
    password.addEventListener('focusout', () => {
        comprobationPassword(password, confirmPassword);
    });
    confirmPassword.addEventListener('focusout', () => {
        comprobationPassword(password, confirmPassword);
    });
};

/* MAIN */
const ValidationData = () => {
    if (document.getElementById('authRegister')) {
        validateUsername(document.getElementById('username'));

        validateEmail(document.getElementById('email'));
        validateConfirmEmail(document.getElementById('email_confirmation'));
        validateEmails(document.getElementById('email'), document.getElementById('email_confirmation'));

        validatePassword(document.getElementById('password'));
        validateConfirmPassword(document.getElementById('password_confirmation'));
        validatePasswords(document.getElementById('password'), document.getElementById('password_confirmation'));
    }

    if(document.getElementById('profileEdit')) {
        validateUsername(document.getElementById('username'));
    }
};

export default ValidationData;