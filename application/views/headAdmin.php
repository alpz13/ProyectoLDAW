
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
        <!-- <input type="submit" id="config" value="Configuraciﾃｳn"><br/>    -->
        <?php echo form_close(); ?>
        </li>
        
        <li>
        <?php echo form_open('principalController/cerrarSesion'); ?>
        <a href="#" class="button2" style="top: 232px; left: 190px;"><img src="images/logout_opt.png" type="submit" alt="Profile"/>Logout</a>
        <!--  <input type="submit" class="sesion" value="Cerrar sesiﾃｳn"/>    -->
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



<!--
<div >
    <div>
        <input type="search" name="buscar" id="buscar" class="busqueda"/>
        <input type="submit" value="" style="border-style: none; background: url('../../images/search.gif') no-repeat; width: 24px; height: 20px;">
    </div>
    <div id="menuUrl" class='dark'>
        <br/>
        <?php echo form_open('principalController/homeView'); ?>
            <input type="submit" id="home" value="Home"><br/>
        <?php echo form_close(); ?>
        <?php echo form_open('principalController/Configuracion'); ?>
            <input type="submit" id="config" value="Configuraciﾃｳn"><br/>
        <?php echo form_close(); ?>
        <?php echo form_open('principalController/Proyectos'); ?>
            <input type="submit" id="proyectos" value="Proyectos"><br/>
        <?php echo form_close(); ?>
            <br/><br/>
        <?php echo form_open('principalController/cerrarSesion'); ?>
            <input type="submit" class="sesion" value="Cerrar sesiﾃｳn"/>
        <?php echo form_close(); ?>
            <br/>
    </div>
</div>


-->