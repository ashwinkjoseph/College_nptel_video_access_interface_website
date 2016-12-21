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
    </head>
    <body>
        <?php 
            echo "<script>alert('im here');</script>"; 
            if(!empty($_POST)){
                $conn=mysqli_connect("localhost","root","","nptel");
                $value=$_POST['search'];
                $var=mysqli_query($conn, "SELECT * FROM TABLE WHERE TITLE LIKE $value");
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
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <ul>
                                <?php 
                                while($ar=mysqli_fetch_array($var)){
                                    $title=$ar['TITLE'];
                                    if($ar['format']=="video"){
                                        $n=$ar['number'];
                                        for($i=1; $i<=$n; $i++){
                                            $src="./UPLOADS/".$title.$i.".mp4";?>
                                        <?php echo "<li><video class='responsive' style='width:10% height:10%' src='$src'> <p>$title</p></li>";?>
                                <?php 
                                        }
                                    }
                                    else{
                                        if($ar['format']=="pdf"){
                                            $n=$ar['number'];
                                            for($i=1; $i<=$n; $i++){
                                                $src="./UPLOADS/".$title.$i.".pdf";
                                                echo "<li><img src='./images/logo-adobe-pdf.jpg'/> $title</li>"
                                            }
                                        }
                                    }
                                }
                }
                else { echo "<p>Sorry Content Couldn't be found</p>";
                }?>
                            </ul>
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
