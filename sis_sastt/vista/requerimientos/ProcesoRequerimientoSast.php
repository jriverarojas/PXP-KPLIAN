<?php
/**
*@package pXP
*@file gen-Requerimientos.php
*@author  (rortiz)
*@date 28-11-2011 15:09:03
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ProcesoRequerimientoSast={
		require:'../../../sis_sastt/vista/requerimientos/Requerimientos.php',
		requireclase:'Phx.vista.Requerimientos',
		nombreVista:'ProcesoRequerimientoSast',
		tipo_interfaz:'BORREQ',
		title:'Formulacion de Requerimiento',
		id_store:'id_requerimiento',	
	
		bdel:true,
		bnew:true,
		bsave:false,
	//----------GroupBox	
		Grupos: [
	            {
	                layout: 'column',
	                border: false,
	                //sin bordes
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
						    }
						    ]
	            }
	        ],
		
		constructor:function(config){
			this.maestro=config.maestro;
			
			//buscamos la congiguracion del atributo tecnico
			
			this.Atributos[this.getIndAtributo('id_tecnico')].form=false;
			this.Atributos[this.getIndAtributo('solucion')].form=false;
	
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
			Phx.vista.Requerimientos.superclass.constructor.call(this,config);
			this.init();
			//tamaño del listado
			this.load({params:{start:0, limit:this.tam_pag}})
			//Boton para subir la captura
			this.addButton('SubirCaptura',{text:'Subir Captura',iconCls: 'bupload1',disabled:true,handler:SubirCaptura,tooltip: '<b>Subir captura</b><br/>Permite actualizar la captura'});
			//Boton para finalizar el requerimiento
			this.addButton('fin_requerimiento',{text:'Finalizar',iconCls: 'bok',disabled:true,handler:fin_requerimiento,tooltip: '<b>Finalizar</b>'});
			this.addButton('verCaptura',{text:'Ver Captura',iconCls: 'bsee',disabled:true,handler:this.verCaptura,tooltip: '<b>Ver Captura</b><br/>Permite visualizar la captura de pantalla'});
			//------------------------PARA LA CAPTURA
			function SubirCaptura()
			{					
				var rec=this.sm.getSelected();
							
				Phx.CP.loadWindows('../../../sis_sastt/vista/requerimientos/subirCaptura.php',
				'Subir captura',
				{
					modal:true,
					width:400,
					height:150
			    },rec.data,this.idContenedor,'subirCaptura')
			}
			
			this.Atributos[this.getIndAtributo('descripcion')].form=true;		
			
			function fin_requerimiento()
			{					
				var data = this.sm.getSelected().data.id_requerimiento;
				Phx.CP.loadingShow();
				Ext.Ajax.request({
					url:'../../sis_sastt/control/Requerimientos/insertarRequerimientos',
					params:{id_requerimiento:data,operacion:'siguiente',tipo_operacion:'cambiar_estado'},
					success:this.successSinc,
					failure: this.conexionFailure,
					timeout:this.timeout,
					scope:this
				});		
			}
			
			this.store.baseParams={tipo_interfaz:this.tipo_interfaz};
			this.load({params:{start:0, limit:20}});
		},
			
		preparaMenu:function(n){
		  var data = this.getSelectedData();
		  var tb =this.tbar;
		  if(data['version']>0){
		  	this.getBoton('verCaptura').enable();
		  }
		  if(data['estado_requerimiento']!='BORREQ'){
		  	if(tb){
		  		this.getBoton('fin_requerimiento').disable();
		  		this.getBoton('edit').disable();
			    this.getBoton('del').disable();
		  	}
			
		  	
		  }else{
		    Phx.vista.ProcesoRequerimientoSast.superclass.preparaMenu.call(this,n);
		   	 this.getBoton('fin_requerimiento').enable()
		   	 this.getBoton('SubirCaptura').enable();
		  }
		  return tb
			
		},
		
		liberaMenu:function(){
			var tb = Phx.vista.ProcesoRequerimientoSast.superclass.liberaMenu.call(this);
			if(tb){
				this.getBoton('fin_requerimiento').disable();
				this.getBoton('SubirCaptura').disable();
				this.getBoton('verCaptura').disable();	
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