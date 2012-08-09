<?php
/**
*@package pXP
*@file gen-MantenimientoDet.php
*@author  (rcm)
*@date 03-02-2012 20:37:16
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.MantenimientoDet=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.MantenimientoDet.superclass.constructor.call(this,config);
		this.init();
		//this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_mantenimiento_det'
			},
			type:'Field',
			form:true 
		},
		{
		       	config:{
		       		name:'id_activo_fijo',
		       		fieldLabel: 'Vehículo',
		       		allowBlank:false,
		       		store:new Ext.data.JsonStore({
			       		url:'../../sis_gestion_vehicular/control/ActivoFijo/listarActivoFijo',
			       		id:'id_activo_fijo',
			       		root:'datos',
			       		sortInfo:{
			       			field:'codigo',
			       			direction:'ASC'
		       			},
		       			totalProperty:'total',
		       			fields:['id_activo_fijo','codigo','descripcion','desc_activo_fijo'],
		       			remoteSort:true,
		       			baseParams:{par_filtro:'codigo'}
		       		}),
		       		valueField:'id_activo_fijo',
		       		displayField:'desc_activo_fijo',
		       		mode:'remote',
		       		triggerAction: 'all',
		       		pageSize:10,
		       		queryDelay:500,
		       		width:300,
		       		minChars:2,
		       		renderer:function (value, p, record){return String.format('{0}', record.data['desc_activo_fijo']);},
		       		gwidth:200
	       		},
	       		type:'ComboBox',
	       		id_grupo:0,
       			grid:true,
       			form:true
	       	},
		{
		       	config:{
		       		name:'id_evento',
		       		fieldLabel: 'Evento',
		       		allowBlank:false,
		       		store:new Ext.data.JsonStore({
			       		url:'../../sis_gestion_vehicular/control/Evento/listarEvento',
			       		id:'id_evento',
			       		root:'datos',
			       		sortInfo:{
			       			field:'nombre',
			       			direction:'ASC'
		       			},
		       			totalProperty:'total',
		       			fields:['id_evento','nombre','descripcion'],
		       			remoteSort:true,
		       			baseParams:{par_filtro:'nombre'}
		       		}),
		       		valueField:'id_evento',
		       		displayField:'nombre',
		       		mode:'remote',
		       		triggerAction: 'all',
		       		pageSize:10,
		       		queryDelay:500,
		       		width:300,
		       		minChars:2,
		       		renderer:function (value, p, record){return String.format('{0}', record.data['nombre']);},
		       		gwidth:200
	       		},
	       		type:'ComboBox',
	       		id_grupo:0,
       			grid:true,
       			form:true
	       	},
		{
			config:{
				name: 'descripcion',
				fieldLabel: 'Descripción',
				allowBlank: false,
				anchor: '80%',
				gwidth: 300,
				maxLength:1000
			},
			type:'TextArea',
			filters:{pfiltro:'detman.descripcion',type:'string'},
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
			filters:{pfiltro:'detman.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_mantenimiento'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'estado',
				fieldLabel: 'estado',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:15
			},
			type:'TextField',
			filters:{pfiltro:'detman.estado',type:'string'},
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
			filters:{pfiltro:'detman.fecha_reg',type:'date'},
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
			filters:{pfiltro:'detman.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Detalle Mantenmiento',
	ActSave:'../../sis_gestion_vehicular/control/MantenimientoDet/insertarMantenimientoDet',
	ActDel:'../../sis_gestion_vehicular/control/MantenimientoDet/eliminarMantenimientoDet',
	ActList:'../../sis_gestion_vehicular/control/MantenimientoDet/listarMantenimientoDet',
	id_store:'id_mantenimiento_det',
	loadValoresIniciales:function()
	{
		Phx.vista.MantenimientoDet.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_mantenimiento').setValue(this.maestro.id_mantenimiento);		
	},
	//hp para enlasar con el padre
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_mantenimiento:this.maestro.id_mantenimiento};
		this.load({params:{start:0, limit:50}});			
	},
	fields: [
		{name:'id_mantenimiento_det', type: 'numeric'},
		{name:'id_activo_fijo', type: 'numeric'},
		{name:'id_evento', type: 'numeric'},
		{name:'descripcion', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'id_mantenimiento', type: 'numeric'},
		{name:'estado', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'desc_activo_fijo', type: 'string'},
		{name:'nombre', type: 'string'}
	],
	
	sortInfo:{
		field: 'id_mantenimiento_det',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		