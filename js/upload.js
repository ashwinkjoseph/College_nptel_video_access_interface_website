function  choose_upload(){
    if(document.getElementById('format')==0){
        alert('Please choose the format of the file to be uploaded!!!!');
    }
    else{
        var cont;
        if(document.getElementById('format')=="Website"){
            cont="<input type='text' name='link' id='link'/>";
        }
        else{
            cont="<input type='file' name='files' id='files' multiple/>";
        }
        cont=cont+"<br>"+"<input type='button' name='Upload' id='Upload' onclick='check();'/>";
        document.getElementById('upload').innerHTML=cont;
    }
}