<?php // content="text/plain; charset=utf-8"
session_start();

include_once('../../lib/lib_general/funciones.inc.php');
require_once('../../lib/jpgraph/src/jpgraph.php');
//require_once("../../lib/jpgraph/src/jpgraph_gantt.php");
require_once("../../lib/jpgraph/src/jpgraph_line.php");
require_once("../../lib/jpgraph/src/jpgraph_pie.php");
require_once("../../lib/jpgraph/src/jpgraph_pie3d.php");    

setlocale(LC_TIME, 'es_ES');

// se reciben los datos
$v_datos = $_SESSION['pdf_hidro'];
//var_dump($v_datos); exit;

// cantidad de datos 
$total_datos = sizeof($v_datos);
if($total_datos > 1000)
{
	$ancho = 30000;
}
else 
{
	$ancho = 5000;
}

// Setup the graph
$graph = new Graph($ancho,550);
$graph->SetScale("textlin");

// se instancia el objeto funciones
$funciones = new funciones();

// se obtiene el vector de medidas y de fechas
for($i = 0; $i < $total_datos; $i++)
{	
	$vector_medidas[$i] = $v_datos[$i]['valor'];
	$v_fecha = explode(' ', $v_datos[$i]['fecha']);	
	$v_fecha = $v_fecha[0];	
		
	//$vector_fechas[$i] = getdate($v_datos[$i]['fecha1']);
	$vector_fechas[$i] = $v_fecha;
}

// se establece fechas inicial y final
$fecha_inicial = $v_datos[0]['fecha'];
$fecha_final = $v_datos[$total_datos - 1]['fecha'];

// se dibuja el titulo
$graph->img->SetAntiAliasing(false);
$graph->title->Set("REPORTE DE HIDROLOGIA\nINTERVALO DE FECHAS\nDESDE: ".strftime('%d de %B de %Y', strtotime($fecha_inicial))." - HASTA: ".strftime('%d de %B de %Y', strtotime($fecha_final))."");
//$graph->title->SetColor('lightyellow');
$graph->SetBox(true); // borde del recuadro de los datos 

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($vector_fechas); // texto referencial horizontal eje x
$graph->xaxis->SetLabelAngle(90); // angulo del texto 90°
$graph->xgrid->SetColor('white'); // color de las lineas de referencia verticales

// Create the first line
$p1 = new LinePlot($vector_medidas);
$graph->Add($p1);
$p1->SetFillGradient('red','yellow'); // color del degradado del area de abajo

$p1->mark->SetType(MARK_IMG,'../../lib/images/cuadrado.gif',0.2);
//$p1->SetColor('green');
$p1->value->SetFormat('%d');
$p1->value->Show();
$p1->value->SetColor('black'); // color del texto de las marcas
$p1->SetColor("red"); // color de la linea
$p1->SetLegend('Medidas');

// Para el fondo con degradado 
$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
$graph->SetBackgroundGradient('blue', '#55eeff', GRAD_HOR, BGRAD_PLOT); // color del degradado superior
//$graph->SetBackgroundImage("../../lib/images/logo_endesis.png", BGIMG_FILLFRAME); // fondo de la imagen 

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>


