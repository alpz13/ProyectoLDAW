<!---------------------------------------------------------->
<!----------------OTHER VIEW-------------------------------->
<!---------------------------------------------------------->	    
<?php
//include('config.php');
session_start();
?>
	 

   
<?php
//If the user is logged, we log him out
if(isset($_SESSION['username']))
{
	//We log him out by deleting the username and userid sessions
	unset($_SESSION['username'], $_SESSION['userid']);
?>
<div class="message">Session expired.<br /><br /><br />
<a href="<?php echo site_url('principalcontroller/mensajesView');?>" class="button2">Home</a></div>
<?php
}
else
{
	$ousername = '';
	//We check if the form has been sent
	if(isset($_POST['username'], $_POST['password']))
	{
		//We remove slashes depending on the configuration
		if(get_magic_quotes_gpc())
		{
			$ousername = stripslashes($_POST['username']);
			$username = mysql_real_escape_string(stripslashes($_POST['username']));
			$password = stripslashes($_POST['password']);
		}
		else
		{
			$username = mysql_real_escape_string($_POST['username']);
			$password = $_POST['password'];
		}
		//We get the password of the user
		$req = mysql_query('select password,id from users where username="'.$username.'"');
		$dn = mysql_fetch_array($req);
		//We compare the submited password and the real one, and we check if the user exists
		if($dn['password']==$password and mysql_num_rows($req)>0)
		{
			//If the password is good, we dont show the form
			$form = false;
			//We save the user name in the session username and the user Id in the session userid
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['userid'] = $dn['id'];
?>
<div class="message">Log in successfully.<br /><br /><br />
<a href="<?php echo site_url('principalcontroller/mensajesView');?>" class="button2">Home</a></div>
<?php
		}
		else
		{
			//Otherwise, we say the password is incorrect.
			$form = true;
			$message = 'El usuario o contrase・・ｽｱa es incorrecto.';
		}
	}
	else
	{
		$form = true;
	}
	if($form)
	{
		//We display a message if necessary
	if(isset($message))
	{
		echo '<div class="message">'.$message.'</div>';
	}
	//We display the form
?>
<div class="content">
	<br />
	<a href="<?php echo site_url('principalcontroller/mensajesView');?>" class="button2" style="top: 232px; left: 190px;">&nbsp; Regresar</a><br />
	<br />
    <form action="<?php echo site_url('principalcontroller/conexionView');?>" method="post">
        <br />
        <div class="center">
            <label for="username">User</label><input type="text" name="username" id="username" value="<?php echo htmlentities($ousername, ENT_QUOTES, 'UTF-8'); ?>" /><br />
            <label for="password">Password</label><input type="password" name="password" id="password" /><br /><br />
            <input class="button2" type="submit" value="Log in" />
		</div>
    </form>
</div>
<?php
	}
}
?>
<!---------------------------------------------------------->
<!---------------FOOTER------------------------------------->
<!---------------------------------------------------------->
