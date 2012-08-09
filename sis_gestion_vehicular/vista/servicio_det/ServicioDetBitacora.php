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
	Phx.vista.ServicioDetBitacora = {
		require : '../../../sis_gestion_vehicular/vista/servicio_det/ServicioDet.php',
		requireclase : 'Phx.vista.ServicioDet',
		nombreVista : 'ServicioDetBitacora',
		tipo_interfaz : 'SERVICIODETBITACORA',
		title : 'Bitacora de Detalle de Solicitudes',
		ActSave : '../../sis_gestion_vehicular/control/ServicioDet/insertarServicioDet',
		ActList : '../../sis_gestion_vehicular/control/ServicioDet/listarServicioDet',
		id_store : 'id_servicio_det',
		bedit : false,
		bdel : false,
		bsave : false,
		bnew : false,
		constructor : function(config) {
			this.maestro = config.maestro;

			for(var i = 0; i < this.Atributos.length; i++) {
				this.Atributos[i].form = false;

			}
			
			/*this.Atributos[this.getIndAtributo('fecha_asig_ini')].form=true;
			this.Atributos[this.getIndAtributo('fecha_asig_fin')].form=true;
			this.Atributos[this.getIndAtributo('id_funcionario')].form=true;
			this.Atributos[this.getIndAtributo('id_lugar_origen')].form=true;
			this.Atributos[this.getIndAtributo('id_lugar_destino')].form=true;
			this.Atributos[this.getIndAtributo('id_servicio')].form=true;
			
			
			this.Atributos[this.getIndAtributo('id_funcionario')].disable=true;
			this.Atributos[this.getIndAtributo('id_lugar_origen')].disable=true;
			this.Atributos[this.getIndAtributo('id_lugar_destino')].disable=true*/;

			//llama al constructor de la clase padre
			Phx.vista.ServicioDetBitacora.superclass.constructor.call(this, config);
			this.init();
			//definimos boton de finalizacion de formulacion de requerimiento
//				this.addButton('def_fechas', {
//				text : 'Definir Fechas',
//				iconCls : 'brechazar',
//				disabled : true,
//				handler : this.onButtonEdit,
//				tooltip : '<b>Definir fechas de disponibilidad</b>'
//			});
			
			/*this.addButton('asignar_solicitud', {
				text : 'Asignar Solicitud',
				iconCls : 'bok',
				disabled : true,
				handler : asignar_solicitud,
				tooltip : '<b>Asignar el Servicio</b>'
			});
			*/
			
			/*this.addButton('fin_requerimiento', {
				text : 'Concluir Solicitud',
				iconCls : 'badelante',
				disabled : true,
				handler : fin_requerimiento,
				tooltip : '<b>Dar por concluido el Servicio</b>'
			});
			*/
			
			
		 	/*this.addButton('rechazar', {
				text : 'Rechazar Solicitud',
				iconCls : 'bdel',
				disabled : true,
				handler : rechazar,
				tooltip : '<b>Rechazar el Servicio</b>'
			});
			*/
		

			/*function fin_requerimiento() {
				var data = this.sm.getSelected().data.id_servicio;
				Phx.CP.loadingShow();
				Ext.Ajax.request({
					// form:this.form.getForm().getEl(),
					url : '../../sis_gestion_vehicular/control/Servicio/insertarServicio',
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

		
			
			
			
			/*function rechazar() {
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
			}*/
			
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
				
		
			}	
			return tb

		},
		liberaMenu : function() {
			var tb = Phx.vista.ServicioDetBitacora.superclass.liberaMenu.call(this);
			if(tb) {

				//this.getBoton('asignar_solicitud').disable();
				
			}
			return tb
		},
		/*onButtonEdit:function(){
			
			this.adminGrupo({ocultar:[1],mostrar:[2]});
			this.argumentExtraSubmit.tipo_operacion ='def_fechas';
			Phx.vista.GestionServicio.superclass.onButtonEdit.call(this);
				
			
		

	},*/
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
		  url:'../../../sis_gestion_vehicular/vista/bitacora/Bitacora.php',
		  title:'Detalle de Bitacora', 
		  height:'50%',
		  cls:'Bitacora',
		  params:{tipo_interfaz:'FINREQ'}
	 }
		
	};

</script>