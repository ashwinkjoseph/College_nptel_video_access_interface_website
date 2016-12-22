<!DOCTYPE html>
<html>
<head>
    <meta charser="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>NPTEL Videos MACE</title>
    <script type="text/javascript" src="./js/upload.js"></script>
    <script type="text/javascript" src="./js/content_check.js"></script>
</head>
<body>
    <div name="container" class="container-fluid">
    <div class="col-md-1 col-sm-1 col-lg-1"></div>
    <div class="col-md-10 col-sm-10 col-lg-10">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="jumbotron">
                <form method="post" enctype="multipart/form-data">
                    <select id="subject" name="subject">
                        <option value="0" selected="1">Choose</option>
                        <option value="subject1">Subject1</option>
                        <option value="subject2">Subject2</option>
                        <option value="subject3">Subject3</option>
                        <option value="subject4">Subject4</option>
                        <option value="subject5">Subject5</option>
                    </select>
                    <select name="format" id="format" onchange="choose_upload();">
                        <option value="0" selected="1">Choose</option>
                        <option value="PDF">PDF</option>
                        <option value="video">Video</option>
                        <option value="website">Webpage</option>
                        <option value="htmlfile">HTMLFILE</option>
                    </select>
                    <div id="uploads" name="uploads">
                    </div>
                    <div id="upload" name="upload">
                    </div>
                    <img id="thumb" name="thumb"/>
                        <textarea id="canurl" name="canurl"></textarea>
                    <div id="but" name="but">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-1 col-sm-1 col-lg-1"></div>
    </div>
    <script type="text/javascript" src="./js/thumbnail.js"></script>
</body>
<?php
    if(!empty($_POST)){
        $subject=$_POST['subject'];
        $format=$_POST['format'];
        if($format=="website"){
            $title=$_POST['title'];
            $link=$_POST['link'];
        }
        else{
            
        }
    }
?>
</html>