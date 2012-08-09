<?php
/**
**********************************************************
Nombre de archivo:	    mostrarGantSast.php
Prop�sito:				impirme gráficas Gantt a partir de un id
Tabla:					
Par�metros:				$id_requerimiento						

Valores de Retorno:    	N�mero de registros guardados
Fecha de Creaci�n:		2012-01-03 
Versi�n:				1.0.0
Autor:					Rortiz
**********************************************************
*/
session_start();

include_once('../../lib/lib_general/funciones.inc.php');
require_once('../../lib/jpgraph/src/jpgraph.php');
require_once("../../lib/jpgraph/src/jpgraph_gantt.php");
include_once("../../lib/jpgraph/src/jpgraph_line.php"); 

// Convert to binary and send to the browser//
//header('Content-type: image/png');

/**Suma la cantidad e dias a una fecha
 * *******************************************
 *
 * @param fecha $fecha
 * @param entero $ndias
 * @return fecha sumada
 */

function suma_fechas($fecha,$ndias)	
{
	$fecha1 = explode('-',$dFecIni);
	$fecha2 = explode('-',$dFecFin);
	
	//defino fecha 1 
	$ano1 = $fecha1[0]; 
	$mes1 = $fecha1[1]; 
	$dia1 = $fecha1[2]; 
		
	//defino fecha 2 
	$ano2 = $fecha2[0]; 
	$mes2 = $fecha2[1]; 
	$dia2 = $fecha2[2]; 
		
	//calculo timestam de las dos fechas 
	$timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1); 
	$timestamp2 = mktime(4,12,0,$mes2,$dia2,$ano2); 
	
	//resto a una fecha la otra 
	$segundos_diferencia = $timestamp1 + $timestamp2; 
	//echo $segundos_diferencia; 
	
	//convierto segundos en d�as 
	$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 
	
	//obtengo el valor absoulto de los d�as (quito el posible signo negativo) 
	$dias_diferencia = abs($dias_diferencia); 
	
	//quito los decimales a los d�as de diferencia 
	$dias_diferencia = floor($dias_diferencia); 
	
	return (string)$dias_diferencia;	      
}

/**Resta dos fechas
 * **********************************************
 *
 * @param fecha inicio $dFecIni
 * @param fecha fin $dFecFin
 * @return nro de dias
 */

function restaFechas($dFecIni, $dFecFin)
{	
	$fecha1 = explode('-',$dFecIni);
	$fecha2 = explode('-',$dFecFin);
	
	//defino fecha 1 
	$ano1 = $fecha1[0]; 
	$mes1 = $fecha1[1]; 
	$dia1 = $fecha1[2]; 
		
	//defino fecha 2 
	$ano2 = $fecha2[0]; 
	$mes2 = $fecha2[1]; 
	$dia2 = $fecha2[2]; 
		
	//calculo timestam de las dos fechas 
	$timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1); 
	$timestamp2 = mktime(4,12,0,$mes2,$dia2,$ano2); 
	
	//resto a una fecha la otra 
	$segundos_diferencia = $timestamp1 - $timestamp2; 
	//echo $segundos_diferencia; 
	
	//convierto segundos en d�as 
	$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 
	
	//obtengo el valor absoulto de los d�as (quito el posible signo negativo) 
	$dias_diferencia = abs($dias_diferencia); 
	
	//quito los decimales a los d�as de diferencia 
	$dias_diferencia = floor($dias_diferencia); 
	//$dias_diferencia = $dias_diferencia + 1;
	return (string)$dias_diferencia;		
}

$tamanio = sizeof($_SESSION['gantt']);
$fecha_min = $_SESSION['gantt'][0]['fecha_ini'];
$fecha_max = $_SESSION['gantt'][$tamanio-1]['fecha_ini'];
$total_dias = restaFechas($fecha_min, $fecha_max); //+ '14 days'

// Basic Gantt graph

$graph = new GanttGraph();
$graph->SetMarginColor('blue:1.7');
$graph->SetColor('white');

$graph->SetBackgroundGradient('navy','white',GRAD_HOR,BGRAD_MARGIN);
$graph->scale->hour->SetBackgroundColor('lightyellow:1.5');
$graph->scale->hour->SetFont(FF_ARIAL);
$graph->scale->day->SetBackgroundColor('lightyellow:1.5');
$graph->scale->day->SetFont(FF_ARIAL,FS_BOLD);


$graph->title->Set("Reporte de Seguimiento del Requerimiento No: ".$_SESSION['numero_requerimiento']);
$graph->title->SetColor('lightyellow');

