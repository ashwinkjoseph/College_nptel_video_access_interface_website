function check(){
    var flag=1;
    if(document.getElementById('subject').value=="0"){
        alert('You cannot leave the subject Empty');
        flag=0;
    }
    if(document.getElementById('format').value=="0"){
        alert('You cannot leave the format Empty');
        flag=0;
    }
    if(flag==1){
        document.forms[0].submit();
    }
}