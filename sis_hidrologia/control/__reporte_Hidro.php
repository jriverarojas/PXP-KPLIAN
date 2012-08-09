<?php
session_start();
include_once('../../lib/lib_general/funciones.inc.php');
require_once('/var/www/html/web/lib/tcpdf/config/lang/spa.php');
require_once('/var/www/html/web/lib/tcpdf/tcpdf.php');

class ReporteHidro extends TCPDF 
{
	protected $objReporte;	
	protected $alinearCabecera='L';
	protected $orientacion;
	protected $usuario='NO DEFINIDO';
	protected $sistema='ENDESIS';
	
	public function __construct($orientation='P', $unit='mm', $format='A4', $unicode=true, $encoding='UTF-8', $diskcache=false) 
	{
		$this->orientacion=$orientation;
		parent::__construct('L', $unit, $format, $unicode, $encoding, $diskcache);		
	}
	
	public function Header()
	{
		if($this->orientacion=='P'){
			if($this->alinearCabecera=='L'){
				$align=0;
			} else{
				$align=170;
			}
			// Logo
			$image_file = K_PATH_IMAGES.'../../images/logo_reporte.jpg';
			$this->Image($image_file, $align, 10, 55, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			// Set font
			$this->SetFont('helvetica', 'B', 20);
			// Title
			//$this->Cell(0, 15, 'ENDESIS', 0, false, 'C', 0, '', 0, false, 'M', 'M');
		} else if($this->orientacion=='L'){
			if($this->alinearCabecera=='L'){
				$align=0;
			} else{
				$align=230;
			}
			// Logo
			$image_file = K_PATH_IMAGES.'../../images/logo_reporte.jpg';
			$this->Image($image_file, $align, 10, 55, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			// Set font
			$this->SetFont('helvetica', 'B', 20);
			// Title
			//$this->Cell(0, 15, 'ENDESIS', 0, false, 'C', 0, '', 0, false, 'M', 'M');
		} else{
			throw new Exception("Reporte: Orientaci�n incorrecta, debe ser 'P' o 'L'");
		}
		
	}
	
	public function Footer() {
		//En funci�n de la orientaci�n de la p�gina determina la posici�n de los textos
		$y=0;
		$fecha=date("d-m-Y H:i:s");
		if($this->orientacion=='P'){
			// Position at 15 mm from bottom
			$this->SetY(-10);
			// Set font
			$this->SetFont('helvetica', 'I', 6);
			// Page number
			$this->Cell(70,3,'Usuario: '.$this->usuario,0,0,'L');
			$this->Cell(70, 3, 'Pagina '.$this->getAliasNumPage().' de '.$this->getAliasNbPages(), 0, 0, 'C', 0, '', 0, false, 'T', 'M');
			$this->Cell(55,3,'Fecha: '.$fecha,0,1,'R');
			$this->Cell(70,3,$this->sistema,0,0,'L');
		} else if($this->orientacion=='L'){
			// Position at 15 mm from bottom
			$this->SetY(-10);
			// Set font
			$this->SetFont('helvetica', 'I', 6);
			// Page number
			$this->Cell(70,3,'Usuario: '.$this->usuario,0,0,'L');
			$this->Cell(125, 3, 'Pagina '.$this->getAliasNumPage().' de '.$this->getAliasNbPages(), 0, 0, 'C', 0, '', 0, false, 'T', 'M');
			$this->Cell(65,3,'Fecha: '.$fecha,0,1,'R');
			$this->Cell(70,3,$this->sistema,0,0,'L');
		} else{
			throw new Exception("Reporte: Orientaci�n incorrecta, debe ser 'P' o 'L'");
		}				
	}
		
	/*
	 * PROPIEDADES
	 */
	function setAlinearCabecera($pAlineacion){
		if($pAlineacion=='L'){
			$this->alinearCabecera='L';
		} else{
			$this->alinearCabecera='R';
		}
	}
	function setUsuario($pUsuario){
		$this->usuario=$pUsuario;
	}
	function setSistema($pSistema){
		$this->sistema=$pSistema;
	}
}
		
// create new PDF document
$pdf = new ReporteHidro(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// text annotation
//$pdf->Annotation(0, 0, 10, 10, "datos", array('Subtype'=>'Link', 'Name' => 'Comment', 'T' => '', 'Subj' => 'example', 'C' => array(255, 255, 0)));

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('TCPDF Example 12');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// disable header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

$style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,20,5,10', 'phase' => 10, 'color' => array(255, 0, 0)); // tono rojo
$style2 = array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 255)); //tono azul
$style3 = array('width' => 1, 'cap' => 'round', 'join' => 'round', 'dash' => '2,10', 'color' => array(0, 0, 0));	//negro	
$style4 = array('L' => 0,
                'T' => array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => '20,10', 'phase' => 10, 'color' => array(100, 100, 255)),
                'R' => array('width' => 0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 0, 'color' => array(50, 50, 127)),
                'B' => array('width' => 0.75, 'cap' => 'square', 'join' => 'miter', 'dash' => '30,10,5,10'));
