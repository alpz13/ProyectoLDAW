<!---------------------------------------------------------->
<!----------------OTHER VIEW-------------------------------->
<!---------------------------------------------------------->
    
<?php
//We check if the user is logged
$sessionIdm=$this->session->userdata('id');
//We check if the ID of the discussion is defined
//if(isset($_GET['id']))

$id = intval($_GET['id']);

//$id = "2";

//We get the title and the narators of the discussion
$req1 = mysql_query('select title, user1, user2 from mensajes where id="'.$id.'" and id2="1"');
$dn1 = mysql_fetch_array($req1);

if(isset($_POST['update']))
{
$updt = mysql_query('UPDATE mensajes SET user1 = 0, user2 = 0 WHERE user1 = "'.$sessionIdm.'" AND id ="'.$id.'"');
//redirect($this->session->userdata('mensajesView')));
$this->session->set_userdata('prev_url', $_SERVER['HTTP_REFERER']);
}


//We check if the discussion exists
if(mysql_num_rows($req1)==1)
{
//We check if the user have the right to read this discussion
//if($dn1['user1']==$_SESSION['userid'] or $dn1['user2']==$_SESSION['userid'])
if($dn1['user1']==$sessionIdm or $dn1['user2']==$sessionIdm)
{
//The discussion will be placed in read messages
//if($dn1['user1']==$_SESSION['userid'])
if($dn1['user1']==$sessionIdm)
{
	mysql_query('update mensajes set user1read="yes" where id="'.$id.'" and id2="1"');
	$user_partic = 2;
}
else
{
	mysql_query('update mensajes set user2read="yes" where id="'.$id.'" and id2="1"');
	$user_partic = 1;
}
//We get the list of the messages
$req2 = mysql_query('select mensajes.timestamp, mensajes.message, usuarios.idUsuarios as userid, usuarios.Mail, usuarios.Nombre from mensajes, usuarios where mensajes.id="'.$id.'" and usuarios.idUsuarios=mensajes.user1 order by mensajes.id2');
//We check if the form has been sent
if(isset($_POST['message']) and $_POST['message']!='')
{
	$message = $_POST['message'];
	//We remove slashes depending on the configuration
	if(get_magic_quotes_gpc())
	{
		$message = stripslashes($message);
	}
	//We protect the variables
	$message = mysql_real_escape_string(nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8')));
	//We send the message and we change the status of the discussion to unread for the recipient
	//if(mysql_query('insert into mensajes (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "'.(intval(mysql_num_rows($req2))+1).'", "", "'.$_SESSION['userid'].'", "", "'.$message.'", "'.time().'", "", "")') and mysql_query('update mensajes set user'.$user_partic.'read="yes" where id="'.$id.'" and id2="1"'))
	if(mysql_query('insert into mensajes (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "'.(intval(mysql_num_rows($req2))+1).'", "", "2", "", "'.$message.'", "'.time().'", "", "")') and mysql_query('update mensajes set user'.$user_partic.'read="yes" where id="'.$id.'" and id2="1"'))
	{
?>
<div class="message alert alert-success" role="alert">Message has been sent.</div>
<a href="<?php echo site_url('principalcontroller/mensajesView');?>"><button type="button" class="btn btn-primary">Back to Inbox</button></a>
<?php
	}
	else
	{
?>
<div class="message alert alert-warning" role="alert">Error: message could not be sent.</div>
<a href="<?php echo site_url('principalcontroller/mensajesView');?>"><button type="button" class="btn btn-primary">Back to Inbox</button></a>
<?php
	}
}
else
{
//We display the messages
?>
<div class="content">
<h3>Title: <?php echo $dn1['title']; ?></h3>
<table class="table_message">
	<tr>
    	<th class="author">From:</th>
        <th>Message:</th>
    </tr>
    <h2>
<?php
while($dn2 = mysql_fetch_array($req2))
{
?>
</h2>
	<tr>
    	<td class="author center">
    	<?php
         ?>
         
<br /><p><h4><?php echo $dn2['Mail']; ?></h4></p></td>
    	<td class="left"><h4><div class="date">Date: <?php echo date('m/d/Y H:i:s' ,$dn2['timestamp']); ?></div>
    	<br><?php echo $dn2['message']; ?></h4></td>
    	
    </tr>
<?php
}
//We display the reply form
?>
</table>

<div class="center">
<<<<<<< HEAD
        <form action="<?php echo site_url('principalController/leermensajeView');?>?id=<?php echo $id; ?>" method="post">
    	<input name="update" type="submit" id="update" class="btn btn-danger" value="Delete"/>
    </form>
<hr>
<br>
    <form action="<?php echo site_url('principalController/leermensajeView');?>?id=<?php echo $id; ?>" method="post">
=======
    <form action="<?php echo site_url('principalcontroller/leermensajeView');?>?id=<?php echo $id; ?>" method="post">
>>>>>>> 94ca10b1dd67bc14e9bcce8c09b05f4581a99980
    	<label for="message" class="center">Message:</label><br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
        <input type="submit" class="btn btn-primary" value="Reply"/>
    </form>
</div>
</div>
<?php
}
}
}
?>

<!---------------------------------------------------------->
<!---------------FOOTER------------------------------------->
<!---------------------------------------------------------->
