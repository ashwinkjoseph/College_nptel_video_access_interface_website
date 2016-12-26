<!DOCTYPE html>
<html>
<head>
    <meta charser="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>NPTEL Videos MACE</title>
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
    <div name="container" class="container-fluid">
    <div class="col-md-1 col-sm-1 col-lg-1"></div>
    <div class="col-md-10 col-sm-10 col-lg-10">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="jumbotron">
                <div class="row">
                    <form action="./search.php" method="post" id="2">
                        <div class="col-md-8 col-lg-8 col-sm-8">                        
                            <input style="width:100%" type="text" name="search" placeholder="Search for Videos"/>
                            <select name="Discipline">
                                <option value="0" selected="1">Default</option>
                                <?php
                                    $q = mysqli_query($conn, "SELECT DISTINCT Discipline FROM files");
                                    while($var = mysqli_fetch_array($q)){
                                        $values = $var['Discipline'];
                                        echo "<option value='$values'>$values</option>";
                                    }
                                ?>
                            </select>
                            <input type="submit"/>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-1 col-sm-1 col-lg-1"></div>
    </div>
</body>
</html>