$style5 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(253, 190, 2)); // tono naranja
$style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,10', 'color' => array(0, 128, 0)); // tono verde
$style7 = array('width' => 0.35, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(26, 5, 252)); // tono azul

// create some HTML content
//$html = '<div style="text-align:center">REPORTE HIDROLOGIA</div>';
//$html = '<DIV TITLE="header=[First row] body=[second row]" STYLE="BORDER: #558844 1px solid;WIDTH:200px;HEIGHT: 40px"> My div with some text inside. Move over me to see my popup menu. </DIV> ';

// output the HTML content
//$pdf->writeHTML($html, true, false, true, false, '');
//echo '<br>';

setlocale(LC_TIME, 'es_ES');

// inicio de lineas de referencia
$x_inicial = 20;
$y_inicial = 40;

// se define datos del lienzo desde los margenes
$x_final = 265; // ancho desde x inicial
$y_final = 130; // alto desde y inicial

// se reciben los datos
$v_datos = $_SESSION['pdf_hidro'];

// se instancia el objeto funciones
$funciones = new funciones();

// cantidad de datos 
$total_datos = sizeof($v_datos);

// se establece fechas inicial y final
$fecha_inicial = $v_datos[0]['fecha_medida'];
$fecha_final = $v_datos[$total_datos - 1]['fecha_medida'];

// titulos
// se establece formato de fecha
$pdf->Text(120, 15, 'REPORTE DE HIDROLOGÍA');
$pdf->Text(70, 20, 'INTERVALO DE FECHAS DESDE: '.strftime('%d de %B de %Y', strtotime($fecha_inicial)).' - HASTA: '.strftime('%d de %B de %Y', strtotime($fecha_final)));

// texto vertical
$pdf->setXY(2,130);
$pdf->StartTransform();
$pdf->Rotate(90);
$pdf->write(2,'VALORES INSTANTÁNEOS O DIARIOS');
$pdf->StopTransform();

// formato de letra
$pdf->SetFont('helvetica', '', 5);

// se define vector de años de las mediciones
$v_anios_med = array();

// se obtiene el año inicial de comparacion a partir de la fecha inicial
$anios = explode('-', $v_datos[0]['fecha_medida']);
$anio_0 = $anios[0];

// se inserta el año inicial de comparacion al final del vector 
array_push($v_anios_med, $anio_0);
$contador = 1;

for($i = 1; $i < $total_datos; $i++)
{
	// año que se compara con el año inicial
	$anios = explode('-' ,$v_datos[$i]['fecha_medida']);	
	
	// comparar
	if($anios[0] != $anio_0)
	{					
		array_push($v_anios_med, $contador, $funciones->porcentaje($total_datos, $contador), $anios[0]); // se inserta el año final de comparacion al final del vector 
		$anio_0 = $anios[0]; // se cambia el año de comparacion si son diferentes al inicial
		$contador = 1;
	}
	else 
	{		
		$contador++;
	}
}

// se agrega los ultimos elementos del vector
array_push($v_anios_med, $contador, $funciones->porcentaje($total_datos, $contador));

// cantidad de dias entre la fecha inicial y la final
$todal_dias = $funciones->restaFechas($fecha_inicial, $fecha_final); 

