//@method Crypt();
//Encrypt all the data that passes through (focus in passwords)
const crypt = {
    secret: 'ko_ob',
    encrypt: function (p) {
        var a = CryptoJS.AES.encrypt(p, crypt.secret);
        a = a.toString();
        return a;
    },
    decrypt: function (p) {
        var b = CryptoJS.AES.decrypt(p, crypt.secret);
        b = b.toString(CryptoJS.enc.Utf8);
        return b;
    },
}

function onLoadHandler() {
    local = "http://localhost/app/"
    link = window.location
    href = link.href;
    if (href === local + 'index.html') {
        // beforeHtmlLoad();
        setTimeout(() => {
            let loader = document.getElementById("preloader")
                loader.style.display = "none"
        }, 3000);
        return localStorage.signed == 'false' ? link.assign(local + 'login.html') : null 
    }
    if (href === local + 'login.html') {
        return localStorage.signed == 'false' ? null :  link.assign(local + 'index.html')
    }
    if (href === local + 'cadastro.html') {
        return localStorage.signed == 'false' ? null : link.assign(local + 'index.html')
    }
}
function beforeHtmlLoad() {
    const me = this;
    $.ajax({
        url: 'config.php',
        method: 'GET',
        success: me.beforeHtmlLoadSuccess(a, b, x),
        error: me.beforeHtmlLoadError(a, b, x)
    })
}
function beforeHtmlLoadSuccess(a, b, x) {
    const me = this;
    let loader = document.getElementById("preloader")
        loader.style.display = "none"
}
function beforeHtmlLoadError(a, b, x) {
    const me = this;
}



function onSignInClick() {
    let u = $('input.username').val();
    let p = $('input.password').val();
    if (u != '' && p != '') {
        p = crypt.encrypt(p);
        $.post("app/api/config.php", "user=" + u + "&pass=" + p, function( data ) {
            console.log(data);
        });
        return;
    }
    return alert('Todos os campos deverão ser preenchidos');
}

window.addEventListener('keydown', onKeyDown);

function onKeyDown(e) {
    if (e.keyCode == 13) {
        return onSignInClick();
    }
}