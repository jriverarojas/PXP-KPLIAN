<?php
/**
*@package pXP
*@file gen-SistemaDist.php
*@author  (fprudencio)
*@date 20-09-2011 10:22:05
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ProcesoParaAsignacion={
	require:'../../../sis_legal/vista/proceso_contrato/ProcesoContrato.php',
	requireclase:'Phx.vista.ProcesoContrato',
	nombreVista:'ProcesoParaAsignacion',
	tipo_interfaz:'FINREQ',
	title:'Formulacion de Requerimiento',
	ActSave:'../../sis_legal/control/ProcesoContrato/insertarProcesoContrato',
	ActDel:'../../sis_legal/control/ProcesoContrato/eliminarProcesoContrato',
	ActList:'../../sis_legal/control/ProcesoContrato/listarProcesoContrato',
	id_store:'id_proceso_contrato',


	bdel:false,
	bsave:true,
	bnew:false,

	
	constructor:function(config){
		console.log('constructor hijo')
		this.maestro=config.maestro;
	   this.Atributos[this.getIndAtributo('numero_requerimiento')].config.renderer=function (value, p, record){
						    	var fomato;
						    	if(record.data['estado_proceso']=='ANULADO'){
						    	 fomato = '<b><font color="red">{0}</font></b>'
						    	
						    	}
						    	else if(record.data['estado_proceso']=='FINCON'){
						    	 fomato = '<b><font color="Lime">{0}</font></b>'
						    	}
						    	else if(record.data['estado_proceso']=='FINREQ'){
						    		fomato = '<b>{0}</b>'
						    	}
						    	else{
						    		fomato = '<font color="Blue"><b>{0}</b></font>'
						    	}
						    	
						    	return String.format(fomato, record.data['numero_requerimiento']);
						    };
			   			
		console.log('llamada cons padre')			
    	//llama al constructor de la clase padre
		Phx.vista.ProcesoParaAsignacion.superclass.constructor.call(this,config);
		this.init();
		//definimos boton de finalizacion de formulacion de requerimiento
		this.addButton('retroceder',{text:'Corregir',iconCls: 'bundo',disabled:true,handler:this.retroceder,tooltip: '<b>Devolver</b>'});
		this.addButton('fin_requerimiento',{text:'Asignar Abogado',iconCls: 'bassign',disabled:true,handler:this.onButtonSiguiente,tooltip: '<b>Finalizar</b>'});
		this.addButton('verContrato',{text:'Ver Contrato',iconCls: 'bsee',disabled:true,handler:this.verContrato,tooltip: '<b>Subir archivo</b><br/>Permite visualizar el documento escaneado'});
	
		this.store.baseParams={tipo_interfaz:this.tipo_interfaz};
		this.load({params:{start:0, limit:20}});
		
	},
	preparaMenu:function(n){
	  var data = this.getSelectedData();
	  var tb =this.tbar;
	  if(data['version']>0){
	  		this.getBoton('verContrato').enable();
	  }
	  
	  
	  if(data['estado_proceso']!='FINREQ'){
	  	if(tb){
	  		this.getBoton('fin_requerimiento').disable();
	  		this.getBoton('edit').disable();
		}
	  }else{
	    Phx.vista.ProcesoParaAsignacion.superclass.preparaMenu.call(this,n);
	   	 this.getBoton('fin_requerimiento').enable();
	  }
	  this.getBoton('retroceder').enable()
	  return tb
		
	},
	liberaMenu:function(){
		var tb = Phx.vista.ProcesoParaAsignacion.superclass.liberaMenu.call(this);
		if(tb){
			this.getBoton('fin_requerimiento').disable()
			this.getBoton('retroceder').disable();
			this.getBoton('verContrato').disable();
		}
		return tb
	},
	
	onButtonEdit:function(){
		console.log("LLEGA A ESTE EDIT")
		//this.setDefFormSize();
		this.adminGrupo({mostrar:[0,1,2],ocultar:[3]});
		this.argumentExtraSubmit.tipo_operacion ='asignacion';
		Phx.vista.ProcesoParaAsignacion.superclass.onButtonEdit.call(this);
	},
	onButtonSiguiente:function(){
		//this.setFormSize(400,200);
		this.adminGrupo({mostrar:[3],ocultar:[0,1,2]});
		this.argumentExtraSubmit.tipo_operacion ='cambiar_estado';
		this.argumentExtraSubmit.operacion ='siguiente';
		
		
		this.mostrarComponente(this.getComponente('id_proceso_contrato'));
		this.loadForm(this.sm.getSelected())
		
		
		
		this.window.buttons[1].hide();
		
		this.window.show();
		

	},
	onButtonSave:function(){
	
	  this.argumentExtraSubmit.tipo_operacion ='asignacion';
	  Phx.vista.ProcesoParaAsignacion.superclass.onButtonSave.call(this);
			
		
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