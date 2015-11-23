<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
$currStream = "01";
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

<script>
    function ChangeStream(newsrc)
    {
        var streamPlayer = document.getElementById("player");
        streamPlayer.innerHTML='<embed width="842" height="500" src="http://www.focusonthefamily.com/family/JWPlayer/mediaplayer.swf" allowfullscreen=true flashvars=\"allowscriptaccess=always&autostart=true&shownavigation=true&enablejs=true&volume=50&file='+newsrc+'&streamer=rtmp://172.24.0.159:9990/vod2/" />';
    }
</script>

<?php $currStream = "01" ?>
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
	<?php if (login_check($mysqli) == true && $dbz == 1 && $account == "Premium") : ?>
            <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
            <p>Your Streams:</p>
	<div style="width:842;height:500;float:left;margin:20px">
        <center><object id="player" width="842" height="500">
            <param name="allowFullScreen" value="true"></param>
        <embed width="842" height="500" src="http://www.focusonthefamily.com/family/JWPlayer/mediaplayer.swf" allowfullscreen=true flashvars="allowscriptaccess=always&autostart=true&shownavigation=true&enablejs=true&volume=50&file=dbz_01.mp4&streamer=rtmp://172.24.0.159:9990/vod2/" />
        </object></center>
	</div>
	    <div style="overflow-y:scroll;width:300px; height:500px;float:left;margin:20px">
		<img src="images/dbz_01.png" style="width:300px;height:240px" onclick="ChangeStream('dbz_01.mp4');">
		<img src="images/dbz_02.png" style="width:380px;height:240px" onclick="ChangeStream('dbz_02.mp4');">
        <img src="images/dbz_03.png" style="width:300px;height:240px" onclick="ChangeStream('dbz_03.mp4');">
        <img src="images/dbz_04.png" style="width:300px;height:240px" onclick="ChangeStream('dbz_04.mp4');">
        <img src="images/dbz_05.png" style="width:300px;height:240px" onclick="ChangeStream('dbz_05.mp4');">
        <img src="images/dbz_06.png" style="width:300px;height:240px" onclick="ChangeStream('dbz_06.mp4');">
	    </div>
		<br style="clear:both" />
	<p> You can watch these streams in Low Definition <a href="dbz_low.php">here</a>.</p>
           <p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
                <?php if ($account == "Premium" && $simp == 1) : ?>
            <p>
                You can watch The Simpsons HD streams by clicking <a href="simp.php">here</a>.
            </p>
    <?php endif; ?>
        <?php if ($simp == 1) : ?>
            <p>
                You can watch The Simpsons SD streams by clicking <a href="simp_low.php">here</a>.
            </p>
    <?php endif; ?>

    </body>
</html>
