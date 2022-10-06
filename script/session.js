function onLoadHandler() {
    local = "http://localhost/app/" //For localhost or local editing
    // realUrl = window.location; //For the real app url
    link = window.location
    href = link.href;
    if (href.toLowerCase() === local + 'Index.html'.toLowerCase() || href.toLowerCase() === local.toLowerCase()) {
        setTimeout(() => {
            let loader = document.getElementById("preloader")
                loader.style.display = "none"
        }, 3000);
        return localStorage.signed == 'false' ? link.assign(local + 'Login.html') : null 
    }
    if (href.toLowerCase() === local + 'Login.html'.toLowerCase()) {
        return localStorage.signed == 'false' ? null :  link.assign(local + 'Index.html')
    }
    if (href.toLowerCase() === local + 'register.html'.toLowerCase()) {
        return localStorage.signed == 'false' ? null : link.assign(local + 'Index.html')
    }
}
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

// function beforehtmlLoad() {
//     const me = this;
//     $.ajax({
//         url: 'config.html',
//         method: 'GET',
//         success: me.beforehtmlLoadSuccess(a, b, x),
//         error: me.beforehtmlLoadError(a, b, x)
//     })
// }
// function beforehtmlLoadSuccess(a, b, x) {
//     const me = this;
//     let loader = document.getElementById("preloader")
//         loader.style.display = "none"
// }
// function beforehtmlLoadError(a, b, x) {
//     const me = this;
// }



// function onSignInClick() {
//     let u = $('input.username').val();
//     let p = $('input.password').val();
//     if (u != '' && p != '') {
//         p = crypt.encrypt(p);
//         $.post("app/api/config.html", "user=" + u + "&pass=" + p, function( data ) {
//             console.log(data);
//         });
//         window.location.assign('index.html')
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