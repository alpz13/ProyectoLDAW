<!---------------------------------------------------------->
<!----------------OTHER VIEW-------------------------------->
<!---------------------------------------------------------->
<div style="text-align: center; margin-left: 10%; margin-right: 10%">
<?php
//We check if the user is logged
$sessionIdm=$this->session->userdata('id');
$form = true;
$otitle = '';
$orecip = '';
$omessage = '';
//We check if the form has been sent
if(isset($_POST['title'], $_POST['recip'], $_POST['message']))
{
	$otitle = $_POST['title'];
	$orecip = $_POST['recip'];
	$omessage = $_POST['message'];
	//We remove slashes depending on the configuration
	if(get_magic_quotes_gpc())
	{
		$otitle = stripslashes($otitle);
		$orecip = stripslashes($orecip);
		$omessage = stripslashes($omessage);
	}
	//We check if all the fields are filled
	if($_POST['title']!='' and $_POST['recip']!='' and $_POST['message']!='')
	{
		//We protect the variables
		$title = mysql_real_escape_string($otitle);
		$recip = mysql_real_escape_string($orecip);
		$message = mysql_real_escape_string(nl2br(htmlentities($omessage, ENT_QUOTES, 'UTF-8')));
		//We check if the recipient exists
		//$dn1 = mysql_fetch_array(mysql_query('select count(id) as recip, id as recipid, (select count(*) from mensajes) as npm from usuarios where Mail="'.$recip.'"'));
		$dn1 = mysql_fetch_array(mysql_query('select count(idUsuarios) as recip, idUsuarios as recipid, (select count(*) from mensajes) as npm from usuarios where Mail="'.$recip.'"'));
		
		if($dn1['recip']==1)
		{
			//We check if the recipient is not the actual user
			//if($dn1['recipid']!=$_SESSION['userid'])
			if($dn1['recipid']!=$sessionIdm)
			{
				$id = $dn1['npm']+1;
				//We send the message
				//if(mysql_query('insert into mensajes (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "1", "'.$title.'", "'.$_SESSION['userid'].'", "'.$dn1['recipid'].'", "'.$message.'", "'.time().'", "yes", "no")'))
				if(mysql_query('insert into mensajes (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "1", "'.$title.'", "'.$sessionIdm.'", "'.$dn1['recipid'].'", "'.$message.'", "'.time().'", "yes", "no")'))
				{
?>
<div class="message alert alert-success" role="alert">The message has been sent.</div><br />
<a href="<?php echo site_url('principalcontroller/mensajesView');?>"><button type="button" class="btn btn-primary">Back to Inbox</button></a>
<?php
					$form = false;
				}
				else
				{
					//Otherwise, we say that an error occured
					$error = '<div class="alert alert-danger" role="alert">Message could not be sent.</div>';
				}
			}
			else
			{
				//Otherwise, we say the user cannot send a message to himself
				$error = '<div class="alert alert-warning" role="alert">Same destination.</div>';
			}
		}
		else
		{
			//Otherwise, we say the recipient does not exists
			$error = '<div class="alert alert-danger" role="alert">Destination does not exists.</div>';
		}
	}
	else
	{
		//Otherwise, we say a field is empty
		$error = '<div class="alert alert-warning" role="alert">Please fill all fields.</div>';
	}
}
elseif(isset($_GET['recip']))
{
	//We get the username for the recipient if available
	$orecip = $_GET['recip'];
}
if($form)
{
//We display a message if necessary
if(isset($error))
{
	echo '<div class="message alert alert-warning" role="alert">'.$error.'</div>';
}
//We display the form
?>
<div class="content">
	<br /><br />
		<h3>New Message</h3>
    <form action="<?php echo site_url('principalcontroller/nuevomensajeView');?>" method="post">
		<br />
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <td>
                            <label for="title">&nbsp; Title:&nbsp; </label>
                        </td>
                        <td>
                            <input type="text" class="form-control" value="<?php echo htmlentities($otitle, ENT_QUOTES, 'UTF-8'); ?>" id="title" name="title" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="recip">&nbsp; To:<span class="small">&nbsp;&nbsp;&nbsp; </span></label>
                        </td>
                        <td>
                            <input type="text" class="form-control" value="<?php echo htmlentities($orecip, ENT_QUOTES, 'UTF-8'); ?>" id="recip" name="recip" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="message">Message:&nbsp;&nbsp; </label>
                        </td>
                        <td>
                            <textarea cols="40" rows="5" class="form-control" id="message" name="message"><?php echo htmlentities($omessage, ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input class="btn btn-primary" type="submit" value="Send" />
                            <a href="<?php echo site_url('principalcontroller/mensajesView');?>" style="top: 232px; left: 190px;"><button type="button" class="btn btn-danger"> Cancel</button></a>
                        </td>
                    </tr>
                </table>
        
    </form>
</div>
<?php
}
?>
	
</div>
<!---------------------------------------------------------->
<!---------------FOOTER------------------------------------->
<!---------------------------------------------------------->
