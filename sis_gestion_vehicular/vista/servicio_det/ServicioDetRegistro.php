<?php
/**
 *@package pXP
 *@file gen-SistemaDist.php
 *@author  ()
 *@date 20-09-2011 10:22:05
 *@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
 */
header("content-type: text/javascript; charset=UTF-8");
//include_once("ProcesoContrato.php");
?>
<script>
	Phx.vista.ServicioDetRegistro = {
		require : '../../../sis_gestion_vehicular/vista/servicio_det/ServicioDet.php',
		requireclase : 'Phx.vista.ServicioDet',
		nombreVista : 'ServicioDetRegistro',
		tipo_interfaz : 'SERVICIODETREGISTRO',
		title : 'Registro de Detalle de Solicitudes',
		ActSave : '../../sis_gestion_vehicular/control/ServicioDet/insertarServicioDet',
		ActList : '../../sis_gestion_vehicular/control/ServicioDet/listarServicioDet',
		id_store : 'id_servicio_det',
		bedit : true,
		bdel :true,
		bsave :true,
		bnew :true,
		constructor : function(config) {
			this.maestro = config.maestro;

			for(var i = 0; i < this.Atributos.length; i++) {
				this.Atributos[i].form = false;

			}
			
			this.Atributos[this.getIndAtributo('id_funcionario')].form=true;
			this.Atributos[this.getIndAtributo('id_activo_fijo')].form=true;
			
			this.Atributos[this.getIndAtributo('kilometraje_ini')].form=true;
			this.Atributos[this.getIndAtributo('kilometraje_fin')].form=true;
			this.Atributos[this.getIndAtributo('id_servicio')].form=true;
			this.Atributos[this.getIndAtributo('id_servicio_det')].form=true;
			
			
			
			//llama al constructor de la clase padre
			Phx.vista.ServicioDetRegistro.superclass.constructor.call(this, config);
			this.init();
			
			
			this.store.baseParams = {
				tipo_interfaz : this.tipo_interfaz,
				id_servicio:0
			};
			this.load({
				params : {
					start : 0,
					limit : 20
				}
			});

		},
		preparaMenu : function(n) {
			var data = this.getSelectedData(); 
			var tb = this.tbar;
			//si el archivo esta escaneado se permite visualizar
			
			    this.getBoton('edit').enable();
				this.getBoton('del').enable();
			return tb

		},
		liberaMenu : function() {
			var tb = Phx.vista.ServicioDetRegistro.superclass.liberaMenu.call(this);
			if(tb) {
				
				this.getBoton('edit').disable();
				this.getBoton('del').disable();
				if(this.maestro.fecha_asig_ini=='' || this.maestro.fecha_asig_fin==undefined){
					this.getBoton('new').disable();
					
					this.getBoton('save').disable();
					
				}else{
					this.getBoton('new').enable();
					
					this.getBoton('save').enable();
				}
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
			
		},
			
	onReloadPage:function(m){
          	this.maestro=m;
			this.Atributos[1].valorInicial=this.maestro.id_servicio;
	    	
			this.store.baseParams={id_servicio:this.maestro.id_servicio,
			tipo_interfaz : this.tipo_interfaz,
			};
			
			this.load({params:{start:0, limit:50}})
			
			
			

		},
		
	onButtonNew:function(){
		this.form.getForm().reset();
		//this.mostrarGrupo(0);
		
		
		this.argumentExtraSubm
	//	this.argumentExtraSubmit.tipo_operacion =undefined;
		Phx.vista.ServicioDetRegistro.superclass.onButtonNew.call(this);
		
		
		
	},
	
		onButtonEdit:function(){
		
		//this.mostrarGrupo(0);
		this.mostrarGrupo(1);
		//this.ocultarGrupo(2);
		//this.argumentExtraSubmit.tipo_operacion ='asignacion';
		this.argumentExtraSubm
		
		Phx.vista.ServicioDetRegistro.superclass.onButtonEdit.call(this);
		
		
		
	},
	
		onButtonDel:function(){
		
		//this.mostrarGrupo(0);
		/*this.mostrarGrupo(1);
		this.ocultarGrupo(2);
		this.argumentExtraSubm
		this.argumentExtraSubmit.tipo_operacion =undefined;*/
		Phx.vista.ServicioDetRegistro.superclass.onButtonDel.call(this);
		
		
		
	},
		
	/*	south:{
		  url:'../../../sis_gestion_vehicular/vista/servicio_det/ServicioDet.php',
		  title:'Detalle de Servicio Asignado', 
		  height:'50%',
		  cls:'ServicioDet',
		  //params:{tipo_interfaz:'FINREQ'}
	 }*/
		
	};

</script>