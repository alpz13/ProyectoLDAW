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
//We check if the ID of the discussion is defined
if(isset($_GET['id']))
{
$id = intval($_GET['id']);
//We get the title and the narators of the discussion
$req1 = mysql_query('select title, user1, user2 from pm where id="'.$id.'" and id2="1"');
$dn1 = mysql_fetch_array($req1);
//We check if the discussion exists
if(mysql_num_rows($req1)==1)
{
//We check if the user have the right to read this discussion
if($dn1['user1']==$_SESSION['userid'] or $dn1['user2']==$_SESSION['userid'])
{
//The discussion will be placed in read messages
if($dn1['user1']==$_SESSION['userid'])
{
	mysql_query('update pm set user1read="yes" where id="'.$id.'" and id2="1"');
	$user_partic = 2;
}
else
{
	mysql_query('update pm set user2read="yes" where id="'.$id.'" and id2="1"');
	$user_partic = 1;
}
//We get the list of the messages
$req2 = mysql_query('select pm.timestamp, pm.message, users.id as userid, users.username, users.avatar from pm, users where pm.id="'.$id.'" and users.id=pm.user1 order by pm.id2');
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
	if(mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "'.(intval(mysql_num_rows($req2))+1).'", "", "'.$_SESSION['userid'].'", "", "'.$message.'", "'.time().'", "", "")') and mysql_query('update pm set user'.$user_partic.'read="yes" where id="'.$id.'" and id2="1"'))
	{
?>
<div class="message">El mensaje ha sido enviado.<br /><br /><br />
<a href="<?php echo site_url('principalController/mensajeslistView');?>" class="button2">Regresar a mensajes.</a></div>
<?php
	}
	else
	{
?>
<div class="message">Error: no se pudo enviar el mensaje.<br /><br /><br />
<a href="<?php echo site_url('principalController/mensajeslistView');?>" class="button2">Regresar a mensajes.</a></div>
<?php
	}
}
else
{
//We display the messages
?>
<div class="content">
<h1>Titulo: <?php echo $dn1['title']; ?></h1>
<table class="table_message">
	<tr>
    	<th class="author">De:</th>
        <th>Mensaje:</th>
    </tr>
<?php
while($dn2 = mysql_fetch_array($req2))
{
?>
	<tr>
    	<td class="author center">
    	<?php
         ?>
<br /><p><?php echo $dn2['username']; ?></p></td>
    	<td class="left"><div class="date">Fecha: <?php echo date('m/d/Y H:i:s' ,$dn2['timestamp']); ?></div>
    	<?php echo $dn2['message']; ?></td>
    </tr>
<?php
}
//We display the reply form
?>
</table><br /><br />
<hr/>
<h2>Reply</h2>
<br />
<div class="center">
    <form action="<?php echo site_url('principalController/leermensajeView');?>?id=<?php echo $id; ?>" method="post">
    	<label for="message" class="center">Mensaje:</label><br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
        <input type="submit" class="button2" value="Enviar" />
    </form>
</div>
</div>
<?php
}
}
else
{
	echo '<div class="message">No tienes los permisos para acceder a esta pagina.</div>';
}
}
else
{
	echo '<div class="message">El mensaje no existe.</div>';
}
}
else
{
	echo '<div class="message">El id del mensaje no esta definido</div>';
}
}
else
{
	echo '<div class="message">Debes iniciar sesion para leer el mensaje.</div>';
}
?>

<!---------------------------------------------------------->
<!---------------FOOTER------------------------------------->
<!---------------------------------------------------------->
