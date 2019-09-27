let first_run_email = true;
email.addEventListener('blur', function () {
    if (first_run_email) {
        if (!validation_rules.email((document.getElementById('email')).value)) {
            underlineFunction("email");
        } else {
            clearTheField("email");
        }
        first_run_email = false;
    }
});

email.addEventListener('keyup', function () {
    if (!first_run_email) {
        if (!validation_rules.email((document.getElementById('email')).value)) {
            underlineFunction("email");
        } else {
            clearTheField("email");
        }
    }
});

let first_run_password = true;
password.addEventListener('blur', function () {
    if (first_run_password) {
        if (!validation_rules.password((document.getElementById('password')).value)) {
            underlineFunction("password");
        } else {
            clearTheField("password");
        }
        first_run_password = false;
    }
});

password.addEventListener('keyup', function () {
    if (!first_run_password) {
        if (!validation_rules.password((document.getElementById('password')).value)) {
            underlineFunction("password");
        } else {
            clearTheField("password");
        }
    }
});

text.addEventListener('keyup', function () {
    if (!validation_rules.text((document.getElementById('text')).value)) {
        underlineFunction("text");
    } else {
        clearTheField("text");
    }
});

textarea.addEventListener('keyup', function () {
    if (!validation_rules.textarea((document.getElementById('textarea')).value)) {
        underlineFunction("textarea");
    } else {
        clearTheField("textarea");
    }
});

document.getElementById('select_house').addEventListener('change', function () {
    if ((document.getElementById('select_house').value === "")) {
        underlineFunction('select_house');
    } else {
        clearTheField("select_house");
    }
});

let validation_rules = {
    email: function (elements) {
        const regen_email = /^[\w\.\-\_]+\@\w+\.\w{2,8}$/i;
        return regen_email.test(elements);
    },
    password: function (elements) {
        const regen_password = /[0-9a-zA-Z!@#$%^&*]{8,}/;
        return regen_password.test(elements);
    },
    text: function (elements) {
        const regen_text = /^\w{2,}$/i;
        return regen_text.test(elements);
    },
    textarea: function (elements) {
        const regen_textarea = /^[\w\s]{6,}$/i;
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
};

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
};

function switchForm() {
    document.getElementById("section_1").style.display = 'none';
    document.getElementById("section_2").style.display = 'block';
};

function underlineFunction(name) {
    document.getElementById(name).style.border = '2px solid red';
};

function clearTheField(name) {
    document.getElementById(name).style.border = 'none';
    document.getElementById(name).style.borderBottom = '2px solid #d3bb89';
};


$(document).ready(function () {
    $('.slider_slick').slick({
        initialSlide: 3,
        autoplay: true,
        arrows: false,
        fade: true,
    });
    $('select').niceSelect();
    $('#select_house').on('change', function () {
        let house_name = $(this).val();
        if (house_name !== "") {
            $('.slider_slick').slick('unslick');
            $('.slider_slick').slick({
                autoplay: false,
                arrows: false,
                fade: true,
            });
        }
        ;
        switch (house_name) {
            case 'Stark':
                $('.slider_slick').slick('slickGoTo', 0);
                break;
            case 'Baratheon':
                $('.slider_slick').slick('slickGoTo', 1);
                break;
            case 'Lannister':
                $('.slider_slick').slick('slickGoTo', 2);
                break;
            case 'Targaryen':
                $('.slider_slick').slick('slickGoTo', 3);
                break;
        }
        ;
    })
});




