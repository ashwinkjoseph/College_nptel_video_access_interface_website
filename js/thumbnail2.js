function thumbnail(){
    alert('im called');
    document.getElementById('files').addEventListener('change', function(event) {
        var filee = event.target.files;
        var i=0;
        alert('im outside while'+"i:"+i);
        while(filee[i]){
            alert('i:'+i);
            var file = filee[i];
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
                    var snapImage = function() {
                        var canvas = document.createElement('canvas');
                        canvas.width = 200;
                        canvas.height = 200;
                        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                        var image = canvas.toDataURL();
                        var urlcan = document.getElementById('canurl');
                        urlcan.value=canvas.toDataURL();
                        var success = image.length > 100000;
                        if (success) {
                            var img = document.getElementById('thumb');
                            // var img = document.createElement('thumb'+i);
                            img.src = image;
                           // img.id = "thumb"+i;
                           // var urlcan = document.createElement('canurl'+i);
                           // urlcan.id = "canurl"+i;
                           // document.getElementById('upload').appendChild(img);
                           // document.getElementById('upload').appendChild(urlcan);
                            URL.revokeObjectURL(url);
                        }
                        return success;
                    };
                    var timeee= function(){
                        if(video.currentTime>=5){
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
            i=i+1;
        }
    });
}