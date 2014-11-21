<!---------------------------------------------------------->
<!----------------OTHER VIEW-------------------------------->
<!---------------------------------------------------------->				

<div class="content">
<?php
//We check if the user is logged
//We list his messages in a table
//Two queries are executes, one for the unread messages and another for read messages
//$req1 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, users.id as userid, users.username from pm as m1, pm as m2,users where ((m1.user1="'.$_SESSION['userid'].'" and m1.user1read="no" and users.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" and m1.user2read="no" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
//$req2 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, users.id as userid, users.username from pm as m1, pm as m2,users where ((m1.user1="'.$_SESSION['userid'].'" and m1.user1read="yes" and users.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" and m1.user2read="yes" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
/////////Nuevos sqls
$sessionIdm=$this->session->userdata('id');
$req1 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, usuarios.idUsuarios as userid, usuarios.Mail from mensajes as m1, mensajes as m2,usuarios where ((m1.user1="'.$sessionIdm.'" and m1.user1read="no" and usuarios.idUsuarios=m1.user2) or (m1.user2="'.$sessionIdm.'" and m1.user2read="no" and usuarios.idUsuarios=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
$req2 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, usuarios.idUsuarios as userid, usuarios.Mail from mensajes as m1, mensajes as m2,usuarios where ((m1.user1="'.$sessionIdm.'" and m1.user1read="yes" and usuarios.idUsuarios=m1.user2) or (m1.user2="'.$sessionIdm.'" and m1.user2read="yes" and usuarios.idUsuarios=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
?>
<br />
<br />
<br />
<br />
<a href="<?php echo site_url('principalController/nuevomensajeView');?>" class="button2" style="top: 232px; left: 190px;">&nbsp; Crear mensaje</a><br />
<br/>
<br/>
<h3>New Messages (<?php echo intval(mysql_num_rows($req1)); ?>):</h3>
<table class="table_message">
	<tr>
    	<th class="title_cell">Title</th>
        <!--<th>No. Replies</th>-->
        <th>From</th>
        <th>Date:</th>
    </tr>
<?php
//We display the list of unread messages
while($dn1 = mysql_fetch_array($req1))
{
?>
	<tr>
    	<td class="left"> 
    	<a href="<?php echo site_url('principalController/leermensajeView');?>?id=<?php echo $dn1['id']; ?>">
    	<?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<!--<td><?php echo $dn1['reps']-1; ?></td>-->
    	<td><p><?php echo htmlentities($dn1['Mail'], ENT_QUOTES, 'UTF-8'); ?></p></td>
    	<td><?php echo date('Y/m/d H:i:s' ,$dn1['timestamp']); ?></td>
    </tr>
<?php
}
//If there is no unread message we notice it
if(intval(mysql_num_rows($req1))==0)
{
?>
	<tr>
    	<td colspan="4" class="center">No new messages.</td>
    </tr>
<?php
}
?>
</table>
<br />
<h3>Write/Read Messages (<?php echo intval(mysql_num_rows($req2)); ?>):</h3>
<table class="table_message">
	<tr>
    	<th class="title_cell">Title</th>
        <th>No. Replies</th>
        <th>From</th>
        <th>Date:</th>
    </tr>
<?php
//We display the list of read messages
while($dn2 = mysql_fetch_array($req2))
{
?>
	<tr>
    	<td class="left"><a href="<?php echo site_url('principalController/leermensajeView');?>?id=<?php echo $dn2['id']; ?>"><?php echo htmlentities($dn2['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo $dn2['reps']-1; ?></td>
    	<td><p><?php echo htmlentities($dn2['Mail'], ENT_QUOTES, 'UTF-8'); ?></p></td>
    	<td><?php echo date('Y/m/d H:i:s' ,$dn2['timestamp']); ?></td>
    </tr>
<?php
}
//If there is no read message we notice it
if(intval(mysql_num_rows($req2))==0)
{
?>
	<tr>
    	<td colspan="4" class="center">No new messages.</td>
    </tr>
<?php
}
?>
</table>
</div>
<!---------------------------------------------------------->
<!---------------FOOTER------------------------------------->
<!---------------------------------------------------------->
