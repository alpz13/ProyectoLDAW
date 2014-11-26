


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
          <?php echo form_open('principalcontroller/homeView'); ?>
          <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/principalcontroller/homeView"><img src="<?php echo base_url(); ?>img/newlogo_ldaw.jpg" alt="Home" height="40" style="padding-bottom:7px"/></a>
          <?php echo form_close(); ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            
            <li>
            <?php echo form_open('principalcontroller/Proyectos'); ?>
            <div style="margin-top:9px">
            <a href="<?php echo base_url(); ?>index.php/principalcontroller/Proyectos"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"> Projects</span></button></a>
            <?php echo form_close(); ?>
            </div>
            </li>
            
            <li>
            <?php echo form_open('principalcontroller/messagesView'); ?>
            <div style="margin-top:9px">
            <a href="<?php echo base_url(); ?>index.php/principalcontroller/mensajesView"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-envelope" aria-hidden="true"> Messages</span></button></a>
            <?php echo form_close(); ?>
            </div>
            </li>
            
            <li>
            <?php echo form_open('principalcontroller/Usuarios'); ?>
            <div style="margin-top:9px">
            <a href="<?php echo base_url(); ?>index.php/principalcontroller/Usuarios"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-user" aria-hidden="true"> Users</span></button></a>
            <?php echo form_close(); ?>
            </div>
            </li>
                 
            <div class="navbar-form navbar-left" role="form" style="margin-right: ">
            <div class="form-group" style="margin-top:2px">
              <!--<input type="text" placeholder="Search" class="form-control">-->
                    <div>
                        <?php echo form_open("buscarcontroller/searchAll"); ?>
                            <input type="text" name="buscar" id="buscar" class="busqueda"/>
                            <input type="submit" class="btn btn-primary" value="Search"/>
                        <?php echo form_close();?>
                    </div>

              <!--<input type="search" name="buscar" id="buscar" class="busqueda"/>
              <input type="submit" value="" style="border-style: none; background: url('<?php echo base_url(); ?>images/search.gif') no-repeat; width: 24px; height: 20px;">-->

            </div>
            <!--<button type="submit" class="btn btn-success">Search</button>-->
          </div>      
            
            <!--<li>        
        <input type="search" name="buscar" id="buscar" class="busqueda"/>
        <input type="submit" value="" style="border-style: none; background: url('<?php echo base_url(); ?>images/search.gif') no-repeat; width: 24px; height: 20px;">
        </li>-->

            
            
            <li>
            <?php echo form_open('principalcontroller/Configuracion'); ?>
            <div style="margin-top:9px">
            <?php
                $usuario = $this->session->userdata('apellidoP')." ".$this->session->userdata('apellidoM')." ".$this->session->userdata('nombre');
            ?>
            &nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>index.php/principalcontroller/Configuracion" id="config" alt="configuracion"><button type="button" class="btn btn-info"><?php echo $usuario; ?></button></a>
            <?php echo form_close(); ?>
            </div>
            </li>
            
            <li>
            <?php echo form_open('principalcontroller/cerrarSesion'); ?>
            <div style="margin-top:9px">
            &nbsp;<a href="<?php echo base_url(); ?>index.php/principalcontroller/cerrarSesion"><button type="button" class="btn btn-danger">Logout</button></a>
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