// se define un vector con la diferencia de dias entre la fecha final y las demas fechas recibidas
$v_resta_fechas = array();

for($i = 0; $i < $total_datos ;$i++)
{
	array_push($v_resta_fechas,$x_inicial + (($x_final * $funciones->restaFechas($v_datos[$i]['fecha_medida'], $fecha_final)) / $todal_dias));	
	//echo 'v fecha: '.$v_datos[$i]['fecha_medida'].'<br>';
} 
//exit;

$vector_fechas = $v_resta_fechas;

// se obtiene el vector de medidas sin escalar
for($i = 0; $i < $total_datos; $i++)
{	
	$vector_medidas[$i] = $v_datos[$i]['valor_numeric'];
	//echo 'v medidas: '.$vector_medidas[$i].'<br>';
}
//exit;

// vector auxiliar para hacer operaciones
$v_medidas_aux = $vector_medidas;

rsort($v_medidas_aux); // ordena el vector de mayor a menor incluyendo indices

// se obtiene medida minima y maxima
$medida_max = $v_medidas_aux[0];
$medida_min = $v_medidas_aux[$total_datos - 1];

// se define el rango de medidas entre la minima y la maxima sin escalar al gráfico
$rango_medidas = doubleval($medida_max) - doubleval($medida_min);

echo $y_inicial.'<br>'.$y_final.'<br>'.$rango_medidas.'<br>';
// se obtiene el vector de medidas sin escalar
for($i = 0; $i < $total_datos; $i++)
{	
	//$v_medidas_aux[$i] = $y_inicial + floor(($y_final * $v_medidas_aux[$i]) / $rango_medidas);
	$v_medidas_aux[$i] = $y_inicial + (($y_final * $v_datos[$i]['valor_numeric']) / $rango_medidas);
	echo $v_datos[$i]['valor_numeric'].' - v medidas: '.$v_medidas_aux[$i].'<br>';
}
exit;

$vector_medidas = $v_medidas_aux;

$cantidad_lineas_vert = 24;
$cantidad_lineas_hor = 15;

// se llena vector con las subdivisiones verticales	
for($i = 0; $i <= $cantidad_lineas_vert ; $i++)
{
	$vector_lineas_vert[$i] = $x_inicial + ($x_final / $cantidad_lineas_vert) * $i;
}

// se llena vector con las subdivisiones horizontales
for($j = 0; $j <= $cantidad_lineas_hor; $j++)
{
	$vector_lineas_hor[$j] = $y_inicial + ($y_final / $cantidad_lineas_hor) * $j;
}
		
// se dibuja el lienzo con las dimensiones y otros atibutos
$suma = $x_inicial;
$indice = -2;
$ind_anio = 0;

$pdf->SetFont('helvetica', '', 10);
//var_dump($v_anios_med); exit;

// se dibuja otro rectangulo para separar los años de acuerdo al vector $v_anios_med
for ($i=0; $i < (sizeof($v_anios_med) / 3); $i++) 
{
	$indice = 3 + $indice; 		
		
	if($i % 2 == 0)
	{
		// dibuja un rectangulo
		$pdf->SetAlpha(0.2); 
		$pdf->SetLineWidth(0.3);
		$pdf->Rect($suma, $y_inicial, (($v_anios_med[$indice] * ($x_final)) / $total_datos), $y_final, 'DF', $style, array(255, 162, 1));
		$pdf->SetAlpha(0.5);
		$pdf->SetLineWidth(0.5);
		$pdf->Rect($suma, $y_inicial - 15, (($v_anios_med[$indice] * ($x_final)) / $total_datos), 15, 'DF', $style, array(255, 162, 1));
		$pdf->Text($suma, $y_inicial - 12, 'AÑO '.$v_anios_med[$ind_anio]);		
	}
	else 
	{
		// dibuja un rectangulo 
		$pdf->SetAlpha(0.2);
		$pdf->SetLineWidth(0.3);		
		$pdf->Rect($suma, $y_inicial, (($v_anios_med[$indice] * ($x_final)) / $total_datos), $y_final, 'DF', $style, array(0, 128, 0));
		$pdf->SetAlpha(0.5);
		$pdf->SetLineWidth(0.5);
		$pdf->Rect($suma, $y_inicial - 15, (($v_anios_med[$indice] * ($x_final)) / $total_datos), 15, 'DF', $style, array(0, 128, 0));	
		$pdf->Text($vector_lineas_vert[$i] - 5, $y_inicial + $y_final + 6, $v_auxiliar_fechas[$i]);
		$pdf->Text($suma, $y_inicial - 12, 'AÑO '.$v_anios_med[$ind_anio]);		
	}
	
	$suma = $suma + (($v_anios_med[$indice] * ($x_final)) / $total_datos);
	$ind_anio +=3;
}

