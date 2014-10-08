<!-- Version anterior
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../../javascript/jquery.js"></script>
        <script type="text/javascript" src="../../javascript/principal.js"></script>
        <title>Job Scope</title>
        <link type="image/x-icon" href="images/websiteico.ico" rel="shortcut icon"/>
        <link href="<?php echo base_url(); ?>/css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    -->
<!DOCTYPE html>
<html>
    <head>
        <meta  http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../../javascript/jquery.js"></script>
        <script type="text/javascript" src="../../javascript/principal.js"></script>
        <title>Job Scope</title>
        <link type="image/x-icon" href="images/websiteico.ico" rel="shortcut icon"/>
        <link href="<?php echo base_url(); ?>/css/styles.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>default.css" title="default">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/base.css" >
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style.css" >
    </head>
    
    <body>
<!-- Menu Inicia  -->
<nav class="menu slide-menu-left">
    <ul>
        <!--<li><button class="close-menu"><img src="images/Button close_opt.jpg" alt="Close"/></button></li>-->
        <li>        
        <input type="search" name="buscar" id="buscar" class="busqueda"/>
        <input type="submit" value="" style="border-style: none; background: url('../../images/search.gif') no-repeat; width: 24px; height: 20px;">
        </li>
                
        <li>
        <?php echo form_open('principalController/homeView'); ?>
        <a href="#" class="button2" style="top: 232px; left: 190px;"><img src="images/user_opt.png" type="submit" id="home" alt="home"/>Profile</a>
        <!--  <input type="submit" id="home" value="Home"><br/>    -->
        <?php echo form_close(); ?>
        </li>
        
        <li>
        <?php echo form_open('principalController/messagesView'); ?>
        <a href="#" class="button2" style="top: 232px; left: 190px;"><img src="images/mailing-logo_opt.png" type="submit" id="messages" alt="messages"/>Messages</a>
        <!--  <input type="submit" id="messages" value="messages"><br/>    -->
        <?php echo form_close(); ?>
        </li>
        
        <li>
        <?php echo form_open('principalController/Proyectos'); ?>
        <a href="#" class="button2" style="top: 232px; left: 190px;"><img src="images/documents_opt.png" type="submit" id="proyectos" alt="Profile"/>Projects</a>
        <!--  <input type="submit" id="proyectos" value="Proyectos"><br/>    -->
        <?php echo form_close(); ?>
        </li>
        
        <li>
        <?php echo form_open('principalController/Configuracion'); ?>
        <a href="#" class="button2" style="top: 232px; left: 190px;"><img src="images/setting-icon_opt.png" type="submit" id="config" alt="configuracion"/>Settings</a>
        <!-- <input type="submit" id="config" value="Configuraci・・ｽｳn"><br/>    -->
        <?php echo form_close(); ?>
        </li>
        
        <li>
        <?php echo form_open('principalController/cerrarSesion'); ?>
        <a href="#" class="button2" style="top: 232px; left: 190px;"><img src="images/logout_opt.png" type="submit" alt="Profile"/>Logout</a>
        <!--  <input type="submit" class="sesion" value="Cerrar sesi・・ｽｳn"/>    -->
        <?php echo form_close(); ?>
        </li>
        
    </ul>
</nav><!-- /slide menu left -->

			<div class="buttons">
                <button class="nav-toggler toggle-slide-left">M<br/>e<br/>n<br/>u</button>
            </div>

<script src="js/classie.js"></script>
<script src="js/nav.js"></script>
<!-- Menu Termina  -->

<!-- Inicia contenido de pagina -->
<div id="WholePage">
  <div id="Inner">
    <div id="Container">
      <div id="TopPart">
        <div id="Head">
        </div>
      </div>
      <div id="Shadow">
        <div id="CentralPart">
          <div id="Menu"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>
          <div id="LeftPart" style="width: 882px">
            <div id="Page" style="width: 868px">
            <div><br/></div>
				<p>
