<?php
/**
*@package pXP
*@file gen-Sensor.php
*@author  (mflores)
*@date 06-09-2011 11:45:42
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.SubirExcelDinamico=Ext.extend(Phx.frmInterfaz,{

	constructor:function(config)
	{
		this.maestro=config.maestro;	
			
    	//llama al constructor de la clase padre
		Phx.vista.SubirExcelDinamico.superclass.constructor.call(this,config);
		
		this.getComponente('id_sensor').setValue(config.id_sensor);	
		this.getComponente('id_tipo_sensor').setValue(config.id_tipo_sensor);
		this.getComponente('tipo_sensor_codigo').setValue(config.tipo_sensor_codigo);	
		
		this.init();		
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_sensor'
			},
			type:'Field',
			form:true 
		},
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_tipo_sensor'
			},
			type:'Field',
			form:true 
		},
		
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'tipo_sensor_codigo'
			},
			type:'Field',
			form:true 
		},

		
		
		{
			//configuracion del componente
			config:{
					fieldLabel: "Archivo",
					gwidth: 130,
					//labelSeparator:'',
					inputType:'file',
					name: 'excel',
					buttonText: '',	
					maxLength:150,
					anchor:'100%'					
			},
			type:'Field',
			sortable:false,
			grid:false,
			form:true 
		},		
	],
	title:'Subir archivo',
	ActSave:'../../sis_hidrologia/control/TipoSensorCodigo/subirExcelDinamico',
	fileUpload:true,	

	successSave:function(resp)
	{
        Phx.CP.loadingHide();
        Phx.CP.getPagina(this.idContenedorPadre).reload();
        this.panel.close();
    },
    
	}
)
	
</script>