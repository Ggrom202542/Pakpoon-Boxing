function readURL(input){
    if(input.files[0]){
        let reader = new FileReader();
        reader.onload = function (e) {
            let element = document.querySelector('#imgUpload');
            element.setAttribute("src", e.target.result);
        }  
        reader.readAsDataURL(input.files[0]);
    }         
}