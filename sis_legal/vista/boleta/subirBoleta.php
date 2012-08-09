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
Phx.vista.subirBoleta=Ext.extend(Phx.frmInterfaz,{
    constructor:function(config)
	{
		//llama al constructor de la clase padre
		Phx.vista.subirBoleta.superclass.constructor.call(this,config);
		this.init();	
		this.loadValoresIniciales();
	},
	loadValoresIniciales:function()
	{
		Phx.vista.subirBoleta.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_boleta').setValue(this.id_boleta);
		
		this.argumentExtraSubmit.version = this.version;
		console.log(this.argumentExtraSubmit.version )
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
			name: 'id_boleta'

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
					name: 'boleta',
					buttonText: 'XXXXXXXXXX',	
					maxLength:150,
					anchor:'100%',
					validateValue:function(archivo){
						var extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase(); 
						if(extension!='.pdf'){
								this.markInvalid('solo se admiten archivos PDF');
								return false;
						}
						else{
							this.clearInvalid();
						    return true;
						}
					}	
			},
			type:'Field',
		    form:true 
		}		
	],
	title:'Subir archivo',
	ActSave:'../../sis_legal/control/Boleta/subirBoleta',
	fileUpload:true	
	}
)
</script>