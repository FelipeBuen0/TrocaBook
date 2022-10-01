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

function onSignInClick() {
    const u = $('input.username').val()
    let p = $('input.password').val()
    if (u != '' && p != '') {
        p = crypt.encrypt(p);
        let obj = {
            username: u,
            password: p,
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("log").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "api/config.php");
        xmlhttp.send(obj);
        return;
        // localStorage.setItem('signed', true);
        // return window.location.href = 'index.html'
    }
    return alert('Todos os campos deverão ser preenchidos')
}
window.addEventListener('keydown', onKeyDown);

function onKeyDown(e) {
    if (e.keyCode == 13) {
        return onSignInClick();
    }
}