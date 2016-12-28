function expand(topic, type, link){
    container = document.getElementById('content');
    if(type!=4){
        src = "./uploads/FILES/"+topic;
    }
    var title = "<h1>"+topic+"</h1><br/>";
    if(type==0){
        var vid = "<video width='100%' height='600' src='"+src+"' controls='true'></video>";
        container.innerHTML=title+vid;
    }
    else{
        if(type==1){
            var cont = "<iframe width='100%' height='600' src='"+src+"' ></iframe>";
            container.innerHTML=title+cont;
        }
        else{
            if(type==2){
                var cont = "<iframe src='"+src+"'></iframe>";
                container.innerHTML=title+cont;
            }
            else{
                if(type==3){
                    var file = document.createElement('input');
                    file.type = "text";
                    file.name = "DOWN";
                    file.value = src;
                    file.hidden= "true";
                    container.appendChild(file);
                    document.forms[1].submit();
                }
                else{
                    if(link!=" "){
                        var cont = "<iframe src='"+link+"'></iframe>";
                        cont = cont + "<br><a href='"+link+"' target='_blank'>Open in New TAB</a>";
                        container.innerHTML = topic + cont;
                    }
                    else{
                        alert('The link is corrupted, Please contact the administrator');
                    }
                }
            }
        }
    }
}