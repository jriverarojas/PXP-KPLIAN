<?php
/**
*@package pXP
*@file gen-Archivo.php
*@author  (mflores)
*@date 23-11-2011 10:48:34
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Archivo=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Archivo.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_archivo'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'id_operador',
				fieldLabel: 'id_operador',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'archiv.id_operador',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'archivo_temp',
				fieldLabel: 'archivo_temp',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
			type:'TextField',
			filters:{pfiltro:'archiv.archivo_temp',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'nombre_archivo_real',
				fieldLabel: 'nombre_archivo_real',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:250
			},
			type:'TextField',
			filters:{pfiltro:'archiv.nombre_archivo_real',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha',
				fieldLabel: 'fecha',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'archiv.fecha',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_tipo_archivo',
				fieldLabel: 'id_tipo_archivo',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'archiv.id_tipo_archivo',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'estado_reg',
				fieldLabel: 'Estado Reg.',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'archiv.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'obs',
				fieldLabel: 'obs',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
			type:'TextField',
			filters:{pfiltro:'archiv.obs',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'usr_reg',
				fieldLabel: 'Creado por',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'usu1.cuenta',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'fecha_reg',
				fieldLabel: 'Fecha creación',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'archiv.fecha_reg',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'fecha_mod',
				fieldLabel: 'Fecha Modif.',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'archiv.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'usr_mod',
				fieldLabel: 'Modificado por',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'usu2.cuenta',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Archivo',
	ActSave:'../../sis_hidrologia/control/Archivo/insertarArchivo',
	ActDel:'../../sis_hidrologia/control/Archivo/eliminarArchivo',
	ActList:'../../sis_hidrologia/control/Archivo/listarArchivo',
	id_store:'id_archivo',
	fields: [
		{name:'id_archivo', type: 'numeric'},
		{name:'id_operador', type: 'numeric'},
		{name:'archivo_temp', type: 'string'},
		{name:'nombre_archivo_real', type: 'string'},
		{name:'fecha', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_tipo_archivo', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'obs', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_archivo',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		