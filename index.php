<?php 

require "login/dbconf.php";
$dbconn = mysqli_connect( $host, $username, $password, $db_name);


function clean($str){
    global $dbconn;
    $str = trim($str);
    $str = stripslashes($str);
    $str = htmlentities($str, ENT_QUOTES);
    $str = mysqli_real_escape_string($dbconn, $str);
    return $str;
}

if(isset( $_GET['user'] ) ) {
    $thisUser = clean($_GET['user']);
}


if( isset( $_POST['action'] ) ){
$content  = mysqli_real_escape_string($dbconn, $_POST['content']);
$sql1 = " UPDATE `members` SET `content`='".$content."' WHERE `username`='".$thisUser."'"; 
$query1 = mysqli_query($dbconn, $sql1);

}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>KEditor - Kademi Content Editor</title>
        <link rel="stylesheet" type="text/css" href="./plugins/bootstrap-3.4.1/css/bootstrap.min.css" data-type="keditor-style" />
        <link rel="stylesheet" type="text/css" href="./plugins/font-awesome-4.7.0/css/font-awesome.min.css" data-type="keditor-style" />
       
        
        

    </head>
    
    <body>

<nav class="navbar navbar-default"> 
<div class="container-fluid">

<div class="navbar-header">

<button type='button' class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse" >
<span class="sr-only"> Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>

<a class="navbar-brand" href="#">Brand</a>
</div>

<div class="collapse navbar-collapse" id= "bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">


<li><a href="login.php">Login</a></li>  
<li><a href="login/signup.php">Signup</a></li> 
</ul>

</div>
</div>
</nav>
           
            <div id="content-area">

            <!-- <?php
                $sql2 = "SELECT `content` FROM `members` WHERE `username`='".$thisUser."'";
                $query2 = mysqli_query($dbconn, $sql2);
                $row = mysqli_fetch_assoc($query2);

                echo $row['content'];


            ?> -->
            
            
            
            </div>    

           
        <script type="text/javascript" src="./plugins/jquery-1.11.3/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="./plugins/bootstrap-3.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script type="text/javascript" src="./plugins/ckeditor-4.11.4/ckeditor.js"></script>
        <script type="text/javascript" src="./plugins/formBuilder-2.5.3/form-builder.min.js"></script>
        <script type="text/javascript" src="./plugins/formBuilder-2.5.3/form-render.min.js"></script>
        <!-- Start of KEditor scripts -->
        <script type="text/javascript" src="dist/js/keditor.js"></script>
        <script type="text/javascript" src="dist/js/keditor-components.js"></script>
        <!-- End of KEditor scripts -->
        <script type="text/javascript" src="./plugins/code-prettify/src/prettify.js"></script>
        <script type="text/javascript" src="./plugins/js-beautify-1.7.5/js/lib/beautify.js"></script>
        <script type="text/javascript" src="./plugins/js-beautify-1.7.5/js/lib/beautify-html.js"></script>
       
    </body>
</html>
