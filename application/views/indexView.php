<!DOCTYPE html>
<html>
<?php include_once('header_intro.php'); ?>
<body style="background-color:silver">
        <?php if(isset($bin) || isset($error)) { ?>
            <script>
                $(document).ready(function() {
                    $("#principalDiv").hide();
                    $("#login").show();
                });
            </script>
        <?php } ?>
       <!-- <div style="text-align: center;" id="principalDiv">
            <h1>Job Scope</h1>
        </div>-->
	<div id="intro">
		<div align="center">                    
		 <h1>Job Scope</h1>

                        <!-- Aqu・・ｽｭ comienzan las formas de login y registro-->
                        <div id="registro" align="center">
                            <br/>
<!--                            <div>
                                <form enctype="multipart/form-data" method="post" id="formulario">
                                    <label>Upload a file</label><br />
                                    <input name="archivo" type="file" id="imagen" />
                                    <input type="button" value="Subir imagen" id="sendImage"/><br />
                                </form>
                                div para visualizar mensajes
                                <div class="messages"></div><br /><br />
                                div para visualizar en el caso de imagen
                                <div id="showImage"></div>
                            </div>-->
                            <br/>
                            <?php echo form_open('usuariosController/registraUsuario'); ?>
                            <h2>New User:</h2>
                                <table>
                                    <tr>
                                        <td>Name:</td>
                                        <td><input type='text' name='nombre' id="nombre"</td>
                                        <td><?php echo form_error('nombre'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Paternal Surname:</td>
                                        <td><input type='text' name='apellidoP' id="apellidoP"</td>
                                        <td><?php echo form_error('apellidoP'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Maternal Surname:</td>
                                        <td><input type='text' name='apellidoM' id="apellidoM"</td>
                                        <td><?php echo form_error('apellidoM'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Password:</td>
                                        <td><input type='password' name='pass' id="pass"</td>
                                        <td><?php echo form_error('pass'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Re-entry Password:</td>
                                        <td><input type='password' name='passCon' id="passCon"</td>
                                        <td><?php echo form_error('passCon'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mail:</td>
                                        <td><input type='text' name='mail' id="mail"</td>
                                        <td><?php echo form_error('mail'); ?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input id="registrarUsuario" class="btn btn-primary" type="button" value='Register' data-type="zoomin" style="top: 232px; left: 190px;"/>&nbsp;
                                            <!--<input id="back" class="btn btn-danger" type="button" value="Back" />
=======
                                            <input id="registrarUsuario" type="button" value='Register' data-type="zoomin" style="top: 232px; left: 190px;"/>&nbsp;-->
                                            <input name="back" type="button" class="btn btn-primary" value="Back" />
                                        </td>
                                    </tr>
                                </table>
                            <?php echo form_close(); ?>
                            <br/>
                        </div>
                        <div>
                            <div id="contenido">

                            </div>
                        </div>
                        <div id="login" align="center">
                            <br/><br/><br/>
                            <?php echo form_open('principalController/home'); ?>
                                <div><h2>Log in:</h2></div>
                                <table>
                                    <tr>
                                        <td><label>User: </label></td>
                                        <td><input type="text" id="usuario" name="usuario"/></td>
                                    </tr>
                                    <tr>
                                        <td>Password </td>
                                        <td><input type="password" id="passwd" name="passwd"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><u id="forgotten" style="cursor: pointer">Forgotten password?</u></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="submit" class="btn btn-primary" value="Enter"/>
                                            <input type="button" class="btn btn-primary" id="registerButton" value="Register"/>
                                        </td>
                                    </tr>
                                </table>
                            <?php echo form_close(); ?>
                        </div>
                        <br/>
                        <div id="forgottenMsg">
                            
                        </div>
                        <br/>
                        <div id="forgottenPass">
                            <h3>Insert the email of the associated user</h3>
                            <input type="text" id="emailForgotten"/><br/><br/>
                            <input type="button" id="sendEmail" value="Restore password"/>&nbsp;
                            <input name="back" type="button" value="Back" />
                        </div>
                        <div>
                            <br/><br/><br/>
                            <!--<button class="button_par" type="button" id="loginButton" style="top: 232px; left: 190px;">Login</button>-->
                        </div>
                        <div>
                            <?php 
                                if(isset($error)) {
                                    echo "<div class='alert alert-danger'><p>".$error."</p></div>";
                                }
                            ?>
                        </div>
                        <div>
                            <?php
                                if(isset($success)) {
                                    echo "<div>".$success."</div>";
                                }                 
                            ?>
                        </div>
                        <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
		</div>
            <br/><br/>
	</div>	
</body>
</html>