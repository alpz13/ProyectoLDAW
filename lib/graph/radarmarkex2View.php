<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_radar.php');

$a = $_GET['a'];
$b = $_GET['b'];
$c = $_GET['c'];
$d = $_GET['d'];
$e = $_GET['e'];

//Array of data extracted from the database.
$titles=array('Teamwork','Comunication','Work under preassure','Initiative','Leadership');
$data=array( $a, $b, $c, $d, $e);

//Defines the a new radar with a set size.
$graph = new RadarGraph (450,400);

//Sets title of the radar graphics and the fonts used.
$graph->title->Set('Abilities');
$graph->title->SetFont(FF_VERDANA,FS_BOLD,12);

//Sets the format of the radar (center, background color).
$graph->SetTitles($titles);
$graph->SetCenter(0.5,0.50);
//$graph->HideTickMarks();
//$graph->SetColor('lightgreen@0.7');
$graph->axis->SetColor('darkgray');
$graph->grid->SetColor('darkgray');
$graph->grid->Show();

//Sets the text format of each type of data recived.
$graph->axis->title->SetFont(FF_ARIAL,FS_NORMAL,12);
$graph->axis->title->SetMargin(5);
$graph->SetGridDepth(DEPTH_BACK);
$graph->SetSize(0.6);

//Sets the graphic line format.
$plot = new RadarPlot($data);
$plot->SetColor('darkgreen@0.5');
$plot->SetLineWeight(2);
$plot->SetFillColor('green@0.7');

//Sets the color of the dots from each data (if used).
$plot->mark->SetType(MARK_IMG_SBALL,'red');

//Prepares the radar
$graph->Add($plot);
$graph->Stroke();
?>
