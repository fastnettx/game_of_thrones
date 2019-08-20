var first_run_email = true;
email.addEventListener('blur', function () {
    if (first_run_email) {
        if (!validation_rules.email((document.getElementById('email')).value)) {
            underlineFunction("email");
        } else {
            fieldCleaningFunction("email");
        }
        first_run_email = false;
    }
});

email.addEventListener('keyup', function () {
    if (!first_run_email) {
        if (!validation_rules.email((document.getElementById('email')).value)) {
            underlineFunction("email");
        } else {
            fieldCleaningFunction("email");
        }
    }
});

var first_run_password = true;
password.addEventListener('blur', function () {
    if (first_run_password) {
        if (!validation_rules.password((document.getElementById('password')).value)) {
            underlineFunction("password");
        } else {
            fieldCleaningFunction("password");
        }
        first_run_password = false;
    }
});

password.addEventListener('keyup', function () {
    if (!first_run_password) {
        if (!validation_rules.password((document.getElementById('password')).value)) {
            underlineFunction("password");
        } else {
            fieldCleaningFunction("password");
        }
    }
});

text.addEventListener('keyup', function () {
    if (!validation_rules.text((document.getElementById('text')).value)) {
        underlineFunction("text");
    } else {
        fieldCleaningFunction("text");
    }
});

textarea.addEventListener('keyup', function () {
    if (!validation_rules.textarea((document.getElementById('textarea')).value)) {
        underlineFunction("textarea");
    } else {
        fieldCleaningFunction("textarea");
    }
});

document.getElementById('select_house').addEventListener('change', function () {
    if ((document.getElementById('select_house').value === "")) {
        underlineFunction('select_house');
    } else {
        fieldCleaningFunction("select_house");
    }
});

var validation_rules = {
    email: function (elements) {
        var regen_email = /^[\w\.\-\_]+\@\w+\.\w{2,8}$/i;
        return regen_email.test(elements);
    },
    password: function (elements) {
        var regen_password = /[0-9a-zA-Z!@#$%^&*]{8,}/;
        return regen_password.test(elements);
    },
    text: function (elements) {
        var regen_text = /^\w{2,}$/i;
        return regen_text.test(elements);
    },
    textarea: function (elements) {
        var regen_textarea = /^[\w\s]{6,}$/i;
        return regen_textarea.test(elements);
    }
};

function validation1(form) {
    event.preventDefault();
    if (!validation_rules.email((document.getElementById('email')).value)) {
        underlineFunction("email")
    }
    if (!validation_rules.password((document.getElementById('password')).value)) {
        underlineFunction("password");
    }
    if (validation_rules.email((document.getElementById('email')).value) &&
        validation_rules.password((document.getElementById('password')).value)) {
        switchForm();
    }
}

function validation2(form) {
    event.preventDefault();
    if (!validation_rules.text((document.getElementById('text')).value)) {
        underlineFunction("text");
    }
    if (!validation_rules.textarea((document.getElementById('textarea')).value)) {
        underlineFunction("textarea");
    }
    if ((document.getElementById('select_house').value === "")) {
        underlineFunction("select_house");
    }
    if (validation_rules.text((document.getElementById('text')).value) &&
        validation_rules.textarea((document.getElementById('textarea')).value) &&
        !(document.getElementById('select_house').value === "")) {
        alert('Form submitted');
    }
}

function switchForm() {
    document.getElementById("section_1").style.display = 'none';
    document.getElementById("section_2").style.display = 'block';
}

function underlineFunction(name) {
    document.getElementById(name).style.border = '2px solid red';
}

function fieldCleaningFunction(name) {
    document.getElementById(name).style.border = 'none';
    document.getElementById(name).style.borderBottom = '2px solid #d3bb89';
}

