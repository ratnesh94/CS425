<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <meta charset="utf-8">
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--webfonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text.css'/>
        <!--//webfonts-->
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>
    	
    	
        <div class="main">
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        <center><font size="4">Registration successful!<br>You may log in now.</font></center>
        <br>
        <form action="includes/process_login.php" method="post" name="login_form">
        <h1><lable>Member Login</lable> </h1>
        <div class="inset">
            <p>               
                <input type="text" name="email" placeholder="Email" required/>
            </p>
            <p>
                <input type="password" 
                        placeholder="Password"
                         name="password" 
                         id="password"
                         required/>
            </p>
        </div>
           
            <p class="p-container">
            <span>Watch and Learn </span>

            <input type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" />
             </p>
        </form>
<span> 
     <p class="p-container">
<?php
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
 
            echo '<p>Do you want to visit the homepage? Click <a href="dbz.php">here</a>.</p>';
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
                }
?></p></span>      
             
    </div>
    <center><font size="18">Welcome to YouStream!</font></center>
    </body>
</html>
