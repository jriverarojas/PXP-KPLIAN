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
	Phx.vista.GestionServicio = {
		require : '../../../sis_gestion_vehicular/vista/servicio/Servicio.php',
		requireclase : 'Phx.vista.Servicio',
		nombreVista : 'GestionServicio',
		tipo_interfaz : 'GESTIONSERVICIO',
		title : 'Gestion de Solicitudes',
		ActSave : '../../sis_gestion_vehicular/control/Servicio/insertarServicio',
		ActList : '../../sis_gestion_vehicular/control/Servicio/listarServicio',
		id_store : 'id_servicio',
		bedit : false,
		bdel : false,
		bsave : false,
		bnew : false,
		constructor : function(config) {
			this.maestro = config.maestro;

			for(var i = 0; i < this.Atributos.length; i++) {
				this.Atributos[i].form = false;

			}
			
			this.Atributos[this.getIndAtributo('fecha_asig_ini')].form=true;
			this.Atributos[this.getIndAtributo('fecha_asig_fin')].form=true;
			this.Atributos[this.getIndAtributo('id_funcionario')].form=true;
			this.Atributos[this.getIndAtributo('id_lugar_origen')].form=true;
			this.Atributos[this.getIndAtributo('id_lugar_destino')].form=true;
			this.Atributos[this.getIndAtributo('id_servicio')].form=true;
			
			
			this.Atributos[this.getIndAtributo('id_funcionario')].disable=true;
			this.Atributos[this.getIndAtributo('id_lugar_origen')].disable=true;
			this.Atributos[this.getIndAtributo('id_lugar_destino')].disable=true;

			//llama al constructor de la clase padre
			Phx.vista.GestionServicio.superclass.constructor.call(this, config);
			this.init();
			//definimos boton de finalizacion de formulacion de requerimiento
				this.addButton('def_fechas', {
				text : 'Definir Fechas',
				iconCls : 'brechazar',
				disabled : true,
				handler : this.onButtonEdit,
				tooltip : '<b>Definir fechas de disponibilidad</b>'
			});
			
			/*this.addButton('asignar_solicitud', {
				text : 'Asignar Solicitud',
				iconCls : 'bok',
				disabled : true,
				handler : asignar_solicitud,
				tooltip : '<b>Asignar el Servicio</b>'
			});
			*/
			
			this.addButton('fin_requerimiento', {
				text : 'Concluir Solicitud',
				iconCls : 'badelante',
				disabled : true,
				handler : fin_requerimiento,
				tooltip : '<b>Dar por concluido el Servicio</b>'
			});
			
			
			
		 	this.addButton('rechazar', {
				text : 'Rechazar Solicitud',
				iconCls : 'bdel',
				disabled : true,
				handler : rechazar,
				tooltip : '<b>Rechazar el Servicio</b>'
			});
			
		

			function fin_requerimiento() {
				var data = this.sm.getSelected().data.id_servicio;
				Phx.CP.loadingShow();
				Ext.Ajax.request({
					// form:this.form.getForm().getEl(),
					url : '../../sis_gestion_vehicular/control/Servicio/insertarServicio',
					params : {
						id_servicio: data,
						operacion : 'concluido',
						tipo_operacion : 'cambiar_estado'
					},
					success : this.successSinc,
					failure : this.conexionFailure,
					timeout : this.timeout,
					scope : this
				});
			}

		
			
			
			
			/*	function asignar_solicitud() {
				var data = this.sm.getSelected().data.id_servicio;
				Phx.CP.loadingShow();
				Ext.Ajax.request({
					// form:this.form.getForm().getEl(),
					url : '../../sis_legal/control/ProcesoContrato/insertarProcesoContrato',
					params : {
						id_servicio: data,
						operacion : 'siguiente',
						tipo_operacion : 'cambiar_estado'
					},
					success : this.successSinc,
					failure : this.conexionFailure,
					timeout : this.timeout,
					scope : this
				});
			}*/
			

			function rechazar() {
				var data = this.sm.getSelected().data.id_servicio;
				Phx.CP.loadingShow();
				Ext.Ajax.request({
					// form:this.form.getForm().getEl(),
					url : '../../sis_gestion_vehicular/control/Servicio/insertarServicio',
					params : {
						id_servicio: data,
						operacion : 'anterior',
						tipo_operacion : 'cambiar_estado'
					},
					success : this.successSinc,
					failure : this.conexionFailure,
					timeout : this.timeout,
					scope : this
				});
			}
			
			this.store.baseParams = {
				tipo_interfaz : this.tipo_interfaz
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
			if(data['estado'] =='para_asig' ){
				
				
            //if(data['fecha_asig_ini'] !='' && data['fecha_asig_ini'] !=undefined && data['fecha_asig_fin']!='') {
				//this.getBoton('asignar_solicitud').enable();
				this.getBoton('def_fechas').enable();
				
				this.getBoton('rechazar').enable();
				
				if(data['fecha_asig_ini']!='' && data['fecha_asig_ini']!=undefined){
					this.getBoton('fin_requerimiento').enable();
				}else{
					this.getBoton('fin_requerimiento').disable();
					//deshabilitaa menus
					
					this.onDisablePanel(this.idContenedor+'-south');
					
					
				}
				
		
			}
			return tb

		},
		liberaMenu : function() {
			var tb = Phx.vista.GestionServicio.superclass.liberaMenu.call(this);
			if(tb) {

				//this.getBoton('asignar_solicitud').disable();
				this.getBoton('fin_requerimiento').disable();
				this.getBoton('def_fechas').disable();
				this.getBoton('rechazar').disable();
			}
			return tb
		},
		onButtonEdit:function(){
			
			this.adminGrupo({ocultar:[1],mostrar:[2]});
			this.argumentExtraSubmit.tipo_operacion ='def_fechas';
			Phx.vista.GestionServicio.superclass.onButtonEdit.call(this);
				
			//this.setFormSize(400,200);
			/*this.adminGrupo({mostrar:[2],ocultar:[0,1]});
			this.argumentExtraSubmit.tipo_operacion ='def_fechas';
			this.argumentExtraSubmit.operacion ='modificacion';
			
		
		
			this.loadForm(this.sm.getSelected())
			
			
			
			this.window.buttons[1].hide();
			
			this.window.show();*/
		

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
		south:{
		  url:'../../../sis_gestion_vehicular/vista/servicio_det/ServicioDetRegistro.php',
		  title:'Registro de Servicio Asignado', 
		  height:'50%',
		  cls:'ServicioDetRegistro',
		  //params:{tipo_interfaz:'FINREQ'}
	 }
		
	};

</script>