<?php 
    include 'header.php';
    if($this->session->userdata('nombre')) {
        $nombre = $this->session->userdata('nombre');
        $nombre .= " ".$this->session->userdata('apellidoP');
        $nombre .= " ".$this->session->userdata('apellidoM');   
?>

<title>Mostrar Proyectos</title>
<body class='home'>
    <div id="tooplate_wrapper">
        <div class="menuArea">
            <?php 
                include 'headAdmin.php';
            ?>
        </div>
        <div class="principalArea">
            <div>
                <div id="title"><h2>Bienvenido! <?php echo $nombre; ?></h2></div>
            </div>
            <div id="contentArea">
                
            </div>
        </div>
        <div class="principalAreaP dark principalMostrarP">
            <?php if(isset($proyectos)) { 
                echo "<div class='resultados'>";
                    foreach($proyectos->result() as $row) {
                        echo "<table class='table_message'>";
                            echo "<tr>";
                                echo "<td class='nombre'>";
                                    echo "<strong>".$row->NombreTrabajo."</strong><br/><br/>";
                                echo "</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>";
                                    echo $row->Descripcion."<br/><br/>";
                                echo "</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>";
                                    echo "<strong>Supervisor: </strong>".$row->Nombre." ".$row->APaterno." ".$row->AMaterno;
                                echo "</td>";
                            echo "</tr>";
                        echo "</table>";
                        echo "<br/>";
                    }
                echo "</div>";
            ?>
            <?php } else {
                echo "<h3>No hay proyectos disponibles</h3>";
            } ?>
            <br/>
        </div>
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
    