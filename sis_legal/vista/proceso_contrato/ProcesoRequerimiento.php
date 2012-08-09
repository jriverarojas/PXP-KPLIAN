<?php
/**
*@package pXP
*@file gen-SistemaDist.php
*@author  ()
*@date 20-09-2011 10:22:05
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ProcesoRequerimiento={
	require:'../../../sis_legal/vista/proceso_contrato/ProcesoContrato.php',
	requireclase:'Phx.vista.ProcesoContrato',
	nombreVista:'ProcesoRequerimiento',
	tipo_interfaz:'REQUER',
	title:'Formulacion de Requerimiento',
    bdel:true,
	bnew:true,
	bsave:false,
	
	Grupos: [
            {
                layout: 'column',
                border: false,
                defaults: {
                   border: false
                },            
                items: [{
					        bodyStyle: 'padding-right:5px;padding-left:5px;',
					        items: [{
					            xtype: 'fieldset',
					            title: 'Datos Unidad Solicitante',
					            autoHeight: true,
					            items: [],
						        id_grupo:0
					        }]
					    }, {
					        bodyStyle: 'padding-left:5px;padding-left:5px;',
					        items: [{
					            xtype: 'fieldset',
					            title: 'Datos Proceso',
					            autoHeight: true,
					            items: [],
						        id_grupo:1
					        }]
					    },{
					        bodyStyle: 'padding-left:5px;padding-left:5px;',
					        items: [{
					            xtype: 'fieldset',
					            title: 'Datos Contrato',
					            autoHeight: true,
					            items: [],
						        id_grupo:2
					        }]
					    }
					    ]
            }
        ],
	
	constructor:function(config)
	{
		this.maestro=config.maestro;
		//buscamos la congiguracion del atributo abogado
		this.Atributos[this.getIndAtributo('id_abogado')].form=false;
		this.Atributos[this.getIndAtributo('id_representante_legal')].form=false;
		this.Atributos[this.getIndAtributo('fecha_suscripcion')].form=false;
		this.Atributos[this.getIndAtributo('notario')].form=false;
		this.Atributos[this.getIndAtributo('observaciones')].form=false;
		
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
		
		this.Atributos[this.getIndAtributo('objeto_contrato')].form=true;
		
		//llama al constructor de la clase padre
		Phx.vista.ProcesoRequerimiento.superclass.constructor.call(this,config);
		this.init();
		//definimos boton de finalizacion de formulacion de requerimiento
		this.addButton('fin_requerimiento',{text:'Finalizar',iconCls: 'bok',disabled:true,handler:fin_requerimiento,tooltip: '<b>Finalizar</b>'});
		this.addButton('verContrato',{text:'Ver Contrato',iconCls: 'bsee',disabled:true,handler:this.verContrato,tooltip: '<b>Ver Contrato</b><br/>Permite visualizar el documento escaneado'});
		
		function fin_requerimiento()
		{					
			var data = this.sm.getSelected().data.id_proceso_contrato;
			Phx.CP.loadingShow();
			Ext.Ajax.request({
				// form:this.form.getForm().getEl(),
				url:'../../sis_legal/control/ProcesoContrato/insertarProcesoContrato',
				params:{id_proceso_contrato:data,operacion:'siguiente',tipo_operacion:'cambiar_estado'},
				success:this.successSinc,
				failure: this.conexionFailure,
				timeout:this.timeout,
				scope:this
			});		
		}
		
		
		//this.getBoton('imagenGantt').disable();
		this.store.baseParams={tipo_interfaz:this.tipo_interfaz};
		this.load({params:{start:0, limit:20}});
	},
	
	onButtonEdit:function(){
		
		/*this.ocultarGrupo(3);
		this.mostrarGrupo(0);
		this.mostrarGrupo(1);
		this.mostrarGrupo(2);*/
		
		//this.adminGrupo({mostrar:[0,1,2],ocultar:[3]});
		this.argumentExtraSubmit.tipo_operacion ='requerimiento';
		Phx.vista.ProcesoRequerimiento.superclass.onButtonEdit.call(this);
		console.log(this.argumentExtraSubmit.ZZZ)
		console.log(this.argumentExtraSubmit.ren)
        this.argumentExtraSubmit.ren='SICA'
        console.log(this.argumentExtraSubmit.ren)
		console.log(this.XXXXX)
		console.log(this.BBBBBBB)
		
	},
	

		
	preparaMenu:function(n){
	  var data = this.getSelectedData();
	  var tb =this.tbar;
	  if(data['version']>0){
	  		this.getBoton('verContrato').enable();
	  		this.getBoton('imagenGantt').enable();
	  }
	  
	  if(data['estado_proceso']!='REQUER'){
	  	if(tb){
	  		this.getBoton('fin_requerimiento').disable();
	  		this.getBoton('edit').disable();
		    this.getBoton('del').disable();
	  	}
		
	  }else{
	     Phx.vista.ProcesoRequerimiento.superclass.preparaMenu.call(this,n);
	   	 this.getBoton('fin_requerimiento').enable()
	   }
	  
	  //Phx.vista.ProcesoRequerimiento.superclass.preparaMenu.call(this,n);
	  return tb
	},
	liberaMenu:function(){
		var tb = Phx.vista.ProcesoRequerimiento.superclass.liberaMenu.call(this);
		if(tb){
			this.getBoton('fin_requerimiento').disable();
			this.getBoton('verContrato').disable();
			//this.getBoton('imagenGantt').disable();
		}
		return tb
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