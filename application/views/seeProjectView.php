<!DOCTYPE>
<html>
    <head>
        
    </head>
    <script>
        $(document).ready(function() {
            $('#close').click(function() {
                $('.overlay-container').fadeOut().end().find('.window-container').removeClass('window-container-visible');
            });
        });
    </script>
    <body>
        <div>
            <?php if(!isset($error)) { ?>
                <div>
                    <h2>Project description</h2>
                    <br/>
                    <div style="text-align: center">
                        <img src="<?php echo $proyecto->urlFotoTrabajo; ?>" title="Project picture" alt="Nothing to display" width="200" height="200"/>
                    </div>
                    <div style="text-align: center">
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <td><strong>Project name</strong></td>
                                <td><strong>Description</strong></td>
                                <td><strong>Supervisor info</strong></td>
                            </tr>
                            <tr>
                                <?php 
                                    echo '<tr>';
                                        echo '<td>'.$proyecto->Nombre;
                                        echo '<td>'.$proyecto->Descripcion.'</td>';
                                        echo '<td>'.$supervisor->APaterno.' '.$supervisor->AMaterno.' '.$supervisor->Nombre.' '.$supervisor->Mail.'</td>';
                                    echo '</tr>';
                                ?>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <!--***Muestra las áreas y las competencias necesitadas-->
                    <div style="text-align: center">
                        <?php
                            if(!is_numeric($areas)) {
                                echo '<strong>Areas related to project</strong><br/>';
                                foreach($areas as $row) {
                                    echo '<span>'.$row->NombreArea.'</span><br/>';
                                }
                            }
                            if(!is_numeric($competencias)) {
                                echo '<br/><strong>Competences related to project</strong><br/>';
                                foreach($competencias as $row) {
                                    echo '<span>'.$row->NombreCompetencia.'</span><br/>';
                                }
                            }
                        ?>
                    </div>
                    
                    <!--***Muestra los usuarios actualmente trabajando en el proyecto-->
                    <div style="text-align: center">
                        <?php
                            if(isset($usuariosWorking)) {
                                echo '<br/><strong>Users actually working in the project</strong><br/>';
                                foreach($usuariosWorking as $row) {
                                    echo '<span>'.$row->APaterno.' '.$row->AMaterno.' '.$row->Nombre.' '.$row->Mail.'</span><br/>';
                                }
                            }
                        ?>
                    </div>
                    <br/><br/>
                    <div style="text-align: center">
                        <span class="btn btn-default" id="close">Close</span>
                    </div>
                </div>
            <?php } else {
                        echo "<div>";
                            echo "<h2>Information not found</h3>";
                        echo "</div>";
                        echo '<div style="text-align: center"><span class="close">Close</span></div>';
                    }
            ?>
        </div>
    </body>
</html>