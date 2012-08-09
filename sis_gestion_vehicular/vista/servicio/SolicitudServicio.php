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
	Phx.vista.SolicitudServicio = {
		require : '../../../sis_gestion_vehicular/vista/servicio/Servicio.php',
		requireclase : 'Phx.vista.Servicio',
		nombreVista : 'SolicitudServicio',
		tipo_interfaz : 'SOLICITUDSERVICIO',
		title : 'Registro de Solicitudes',
		ActSave : '../../sis_gestion_vehicular/control/Servicio/insertarServicio',
		ActList : '../../sis_gestion_vehicular/control/Servicio/listarServicio',
		id_store : 'id_servicio',
		bedit : true,
		bdel :true,
		bsave :true,
		bnew :true,
		constructor : function(config) {
			this.maestro = config.maestro;

			/*for(var i = 0; i < this.Atributos.length; i++) {
				this.Atributos[i].form = false;

			}*/
			this.Atributos[this.getIndAtributo('fecha_asig_ini')].form=false;
			this.Atributos[this.getIndAtributo('fecha_asig_fin')].form=false;
			//llama al constructor de la clase padre
			Phx.vista.SolicitudServicio.superclass.constructor.call(this, config);
			this.init();
			//definimos boton de finalizacion de formulacion de requerimiento
			
			
			this.addButton('fin_requerimiento', {
				text : 'Finalizar Solicitud',
				iconCls : 'bok',
				disabled : true,
				handler : fin_requerimiento,
				tooltip : '<b>Dar por concluido el Servicio</b>'
			});
			
			
			
		

			function fin_requerimiento() {
				
				
				var data = this.sm.getSelected().data.id_servicio;
				Phx.CP.loadingShow();
				Ext.Ajax.request({
					// form:this.form.getForm().getEl(),
					url : '../../sis_gestion_vehicular/control/Servicio/insertarServicio',
					params : {
						id_servicio : data,
						operacion : 'fin_solicitud',
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
		preparaMenu : function(n) {
			var data = this.getSelectedData();
			var tb = this.tbar;
			//si el archivo esta escaneado se permite visualizar
			if(data['estado'] =='borrador') {
				this.getBoton('edit').enable();
				this.getBoton('del').enable();
				
			}
			
            this.getBoton('fin_requerimiento').enable();
			return tb

		},
		liberaMenu : function() {
			var tb = Phx.vista.SolicitudServicio.superclass.liberaMenu.call(this);
			if(tb) {

				
				this.getBoton('fin_requerimiento').disable();
			}
			return tb
		},
		onButtonNew:function(){
		this.form.getForm().reset();
		//this.mostrarGrupo(0);
		this.mostrarGrupo(1);
		this.ocultarGrupo(2);
		this.argumentExtraSubm
		this.argumentExtraSubmit.tipo_operacion =undefined;
		Phx.vista.SolicitudServicio.superclass.onButtonNew.call(this);
		
		
		
	},
	
		onButtonEdit:function(){
		
		//this.mostrarGrupo(0);
		this.mostrarGrupo(1);
		this.ocultarGrupo(2);
		this.argumentExtraSubmit.tipo_operacion ='asignacion';
		this.argumentExtraSubm
		
		Phx.vista.SolicitudServicio.superclass.onButtonEdit.call(this);
		
		
		
	},
	
		onButtonDel:function(){
		
		//this.mostrarGrupo(0);
		/*this.mostrarGrupo(1);
		this.ocultarGrupo(2);
		this.argumentExtraSubm
		this.argumentExtraSubmit.tipo_operacion =undefined;*/
		Phx.vista.SolicitudServicio.superclass.onButtonDel.call(this);
		
		
		
	},
	
	
	};

</script>