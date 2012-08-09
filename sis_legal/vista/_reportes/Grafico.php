<?php
session_start();

require_once('../../../lib/jpgraph/src/jpgraph.php');
require_once("../../../lib/jpgraph/src/jpgraph_gantt.php");
GeneraHistorial($_SESSION['historial'],$_SESSION['nro_requerimiento'],$_SESSION['nombre_unidad']);


	function GeneraHistorial($estados,$num,$unidad){
		
		$graph = new GanttGraph();
		$graph->SetBox();
		
		
		// Add title and subtitle
		$graph->title->Set("Proceso de Elaboración de Contrato");
		$graph->title->SetFont(FF_ARIAL,FS_BOLD,12);
		$graph->subtitle->Set("Requerimiento No ".$num."  Unidad: ".$unidad);

		
		
		
			
			// Show day, week and month scale
			$graph->ShowHeaders(GANTT_HMONTH | GANTT_HYEAR | GANTT_HWEEK |GANTT_HDAY);
			
			// Instead of week number show the date for the first day in the week
			// on the week scale
			$graph->scale->week->SetStyle(WEEKSTYLE_FIRSTDAY);
			
			// Make the week scale font smaller than the default
			$graph->scale->week->SetFont(FF_FONT0);
			
		
		
		
		
		// Use the short name of the month together with a 2 digit year
		// on the month scale
		$graph->scale->month->SetStyle(MONTHSTYLE_SHORTNAMEYEAR4);
		$graph->scale->month->SetFontColor("white");
		$graph->scale->month->SetBackgroundColor("blue");
		
		// 0 % vertical label margin
		$graph->SetLabelVMarginFactor(1);
		
	
		foreach($estados as $data)
		{
			if($data['fecha_fin']==''){
				$data['fecha_fin']=date('Y-m-d');
			}
			$activity = new GanttBar($count,$data['nombre_estado'],$data['fecha_ini'],$data['fecha_fin'],"");
			if($data['estado_reg']=='activo'){
				
				
				$activity->SetPattern(BAND_RDIAG,"yellow");
				$activity->SetFillColor("red");
			}
			$activity->SetHeight(7);
			$graph->Add($activity);
			$count++;
		}
		
		
		$graph->Stroke();
			
		
		
	}

?>
