<?php
/**
*@package pXP
*@file gen-SistemaDist.php
*@author  (rortiz)
*@date 23-02-2012 10:22:05
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ProcesoParaAdministrarSast={
	require:'../../../sis_sastt/vista/requerimientos/Requerimientos.php',
	requireclase:'Phx.vista.Requerimientos',
	nombreVista:'ProcesoParaAdministrarSast',
	tipo_interfaz:'ADMIN_SAST',
	title:'Formulacion de Requerimiento',
	ActSave:'../../sis_sastt/control/Requerimientos/insertarRequerimientos',
	ActDel:'../../sis_sastt/control/Requerimientos/eliminarRequerimientos',
	ActList:'../../sis_sastt/control/Requerimientos/listarCaptura',
	id_store:'id_requerimiento',
	
	bdel:true,
	bsave:false,
	bnew:false,
	
	constructor:function(config){
		this.maestro=config.maestro;
		
		this.Atributos[this.getIndAtributo('id_funcionario')].form=true;
		this.Atributos[this.getIndAtributo('id_depto')].form=true;
		this.Atributos[this.getIndAtributo('descripcion')].form=true;
			
		this.Atributos[this.getIndAtributo('numero_requerimiento')].config.renderer=function(value, p, record){
			var fomato;
			if(record.data['estado_requerimiento']=='ANUREQ'){
				fomato = '<b><font color="red">{0}</font></b>'
			}
			else if(record.data['estado_requerimiento']=='FINREQ'){
				fomato = '<b><font color="Lime">{0}</font></b>'
			}
			else if(record.data['estado_requerimiento']=='BORREQ'){
				fomato = '<b>{0}</b>'
			}
			else if(record.data['estado_requerimiento']=='PENREQ'){
				fomato = '<b><font color="yellow">{0}</font></b>'
			}
			else{
				fomato = '<font color="Blue"><b>{0}</b></font>'
			}

			return String.format(fomato, record.data['numero_requerimiento']);
		};
		
		//llama al constructor de la clase padre
		Phx.vista.ProcesoParaAdministrarSast.superclass.constructor.call(this,config);
		this.init();
		//definimos boton de finalizacion de formulacion de requerimiento
		this.addButton('retroceder',{text:'Corregir',iconCls: 'bundo',disabled:true,handler:this.retroceder,tooltip: '<b>Devolver</b>'});		
		this.addButton('fin_requerimiento',{text:'Siguiente',iconCls:'badelante',disabled:true,handler:this.onButtonSiguiente,tooltip: '<b>Finalizar</b>'});
		this.addButton('verCaptura',{text:'Ver Captura',iconCls: 'bsee',disabled:true,handler:this.verCaptura,tooltip: '<b>Subir archivo</b><br/>Permite visualizar el documento escaneado'});
		this.addButton('re_asignacion',{text:'Re-Asignar Tecnico',iconCls: 'bassign',disabled:true,handler:this.onButtonReassign,tooltip: '<b>Reasignar Tecnico</b>'});		
		this.store.baseParams={tipo_interfaz:this.tipo_interfaz};
		this.load({params:{start:0, limit:20}});
		
	},
		
	preparaMenu:function(n){
	  var data = this.getSelectedData();
	  var tb =this.tbar;
	  //si el archivo esta escaneado se permite visualizar
	  if(data['version']>0){
	  		this.getBoton('verCaptura').enable();
	  }
	  
	  //cuando el requerimiento esta registrado el tecnico no puede hacerle mas cambios
	  if(data['estado_requerimiento']=='FINREQ'){
	  		if(tb){
		  		this.getBoton('fin_requerimiento').disable()
		  		this.getBoton('retroceder').disable();
		  		this.getBoton('edit').disable();
		  		this.getBoton('re_asignacion').disable();

		  	}
	  }else{
	  	 Phx.vista.ProcesoParaAdministrarSast.superclass.preparaMenu.call(this,n);
	   	 this.getBoton('retroceder').enable();
	   	 this.getBoton('fin_requerimiento').enable();
	   	 this.getBoton('fin_requerimiento').setIconClass('badelante'); 
		 this.getBoton('fin_requerimiento').setText( 'Siguiente' ); 
		 this.getBoton('fin_requerimiento').setTooltip('<p>Pasar al siguiente estado ...</p>'); 
			
	  }
	  
	//inhabilita algunos botones segun el estado del requerimiento
	if(data['estado_requerimiento']=='BORREQ'){
		if(tb){
			this.getBoton('fin_requerimiento').enable()
			this.getBoton('retroceder').disable();
			this.getBoton('edit').disable();
			this.getBoton('re_asignacion').disable();

		}
	}

	if(data['estado_requerimiento']=='PENREQ'){
		if(tb){
			this.getBoton('fin_requerimiento').enable()
			this.getBoton('retroceder').enable();
			this.getBoton('edit').disable();
			this.getBoton('re_asignacion').disable();
		}
	}
	
	if(data['estado_requerimiento']=='PROREQ'){

		this.getBoton('fin_requerimiento').setIconClass('bok') ;
		this.getBoton('fin_requerimiento').setText( 'Finalizar' );
		this.getBoton('fin_requerimiento').setTooltip('<p>Finalizar el requerimiento. Ya no podra realizar cambios en el mismo </p>');
		this.getBoton('re_asignacion').enable();

	}
	
	if(data['estado_requerimiento']=='ANUREQ'){
		this.getBoton('retroceder').disable();
		this.getBoton('fin_requerimiento').disable();
		this.getBoton('edit').disable();
	}
	  
	  return tb
		
	},
	liberaMenu:function(){
		var tb = Phx.vista.ProcesoParaAdministrarSast.superclass.liberaMenu.call(this);
		if(tb){
			this.getBoton('fin_requerimiento').disable()
			this.getBoton('retroceder').disable();
			this.getBoton('verCaptura').disable();
		}
		return tb
	},
	
	onButtonEdit:function(){

		this.adminGrupo({mostrar:[0,1,2]/*,ocultar:[0]*/});
		this.argumentExtraSubmit.tipo_operacion ='elaboracion';
		Phx.vista.ProcesoParaAdministrarSast.superclass.onButtonEdit.call(this)	
	},
	
	
	onButtonSiguiente:function(){
		this.adminGrupo({mostrar:[1,2],ocultar:[0]});
		this.argumentExtraSubmit.tipo_operacion ='cambiar_estado';
		this.argumentExtraSubmit.operacion ='siguiente';
		this.mostrarComponente(this.getComponente('id_requerimiento'));
		this.loadForm(this.sm.getSelected())
		this.window.buttons[1].hide();
		this.window.show();
	},
	
	onButtonReassign:function(){
		this.adminGrupo({mostrar:[1,2],ocultar:[0]});
		this.argumentExtraSubmit.tipo_operacion ='re_asignacion';
		this.argumentExtraSubmit.operacion ='proceso';
		this.mostrarComponente(this.getComponente('id_requerimiento'));
		this.loadForm(this.sm.getSelected())
		this.window.buttons[1].hide();
		this.window.show();
					
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