<!---------------------------------------------------------->
<!----------------OTHER VIEW-------------------------------->
<!---------------------------------------------------------->	    
<?php
//include('config.php');
session_start();
?>

<?php
//We check if the form has been sent
if(isset($_POST['username'], $_POST['password'], $_POST['passverif'], $_POST['email'], $_POST['avatar']) and $_POST['username']!='')
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
				$dn = mysql_num_rows(mysql_query('select id from users where username="'.$username.'"'));
				if($dn==0)
				{
					//We count the number of users to give an ID to this one
					$dn2 = mysql_num_rows(mysql_query('select id from users'));
					$id = $dn2+1;
					//We save the informations to the databse
					if(mysql_query('insert into users(id, username, password, email, avatar, signup_date) values ('.$id.', "'.$username.'", "'.$password.'", "'.$email.'", "'.$avatar.'", "'.time().'")'))
					{
						//We dont display the form
						$form = false;
?>
<div class="message">Register successfully, you can now log in.<br /><br/>

<a href="<?php echo site_url('principalcontroller/conexionView');?>" class="button2">Log in</a></div>


<?php
					}
					else
					{
						//Otherwise, we say that an error occured
						$form = true;
						$message = 'Something has happened while registering, please try again.';
					}
				}
				else
				{
					//Otherwise, we say the username is not available
					$form = true;
					$message = 'User name is not available, please try another.';
				}
			}
			else
			{
				//Otherwise, we say the email is not valid
				$form = true;
				$message = 'Mail is not valid.';
			}
		}
		else
		{
			//Otherwise, we say the password is too short
			$form = true;
			$message = 'Password must have 6 characters.';
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
		echo '<div class="message">'.$message.'</div>';
	}
	//We display the form
?>
<div class="content">
	<br />
	<a href="<?php echo site_url('principalcontroller/mensajesView');?>" class="button2" style="top: 232px; left: 190px;">&nbsp; Regresar</a><br />
	<br />
    <form action="<?php echo site_url('principalcontroller/mensajessignView');?>" method="post">
        New user registry.<br /><br />
        <div class="center">
            <label for="username">User</label><input type="text" name="username" value="<?php if(isset($_POST['username'])){echo htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
            <label for="password">Password<span class="small">(6 caracteres min.)</span></label><input type="password" name="password" /><br />
            <label for="passverif">Password<span class="small">(verificacion)</span></label><input type="password" name="passverif" /><br />
            <label for="email">Email</label><input type="text" name="email" value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
            <label for="avatar">Avatar<span class="small">(opcional)</span></label><input type="text" name="avatar" value="<?php if(isset($_POST['avatar'])){echo htmlentities($_POST['avatar'], ENT_QUOTES, 'UTF-8');} ?>" /><br /><br />
            <input type="submit" class="btn btn-primary" value="Registrar" />    
		</div>
    </form>
</div>
<?php
}
?>
<!---------------------------------------------------------->
<!---------------FOOTER------------------------------------->
<!---------------------------------------------------------->
