<?php 
    include_once 'header.php';
    if($this->session->userdata('nombre')) {
        $nombre = $this->session->userdata('nombre');
        $nombre .= " ".$this->session->userdata('apellidoP');
        $nombre .= " ".$this->session->userdata('apellidoM');   
?>

<title>Create Project</title>
<body class='home'>
    <div id="tooplate_wrapper">
        <div class="menuArea">
            <?php 
                if($this->session->userdata('tipo') == 3) {
                    include_once 'headWorker.php';
                } else {
                    include_once 'headAdmin.php';
                }
            ?>
        </div>
        <div class="principalAreaP dark">
            <table style="margin-left: 14%;">
                <tr>
                    <td>
                        <?php echo form_open('proyectoscontroller/myProjects'); ?>
                            <input class="btn btn-primary" type="submit" value="My Projects" />
                        <?php echo form_close(); ?>
                    </td>
                    <td>
                        <?php echo form_open('proyectoscontroller/consultar'); ?>
                            <input class="btn btn-primary" type="submit" value="See all projects" />
                        <?php echo form_close(); ?>
                    </td>
                    <td>
                        <?php echo form_open('proyectoscontroller/creaProyecto'); ?>
                            <input class="btn btn-primary" type="submit" value="Create project"/>
                        <?php echo form_close(); ?>
                    </td>
                    <td>
                        <?php echo form_open('proyectoscontroller/asignarTrabajador'); ?>
                            <input class="btn btn-primary" type="submit" value="Assign worker"/>
                        <?php echo form_close(); ?>
                    </td>
                    <td>
                        <?php echo form_open('proyectoscontroller/eliminar'); ?>
                            <input class="btn btn-primary" type="submit" value="Delete project" />
                        <?php echo form_close(); ?>
                    </td>
                </tr>
            </table>
        </div><br/><br/>
        <div class="principalAreaP dark">
            <?php echo form_open('proyectoscontroller/nuevoProyecto'); ?>
                <table style="margin-left: 20%;">
                    <tr>
                        <td>Name of the project: </td>
                        <td><input type="text" name="nombre" value="<?php echo set_value('nombre');?>"/></td>
                    </tr>
                    <tr>
                        <td>Description: </td>
                        <td><textarea name="descripcion" rows="5" cols="70" ><?php echo set_value('descripcion');?></textarea></td>
                    </tr>
                    <tr>
                        <td>Availability: </td>
                        <td>
                            <label>Enable: </label><input type="radio" name="habilitado" value="1" checked="true"/>
                            <label>Disable: </label><input type="radio" name="habilitado" value="0"/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <br/><br/>
                            Please add the areas/competences for your project
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Areas:</strong><br/>
                            Security: <br/>
                            Web: <br/>
                            DataBases: <br/>
                            Networking: <br/>
                            DesktopApps: <br/>
                        </td>
                        <td>
                            <br/>
                            <input type="checkbox" name="security" value="1"/><br/>
                            <input type="checkbox" name="web" value="2"/><br/>
                            <input type="checkbox" name="db" value="3"/><br/>
                            <input type="checkbox" name="network" value="4"/><br/>
                            <input type="checkbox" name="desktop" value="5"/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Competences:</strong><br/>
                            Team Work: <br/>
                            Comunication: <br/>
                            Work under pressure: <br/>
                            Initiative: <br/>
                            Leadership: <br/>
                        </td>
                        <td>
                            <br/>
                            <input type="checkbox" name="team" value="1"/><br/>
                            <input type="checkbox" name="comunication" value="2"/><br/>
                            <input type="checkbox" name="work" value="3"/><br/>
                            <input type="checkbox" name="initiative" value="4"/><br/>
                            <input type="checkbox" name="leader" value="5"/><br/>
                        </td>
                    </tr>
                </table>
            <br/>
            <input class="btn btn-success" type="submit" value="Create" style="margin-left: 20%;"/>
            <?php echo form_close(); ?>
        </div>
    </div><br/><br/>
    <div style="margin-left: 33%;">
        <?php if(isset($error)) {
            echo "<p>".$error."</p>";
        }
        ?>
    </div>
    <div id='footerid'>
        <div class="footer">
                <?php include_once 'footer.php'; ?>
        </div>
    </div>
</body>

<?php
    } else {
        include 'error.php';
    }
?>
    