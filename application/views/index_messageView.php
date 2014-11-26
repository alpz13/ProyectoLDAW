<!---------------------------------------------------------->
<!----------------OTHER VIEW-------------------------------->
<!---------------------------------------------------------->	    
<?php
//include('config.php');
session_start();
?>
<p>Hi</p>

<?php 
if(isset($_SESSION['username'])){
		echo ' '.htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8');
	} 
?>
<br />
<p>Welcome to the messaging system</p>
<!--You can <a href="users.php">see the list of users</a>.--><br />
<?php
//If the user is logged, we display links to edit his infos, to see his pms and to log out
if(isset($_SESSION['username']))
{
	//We count the number of new messages the user has
	$nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
	//The number of new messages is in the variable $nb_new_pm
	$nb_new_pm = $nb_new_pm['nb_new_pm'];
	//We display the links
?>

<a href="<?php echo site_url('principalcontroller/mensajeseditinfoView');?>" class="button2">Edit my information.</a><br /><br /><br />
<a href="<?php echo site_url('principalcontroller/mensajeslistView');?>" class="button2">My messages(<?php echo $nb_new_pm; ?> unread)</a><br /><br /><br />
<a href="<?php echo site_url('principalcontroller/conexionView');?>" class="button2">Logout</a><br /><br />

<?php
}
else
{
//Otherwise, we display a link to log in and to Sign up
?>

	<?php echo form_open('principalcontroller/mensajessignView'); ?>
	   <input type="submit" class="button2" value="Registrar" />
	<?php echo form_close(); ?>

	<?php echo form_open('principalcontroller/conexionView'); ?>
	   <input type="submit" class="button2" value="Log in" />
	<?php echo form_close(); ?>


<?php
}
?>

<!---------------------------------------------------------->
<!---------------FOOTER------------------------------------->
<!---------------------------------------------------------->
