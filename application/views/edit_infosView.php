<!---------------------------------------------------------->
<!----------------OTHER VIEW-------------------------------->
<!---------------------------------------------------------->	    
<?php
//include('config.php');
session_start();
?>

<?php
//We check if the user is logged
if(isset($_SESSION['username']))
{
	//We check if the form has been sent
	if(isset($_POST['username'], $_POST['password'], $_POST['passverif'], $_POST['email'], $_POST['avatar']))
	{
		//We remove slashes depending on the configuration
		if(get_magic_quotes_gpc())
		{
			$_POST['username'] = stripslashes($_POST['username']);
			$_POST['password'] = stripslashes($_POST['password']);
			$_POST['passverif'] = stripslashes($_POST['passverif']);
			$_POST['email'] = stripslashes($_POST['email']);
			$_POST['avatar'] = stripslashes($_POST['avatar']);
		}
		//We check if the two passwords are identical
		if($_POST['password']==$_POST['passverif'])
		{
			//We check if the password has 6 or more characters
			if(strlen($_POST['password'])>=6)
			{
				//We check if the email form is valid
				if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
				{
					//We protect the variables
					$username = mysql_real_escape_string($_POST['username']);
					$password = mysql_real_escape_string($_POST['password']);
					$email = mysql_real_escape_string($_POST['email']);
					$avatar = mysql_real_escape_string($_POST['avatar']);
					//We check if there is no other user using the same username
					$dn = mysql_fetch_array(mysql_query('select count(*) as nb from users where username="'.$username.'"'));
					//We check if the username changed and if it is available
					if($dn['nb']==0 or $_POST['username']==$_SESSION['username'])
					{
						//We edit the user informations
						if(mysql_query('update users set username="'.$username.'", password="'.$password.'", email="'.$email.'", avatar="'.$avatar.'" where id="'.mysql_real_escape_string($_SESSION['userid']).'"'))
						{
							//We dont display the form
							$form = false;
							//We delete the old sessions so the user need to log again
							unset($_SESSION['username'], $_SESSION['userid']);
?>
<div class="message">Changes have been made. Log in needed.<br /><br />
<a href="<?php echo site_url('principalController/conexionView');?>" class="button2">Log in</a></div>
<?php
						}
						else
						{
							//Otherwise, we say that an error occured
							$form = true;
							$message = 'Unexpected error has occurred while making changes.';
						}
					}
					else
					{
						//Otherwise, we say the username is not available
						$form = true;
						$message = 'User name unavailable, please choose another.';
					}
				}
				else
				{
					//Otherwise, we say the email is not valid
					$form = true;
					$message = 'Not a valid email.';
				}
			}
			else
			{
				//Otherwise, we say the password is too short
				$form = true;
				$message = 'Password must have 6 characters minimum.';
			}
		}
		else
		{
			//Otherwise, we say the passwords are not identical
			$form = true;
			$message = 'Passwords does not match.';
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
			echo '<strong>'.$message.'</strong>';
		}
		//If the form has already been sent, we display the same values
		if(isset($_POST['username'],$_POST['password'],$_POST['email']))
		{
			$pseudo = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
			if($_POST['password']==$_POST['passverif'])
			{
				$password = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');
			}
			else
			{
				$password = '';
			}
			$email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
			$avatar = htmlentities($_POST['avatar'], ENT_QUOTES, 'UTF-8');
		}
		else
		{
			//otherwise, we display the values of the database
			$dnn = mysql_fetch_array(mysql_query('select username,password,email,avatar from users where username="'.$_SESSION['username'].'"'));
			$username = htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8');
			$password = htmlentities($dnn['password'], ENT_QUOTES, 'UTF-8');
			$email = htmlentities($dnn['email'], ENT_QUOTES, 'UTF-8');
			$avatar = htmlentities($dnn['avatar'], ENT_QUOTES, 'UTF-8');
		}
		//We display the form
?>
<div class="content">

<br />
<a href="<?php echo site_url('principalController/mensajesView');?>" class="button2" style="top: 232px; left: 190px;">&nbsp; Regresar</a><br />
<br />

    <form action="<?php echo site_url('principalController/mensajeseditinfoView');?>" method="post">
        Edit information:<br /><br />
        <div class="center">
            <label for="username">User</label><input type="text" name="username" id="username" value="<?php echo $username; ?>" /><br />
            <label for="password">Password<span class="small">(6 caracteres min.)</span></label><input type="password" name="password" id="password" value="<?php echo $password; ?>" /><br />
            <label for="passverif">Password<span class="small">(verificacion)</span></label><input type="password" name="passverif" id="passverif" value="<?php echo $password; ?>" /><br />
            <label for="email">Email</label><input type="text" name="email" id="email" value="<?php echo $email; ?>" /><br />
            <label for="avatar">Avatar<span class="small">(opcional)</span></label><input type="text" name="avatar" id="avatar" value="<?php echo $avatar; ?>" /><br /><br />
            <input type="submit" class="button2" value="Actualizar" />
        </div>
    </form>
</div>
<?php
	}
}
else
{
?>
<div class="message">To access this web page, you need to log in.<br /><br />
<a href="<?php echo site_url('principalController/mensajeslistView');?>" class="button2">Log in</a></div>
<?php
}
?>
<!---------------------------------------------------------->
<!---------------FOOTER------------------------------------->
<!---------------------------------------------------------->
