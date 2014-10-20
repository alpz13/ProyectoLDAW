    <!-- Menu Inicia  -->
 <link type="image/x-icon" href="<?php echo base_url(); ?>images/websiteico.ico" rel="shortcut icon"/>
<nav class="menu slide-menu-left">
    <ul>
        <!--<li><button class="close-menu"><img src="images/Button close_opt.jpg" alt="Close"/></button></li>-->
        <li>        
        <input type="search" name="buscar" id="buscar" class="busqueda"/>
        <input type="submit" value="" style="border-style: none; background: url('<?php echo base_url(); ?>images/search.gif') no-repeat; width: 24px; height: 20px;">
        </li>
                
        <li>
        <?php echo form_open('principalController/homeView'); ?>
        <a href="<?php echo base_url(); ?>index.php/principalController/homeView" class="button2" style="top: 232px; left: 190px;"><img src="<?php echo base_url(); ?>images/2-Hot-Home-icon_opt.png" type="submit" id="home" alt="home"/>Home</a>
        <!--  <input type="submit" id="home" value="Home"><br/>    -->
        <?php echo form_close(); ?>
        </li>
        
        <li>
        <?php echo form_open('principalController/messagesView'); ?>
        <a href="<?php echo base_url(); ?>index.php/principalController/mensajesView" class="button2" style="top: 232px; left: 190px;"><img src="<?php echo base_url(); ?>images/mailing-logo_opt.png" type="submit" id="messages" alt="messages"/>Messages</a>
        <!--  <input type="submit" id="messages" value="messages"><br/>    -->
        <?php echo form_close(); ?>
        </li>
        
        <li>
        <?php echo form_open('principalController/Proyectos'); ?>
        <a href="<?php echo base_url(); ?>index.php/principalController/Proyectos" class="button2" style="top: 232px; left: 190px;"><img src="<?php echo base_url(); ?>images/documents_opt.png" type="submit" id="proyectos" alt="Profile"/>Projects</a>
        <!--  <input type="submit" id="proyectos" value="Proyectos"><br/>    -->
        <?php echo form_close(); ?>
        </li>
        
         <li>
        <?php echo form_open('principalController/Usuarios'); ?>
        <a href="<?php echo base_url(); ?>index.php/principalController/Usuarios" class="button2" style="top: 232px; left: 190px;"><img src="<?php echo base_url(); ?>images/User-Group-icon_opt.png" type="submit" id="config" alt="configuracion"/>Users</a>
        <!-- <input type="submit" id="config" value="Configuraci・・ｽｳn"><br/>    -->
        <?php echo form_close(); ?>
        </li>
        
        <li>
        <?php echo form_open('principalController/Configuracion'); ?>
        <a href="<?php echo base_url(); ?>index.php/principalController/Configuracion" class="button2" style="top: 232px; left: 190px;"><img src="<?php echo base_url(); ?>images/setting-icon_opt.png" type="submit" id="config" alt="configuracion"/>Profile</a>
        <!-- <input type="submit" id="config" value="Configuraci・・ｽｳn"><br/>    -->
        <?php echo form_close(); ?>
        </li>
        
        <li>
        <?php echo form_open('principalController/cerrarSesion'); ?>
        <a href="<?php echo base_url(); ?>index.php/principalController/cerrarSesion" class="button2" style="top: 232px; left: 190px;"><img src="<?php echo base_url(); ?>images/logout_opt.png" type="submit" alt="Profile"/>Logout</a>
        <!--  <input type="submit" class="sesion" value="Cerrar sesi・・ｽｳn"/>    -->
        <?php echo form_close(); ?>
        </li>
        
    </ul>
</nav><!-- /slide menu left -->

			<div class="buttons">
                <button class="nav-toggler toggle-slide-left">M<br/>e<br/>n<br/>u</button>
            </div>

<script src="<?php echo base_url(); ?>js/classie.js"></script>
<script src="<?php echo base_url(); ?>js/nav.js"></script>
<!-- Menu Termina  -->