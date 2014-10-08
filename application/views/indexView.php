<!DOCTYPE html>
<html lang="en">
<?php include_once('header_intro.php'); ?>
<body>
	<ul id="nav">
		<li><a href="#intro" title="Next Section"><img src="<?php echo base_url(); ?>images/dot.png" alt="Link" /></a></li>
		<li><a href="#second" title="Next Section"><img src="<?php echo base_url(); ?>images/dot.png" alt="Link" /></a></li>
		<li><a href="#third" title="Next Section"><img src="<?php echo base_url(); ?>images/dot.png" alt="Link" /></a></li>
		<li><a href="#fifth" title="Next Section"><img src="<?php echo base_url(); ?>images/dot.png" alt="Link" /></a></li>
	</ul>
        <?php if(isset($bin)) { ?>
            <script>
                $(document).ready(function() {
                    $("#principalDiv").hide();
                    $("#login").show();
                });
            </script>
        <?php } ?>
    
	<div id="intro">
		<div class="story">
			<div class="float-left" id="principalDiv">
				<h1>Job Scope</h1>
			</div>
                    
                        <!-- Aquí comienzan las formas de login y registro-->
                        <div class="float-right">
                            <br/><br/><br/><br/><br/><br/>
                            <button class="button_par" type="button" id="loginButton" style="top: 232px; left: 190px;">Login</button>
                            <button class="button_par" type="button" id="registerButton" style="top: 232px; left: 190px;">Register</button>
                        </div>
                        <div class="float-left" id="registro">
                            <br/><br/><br/><br/>
                            <?php echo form_open('usuariosController/registraUsuario'); ?>
                            <h2>Nuevo Usuario:</h2>
                                <table class="tRegistro">
                                    <tr>
                                        <td>Nombre:</td>
                                        <td><input type='text' name='nombre' id="nombre"</td>
                                        <td class="error"><?php echo form_error('nombre'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Apellido Paterno:</td>
                                        <td><input type='text' name='apellidoP' id="apellidoP"</td>
                                        <td class="error"><?php echo form_error('apellidoP'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Apellido Materno:</td>
                                        <td><input type='text' name='apellidoM' id="apellidoM"</td>
                                        <td class="error"><?php echo form_error('apellidoM'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Contraseña:</td>
                                        <td><input type='password' name='pass' id="pass"</td>
                                        <td class="error"><?php echo form_error('pass'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Repita su contraseña:</td>
                                        <td><input type='password' name='passCon' id="passCon"</td>
                                        <td class="error"><?php echo form_error('passCon'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Correo:</td>
                                        <td><input type='text' name='mail' id="mail"</td>
                                        <td class="error"><?php echo form_error('mail'); ?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input id="registrarUsuario" type="button" class="button_par" value='Registrar' style="top: 232px; left: 190px;"/></td>
                                    </tr>
                                </table>
                            <?php echo form_close(); ?>
                            <br/>
                            <div id="contenido">
                                
                            </div>
                        </div>
                        <div class="float-left" id="login">
                            <br/><br/><br/>
                            <?php echo form_open('principalController/home'); ?>
                                <div><h2>Ingresa al sistema:</h2></div>
                                <table class='table'>
                                    <tr>
                                        <td><label>Usuario: </label></td>
                                        <td><input type="text" id="usuario" name="usuario"/></td>
                                    </tr>
                                    <tr>
                                        <td>Contraseña: </td>
                                        <td><input type="password" id="passwd" name="passwd"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Entrar" class='button_par'/></td>
                                    </tr>
                                </table>
                            <?php echo form_close(); ?>
                        </div>
                        <div class="float-left">
                            <?php 
                                if(isset($error)) {
                                    echo "<div class='error'>".$error."</div>";
                                }
                            ?>
                        </div>
                        <div class="float-left">
                            <?php
                                if(isset($success)) {
                                    echo "<div class='success'>".$success."</div>";
                                }                 
                            ?>
                        </div>
                        <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
		</div>
	</div>

	<div id="second">
		<div class="story">
			<div class="float-right">
				<h2>Basic Idea</h2>
				<p>Are you looking for a job but you hate to look for one?, you have certain skills but you don't find the perfect job for you, don't even tell me about the many hours spent in the computer just to find a job that you actually qualify. Significantly reduce the hours spent with "JOB SCOPE".</p>
			</div>
		</div>
	</div>

	<div id="third">
		<div class="story">
	    	<div class="float-left">
	        	<h2>Got tired of looking and not finding anything?</h2>
	            <p>Remove all frustation with us and try us out, easy to use, in a few steps you can be appplying for the job specially designed for you </p>
	        </div>
	    </div> <!--.story-->
	</div> <!--#third-->

	<div id="fifth">
		<div class="story">
	    	<div class="float-left">
	            <h2>Whant to check us out?</h2>
	            <p><em>Reduce searching hours.</em></p>
	            <p>Free, simple and designed to pair you with the perfect job for you.</p>
	            <p>Come feel free to join us and try us out.</p>
	        </div>
	    </div> <!--.story-->
	</div> <!--#fifth-->

	
</body>
</html>