<?php
/**
*@package pXP
*@file gen-Sensor.php
*@author  (rarteaga)
*@date 06-09-2011 11:45:42
*@description permites subir archivos  de imegenes a la tabla de ProcesoContratos
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.subirContrato=Ext.extend(Phx.frmInterfaz,{

	constructor:function(config)
	{
		//llama al constructor de la clase padre
		Phx.vista.subirContrato.superclass.constructor.call(this,config);
		this.init();	
		this.loadValoresIniciales()	
		
	},
	
	loadValoresIniciales:function()
	{
		
		Phx.vista.subirContrato.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_proceso_contrato').setValue(this.id_proceso_contrato);
		this.argumentExtraSubmit.version = this.version;
		this.argumentExtraSubmit.desc_gestion = this.desc_gestion;
		
				
	},
	
	/*onSubmit:function(o){
		
		var archivo =this.getComponente('contrato').getValue();
		var extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase(); 
		
		if(extension!='.pdf'){
		  this.getComponente('contrato').markInvalid('solo se admiten archivos PDF');
				
		}
		else{
		  Phx.vista.subirContrato.superclass.onSubmit.call(this,o);
	    }
	},*/
	

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
			name: 'id_proceso_contrato'

		   },
		  type:'Field',
		  form:true 
		
	    },
		{
			//configuracion del componente
		   config:{
					fieldLabel: "Archivo",
					gwidth: 130,
					labelSeparator:'',
					inputType:'file',
					name: 'contrato',
					buttonText: 'XXXXXXXXXX',	
					maxLength:150,
					anchor:'100%',
					validateValue:function(archivo){
						var extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase(); 
						if(extension!='.pdf'){
								this.markInvalid('solo se admiten archivos PDF');
								return false
						}
						else{
							this.clearInvalid();
						    return true
						}
					}	
			},
			type:'Field',
		    form:true 
		}		
	],
	title:'Subir archivo',
	ActSave:'../../sis_legal/control/ProcesoContrato/subirContrato',
	fileUpload:true,	
	}
)
	
</script>