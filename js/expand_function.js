function expand(topic, type){
    container = document.getElementById('content');
    src = "./uploads/FILES/"+topic;
    var title = "<h1>"+topic+"</h1><br/>";
    if(type==0){
        var vid = "<video src='"+src+"' controls='true'></video>";
        container.innerHTML=title+vid;
    }
    else{
        if(type==1){
            PDFObject.embed(src, "#content");
        }
        else{
            if(type==2){
                var cont = "<iframe src='"+src+"'></iframe>";
                container.innerHTML=cont;
            }
            else{
                if(type==3){
                }
            }
        }
    }
}