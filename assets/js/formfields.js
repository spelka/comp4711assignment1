function updateUploadImagePreview(input)
{
    var thumbnailElement =
        input.parentNode.querySelector(".uploadImagePreview");

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            thumbnailElement.setAttribute('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
