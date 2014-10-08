<div>
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
            <input type="submit" id="config" value="Configuración"><br/>
        <?php echo form_close(); ?>
        <?php echo form_open('principalController/ProyectosWorker'); ?>
            <input type="submit" id="proyectos" value="Proyectos"><br/>
        <?php echo form_close(); ?>
        <?php echo form_open('principalController/Mensajes'); ?>
        <input type="submit" id="mensajes" value="Mensajes"><br/>
        <?php echo form_close(); ?>
            <br/><br/>
        <?php echo form_open('principalController/cerrarSesion'); ?>
            <input type="submit" class="sesion" value="Cerrar sesión"/>
        <?php echo form_close(); ?>
            <br/>
    </div>
</div>


