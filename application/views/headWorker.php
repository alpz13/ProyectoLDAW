


<!-- Nuevo HUD para jobscope 22 nov 2014  -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo form_open('principalController/homeView'); ?>
          <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/principalController/homeView"><img src="<?php echo base_url(); ?>img/newlogo_ldaw.jpg" alt="Home" height="40" style="padding-bottom:7px"/></a>
          <?php echo form_close(); ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            
            <li>
            <?php echo form_open('principalController/Proyectos'); ?>
            <div style="margin-top:9px">
            <a href="<?php echo base_url(); ?>index.php/principalController/Proyectos"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"> Projects</span></button></a>
            <?php echo form_close(); ?>
            </div>
            </li>
            
            <li>
            <?php echo form_open('principalController/messagesView'); ?>
            <div style="margin-top:9px">
            <a href="<?php echo base_url(); ?>index.php/principalController/mensajesView"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-envelope" aria-hidden="true"> Messages</span></button></a>
            <?php echo form_close(); ?>
            </div>
            </li>
            
           
                 
          <form class="navbar-form navbar-left" role="form" style="margin-right: %50">
            <div class="form-group" style="margin-top:2px">
              <!--<input type="text" placeholder="Search" class="form-control">-->
                                  <?php echo form_open("buscarController/searchAll"); ?>
                    <input type="hidden" name="urlBuscar" value="<?php echo base_url(); ?>"/>
                    <input type="search" name="buscar" id="buscar" class="busqueda"/>
                    <!--<input type="submit" value="Buscar" style="border-style: none; background: url('<?php echo base_url(); ?>images/search.gif') no-repeat; width: 24px; height: 20px;">-->
                    <input type="submit"  value="Search">
                    <?php echo form_close();?>

              <!--<input type="search" name="buscar" id="buscar" class="busqueda"/>
              <input type="submit" value="" style="border-style: none; background: url('<?php echo base_url(); ?>images/search.gif') no-repeat; width: 24px; height: 20px;">-->

            </div>
            <!--<button type="submit" class="btn btn-success">Search</button>-->
          </form>      
            
            <!--<li>        
        <input type="search" name="buscar" id="buscar" class="busqueda"/>
        <input type="submit" value="" style="border-style: none; background: url('<?php echo base_url(); ?>images/search.gif') no-repeat; width: 24px; height: 20px;">
        </li>-->

            
            
            <li>
            <?php echo form_open('principalController/Configuracion'); ?>
            <div style="margin-top:9px">
            &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-info"><a href="<?php echo base_url(); ?>index.php/principalController/Configuracion" id="config" alt="configuracion">Settings</a></button>
            <?php echo form_close(); ?>
            </div>
            </li>
            
            <li>
            <?php echo form_open('principalController/cerrarSesion'); ?>
            <div style="margin-top:9px">
            &nbsp;<a href="<?php echo base_url(); ?>index.php/principalController/cerrarSesion"><button type="button" class="btn btn-danger">Logout</button></a>
            <?php echo form_close(); ?>
            </div>
            </li>
            
          </ul>        
         </div><!--/.navbar-collapse -->
      </div>
    </nav>    
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
      <br><br>
      <!-- This is the part where the content of the page is displayed -->




