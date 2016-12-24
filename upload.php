<!DOCTYPE html>
<html>
<head>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "nptel");
    ?>
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
</body>
<?php
    if(!empty($_POST)){
        $flag = 1;
        $subject=$_POST['subject'];
        $format=$_POST['format'];
        if($format=="website"){
            $title=$_POST['title'];
            $link=$_POST['link'];
            $query = "INSERT INTO website VALUES(id, '$subject', '$title', '$link')";
            if(mysqli_query($conn, $query)){
                echo "<script>alert('Success');</sctipt>";
            }
        }
        else{
            if($format=="video"){
                $n = count($_FILES['files']['name']);
                $uploaddir = "./uploads/video/";
                for($i=0; $i<$n; $i++){
                    if($_FILES['files']['size'][$i]==0){
                        $flag = 0;
                        die("ERROR: Zero Byte File Upload");
                    }
                    $allowedFileTypes = array("video/mp4");
                    if(!in_array($_FILES['files']['type'][$i], $allowedFileTypes)){
                        $flag = 0;
                        die("ERROR: File Type Not Allowed");
                    }
                    if(!is_uploaded_file($_FILES['files']['tmp_name'][$i])){
                        $flag = 0;
                        die("ERROR: Invalid File Upload");
                    }
                    $name = $_FILES['files']['name'][$i];
                    if(strpos($name, ".mp4") == false){
                        $name = $name.".mp4";
                    }
                    move_uploaded_file($_FILES['files']['tmp_name'][$i], $uploaddir.$name);
                    $query = "INSERT INTO videos VALUES(id, '$subject', '$name')";
                    if(mysqli_query($conn, $query)){
                        echo "<script>alert('Success')</script>";
                    }
                }
            }
            else{
                if($format=="pdf"){
                    $n = count($_FILES['files']['name']);
                    $uploaddir = "./uploads/";
                    for($i=0; $i<$n; $i++){
                        if($_FILES['files']['size'][$i]==0){
                            $flag = 0;
                            die("ERROR: Zero Byte File Upload");
                        }
                        if(!is_uploaded_file($_FILES['files']['tmp_name'][$i])){
                            $flag = 0;
                            die("ERROR: Invalid File Upload");
                        }
                        $name = $_FILES['files']['name'][$i];
                        move_uploaded_file($_FILES['files']['tmp_name'][$i], $uploaddir.$name);
                        $query = "INSERT INTO pdf VALUES(id, '$subject', '$name')";
                        if(mysqli_query($conn, $query)){
                            echo "<script>alert('Success')</script>";
                        }
                    }
                }
                else{
                    if($format=="htmlfile"){
                        $n = count($_FILES['files']['name']);
                        $uploaddir = "./uploads/";
                        for($i=0; $i<$n; $i++){
                            if($_FILES['files']['size'][$i]==0){
                                $flag = 0;
                                die("ERROR: Zero Byte File Upload");
                            }
                            if(!is_uploaded_file($_FILES['files']['tmp_name'][$i])){
                                $flag = 0;
                                die("ERROR: Invalid File Upload");
                            }
                            $name = $_FILES['files']['name'][$i];
                            move_uploaded_file($_FILES['files']['tmp_name'][$i], $uploaddir.$name);
                            $query = "INSERT INTO htmlf VALUES(id, '$subject', '$name')";
                            if(mysqli_query($conn, $query)){
                                echo "<script>alert('Success')</script>";
                            }
                        }
                    }
                    else{
                        echo "<script>alert('wrong format!!!')</script>";
                    }
                }
            }
        }
    }
?>
</html>