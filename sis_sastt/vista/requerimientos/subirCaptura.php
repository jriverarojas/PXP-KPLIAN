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
Phx.vista.subirCaptura=Ext.extend(Phx.frmInterfaz,{

	constructor:function(config)
	{
		
		
    	//llama al constructor de la clase padre
		Phx.vista.subirCaptura.superclass.constructor.call(this,config);
		this.init();	
		this.loadValoresIniciales()	
		
	},
	
	loadValoresIniciales:function()
	{
		
		Phx.vista.subirCaptura.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_requerimiento').setValue(this.id_requerimiento);
		this.argumentExtraSubmit.version = this.version;
		this.argumentExtraSubmit.desc_gestion = this.desc_gestion;		
	},
	
	successSave:function(resp){
        Phx.CP.loadingHide();
        Phx.CP.getPagina(this.idContenedorPadre).reload();
        this.panel.close();
    },
				
	
	Atributos:[
	    {
   	      config:{
			labelSeparator:'',
			inputType:'hidden',
			name: 'id_requerimiento'

		   },
		  type:'Field',
		  form:true 
		
	    },
		{
			//configuracion del componente
			config:{
					fieldLabel: "Captura de Imagen",
					gwidth: 130,
					//labelSeparator:'',
					inputType:'file',
					name: 'captura1',
					buttonText: '',	
					maxLength:150,
					anchor:'100%'					
			},
			type:'Field',
		  form:true 
		},	
	],
	title:'Subir Captura',
	ActSave:'../../sis_sastt/control/Requerimientos/subirCaptura',
	fileUpload:true,	
	}
)
	
</script>