<?php
/**
*@package pXP
*@file gen-ActivoFijoUltimoRegistro.php
*@author  (rac)
*@date 04-02-2012 08:32:43
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ActivoFijoUltimoRegistro=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.ActivoFijoUltimoRegistro.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_ultimo_registro'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'id_empleado',
				fieldLabel: 'id_empleado',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'urg.id_empleado',type:'numeric'},
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
			filters:{pfiltro:'urg.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'aux2',
				fieldLabel: 'aux2',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:150
			},
			type:'TextField',
			filters:{pfiltro:'urg.aux2',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'curso',
				fieldLabel: 'curso',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'urg.curso',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'chofer',
				fieldLabel: 'chofer',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'urg.chofer',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'latitud',
				fieldLabel: 'latitud',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'urg.latitud',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'aux1',
				fieldLabel: 'aux1',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:150
			},
			type:'TextField',
			filters:{pfiltro:'urg.aux1',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_satelite',
				fieldLabel: 'fecha_satelite',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'urg.fecha_satelite',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_activo_fijo',
				fieldLabel: 'id_activo_fijo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'urg.id_activo_fijo',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'aux3',
				fieldLabel: 'aux3',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:150
			},
			type:'TextField',
			filters:{pfiltro:'urg.aux3',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'aux4',
				fieldLabel: 'aux4',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:150
			},
			type:'TextField',
			filters:{pfiltro:'urg.aux4',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'velocidad',
				fieldLabel: 'velocidad',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'urg.velocidad',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'longitud',
				fieldLabel: 'longitud',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'urg.longitud',type:'numeric'},
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
			filters:{pfiltro:'urg.fecha_reg',type:'date'},
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
			filters:{pfiltro:'urg.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'ultimo_registro',
	ActSave:'../../sis_gestion_vehicular/control/ActivoFijoUltimoRegistro/insertarActivoFijoUltimoRegistro',
	ActDel:'../../sis_gestion_vehicular/control/ActivoFijoUltimoRegistro/eliminarActivoFijoUltimoRegistro',
	ActList:'../../sis_gestion_vehicular/control/ActivoFijoUltimoRegistro/listarActivoFijoUltimoRegistro',
	id_store:'id_ultimo_registro',
	fields: [
		{name:'id_ultimo_registro', type: 'numeric'},
		{name:'id_empleado', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'aux2', type: 'string'},
		{name:'curso', type: 'numeric'},
		{name:'chofer', type: 'string'},
		{name:'latitud', type: 'numeric'},
		{name:'aux1', type: 'string'},
		{name:'fecha_satelite', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_activo_fijo', type: 'numeric'},
		{name:'aux3', type: 'string'},
		{name:'aux4', type: 'string'},
		{name:'velocidad', type: 'numeric'},
		{name:'longitud', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_ultimo_registro',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		