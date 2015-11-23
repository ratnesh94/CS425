<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Protected Page</title>
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--webfonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text.css'/>
        <!--//webfonts-->
    </head>
    <body>
	<?php
	$sql = "Select dbz,simp,account from members where username = '".$_SESSION['username']."' " ; 
	$result = $mysqli->query($sql) ; 

	$row = $result->fetch_assoc() ;
	$dbz = $row["dbz"] ; 
	$simp = $row["simp"];
	$account = $row["account"] ; 
	$result->free();
	?>
	<?php if (login_check($mysqli) == true && $simp == 1) : ?>
            <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
            <p>Your Streams:</p>
<script>
    function ChangeStream(newsrc)
    {
        var streamPlayer = document.getElementById("player");
        streamPlayer.innerHTML='<embed width="842" height="500" src="http://www.focusonthefamily.com/family/JWPlayer/mediaplayer.swf" allowfullscreen=true flashvars=\"allowscriptaccess=always&autostart=true&shownavigation=true&enablejs=true&volume=50&file='+newsrc+'&streamer=rtmp://172.24.0.159:9990/vod2/" />';
    }
</script>
	<div style="width:842;height:500;float:left;margin:20px">
        <center><object id="player" width="842" height="500">
            <param name="allowFullScreen" value="true"></param>
        <embed width="842" height="500" src="http://www.focusonthefamily.com/family/JWPlayer/mediaplayer.swf" allowfullscreen=true flashvars="allowscriptaccess=always&autostart=true&shownavigation=true&enablejs=true&volume=50&file=simp_01_low.mp4&streamer=rtmp://172.24.0.159:9990/vod2/" />
        </object></center>
	</div>
	    <div style="overflow-y:scroll;width:300px; height:500px;float:left;margin:20px">
		<img src="images/simp_01.png" style="width:300px;height:240px" onclick="ChangeStream('simp_01_low.mp4');">
		<img src="images/simp_02.png" style="width:380px;height:240px" onclick="ChangeStream('simp_02_low.mp4');">
        <img src="images/simp_03.png" style="width:300px;height:240px" onclick="ChangeStream('simp_03_low.mp4');">
        <img src="images/simp_04.png" style="width:300px;height:240px" onclick="ChangeStream('simp_04_low.mp4');">
        <img src="images/simp_05.png" style="width:300px;height:240px" onclick="ChangeStream('simp_05_low.mp4');">
        <img src="images/simp_06.png" style="width:300px;height:240px" onclick="ChangeStream('simp_06_low.mp4');">
	    </div>
		<br style="clear:both" />
            <p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    <?php if ($account == "Premium") : ?>
            <p>
                You can go back to the HD streams by clicking <a href="simp.php">here</a>.
            </p>
    <?php endif; ?>
        <?php if ($account == "Premium" && $dbz == 1) : ?>
            <p>
                You can watch Dragon Ball Z HD streams by clicking <a href="dbz.php">here</a>.
            </p>
    <?php endif; ?>
        <?php if ($dbz == 1) : ?>
            <p>
                You can watch Dragon Ball Z SD streams by clicking <a href="dbz_low.php">here</a>.
            </p>
    <?php endif; ?>

    </body>
</html>
