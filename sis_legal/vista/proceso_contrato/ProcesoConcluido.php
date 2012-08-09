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
	Phx.vista.ProcesoConcluido = {
		require : '../../../sis_legal/vista/proceso_contrato/ProcesoContrato.php',
		requireclase : 'Phx.vista.ProcesoContrato',
		nombreVista : 'ProcesoConcluido',
		tipo_interfaz : 'CONCLUIDO',
		title : 'Formulacion de Requerimiento',
		ActSave : '../../sis_legal/control/ProcesoContrato/insertarProcesoContrato',
		ActList : '../../sis_legal/control/ProcesoContrato/listarProcesoContrato',
		id_store : 'id_proceso_contrato',
		bedit : false,
		bdel : false,
		bsave : false,
		bnew : false,
		constructor : function(config) {
			this.maestro = config.maestro;

			for(var i = 0; i < this.Atributos.length; i++) {
				this.Atributos[i].form = false;

			}

			//llama al constructor de la clase padre
			Phx.vista.ProcesoConcluido.superclass.constructor.call(this, config);
			this.init();
			//definimos boton de finalizacion de formulacion de requerimiento
			this.addButton('verContrato', {
				text : 'Ver Contrato',
				iconCls : 'bsee',
				disabled : true,
				handler : this.verContrato,
				tooltip : '<b>Ver Contrato</b><br/>Permite visualizar el documento escaneado'
			});

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
			if(data['version'] > 0) {
				this.getBoton('verContrato').enable();
			}

			return tb

		},
		liberaMenu : function() {
			var tb = Phx.vista.ProcesoConcluido.superclass.liberaMenu.call(this);
			if(tb) {

				this.getBoton('verContrato').disable();
			}
			return tb
		},
	};

</script>