function AddNewPost() {
    let modal = document.querySelector('.modal');
    modal.style.display = 'block';
}
function CloseModalButton() {
    let modal = document.querySelector('.modal');
    modal.style.display = 'none';
}
function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("UploadImage").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("UploadPreview").src = oFREvent.target.result;
    };
};