<?php
/**
*@package pXP
*@file gen-Servicio.php
*@author  (prueba1)
*@date 14-10-2011 09:24:08
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Servicio=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Servicio.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_servicio'
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
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'servicio.estado',type:'string'},
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
			filters:{pfiltro:'servicio.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'fecha_asig_fin',
				fieldLabel: 'fecha_asig_fin',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'servicio.fecha_asig_fin',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_sol_ini',
				fieldLabel: 'fecha_sol_ini',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'servicio.fecha_sol_ini',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		//PRESUPUESTO
		{
			config:{
				name: 'descripcion',
				fieldLabel: 'Descripcion',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1000
			},
			type:'TextField',
			filters:{pfiltro:'servicio.descripcion',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		//ESTRUCTURA PROGRAMATICA
		/*{
			config:{
				name: 'id_ep',
				fieldLabel: 'Estructura Programatica',
				allowBlank: false,
				emptyText:'EP...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_parametros/control/FinaRegiProgProyActi/listarFinaRegiProgProyActi',
					id: 'id_fina_regi_prog_proy_acti',
					root: 'datos',
					sortInfo:{
						field: 'desc_ep',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_fina_regi_prog_proy_acti','desc_ep'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'desc_ep'}
				}),
				valueField: 'id_fina_regi_prog_proy_acti',
				displayField: 'desc_ep',
				gdisplayField:'FinaRegiProgProyActi',
				hiddenName: 'id_fina_regi_prog_proy_acti',
				forceSelection:true,
				typeAhead: true,
    			triggerAction: 'all',
    			lazyRender:true,
				mode:'remote',
				pageSize:50,
				queryDelay:500,
				width:210,
				gwidth:220,
				minChars:1,
				
				renderer:function (value, p, record){return String.format('{0}', record.data['FinaRegiProgProyActi']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'desc_ep',type:'string'},
			
			grid:true,
			form:true
		},*/
		//Empleado
		
		{
			config:{
				name: 'id_empleado',
				fieldLabel: 'id_empleado',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'servicio.id_empleado',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},

		//COMBO LUGAR ORIGEN
		
		/*{
			config:{
				name: 'id_lugar_origen',
				fieldLabel: 'Lugar Origen',
				allowBlank: false,
				emptyText:'Lugar...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_parametros/control/Lugar/listarLugar',
					id: 'id_lugar',
					root: 'datos',
					sortInfo:{
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_lugar','id_lugar_fk','codigo','nombre','tipo','sw_municipio','sw_impuesto','codigo_largo'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre'}
				}),
				valueField: 'id_lugar',
				displayField: 'nombre',
				gdisplayField:'lugar',
				hiddenName: 'id_lugar',
				forceSelection:true,
				typeAhead: true,
    			triggerAction: 'all',
    			lazyRender:true,
				mode:'remote',
				pageSize:50,
				queryDelay:500,
				width:210,
				gwidth:220,
				minChars:1,
				
				renderer:function (value, p, record){return String.format('{0}', record.data['lugar']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'lugar',type:'string'},
			
			grid:true,
			form:true
		},
		
		//COMBO LUGAR DESTINO
		
		{
			config:{
				name: 'id_lugar_destino',
				fieldLabel: 'Lugar Destino',
				allowBlank: false,
				emptyText:'Lugar...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_parametros/control/Lugar/listarLugar',
					id: 'id_lugar',
					root: 'datos',
					sortInfo:{
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_lugar','id_lugar_fk','codigo','nombre','tipo','sw_municipio','sw_impuesto','codigo_largo'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre'}
				}),
				valueField: 'id_lugar',
				displayField: 'nombre',
				gdisplayField:'lugar',
				hiddenName: 'id_lugar',
				forceSelection:true,
				typeAhead: true,
    			triggerAction: 'all',
    			lazyRender:true,
				mode:'remote',
				pageSize:50,
				queryDelay:500,
				width:210,
				gwidth:220,
				minChars:2,
				
				renderer:function (value, p, record){return String.format('{0}', record.data['lugar']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'lugar',type:'string'},
			
			grid:true,
			form:true
		},*/

		
		{
			config:{
				name: 'cant_personas',
				fieldLabel: 'cant_personas',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'servicio.cant_personas',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_sol_fin',
				fieldLabel: 'fecha_sol_fin',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'servicio.fecha_sol_fin',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_asig_ini',
				fieldLabel: 'fecha_asig_ini',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'servicio.fecha_asig_ini',type:'date'},
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
			filters:{pfiltro:'servicio.fecha_reg',type:'date'},
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
			filters:{pfiltro:'servicio.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Servicio',
	ActSave:'../../sis_gestion_vehicular/control/Servicio/insertarServicio',
	ActDel:'../../sis_gestion_vehicular/control/Servicio/eliminarServicio',
	ActList:'../../sis_gestion_vehicular/control/Servicio/listarServicio',
	id_store:'id_servicio',
	fields: [
		{name:'id_servicio', type: 'numeric'},
		{name:'estado', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'fecha_asig_fin', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'fecha_sol_ini', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'descripcion', type: 'string'},
		{name:'id_presupuesto', type: 'numeric'},
		{name:'id_empleado', type: 'numeric'},
		{name:'id_lugar_origen', type: 'numeric'},
		{name:'id_lugar_destino', type: 'numeric'},
		{name:'cant_personas', type: 'numeric'},
		{name:'fecha_sol_fin', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'fecha_asig_ini', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'}
		
	],
	sortInfo:{
		field: 'id_servicio',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		