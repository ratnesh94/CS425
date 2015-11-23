<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Registration Form</title>
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

       <center><ul>
            <li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul></center>
        <div class="main">
         <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
         <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
                method="post" 
                name="registration_form">
                 <h1><lable>Register with us</lable> </h1>
                <div class="inset">
            <input type='text' 
                name='username' 
                placeholder="Username"
                id='username' /><br>
             <input type="text" name="email"  placeholder="Email" id="email" /><br>
            <input type="password"
                             name="password" 
                             placeholder="Password" 
                             id="password"/><br>
            <input type="password"  placeholder="Confirm password"
                                     name="confirmpwd" 
                                     id="confirmpwd" /><br>
           
                                  
	      <input type="text" name="account"  placeholder="Type : Premium/Normal" id="account" /><br>
          
                 </div>
        <p class="p-container">
            <input type="button" 
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd,
                                   this.form.account);" /> </p>
        </form>
       
             
    </div>
    <center><font size="18">Welcome to YouStream!</font></center>
    </body>
</html>
 <p>Return to the <a href="index.php">login page</a>.</p>


   
        
        
