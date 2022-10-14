// preloader = document.getElementById('preloader');
// setTimeout(() => {
//     preloader.style.display = 'none';
// }, 1500);

document.addEventListener('change', VerificarCampos);

function VerificarCampos(){
    document.getElementById('update_submit').disabled = false
}

 const my_dropdowns = document.querySelectorAll('.my-dropwdown');
 my_dropdowns.forEach(dropdown => {
    const select = dropdown.querySelector('.select');
    const menu = dropdown.querySelector('.menu');
    const options = dropdown.querySelector('.menu li');
    const selected = dropdown.querySelector('.selected ');
    select.addEventListener('click', () => {
        select.classList.toggle('select-clicked');
        menu.classList.toggle('menu-open');
     })
     if (menu.classList) {

     }
     select.addEventListener('mouseout', () => {
        select.classList.toggle('select-clicked');
        menu.classList.toggle('menu-open');
     })
 });