function thumbnail(){
    document.getElementById('files[]').addEventListener('change', function(event) {
        var fileee = event.target.files;
        var i=0;
        alert('im in addevent');
        var cont = document.getElementById('uploads').innerHTML;
        var myloop = function(file, i){
            alert('im inside the loop');
            var fileReader = new FileReader();
            if (file.type.match('image')) {
                fileReader.onload = function() {
                    var img = document.getElementById('thumb');
                   // var img = document.createElement('thumb');
                    img.src = fileReader.result;
                   // document.getElementsById('upload').appendChild(img);
                };
                fileReader.readAsDataURL(file);
            } else {
                fileReader.onload = function() {
                    var blob = new Blob([fileReader.result], {type: file.type});
                    var url = URL.createObjectURL(blob);
                    var video = document.createElement('video');
                    var timeupdate = function() {
                        if (snapImage()) {
                            video.removeEventListener('timeupdate', timeupdate);
                            video.pause();
                        }
                    };
                    video.addEventListener('loadeddata', function() {
                        if (snapImage()) {
                            video.removeEventListener('timeupdate', timeupdate);
                        }
                    });
                    var snapImage = function() {
                        var canvas = document.createElement('canvas');
                        canvas.width = 200;
                        canvas.height = 200;
                        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                        var image = canvas.toDataURL();
                        var urlcan = document.getElementById('canurl');
                        urlcan.value=canvas.toDataURL();
                        var success = image.length > 100000;
                        var name = file.name;
                        if (success) {
                            var img = document.getElementById('thumb');
                            //var imgs = document.createElement('thumbs');
                            img.src = image;
                            //imgs.src = image;
                            //imgs.id = "thumbs";
                            //var urlcans = document.createElement('canurls');
                            //urlcans.id = "canurls";
                            //urlcans.type="textare";
                            //urlcans.value=canvas.toDataURL();
                            //document.getElementById('uploads').appendChild(imgs);
                            //document.getElementById('uploads').appendChild(urlcans);
                            cont = cont + "<br>";
                            cont = cont + "<img src='" + image + "' name='" + name + "' id='" + name + "'/>";
                            cont = cont + "<br>";
                            cont = cont + "<textarea id='" + name +"' name='" + name + "'>"+ image +"</textarea>";
                            document.getElementById('uploads').innerHTML=cont;
                            URL.revokeObjectURL(url);
                        }
                        return success;
                    };
                    var timeee= function(){
                        if(video.currentTime>=0){
                            video.pause();
                            video.removeEventListener('timeupdate',timeee);
                            video.addEventListener('timeupdate',timeupdate);
                        }
                    }
                    video.addEventListener('timeupdate',timeee);
                    video.preload = 'metadata';
                    video.src = url;
                    // Load video in Safari / IE11
                    video.muted = true;
                    video.playsInline = true;
                    video.play();
                };
                fileReader.readAsArrayBuffer(file);
            }
        }
        Array.from(fileee).forEach(myloop);
    });
}