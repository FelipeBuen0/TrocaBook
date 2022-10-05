//@method Crypt();
//Encrypt all the data that passes through (focus in passwords)
// const crypt = {
//     secret: 'ko_ob',
//     encrypt: function (p) {
//         var a = CryptoJS.AES.encrypt(p, crypt.secret);
//         a = a.toString();
//         return a;
//     },
//     decrypt: function (p) {
//         var b = CryptoJS.AES.decrypt(p, crypt.secret);
//         b = b.toString(CryptoJS.enc.Utf8);
//         return b;
//     },
// }

function onLoadHandler() {
    local = "http://localhost/app/"
    link = window.location
    href = link.href;
    if (href === local + 'index.php' || href === local) {
        // beforephpLoad();
        setTimeout(() => {
            let loader = document.getElementById("preloader")
                loader.style.display = "none"
        }, 3000);
        return localStorage.signed == 'false' ? link.assign(local + 'login.php') : null 
    }
    if (href === local + 'login.php') {
        return localStorage.signed == 'false' ? null :  link.assign(local + 'index.php')
    }
    if (href === local + 'cadastro.php') {
        return localStorage.signed == 'false' ? null : link.assign(local + 'index.php')
    }
}
// function beforephpLoad() {
//     const me = this;
//     $.ajax({
//         url: 'config.php',
//         method: 'GET',
//         success: me.beforephpLoadSuccess(a, b, x),
//         error: me.beforephpLoadError(a, b, x)
//     })
// }
// function beforephpLoadSuccess(a, b, x) {
//     const me = this;
//     let loader = document.getElementById("preloader")
//         loader.style.display = "none"
// }
// function beforephpLoadError(a, b, x) {
//     const me = this;
// }



// function onSignInClick() {
//     let u = $('input.username').val();
//     let p = $('input.password').val();
//     if (u != '' && p != '') {
//         p = crypt.encrypt(p);
//         $.post("app/api/config.php", "user=" + u + "&pass=" + p, function( data ) {
//             console.log(data);
//         });
//         window.location.assign('index.php')
//         return;
//     }
//     return alert('Todos os campos deverão ser preenchidos');
// }

window.addEventListener('keydown', onKeyDown);

function onKeyDown(e) {
    if (e.keyCode == 13) {
        return onSignInClick();
    }
}