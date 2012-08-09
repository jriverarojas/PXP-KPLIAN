<?php
/**
*@package pXP
*@file gen-Arqueo.php
*@author  (fprudencio)
*@date 27-09-2011 11:02:53
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
include_once("ArqueoAbs.php");
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Arqueo=Ext.extend(Phx.vista.ArqueoAbs,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Arqueo.superclass.constructor.call(this,config);
		this.init();
		this.addButton('RevArqueo',{text:'Revision',iconCls: 'blist',disabled:true,handler:RevArqueo,tooltip: '<b>Enviar a Revision'});
		
		function RevArqueo()
		{					
			var data=this.sm.getSelected().data.id_arqueo;
			Phx.CP.loadingShow();
			Ext.Ajax.request({
				// form:this.form.getForm().getEl(),
				url:'../../sis_cobranza/control/Arqueo/revisarArqueo',
				params:{'id_arqueo':data,'operacion':'revision'},
				success:this.successSinc,
				failure: this.conexionFailure,
				timeout:this.timeout,
				scope:this
			});		
		}
		this.load({params:{start:0, limit:50}})
	},
	successSinc:function(resp){
			
			Phx.CP.loadingHide();
			var reg = Ext.util.JSON.decode(Ext.util.Format.trim(resp.responseText));
			if(!reg.ROOT.error){
				alert(reg.ROOT.detalle.mensaje)
				
			}else{
				
				alert('ocurrio un error durante el proceso')
			}
			this.reload();
			
		},			
	title:'Arqueo',
	ActSave:'../../sis_cobranza/control/Arqueo/insertarArqueo',
	ActDel:'../../sis_cobranza/control/Arqueo/eliminarArqueo',
	bdel:true,
	bsave:true,
	bedit:true,
	bnew:true,
		 preparaMenu:function(tb)
	{
			//llamada funcion clace padre
			if(this.sm.getSelected().data.estado=='borrador'){
			  	
			  this.getBoton('RevArqueo').enable();
			}
			else{
					
			        this.getBoton('RevArqueo').disable();
				
			}
			
			
			Phx.vista.Arqueo.superclass.preparaMenu.call(this,tb);
	}
	}
)
</script>
		
		