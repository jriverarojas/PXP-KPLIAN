<?php
/**
*@package pXP
*@file FacturacionPend.php
*@author  (admin)
*@date 17-11-2011
*@description Archivo con la interfaz para generación de reporte
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.RepGrafico=Ext.extend(Phx.frmInterfaz,{
	
	constructor: function(config){
		Phx.vista.RepGrafico.superclass.constructor.call(this,config);
		this.init();
	},
	
	Atributos:[
	       	{
				config:{
					name: 'codigo',
					fieldLabel: 'Codigo',
					allowBlank: true,
					anchor: '80%',
					gwidth: 100,
					maxLength:100,
					disabled: true
				},
				type:'TextField',
				filters:{pfiltro:'sen.codigo',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
			}
	],
	title:'Reporte hidro',
	ActSave:'../../sis_hidrologia/control/ReporteHidro/reporte_med_Hidro',
	topBar:true,
	botones:false,
	labelSubmit:'Imprimir',
	tooltipSubmit:'<b>Generar el reporte</b>',
	
	tipo:'reporte',
	clsSubmit:'bprint',
	/*agregarArgsExtraSubmit: function(){
		//Inicializa el objeto de los argumentos extra
		this.argumentExtraSubmit={};

		//Obtiene los valores dinámicos
		//var cmbSistDist=this.getComponente('id_sistema_dist');
		//var aux=cmbSistDist.store.getById(cmbSistDist.getValue());

		//Añade los parámetros extra para mandar por submit
		this.argumentExtraSubmit.tipoReporte='pdf';
		//this.argumentExtraSubmit.titulo='facturas_anuladas';
		//this.argumentExtraSubmit.sistema_dist=aux.data.nombre;
	}*/
	
})
</script>