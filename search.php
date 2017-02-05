<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>NPTEL</title>
	<link rel="stylesheet" type="text/css" href="css/default.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>              
        <?php
            $conn = mysqli_connect("localhost", "root", "", "nptel");
        ?>
    </head>
    <body>
        <?php 
            if(!empty($_POST)){
                $conn = mysqli_connect("localhost","root","","nptel");
                $value= mysqli_real_escape_string($conn, $_POST['search']);
                $disc = mysqli_real_escape_string($conn, $_POST['Discipline']);
                $q = mysqli_query($conn, "SELECT DISTINCT Discipline FROM files");
                $vary = mysqli_query($conn, "SELECT * FROM files WHERE (Topic LIKE '%$value%') AND (Discipline = '$disc')");
                if($vary){
        ?>		
        <!-- Top Navigation -->
	<div id="navbar"><a href="#mace">MACE</a></div>
            <div id="container">		
		<div class="main clearfix">
		<!-- Optional columns for small components -->
                    <div class="column">
                        <center> 
                            <p class="column-p">NPTEL</p>
                        </center><br>
                        <center>National Programme on Technology  Enhanced learning</center>			
                    </div>
                    <div class="column">
                        <br><br>MAR ATHANASIUS COLLEGE OF ENGINEERING<br><br><br>
                        <form class="" action="./search.php" method="post" id="2">        
                            <input class="serch1"  type="text" name="search" placeholder="Search here"/>
                            <select class="subm1" name="Discipline">
                                <option value="0" selected="1">Default</option>
                                <?php       
                                    while($var = mysqli_fetch_array($q)){
                                        $values = $var['Discipline'];
                                        echo "<option value='$values'>$values</option>";
                                    }
                                ?>
                            </select>
                            <input class="subm1" type="submit"/>
                        </form>       
                    </div> 
                </div>
                <hr>  
                <div id="demo">
                    <br>
                    <marquee>Welcome to NPTEL MACE...</marquee>
                    <div  id="results">           
                        <center>                    
                            <form action ="download.php" method ="POST">
                            <table style="width:100%"><br>
                                <tr><td colspan="2" id="content"></td></tr><br>
                                <?php
                                    while($ar=mysqli_fetch_array($vary)){
                                        $title=$ar['Topic'];    
                                        $src="./uploads/FILES/".$title;
                                        if($ar['Format']=="video/mp4"){
                                            $f = "'".$title."'";
                                            $e = " ";
                                            echo '<tr><td width="10%"><a href="#" onclick="expand('.$f.', 0, '.$e.');"><video align="left" preload="metadata" style="width:100%; height:150%" src="'.$src.'"></video></a></td><td width="80%"><a href="#" onclick="expand('.$f.', 0);">'.$title.'</a></td></tr>';
                                        }
                                        else{
                                            if($ar['Format']=="application/pdf"){
                                                $f = "'".$title."'";
                                                $e = " ";
                                                echo '<tr ><td width="10%"><a href="#" onclick="expand('.$f.', 1, '.$e.');"><img style="width:100%;" src="./images/logo-adobe-pdf.png"/></a></td><td style="height:10px" width="80%"><a href="#" onclick="expand('.$f.', 1);">'.$title.'</a></td></tr>';
                                            }
                                            else{
                                                if($ar['Format']=="html"){
                                                    $f = "'".$title."'";
                                                    $e = " ";
                                                    echo '<tr><td width="10%"><a href="#" onclick="expand('.$f.', 2, '.$e.');"><img style="width:100%;" src="./images/HTML5_logo_and_wordmark.svg"/></a></td><td style="height:10px" width="80%"><a href="#" onclick="expand('.$f.', 2, '.$e.');">'.$title.'</a></td></tr>';
                                                }
                                                else{
                                                    if(($ar['Format']=="application/vnd.ms-powerpoint")||($ar['Format']=="application/vnd.openxmlformats-officedocument.presentationml.presentation")){
                                                        $f = "'".$title."'";
                                                        $e = " ";
                                                        echo '<tr><td style="text-align:left" width="10%"><a href="#" onclick="expand('.$f.', 3, '.$e.');"><img style="width:100%;" align="left" style="height:50px; " src="./images/Microsoft_PowerPoint_2013_logo.svg.png"/></a></td><td style="height:10px" width="80%"><a href="#" onclick="expand('.$f.', 3, '.$e.');">'.$title.'</a></td></tr>';
                                                    }
                                                    else{
                                                        if($ar['Format']=="website"){
                                                            $f = "'".$title."'";
                                                            $link = "'".$ar['link']."'";
                                                            echo '<tr><td style="width:10%"><a href="#" onclick="expand('.$f.', 4, '.$link.');"><img style="width:100%;" src="./images/HTML5_logo_and_wordmark.svg"/></a></td><td width=80%"><a href="#" onclick="expand('.$f.', 4, '.$link.');">'.$title.'</a></td></tr>';
                                                        }
                                                    }
                                                }
                                            }
                                        } 
                                    }
                }
                else {echo "<p>Sorry Content Couldn't be found</p>";}?>
                            </table>
                            </form>
                <?php
            }
            else{
                echo "<script>alert('Sorry, but you have to proceed from the main page.. click OK to redirect');</script>";
                header('Location: ./index.php');
            }
        ?>              
                        </center>
                    </div>
                    <br><br>
                </div>            
                <div class="rowa"><hr>Web designed by</div>
            </div>      
            <!-- /container -->	
    </body>
    <script type="text/javascript" src="./js/expand_function.js"></script>
</html>