<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
//Script para mostrar y esconder las dos graficas (inicia escondiendo la segunda grafica).
$(document).ready(function(){
$("p2").hide();
  $("#hide").click(function(){
    $("p2").hide();
    $("p1").show();
  });
  
  $("#show").click(function(){
    $("p1").hide();
    $("p2").show();
  });
});
</script>

</head>
<body>

<p1 id="graph1"><img style="-webkit-user-select:none;" width="40%" src="radarmarkex1.php" alt="" ></p1>
<p2 id="graph2"><img style="-webkit-user-select:none;" width="40%" src="radarmarkex2.php" alt="" ></p2>
<br/><br/>
<button id="hide">Areas</button>
<button id="show">Abilities</button>

</body>
</html>