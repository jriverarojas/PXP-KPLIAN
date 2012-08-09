<?php
/**
*@package pXP
*@file gen-SistemaDist.php
*@author  (fprudencio)
*@date 20-09-2011 10:22:05
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
header("content-type: text/javascript; charset=UTF-8");
//include_once("ProcesoContrato.php");
?>
<script>
Phx.vista.ProcesoAdmin={
	require:'../../../sis_legal/vista/proceso_contrato/ProcesoContrato.php',
	requireclase:'Phx.vista.ProcesoContrato',
	nombreVista:'ProcesoAdmin',
	tipo_interfaz:'ADMIN',
	title:'Formulacion de Requerimiento',
	ActSave:'../../sis_legal/control/ProcesoContrato/insertarProcesoContrato',
	ActDel:'../../sis_legal/control/ProcesoContrato/eliminarProcesoContrato',
	ActList:'../../sis_legal/control/ProcesoContrato/listarProcesoContrato',
	id_store:'id_proceso_contrato',
	

	bdel:true,
	bsave:false,
	bnew:false,

	
	constructor:function(config){
		this.maestro=config.maestro;
		this.Atributos[this.getIndAtributo('id_depto')].form=false;
		
		this.Atributos[this.getIndAtributo('objeto_contrato')].form=true;
		
		
		this.Atributos[this.getIndAtributo('numero_requerimiento')].config.renderer=function(value, p, record){
	   	var fomato;
			    	if(record.data['estado_proceso']=='ANULADO'){
			    	   fomato = '<b><font color="red">{0}</font></b>'
			    	}
			    	else if(record.data['estado_proceso']=='FINCON'){
			    	   fomato = '<b><font color="Lime">{0}</font></b>'
			    	}
			    	else if(record.data['estado_proceso']=='REQUER'){
			    	   fomato = '<b>{0}</b>'
			    	}
			    	else{
			    	   fomato = '<font color="Blue"><b>{0}</b></font>'
			    	}
			    	
			    	return String.format(fomato, record.data['numero_requerimiento']);
			    };
		
		
			
    	//llama al constructor de la clase padre
		Phx.vista.ProcesoAdmin.superclass.constructor.call(this,config);
		this.init();
		
	
		
		
		//definimos boton de finalizacion de formulacion de requerimiento
		this.addButton('retroceder',{text:'Corregir',iconCls: 'bundo',disabled:true,handler:this.retroceder,tooltip: '<b>Devolver</b>'});
		this.addButton('fin_requerimiento',{text:'Siguiente',iconCls:'badelante',disabled:true,handler:this.onButtonSiguiente,tooltip: '<b>Finalizar</b>'});
		this.addButton('aSubirContrato',{text:'Subir Contrato',iconCls:'bupload',disabled:true,handler:SubirContrato,tooltip: '<b>Subir archivo</b><br/>Permite actualizar el documento escaneado con sus respetivas  firmas'});
		this.addButton('verContrato',{text:'Ver Contrato',iconCls: 'bsee',disabled:true,handler:this.verContrato,tooltip: '<b>Subir archivo</b><br/>Permite visualizar el documento escaneado'});
		
		
		function SubirContrato()
		{					
			var rec=this.sm.getSelected();
			
						
			Phx.CP.loadWindows('../../../sis_legal/vista/proceso_contrato/subirContrato.php',
			'Subir Contrato',
			{
				modal:true,
				width:500,
				height:250
		    },rec.data,this.idContenedor,'subirContrato')
		}
		
	
		
		this.store.baseParams={tipo_interfaz:this.tipo_interfaz};
		this.load({params:{start:0, limit:20}});
		
	},
	
	
	
	preparaMenu:function(n){
	  var data = this.getSelectedData();
	  var tb =this.tbar;
	  //si el archivo esta escaneado se permite visualizar
	  if(data['version']>0){
	  		this.getBoton('verContrato').enable();
	  }
	  this.getBoton('aSubirContrato').enable();
	  this.getBoton('retroceder').enable();
	  this.getBoton('fin_requerimiento').enable();
	  this.getBoton('fin_requerimiento').show();
	  this.getBoton('retroceder').show();
	  
	  //cuando el conrtato esta registrado el abogado no puede hacerle mas cambios
	  if(data['estado_proceso']=='REGCON'){
	  		if(tb){
		  		
		  		
		  		
		  	}
	  }else{
	  	 Phx.vista.ProcesoAdmin.superclass.preparaMenu.call(this,n);
	   	 
	   	 this.getBoton('fin_requerimiento').setIconClass('badelante'); 
		 this.getBoton('fin_requerimiento').setText( 'Siguiente' ); 
		 this.getBoton('fin_requerimiento').setTooltip('<p>Pasar al siguiente estado ...</p>'); 
			
	  }
	  
	  
	  if(data['estado_proceso']=='REGCON'){
	  	this.getBoton('fin_requerimiento').setIconClass('bok') ;
		this.getBoton('fin_requerimiento').setText( 'Finalizar' ); 
		this.getBoton('fin_requerimiento').setTooltip('<p>Dar por concluido el contrato .</p>');
		 
	 }
	 else if(data['estado_proceso']=='ASIGNA'){
		this.getBoton('fin_requerimiento').setIconClass('badelante') 
		this.getBoton('fin_requerimiento').setText( 'LLevar a borrador' ) 
		this.getBoton('fin_requerimiento').setTooltip('<p>Iniciar Borrador de Contrato</p>')
		
	}
	else if(data['estado_proceso']=='FINCON'){
		
		this.getBoton('fin_requerimiento').disable();
		this.getBoton('fin_requerimiento').hide();
		
	}
	else if(data['estado_proceso']=='BORCON'){
		this.getBoton('fin_requerimiento').setIconClass('badelante') 
		this.getBoton('fin_requerimiento').setText( 'LLevar a Revisión' ) 
		this.getBoton('fin_requerimiento').setTooltip('<p>Si el contrato esta en etapa de revisión</p>')
		
	}
	else if(data['estado_proceso']=='FINREQ'){
		this.getBoton('fin_requerimiento').setIconClass('badelante') 
		this.getBoton('fin_requerimiento').setText( 'Asignar Abogado' ) 
		this.getBoton('fin_requerimiento').setTooltip('<p>Asignar Abogado para la elaboración de contrato</p>')
		
	}
	else if(data['estado_proceso']=='ANULADO'){
		this.getBoton('retroceder').disable();
		this.getBoton('retroceder').hide();
		this.getBoton('fin_requerimiento').disable();
		this.getBoton('fin_requerimiento').hide();
	}
	
	
	
	  
	  
	  return tb
		
	},
	liberaMenu:function(){
		var tb = Phx.vista.ProcesoAdmin.superclass.liberaMenu.call(this);
		if(tb){
			this.getBoton('fin_requerimiento').disable()
			this.getBoton('retroceder').disable();
			this.getBoton('verContrato').disable();
			this.getBoton('aSubirContrato').disable();
		}
		return tb
	},
	
	onButtonEdit:function(){
		
		/*this.ocultarGrupo(3);
		this.mostrarGrupo(0);
		this.mostrarGrupo(1);
		this.mostrarGrupo(2);*/
		
		this.adminGrupo({mostrar:[0,1,2],ocultar:[3]});
		this.argumentExtraSubmit.tipo_operacion ='elaboracion';
		Phx.vista.ProcesoAdmin.superclass.onButtonEdit.call(this);
		
		
	},
	
	
	onButtonSiguiente:function(){
		this.adminGrupo({mostrar:[3],ocultar:[0,1,2]});
		this.argumentExtraSubmit.tipo_operacion ='cambiar_estado';
		this.argumentExtraSubmit.operacion ='siguiente';
		this.mostrarComponente(this.getComponente('id_proceso_contrato'));
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