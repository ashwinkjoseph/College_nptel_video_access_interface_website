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
    position: absolute;
    bottom:0;
    width:100%;
}
.footermob{
    position: relative;
    bottom:0;
    width:100%;
}
.tit-small{
    font-size: 2vw; 
    margin-left: -13vw;
}
.tit-big{
    font-size: 1.8vw; 
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
    <div id="navi" style="height:75px"class="mdl-layout__header-row">
        <span class="mdl-layout-title img-responsive">MAR ATHANASIUS COLLEGE OF ENGINEERING, NPTEL STUDY MATERIAL ONLINE COLLECTION</span>
    </div>
      <div style="margin-left:-5vw;" class="mdl-layout__header-row img-responsive">
          <!--<div class="mdl-layout-spacer"></div>-->
          <div style="padding-right: 50px" onclick="se()" class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
          <label class="mdl-button mdl-js-button mdl-button--icon"
               for="waterfall-exp">
          <i class="material-icons">search</i>
        </label>
          </div>
          <form style="display: none" id="sea" action="./search.php" class="img-responsive" method="post" id="2">            
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" id="sample1" type="text" name="search" placeholder="type here">
                    </div>
                    <select class="mdl-button mdl-button--raised mdl-button--accent mdl-shadow--2dp" name="Discipline">
                        <option value="0" selected="1">Default</option>
                        <?php
                            $q = mysqli_query($conn, "SELECT DISTINCT Discipline FROM files");
                            while($var = mysqli_fetch_array($q)){
                                $values = $var['Discipline'];
                                echo "<option value='$values'>$values</option>";
                            }
                        ?>
                    </select>
                    <input class="mdl-button mdl-shadow--2dp mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit"/>    
          </form>
      </div>
  </nav> 
</div>
</div>
</div>
<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone">
  <main class="mdl-layout__content">
    <div style="padding-top:20px" class="page-content">
                        <form class="group" action="./search.php" method="post" id="2">    
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-shadow--2dp mdl-textfield__input" id="sample1" type="text" name="search" placeholder="type here">
                            </div>
                            <select class="mdl-button mdl-button--raised mdl-button--accent" name="Discipline">
                                <option value="0" selected="1">Default</option>
                                <?php
                                    $q = mysqli_query($conn, "SELECT DISTINCT Discipline FROM files");
                                    while($var = mysqli_fetch_array($q)){
                                        $values = $var['Discipline'];
                                        echo "<option value='$values'>$values</option>";
                                    }
                                ?>
                            </select>
                            <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit"/>
                        </form> 
    </div>
    </main>
  </div></div>
</div>  </div></div> 
    <div class="mdl-grid mdl-grid--no-spacing">
    <div class="mdl-cell--12-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
    <div id="footer">
    <footer class="mdl-mini-footer">
  <div class="mdl-mini-footer__left-section">
    <div class="mdl-logo">Developed and Designed By Joseph Ashwin, S4R, CSE, 2017</div>
  </div>
</footer>
    </div></div></div>
        <!-- Latest compiled and minified JavaScript -->
        <script>
            screenheight = (window.innerHeight > 0) ? window.innerHeight : screen.height;
//            screenwidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
            if(screenheight<=400){
                document.getElementById("footer").className="footermob";
            }
            else{
                document.getElementById("footer").className="footerdesk";
            }
//            if(screenwidth<550){
//                document.getElementById("tit").className="tit-small";
//            }
//            else{
//                document.getElementById("tit").className="tit-big";
//            }
            window.onresize= function (){
                screenheight = (window.innerHeight > 0) ? window.innerHeight : screen.height;
                screenwidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
                if(screenheight<=480){
                    document.getElementById("footer").className="footermob";
                }
                else{
                    document.getElementById("footer").className="footerdesk";
                }
//                if(screenwidth<550){
//                    document.getElementById("tit").className="tit-small";
//                }
//                else{
//                    document.getElementById("tit").className="tit-big";
//                }
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
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>