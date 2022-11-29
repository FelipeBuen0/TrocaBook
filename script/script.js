function AddNewPost() {
    let modal = document.querySelector('.modal');
    modal.style.display = 'block';
}
function CloseModalButton() {
    let modal = document.querySelector('.modal');
    modal.style.display = 'none';
}
function onTitleKeyUp() {
   let title = document.getElementById('title_post').value;
   let titleAlert = document.getElementById('titleAlert');
   setTimeout(() => {
        if (title.length < 6) {
            titleAlert.style.display = 'inline-block';
            titleAlert.innerHTML = 'O título precisa ter no mínimo 6 caractéres';
            document.getElementById("post_submit").disabled = true;
        }
        else {
            document.getElementById("post_submit").disabled = false;
            titleAlert.style.display = '';
            titleAlert.innerHTML = '';
        }
   }, 500)
}

function onPreviewImageChange() {
    let isSuccess; 
    let submitButton = document.getElementById("post_submit");
    let inputFile = document.getElementById("UploadImage").files[0];
    if (inputFile) {
        let fileTypes = ['jpeg', 'jpg', 'png'];
        let extension = inputFile.name.split('.').pop().toLowerCase();
        isSuccess = fileTypes.indexOf(extension) > -1;
        if (isSuccess) {
            console.log('Reading file')
            let reader = new FileReader();
            reader.readAsDataURL(inputFile);
            reader.onload = function (oFREvent) {
                document.getElementById("UploadPreview").src = oFREvent.target.result;
            }
            } else {
            console.log('Não suportado: ' + inputFile.name);
            document.getElementById('fileAlert').style.display = 'block';
            document.getElementById('fileAlert').innerHTML = 'O formato inserido não é válido!'
        }
    }
};