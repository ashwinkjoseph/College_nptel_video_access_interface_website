function  choose_upload(){
    var format = document.getElementById('format').value;
    if(format==0){
        alert('Please choose the format of the file to be uploaded!!!!');
    }
    else{
        var cont;
        if(format=="website"){
            cont="<input type='text' name='title' id='title'/>";
            cont=cont+"<br>"+"<input type='text' name='link' id='link'/>";
        }
        else{
            cont="<input type='file' name='files' id='files' multiple/>";
            document.getElementById('upload').innerHTML=cont;
            alert('format :'+format);
            if(format=="video"){
                thumbnail();
            }
        }
        cont="<input type='button' name='Upload' id='Upload' onclick='check();'/>";
        document.getElementById('but').innerHTML=cont;
    }
}