<?php
/**
*@package pXP
*@file gen-ActivoFijoRastreo.php
*@author  (herman)
*@date 02-02-2012 15:47:13
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ActivoFijoRastreo=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.ActivoFijoRastreo.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_activo_fijo_rastreo'
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
			filters:{pfiltro:'afr.id_empleado',type:'numeric'},
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
			filters:{pfiltro:'afr.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'fecha_servidor',
				fieldLabel: 'fecha_servidor',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'afr.fecha_servidor',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
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
			filters:{pfiltro:'afr.aux2',type:'string'},
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
			filters:{pfiltro:'afr.fecha_satelite',type:'date'},
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
			filters:{pfiltro:'afr.curso',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_hora',
				fieldLabel: 'fecha_hora',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'afr.fecha_hora',type:'numeric'},
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
			filters:{pfiltro:'afr.aux1',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'odometro',
				fieldLabel: 'odometro',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
			type:'NumberField',
			filters:{pfiltro:'afr.odometro',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'mensaje',
				fieldLabel: 'mensaje',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:200
			},
			type:'TextField',
			filters:{pfiltro:'afr.mensaje',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'hora_gps',
				fieldLabel: 'hora_gps',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1245194
			},
			type:'NumberField',
			filters:{pfiltro:'afr.hora_gps',type:'numeric'},
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
				maxLength:-5
			},
			type:'NumberField',
			filters:{pfiltro:'afr.velocidad',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'advisories',
				fieldLabel: 'advisories',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:30
			},
			type:'TextField',
			filters:{pfiltro:'afr.advisories',type:'string'},
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
				maxLength:-5
			},
			type:'NumberField',
			filters:{pfiltro:'afr.longitud',type:'numeric'},
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
			filters:{pfiltro:'afr.id_activo_fijo',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'dia',
				fieldLabel: 'dia',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'afr.dia',type:'numeric'},
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
			filters:{pfiltro:'afr.aux3',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'punto_cercano',
				fieldLabel: 'punto_cercano',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:200
			},
			type:'TextField',
			filters:{pfiltro:'afr.punto_cercano',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'altitud',
				fieldLabel: 'altitud',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
			type:'NumberField',
			filters:{pfiltro:'afr.altitud',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'ciudad',
				fieldLabel: 'ciudad',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'afr.ciudad',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'numero_actualizado',
				fieldLabel: 'numero_actualizado',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'afr.numero_actualizado',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'estado',
				fieldLabel: 'estado',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'afr.estado',type:'string'},
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
			filters:{pfiltro:'afr.aux4',type:'string'},
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
				maxLength:-5
			},
			type:'NumberField',
			filters:{pfiltro:'afr.latitud',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'events',
				fieldLabel: 'events',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'afr.events',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'mes',
				fieldLabel: 'mes',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'afr.mes',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'anio',
				fieldLabel: 'anio',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'afr.anio',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'calle',
				fieldLabel: 'calle',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:200
			},
			type:'TextField',
			filters:{pfiltro:'afr.calle',type:'string'},
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
			filters:{pfiltro:'afr.fecha_reg',type:'date'},
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
			filters:{pfiltro:'afr.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Rastreo',
	ActSave:'../../sis_gestion_vehicular/control/ActivoFijoRastreo/insertarActivoFijoRastreo',
	ActDel:'../../sis_gestion_vehicular/control/ActivoFijoRastreo/eliminarActivoFijoRastreo',
	ActList:'../../sis_gestion_vehicular/control/ActivoFijoRastreo/listarActivoFijoRastreo',
	id_store:'id_activo_fijo_rastreo',
	fields: [
		{name:'id_activo_fijo_rastreo', type: 'numeric'},
		{name:'id_empleado', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'fecha_servidor', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'aux2', type: 'string'},
		{name:'fecha_satelite', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'curso', type: 'numeric'},
		{name:'fecha_hora', type: 'numeric'},
		{name:'aux1', type: 'string'},
		{name:'odometro', type: 'numeric'},
		{name:'mensaje', type: 'string'},
		{name:'hora_gps', type: 'numeric'},
		{name:'velocidad', type: 'numeric'},
		{name:'advisories', type: 'string'},
		{name:'longitud', type: 'numeric'},
		{name:'id_activo_fijo', type: 'numeric'},
		{name:'dia', type: 'numeric'},
		{name:'aux3', type: 'string'},
		{name:'punto_cercano', type: 'string'},
		{name:'altitud', type: 'numeric'},
		{name:'ciudad', type: 'string'},
		{name:'numero_actualizado', type: 'numeric'},
		{name:'estado', type: 'string'},
		{name:'aux4', type: 'string'},
		{name:'latitud', type: 'numeric'},
		{name:'events', type: 'numeric'},
		{name:'mes', type: 'numeric'},
		{name:'anio', type: 'numeric'},
		{name:'calle', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_activo_fijo_rastreo',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		