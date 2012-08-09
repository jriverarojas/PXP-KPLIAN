<?php
/**
*@package pXP
*@file gen-SistemaDist.php
*@author  (fprudencio)
*@date 20-09-2011 10:22:05
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
include_once("ArqueoAbs.php");
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ArqueoSup=Ext.extend(Phx.vista.ArqueoAbs,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.ArqueoSup.superclass.constructor.call(this,config);
		this.init();
		this.addButton('CorArqueo',{text:'Corregir',iconCls: 'blist',disabled:true,handler:CorArqueo,tooltip: '<b>Enviar a Corregir'});
		this.addButton('FinArqueo',{text:'Finalizar',iconCls: 'blist',disabled:true,handler:FinArqueo,tooltip: '<b>Finalizar Arqueo'});
		function CorArqueo()
		{					
			var data=this.sm.getSelected().data.id_arqueo;
			Phx.CP.loadingShow();
			Ext.Ajax.request({
				// form:this.form.getForm().getEl(),
				url:'../../sis_cobranza/control/Arqueo/revisarArqueo',
				params:{'id_arqueo':data,'operacion':'borrador'},
				success:this.successSinc,
				failure: this.conexionFailure,
				timeout:this.timeout,
				scope:this
			});		
		}
		function FinArqueo()
		{					
			var data=this.sm.getSelected().data.id_arqueo;
			Phx.CP.loadingShow();
			Ext.Ajax.request({
				// form:this.form.getForm().getEl(),
				url:'../../sis_cobranza/control/Arqueo/revisarArqueo',
				params:{'id_arqueo':data,'operacion':'finalizado'},
				success:this.successSinc,
				failure: this.conexionFailure,
				timeout:this.timeout,
				scope:this
			});		
		}		
		this.load({params:{start:0, limit:50}})
	},
			
	
	
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.load({params:{start:0, limit:50}});			
	},	
	preparaMenu:function(tb)
	{
			//llamada funcion clace padre
			if(this.sm.getSelected().data.estado=='revision'){
			  	
			  this.getBoton('CorArqueo').enable();
			  this.getBoton('FinArqueo').enable();
			}
			else{
					
			        this.getBoton('CorArqueo').disable();
				this.getBoton('FinArqueo').disable();
				
			}
			
			
			Phx.vista.Arqueo.superclass.preparaMenu.call(this,tb);
	}
	}
)
</script>
		
		