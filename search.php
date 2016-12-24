<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>NPTEL MACE</title>
        <script type="text/javascript">
            function checkSubmit(n, e){
                document.forms[n-1].submit();
            }
        </script>
        <script type="text/javascript" src="./js/expand_function.js"></script>
        <script type="text/javascript" src="./js/PDFObject-master/pdfobject.js"></script>
    </head>
    <body>
        <?php 
            if(!empty($_POST)){
                $conn=mysqli_connect("localhost","root","","nptel");
                $value=$_POST['search'];
                $var=mysqli_query($conn, "SELECT * FROM files WHERE (Topic LIKE '%$value%')");
                if($var){
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1 col-sm-1 col-lg-1"></div>
                <div class="col-md-10 col-sm-10 col-lg-10">
                    <nav class="navbar">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-lg-2">
                                <a href="./subcat.php?sub=1">Subject1</a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-lg-2">
                                <a href="./subcat.php?sub=2">Subject2</a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-lg-2">
                                <a href="./subcat.php?sub=3">Subject3</a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-lg-2">
                                <a href="./subcat.php?sub=4">Subject4</a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-lg-2">
                                <a href="./subcat.php?sub=5">Subject5</a>
                            </div>
                        </div>
                    </nav>
                    <div class ="row">
                        <div class="col-lg-12 col-md-12 col-sm-12" id="content"></div> 
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <?php 
                                while($ar=mysqli_fetch_array($var)){
                                    $title=$ar['Topic'];    
                                    $src="./uploads/FILES/".$title;
                                    if($ar['Format']=="video/mp4"){
                                        $f = "'".$title."'";
                                        echo '<div><a href="#" onclick="expand('.$f.', 0);"><video style="width:5%; height:5%" src="'.$src.'"></video>'.$title.'</a></div>';
                                    }
                                    else{
                                        if($ar['Format']=="application/pdf"){
                                            $f = "'".$title."'";
                                            echo '<div><a href="#" onclick="expand('.$f.', 1);"><img src="./images/logo-adobe-pdf.jpg"/>'.$title.'</a></div>';
                                        }
                                        else{
                                            if($ar['Format']=="html"){
                                                $f = "'".$title."'";
                                                echo '<div><a href="#" onclick="expand('.$f.', 2);"><img src="./images/HTML5_logo_and_wordmark.svg"/>'.$title.'</a></div>';
                                            }
                                            else{
                                                if($ar['Format']=="application/vnd.ms-powerpoint"){
                                                    $f = "'".$title."'";
                                                    echo '<div><a href="#" onclick="expand('.$f.', 3);"><img src="./images/Microsoft_PowerPoint_2013_logo.svg.png"/>'.$title.'</a></div>';
                                                }
                                                else{
                                                    if($ar['Format']=="website"){
                                                        $f = "'".$title."'";
                                                        echo '<div><a href="#" onclick="expand('.$f.', 4);"><img src="./images/HTML5_logo_and_wordmark.svg"/>'.$title.'</a></div>';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                }
                else { echo "<p>Sorry Content Couldn't be found</p>";
                }?>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-sm-1 col-lg-1"></div>
            </div>
        </div>
        <?php
            }
            else{
                echo "<script>alert('Sorry, but you have to proceed from the main page.. click OK to redirect');</script>";
                header('Location: ./index.html');
            }
        ?>
    </body>
</html>
