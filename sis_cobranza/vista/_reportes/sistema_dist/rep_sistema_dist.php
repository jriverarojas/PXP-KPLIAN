<?php
//echo getcwd();
//include_once('../../../../lib/lib_reporte/ReportePDF.php');
require_once('../../../../lib/tcpdf/config/lang/spa.php');
require_once('../../../../lib/tcpdf/tcpdf.php');

class ReporteSistDist extends TCPDF {

	protected $alinearCabecera='L';
	protected $orientacion;
	protected $usuario='NO DEFINIDO';
	protected $sistema='ENDESIS';
	
	protected $aMaestroEtiquetas=array();//Etiquetas del Maestro
	protected $aDetalleEtiquetas=array();//Etiquetas del Detalle
	protected $aMaestro=array();//Array con datos del Maestro
	protected $aDetalle=array();//Array con datos del Detalle
	
	protected $printFecha=1;//0: no imprime fecha, 1: imprime fecha
	protected $printUsr=1;//0: no imprime usuario, 1: imprime usuario
	protected $printNumPag=1;//0: no imprime usuario, 1: imprime usuario
	protected $printSist=1;//0: no imprime usuario, 1: imprime usuario
	
	protected $objParam; //Variable instancia de la clase parametro
	
	public function __construct($orientation='P', $unit='mm', $format='A4', $unicode=true, $encoding='UTF-8', $diskcache=false) {
		$this->orientacion=$orientation;
		$this->objParam=new CTParametro('','','');
		parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache);
		
	}
	
	/*
	 * FUNCIONES SOBREESCRITAS/SOBRECARGADAS DE LA CLASE PADRE TCPDF
	 */
	public function Header(){
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
			throw new Exception("Reporte: Orientación incorrecta, debe ser 'P' o 'L'");
		}
		
	}
	
	public function Footer() {
		//En función de la orientación de la página determina la posición de los textos
		$y=0;
		
		//Verifica si se imprime la fecha o no
		if($this->printFecha){
			$fecha='Fecha: '.date("d-m-Y H:i:s");	
		} else{
			$fecha='';
		}
		
		//Verifica si imprime el usuario
		if($this->printUsr){
			$usr='Usuario: '.$this->usuario;	
		} else{
			$usr='';
		}
		
		//Verifica si imprime la numeración de páginas
		if($this->printNumPag){
			$numPag='Pagina '.$this->getAliasNumPage().' de '.$this->getAliasNbPages();	
		} else{
			$numPag='';
		}
		
		//Verifica si imprime el sistema
		if($this->printSist){
			$sistema=$this->sistema;	
		} else{
			$sistema='';
		}
		
		
		if($this->orientacion=='P'){
			// Position at 15 mm from bottom
			$this->SetY(-10);
			// Set font
			$this->SetFont('helvetica', 'I', 6);
			// Page number
			$this->Cell(70,3,$usr,0,0,'L');
			$this->Cell(70, 3,$numPag, 0, 0, 'C', 0, '', 0, false, 'T', 'M');
			$this->Cell(55,3,$fecha,0,1,'R');
			$this->Cell(70,3,$sistema,0,0,'L');
		} else if($this->orientacion=='L'){
			// Position at 15 mm from bottom
			$this->SetY(-10);
			// Set font
			$this->SetFont('helvetica', 'I', 6);
			// Page number
			$this->Cell(70,3,$usr,0,0,'L');
			$this->Cell(125, 3,$numPag, 0, 0, 'C', 0, '', 0, false, 'T', 'M');
			$this->Cell(65,3,$fecha,0,1,'R');
			$this->Cell(70,3,$sistema,0,0,'L');
		} else{
			throw new Exception("Reporte: Orientación incorrecta, debe ser 'P' o 'L'");
		}
	}
	
	/*
	 * FUNCIONES PROPIAS
	 */
	private function ejecutarAccion($pCustom, $pMetodo){
		return $data;
	}
	
	public function cargarMaestroBD($pCustom, $pMetodo){
		$this->aMaestro=$this->ejecutarAccion($pCustom, $pMetodo);
	}
	
	public function cargarMaestroLC($pArrayMaestro){
		$this->aMaestro=$pArrayMaestro;
	}
	
	public function cargarDetalleBD($pCustom, $pMetodo){
		$this->aDetalle=$this->ejecutarAccion($pCustom, $pMetodo);
	}
	
	public function cargarDetalleLC($pArrayDetalle){
		$this->aDetalle=$pArrayDetalle;
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
		$this->sistema.=' - '.$pSistema;
	}
	function setPrintFecha($pPrintFecha){
		if($pPrintFecha==0){
			$this->printFecha=$pPrintFecha;
		} else{
			$this->printFecha=1;
		}
	}
	function setPrintUsuario($pPrintUsuario){
		if($pPrintUsuario==0){
			$this->printUsr=$pPrintUsuario;
		} else{
			$this->printUsr=1;
		}
	}
	function setPrintNumPagina($pPrintNumPagina){
		if($pPrintNumPagina==0){
			$this->printNumPag=$pPrintNumPagina;
		} else{
			$this->printNumPag=1;
		}
	}
	function setPrintSistema($pPrintSistema){
		if($pPrintSistema==0){
			$this->printSist=$pPrintSistema;
		} else{
			$this->printSist=1;
		}
	}
	function setEtiquetasMaestro($pArrayEtiquetas){
		$this->aMaestroEtiquetas=$pArrayEtiquetas;
	}
	
	function setEtiquetasDetalle($pArrayEtiquetas){
		$this->aDetalleEtiquetas=$pArrayEtiquetas;	
	}
	function getParam(){
		return $this->objParam;
	}
}

$pdf = new ReporteSistDist('P','mm','Letter',true,'UTF-8',false);
// set default header data
//$pdf->SetFont('dejavusans', '', 14, '', true);
//PDF_HEADER_LOGO_WIDTH
$pdf->SetHeaderData('../../images/logo_reporte.jpg', 50, '');
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setHeaderMargin(10);
$pdf->setPrintFooter(true);
$pdf->setAlinearCabecera('R');
$pdf->setPrintFecha(1);
$pdf->setSistema('PRESTO');
$pdf->setPrintSistema(1);
$pdf->setPrintUsuario(1);
$pdf->setPrintNumPagina(1);

//$pdf->getParam()->defecto('ordenacion','id_sistema_dist_agencia');

		//$this->objParam->defecto('dir_ordenacion','asc');
// set default font subsetting mode
//$pdf->setFontSubsetting(true);
$pdf->Output('example_001.pdf', 'I');

?>