// preloader = document.getElementById('preloader');
// setTimeout(() => {
//     preloader.style.display = 'none';
// }, 1500);

document.addEventListener('change', VerificarCampos);

function VerificarCampos(){
    document.getElementById('update_submit').disabled = false
}