<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>NPTEL</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" href="cobaltaliensuperital\font.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>             

        <?php
            $conn = mysqli_connect("localhost", "root", "", "nptel");
        ?>	
        <style type="text/css">
            h1{
                font-family: 'cobaltaliensuperital';
                transform-origin: 2s centre;
            }
            font{
                font-size: xx-small;
            }
            #navi{
                overflow:hidden;
                height : 125px;
                opacity:50;
                -webkit-transition: height 0.5s linear;
                transition: height 0.5s linear;
                -moz-transition: height 0.5s linear;
            }
            #column{
                overflow:hidden;
                height : 200px;
                position: fixed;
                -webkit-transition: height 0.5s linear;
                transition: height 0.5s linear;
                -moz-transition: height 0.5s linear;
            }
            .demo-layout-waterfall .mdl-layout__header-row .mdl-navigation__link:last-of-type  {
  padding-right: 0;
}
.footerdesk{
    position: relative;
    bottom:0;
    width:100%;
}
.footermob{
    position: relative;
    bottom:0;
    width:100%;
}
.demo-card-wide.mdl-card {
  width: 100%
}
.demo-card-wide > .mdl-card__title {
  height: auto;
  background-color: #D3D3D3;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
h2{
    color:white;
}
        </style>
        <script>
            var navi;
            var search;
            var yPos;
            function yscrolltop(){
                yPos = window.pageYOffset;
                navi = document.getElementById('navi');
                search = document.getElementById('column');
                if(yPos>5){
                    navi.style.height = "0px";
                }else{
                        navi.style.height = "125px";
                }
            }
            window.addEventListener("scroll", yscrolltop);
            var screensize;
        </script>
    </head>
    <body>
        <?php 
            if(!empty($_POST)){
                $conn = mysqli_connect("localhost","root","","nptel");
                $value= mysqli_real_escape_string($conn, $_POST['search']);
                $disc = mysqli_real_escape_string($conn, $_POST['Discipline']);
                $q = mysqli_query($conn, "SELECT DISTINCT Discipline FROM files");
                $vary = mysqli_query($conn, "SELECT * FROM files WHERE (Topic LIKE '%$value%') AND (Discipline = '$disc')");
                if(!$vary){
                    echo "<script>alert('failed');</script>";
                }
                else{
        ?>		              
        <!-- Uses a header that contracts as the page scrolls down. -->
<div class="mdl-grid mdl-grid--no-spacing">
<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone">
<div class="mdl-layout mdl-js-layout">
<div class="mdl-grid">
<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone">
<div class="mdl-layout--fixed-header">
    <nav style="opacity:0" class="navbar navbar-default"></nav>
    <nav style="opacity:0" class="navbar navbar-default"></nav>
  <nav class="navbar navbar-default navbar-fixed-top mdl-layout__header mdl-shadow--2dp">
    <div id="navi" class="mdl-layout__header-row">
      <span class="mdl-layout-title">MAR ATHANASIUS COLLEGE OF ENGINEERING, NPTEL STUDY MATERIAL ONLINE COLLECTION</span>
    </div>
      <div class="mdl-layout__header-row">
          <div class="mdl-layout-spacer"></div>
          <div id="bu">
          <!--<div id="bu" style="padding-right: 50px">-->
          <form id="sea" style="display:none" action="./search.php" method="post" id="2"> 
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" id="sample1" type="text" name="search">
                        <label class="mdl-textfield__label" for="sample1">Search Here</label>
                    </div>
                    <!--<input class="serch1" style="opacity:5;height: 30px; width: 100px; padding:0px 10px"  type="text" name="search" placeholder="Search here"/>-->
                    <select class="subm1" style="height: 20px; width: 100px;" name="Discipline">
                        <option value="0" selected="1">Default</option>
                        <?php
                            $q = mysqli_query($conn, "SELECT DISTINCT Discipline FROM files");
                            while($var = mysqli_fetch_array($q)){
                                $values = $var['Discipline'];
                                echo "<option value='$values'>$values</option>";
                            }
                        ?>
                    </select>
                    <input class="subm1" style="height: 20px; width: 100px;" type="submit"/>    
          </form>
        </div>
          <div style="padding-right: 50px" onclick="se()" class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
          <label class="mdl-button mdl-js-button mdl-button--icon"
               for="waterfall-exp">
          <i class="material-icons">search</i>
        </label>
          </div>
      </div>
  </nav> 
</div>
</div>
</div>            
                            <form action ="download.php" method ="POST">
                                <?php
                                $flag = 0;
                                    while($ar=mysqli_fetch_array($vary)){
                                        $flag = 1;
                                        $title=$ar['Topic'];    
                                        $src="./uploads/FILES/".$title;
                                        if($ar['Format']=="video/mp4"){
                                            $f = "'".$title."'";
                                            $e = " ";
                                            ?>
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-tablet mdl-cell--0-col-phone"></div>
                                    <div class="mdl-cell mdl-cell--8-col mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                                    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                                    <div class="mdl-card__title">
                                <?php
                                            echo '<a href="#" onclick="expand('.$f.', 0, '.$e.');"><video align="left" preload="metadata" style="width:200px; height: 100px" src="'.$src.'"></video></a><h2 class="mdl-card__title-text"><a href="#" onclick="expand('.$f.', 0);">'.$title.'</a></h2>';
                                            ?>
                                    </div>
                                        <div class="mdl-card__actions mdl-card--border">
                                            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                                Open
                                            </a>
                                        </div>
                                        <div class="mdl-card__menu">
                                            <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                                <i class="material-icons">share</i>
                                            </button>
                                        </div>
                                    </div>
                                    </div>
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-tablet mdl-cell--0-col-phone"></div>
                                    </div>
                                        <?php
                                        }
                                        else{
                                            if($ar['Format']=="application/pdf"){
                                                $f = "'".$title."'";
                                                $e = " ";
                                                ?>
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-tablet mdl-cell--0-col-phone"></div>
                                    <div class="mdl-cell mdl-cell--8-col mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                                    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                                    <div class="mdl-card__title">
                                <?php
                                                echo '<a href="#" onclick="expand('.$f.', 1, '.$e.');"><img style="width:auto; height:100px;" src="./images/logo-adobe-pdf.png"/></a><h2 class="mdl-card__title-text"><a href="#" onclick="expand('.$f.', 1);">'.$title.'</a></h2>';
                                            ?>
                                    </div>
                                        <div class="mdl-card__actions mdl-card--border">
                                            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                                Open
                                            </a>
                                        </div>
                                        <div class="mdl-card__menu">
                                            <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                                <i class="material-icons">share</i>
                                            </button>
                                        </div>
                                    </div>
                                    </div>
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-tablet mdl-cell--0-col-phone"></div>
                                    </div>
                                        <?php                                                
                                            }
                                            else{
                                                if($ar['Format']=="html"){
                                                    $f = "'".$title."'";
                                                    $e = " ";
                                                    ?>
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-tablet mdl-cell--0-col-phone"></div>
                                    <div class="mdl-cell mdl-cell--8-col mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                                    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                                    <div class="mdl-card__title">
                                <?php
                                                    echo '<a href="#" onclick="expand('.$f.', 2, '.$e.');"><img style="width:auto; height:100px;" src="./images/HTML5_logo_and_wordmark.svg"/></a><h2 class="mdl-card__title-text"><a href="#" onclick="expand('.$f.', 2, '.$e.');">'.$title.'</a></h2>';
                                                ?>
                                    </div>
                                        <div class="mdl-card__actions mdl-card--border">
                                            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                                Open
                                            </a>
                                        </div>
                                        <div class="mdl-card__menu">
                                            <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                                <i class="material-icons">share</i>
                                            </button>
                                        </div>
                                    </div>
                                    </div>
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-tablet mdl-cell--0-col-phone"></div>
                                    </div>
                                        <?php
                                                }
                                                else{
                                                    if(($ar['Format']=="application/vnd.ms-powerpoint")||($ar['Format']=="application/vnd.openxmlformats-officedocument.presentationml.presentation")){
                                                        $f = "'".$title."'";
                                                        $e = " ";
                                                        ?>
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-tablet mdl-cell--0-col-phone"></div>
                                    <div class="mdl-cell mdl-cell--8-col mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                                    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                                    <div class="mdl-card__title">
                                <?php
                                                        echo '<a href="#" onclick="expand('.$f.', 3, '.$e.');"><img style="height:100px; width:auto;" align="left" style="height:50px; " src="./images/Microsoft_PowerPoint_2013_logo.svg.png"/></a><h2 class="mdl-card__title-text"><a href="#" onclick="expand('.$f.', 3, '.$e.');">'.$title.'</a></h2>';
                                                        ?>
                                    </div>
                                        <div class="mdl-card__actions mdl-card--border">
                                            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                                Open
                                            </a>
                                        </div>
                                        <div class="mdl-card__menu">
                                            <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                                <i class="material-icons">share</i>
                                            </button>
                                        </div>
                                    </div>
                                    </div>
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-tablet mdl-cell--0-col-phone"></div>
                                    </div>
                                        <?php
                                                        }
                                                    else{
                                                        if($ar['Format']=="website"){
                                                            $f = "'".$title."'";
                                                            $link = "'".$ar['link']."'";
                                                            ?>
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-tablet mdl-cell--0-col-phone"></div>
                                    <div class="mdl-cell mdl-cell--8-col mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                                    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                                    <div class="mdl-card__title">
                                <?php
                                                            echo '<a href="#" onclick="expand('.$f.', 4, '.$link.');"><img style="width:auto; height:100px;" src="./images/HTML5_logo_and_wordmark.svg"/></a><a href="#" onclick="expand('.$f.', 4, '.$link.');">'.$title.'</a></h2>';
                                                        ?>
                                    </div>
                                        <div class="mdl-card__actions mdl-card--border">
                                            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                                Open
                                            </a>
                                        </div>
                                        <div class="mdl-card__menu">
                                            <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                                <i class="material-icons">share</i>
                                            </button>
                                        </div>
                                    </div>
                                    </div>
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-tablet mdl-cell--0-col-phone"></div>
                                    </div>
                                        <?php
                                                        }
                                                    }
                                                }
                                            }
                                        } 
                                    }
                              if($flag==0){?>                   
  <div style="padding-top:25px;" class="mdl-grid mdl-grid--no-spacing">
    <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-tablet mdl-cell--0-col-phone"></div>
 <div class="mdl-cell mdl-cell--8-col mdl-cell--6-col-tablet mdl-cell--4-col-phone">
  <div class="demo-card-wide mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">No Matches Found!!</h2>
  </div
  <div class="mdl-card__actions mdl-card--border">
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Sorry But No Matches have been found for <?php $value?> in <?php echo $disc?>
    </a>
  </div>
  <div class="mdl-card__menu">
    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
      <i class="material-icons">share</i>
    </button>
  </div>
  </div>
 </div>
  <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-tablet mdl-cell--0-col-phone"></div>   
</div><?php
                              }
                }
                ?>
                            </form>
                <?php
            }
            else{
                echo "<script>alert('Sorry, but you have to proceed from the main page.. click OK to redirect');</script>";
                header('Location: ./index.php');
            }
        ?>
    <br>
   <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
    <div id="footer">
      <footer class="mdl-mini-footer">
        <div class="mdl-mini-footer__left-section">
            <div class="mdl-logo">Developed and Designed By Joseph Ashwin, S4R, CSE, 2017</div>
        </div>
      </footer>
    </div>
        
</div></div>
        <script>
            screensize = (window.innerHeight > 0) ? window.innerHeight : screen.height;
            if(screensize<=400){
                document.getElementById("footer").className="footermob";
            }
            else{
                document.getElementById("footer").className="footerdesk";
            }
            window.onresize= function (){
                screensize = (window.innerHeight > 0) ? window.innerHeight : screen.height;
                if(screensize<=400){
                    document.getElementById("footer").className="footermob";
                }
                else{
                    document.getElementById("footer").className="footerdesk";
                }
            }
            var sea = document.getElementById('sea');
            var count = 0;
            function se(){
                if(count%2==0){
                    sea.style.display="block";
                }
                else{
                    sea.style.display="none";
                }
                count++;
            }
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
    <script type="text/javascript" src="./js/expand_function.js"></script>
</html>