// set alpha to semi-transparency
$pdf->SetAlpha(1);
$pdf->SetLineWidth(0.3);
$pdf->SetFont('helvetica', '', 5);

// se dibuja las lineas verticales de referencia
for($i = 0; $i < $total_datos; $i++)
{
	$pdf->Line($vector_lineas_vert[$i], $y_inicial, $vector_lineas_vert[$i], $y_inicial + $y_final + 5, $style1);	//linea vertical
}

// se dibuja las lineas horizontales de referencia
for($j = 0; $j < $total_datos; $j++) 
{
	$pdf->Line($x_inicial - 5, $vector_lineas_hor[$j], $x_inicial + $x_final, $vector_lineas_hor[$j], $style1);	//linea horizontal
}	

for($in = 0; $in < sizeof($v_datos); $in++)
{	
	$v_datos[$in]['fecha_medida'] = date("d-m-y", strtotime($v_datos[$in]['fecha_medida'])); //formatear la fecha "dd-mm-yy"
}

/*$vector_fechas = array_reverse($vector_fechas);
$vector_medidas = array_reverse($vector_medidas);*/

// se dibuja la linea principal del grafico de acuerdo a los datos
for($i = 0; $i < ($total_datos)-1; $i++)
{
	/*echo 'fecha: '.$vector_fechas[$i].' - '.$vector_fechas[$i+1].'<br>';
	echo 'medida: '.$vector_medidas[$i].' - '.$vector_medidas[$i+1].'<br><br>';*/
	$pdf->Line($vector_fechas[$i], $vector_medidas[$i], $vector_fechas[$i+1], $vector_medidas[$i+1], $style7);
}		
//exit;

$indice = 0;
for ($i=0; $i < $total_datos; $i+=($total_datos/$cantidad_lineas_vert)) 
{
	$v_auxiliar_fechas[$indice] = $v_datos[$i]['fecha_medida']; 	
	$indice++;
}	

// mostrar las fechas referenciales
for($i = 1; $i < $cantidad_lineas_vert; $i++)
{	
	$pdf->Text($vector_lineas_vert[$i] - 5, $y_inicial + $y_final + 6, $v_auxiliar_fechas[$i]);	
}
$pdf->Text($x_inicial - 5, $y_inicial + $y_final + 6, date("d-m-y", strtotime($fecha_inicial)));
$pdf->Text($x_final + $x_inicial - 5, $y_inicial + $y_final + 6, date("d-m-y", strtotime($fecha_final)));

// mostrar las medidas referenciales
for ($i=0; $i < $total_datos; $i++) 
{
	$v_auxiliar_medidas[$i] = $v_datos[$i]['valor_numeric'];
}

rsort($v_auxiliar_medidas);
$indice = 0;
for ($i=0; $i < $total_datos; $i+=($total_datos/$cantidad_lineas_hor)) 
{
	$v_medidas_aux[$indice] = $v_auxiliar_medidas[$i];		
	$indice++;
}

// mostrar las medidas referenciales
$pdf->SetFont('helvetica', '', 6);
for($i = 1; $i < $cantidad_lineas_hor ; $i++)
{
	// texto vertical 
	$pdf->setXY(10,$vector_lineas_hor[$i] + 4);
	$pdf->StartTransform();
	$pdf->Rotate(90);	
	$pdf->write(2,round($v_medidas_aux[$i],2));
	$pdf->StopTransform();	
}

//Close and output PDF document
$pdf->Output('rep_hidro.pdf', 'I');

?>