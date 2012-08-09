<?php
/**
*@package pXP
*@file gen-Requerimientos.php
*@author  (rortiz)
*@date 07-12-2011 15:09:03
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ProcesoParaAsignacionSast={
	require:'../../../sis_sastt/vista/requerimientos/Requerimientos.php',
	requireclase:'Phx.vista.Requerimientos',
	nombreVista:'ProcesoParaAsignacionSast',
	tipo_interfaz:'PENREQ',
	title:'Formulacion de Requerimiento',
	ActSave:'../../sis_sastt/control/Requerimientos/insertarRequerimientos',
	ActDel:'../../sis_sastt/control/Requerimientos/eliminarRequerimientos',
	ActList:'../../sis_sastt/control/Requerimientos/listarCaptura',
	id_store:'id_requerimiento',

	bdel:false,
	bsave:true,
	bnew:false,

	
	constructor:function(config){
		this.maestro=config.maestro;
	   this.Atributos[this.getIndAtributo('numero_requerimiento')].config.renderer=function (value, p, record){
						    	var fomato;
						    	if(record.data['estado_requerimiento']=='ANUREQ'){
						    	 fomato = '<b><font color="red">{0}</font></b>'
						    	
						    	}
						    	else if(record.data['estado_requerimiento']=='FINREQ'){
						    	 fomato = '<b><font color="Lime">{0}</font></b>'
						    	}
						    	else if(record.data['estado_requerimiento']=='PENREQ'){
						    		fomato = '<b>{0}</b>'
						    	}
						    	else{
						    		fomato = '<font color="Blue"><b>{0}</b></font>'
						    	}
						    	
						    	return String.format(fomato, record.data['numero_requerimiento']);
						    };
			   			
					
    	//llama al constructor de la clase padre
		Phx.vista.ProcesoParaAsignacionSast.superclass.constructor.call(this,config);
		this.init();
		//definimos boton de finalizacion de formulacion de requerimiento
		this.addButton('retroceder',{text:'Corregir',iconCls: 'bundo',disabled:true,handler:this.retroceder,tooltip: '<b>Devolver</b>'});
		this.addButton('fin_requerimiento',{text:'Asignar Tecnico',iconCls: 'bassign',disabled:true,handler:this.onButtonSiguiente,tooltip: '<b>Finalizar</b>'});
		this.addButton('verCaptura',{text:'Ver Captura',iconCls: 'bsee',disabled:true,handler:this.verCaptura,tooltip: '<b>Subir archivo</b><br/>Permite visualizar el documento escaneado'});
	
		this.store.baseParams={tipo_interfaz:this.tipo_interfaz};
		this.load({params:{start:0, limit:20}});
		
	},
	preparaMenu:function(n){
	  var data = this.getSelectedData();
	  var tb =this.tbar;
	  if(data['version']>0){
	  	this.getBoton('verCaptura').enable();
	  }
	  
	  if(data['estado_requerimiento']!='PENREQ'){
	  	if(tb){
	  		this.getBoton('fin_requerimiento').disable();
	  		this.getBoton('edit').disable();
		}
	  }else{
	    Phx.vista.ProcesoParaAsignacionSast.superclass.preparaMenu.call(this,n);
	   	 this.getBoton('fin_requerimiento').enable();
	  }
	  this.getBoton('retroceder').enable()
	  return tb
		
	},
	liberaMenu:function(){
		var tb = Phx.vista.ProcesoParaAsignacionSast.superclass.liberaMenu.call(this);
		if(tb){
			this.getBoton('fin_requerimiento').disable()
			this.getBoton('retroceder').disable();
		}
		return tb
	},
	
	onButtonEdit:function(){
		this.adminGrupo({mostrar:[0],ocultar:[1,2]});
		this.argumentExtraSubmit.tipo_operacion ='asignacion';
		Phx.vista.ProcesoParaAsignacionSast.superclass.onButtonEdit.call(this);
	},
	
	onButtonSiguiente:function(){
		this.adminGrupo({mostrar:[1],ocultar:[0,2]});
		this.argumentExtraSubmit.tipo_operacion ='cambiar_estado';
		this.argumentExtraSubmit.operacion ='siguiente';
		this.mostrarComponente(this.getComponente('id_requerimiento'));
		this.loadForm(this.sm.getSelected())
		this.window.buttons[1].hide();
		this.window.show();

	},
	onButtonSave:function(){
	
	  this.argumentExtraSubmit.tipo_operacion ='asignacion';
	  Phx.vista.ProcesoParaAsignacionSast.superclass.onButtonSave.call(this);
					
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
			
		}

	
	};
</script>