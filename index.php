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
    <script type="text/javascript">
        function checkSubmit(n, e){
            if(e && e.keyCode==13){
                document.forms[n-1].submit();
            }
        }
    </script>
		
        </head>
	<body>
		
			<!-- Top Navigation -->
			<div id="navbar"><a href="#mace">MACE</a></div>
                        <div id="container">
                        
			
			<div class="main clearfix">
				<!-- Optional columns for small components -->
				<div class="column">
                                   <center> <p class="column-p">NPTEL</p></center><br>
                                   <center>National Programme on Technology  Enhanced learning</center>
					
				</div>
				<div class="column">
					<br><br>MAR ATHANASIUS COLLEGE OF ENGINEERING<br><br><br>
                          
                                        
                                        <form class="" action="./search.php" method="post" id="2">
                                              
                            
                            <input class="serch1"  type="text" name="search" placeholder="Search here"/><br>
                            <select class="subm1" name="Discipline">
                                <option value="0" selected="1">Default</option>
                                <?php
                                    $q = mysqli_query($conn, "SELECT DISTINCT Discipline FROM files");
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
              
              <div id="demo"><br><marquee>Welcome to NPTEL MACE...</marquee>
                  
                  <div  id="sear">           
                      <center>
                          
                          
                          
                          <form class="group" action="./search.php" method="post" id="2">
                                              
                            
                            <input class="serch"  type="text" name="search" placeholder="Search for Videos"/><br>
                            <select class="subm" name="Discipline">
                                <option value="0" selected="1">Default</option>
                                <?php
                                    $q = mysqli_query($conn, "SELECT DISTINCT Discipline FROM files");
                                    while($var = mysqli_fetch_array($q)){
                                        $values = $var['Discipline'];
                                        echo "<option value='$values'>$values</option>";
                                    }
                                ?>
                            </select>
                            <input class="subm" type="submit"/>
                        
                    </form>
                          
                          
                          
                          
                          
                          
                          </center>
                  </div>
                    <br><br> 
                  
              </div>
                 
                           
                            
                            <div class="rowa"><hr>
                                Web designed by
                            </div>           
                            
                            
                            	
				
                            
                            
                            
                      </div>      
		<!-- /container -->
		
	</body>
</html>