$graph->SetDateRange($fecha_min,$fecha_max);
		
// 1.5 line spacing to make more roomb
$graph->SetVMarginFactor(1.5);

// Setup some nonstandard colors
$graph->SetMarginColor('lightblue@0.8');
$graph->SetBox(true,'black:0.6',2);
$graph->SetFrame(true,'darkblue',4);
$graph->scale->divider->SetColor('black:0.6');
$graph->scale->dividerh->SetColor('black:0.6');	

if($total_dias<74)
	$graph->ShowHeaders(GANTT_HMONTH | GANTT_HYEAR | GANTT_HWEEK |GANTT_HDAY);
elseif($total_dias>=74 && $total_dias<201)
	$graph->ShowHeaders(GANTT_HMONTH | GANTT_HYEAR | GANTT_HWEEK );
else 
	$graph->ShowHeaders(GANTT_HMONTH | GANTT_HYEAR);

$graph->scale->month->grid->SetColor('gray');
$graph->scale->month->grid->Show(true);
$graph->scale->year->grid->SetColor('gray');
$graph->scale->year->grid->Show(true);

// For the titles we also add a minimum width of 100 pixels for the Task name column
$graph->scale->actinfo->SetColTitles(array('Requerimiento','Estado Requerimiento','Responsable','Duracion','Inicio','Fin'),array(30,100));
 
$graph->scale->actinfo->SetBackgroundColor('lightyellow:1.5');
$graph->scale->actinfo->SetFont(FF_ARIAL,FS_BOLD,10);
$graph->scale->actinfo->vgrid->SetStyle('solid');
$graph->scale->actinfo->vgrid->SetColor('gray');

$funciones = new funciones();
$data = array();

array_push($data,
				array(
						0,
						array(
							"Requerimiento",
							$_SESSION['numero_requerimiento'],
							"",
							$total_dias.' dias',
							$funciones->fecha_jpgraph($fecha_min),
							$funciones->fecha_jpgraph($fecha_max)),
						$fecha_min,
						$fecha_max,
						FF_ARIAL,
						FS_BOLD,
						9));

$bar = new GanttBar ($data[0][0],$data[0][1],$fecha_min,$fecha_max,"",11);	
$bar->SetPattern(GANTT_HVCROSS,'yellow');
$bar->SetFillColor("red");
$graph->Add($bar);

for($i = 0; $i < ($tamanio-1); $i++)
{
	if($_SESSION['gantt'][$i]['responsable'] == null)
	{		
		$_SESSION['gantt'][$i]['responsable'] = "";
	}	
		
	array_push($data,
					array(
							$i + 1,
							array(
								"Requerimiento",
								$_SESSION['gantt'][$i]['vigente'],
								$_SESSION['gantt'][$i]['responsable'],
								restaFechas($_SESSION['gantt'][$i]['fecha_ini'],
								$_SESSION['gantt'][$i+1]['fecha_ini']).' dias',
								$funciones->fecha_jpgraph($_SESSION['gantt'][$i]['fecha_ini']),
								$funciones->fecha_jpgraph($_SESSION['gantt'][$i+1]['fecha_ini'])),
							$_SESSION['gantt'][$i]['fecha_ini'],
							$_SESSION['gantt'][$i+1]['fecha_ini'],
							FF_ARIAL,
							FS_NORMAL,
							9));		
}

if($_SESSION['gantt'][$tamanio-1]['responsable'] == null)
{
	$_SESSION['gantt'][$tamanio-1]['responsable'] = "";
}	

array_push($data,array($tamanio,array("Requerimiento",$_SESSION['gantt'][$tamanio-1]['vigente'],$_SESSION['gantt'][$tamanio-1]['responsable'],restaFechas($_SESSION['gantt'][$tamanio-1]['fecha_ini'],$_SESSION['gantt'][$tamanio-1]['fecha_ini']).' dias',$funciones->fecha_jpgraph($_SESSION['gantt'][$tamanio-1]['fecha_ini']),$funciones->fecha_jpgraph($_SESSION['gantt'][$tamanio-1]['fecha_ini'])),$_SESSION['gantt'][$tamanio-1]['fecha_ini'],$_SESSION['gantt'][$tamanio-1]['fecha_ini'],FF_ARIAL,FS_NORMAL,9));	

// Create the bars and add them to the gantt chart
for($i=1; $i < sizeof($data); $i++) 
{   
    $bar = new GanttBar($data[$i][0],$data[$i][1],$data[$i][2],$data[$i][3],"",11);    
    $bar->SetFillColor("yellow");
    $graph->Add($bar);       
}

$graph->Stroke();
?>