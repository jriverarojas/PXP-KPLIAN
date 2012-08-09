<?php
/**
*@package pXP
*@file gen-Sensor.php
*@author  (rarteaga)
*@date 06-09-2011 11:45:42
*@description permites subir archivos  de imegenes a la tabla de personas
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.rep_hidro=Ext.extend(Phx.frmInterfaz,{

	constructor:function(config)
	{		
    	this.maestro = config.maestro;
    	//console.log('config>>> ',this.id_sensor);
    	console.log('sensor>> ');
    	//llama al constructor de la clase padre
		Phx.vista.rep_hidro.superclass.constructor.call(this,config);
		this.init();	
		this.loadValoresIniciales()			
	},
	
	loadValoresIniciales:function()
	{		
		Phx.vista.rep_hidro.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_sensor').setValue(this.id_sensor);		
	},
	
	successSave:function(resp)
	{
        Phx.CP.loadingHide();
        Phx.CP.getPagina(this.idContenedorPadre).reload();
        this.panel.close();
    },			
	
	Atributos:[
	    {
	    	config:
	      	{
				labelSeparator:'',
				inputType:'hidden',
				name: 'id_sensor'
			},
			type:'Field',
			form:true		
		},
		{
			config:{
				name: 'fecha_ini',
				fieldLabel: 'Fecha inicio',
				allowBlank: true,
				anchor: '70%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''} // h:i:s
			},
			type:'DateField',
			filters:{pfiltro:'med.fecha',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
			//,egrid:true
		},
		{
			config:{
				name: 'fecha_fin',
				fieldLabel: 'Fecha final',
				allowBlank: true,
				anchor: '70%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''} // h:i:s
			},
			type:'DateField',
			filters:{pfiltro:'med.fecha',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
			//,egrid:true
		}
	],
	title:'Reporte',
	ActSave:'../../sis_hidrologia/control/ReporteHidro/reporte_med_Hidro'
	}
)	
</script>