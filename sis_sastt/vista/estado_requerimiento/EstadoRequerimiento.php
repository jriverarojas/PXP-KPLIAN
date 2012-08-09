<?php
/**
*@package pXP
*@file gen-EstadoRequerimiento.php
*@author  (rortiz)
*@date 22-11-2011 09:25:13
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.EstadoRequerimiento=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.EstadoRequerimiento.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_estado_requerimiento'
			},
			type:'Field',
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
			filters:{pfiltro:'estreq.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		/*{
			config:{
				name: 'id_depto_usuario',
				fieldLabel: 'id_depto_usuario',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'estreq.id_depto_usuario',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},*/
		{
			config:{
				name: 'id_depto_usuario',
				fieldLabel: 'Departamento Usuario',
				allowBlank:false,
				emptyText:'Departamento-Usaurio...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_parametros/control/DeptoUsuario/listarDeptoUsuario',
					id: 'id_depto_usuario',
					root: 'datos',
					sortInfo:{
						field: 'id_depto',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_depto_usuario','id_depto'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'id_depto'}
				}),
				valueField: 'id_depto_usuario',
				displayField: 'id_depto',
				gdisplayField:'id_depto_usuario',
				//hiddenName: 'nombre',
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
				
				renderer:function (value, p, record){return String.format('{0}', record.data['proyecto']);}
			},
			type:'ComboBox',
			filters:{	
		        pfiltro:'Departamento-Usuario',
				type:'string'
			},
			
			grid:true,
			form:true
		},
		/*{
			config:{
				name: 'id_estado',
				fieldLabel: 'id_estado',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'estreq.id_estado',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},*/
		{
			config:{
				name: 'id_estado',
				fieldLabel: 'Estado',
				allowBlank:false,
				emptyText:'Estado...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_sast/control/Estado/listarEstado',
					id: 'id_estado',
					root: 'datos',
					sortInfo:{
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_estado','nombre'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre'}
				}),
				valueField: 'id_estado',
				displayField: 'nombre',
				gdisplayField:'id_estado',
				//hiddenName: 'nombre',
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
				
				renderer:function (value, p, record){return String.format('{0}', record.data['proyecto']);}
			},
			type:'ComboBox',
			filters:{	
		        pfiltro:'nombre',
				type:'string'
			},
			
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_requerimiento',
				fieldLabel: 'Requerimiento',
				allowBlank:false,
				emptyText:'Requerimiento...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_sastt/control/Requerimientos/listarRequerimientos',
					id: 'id_requerimiento',
					root: 'datos',
					sortInfo:{
						field: 'descripcion',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_requerimiento','descripcion'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'hora'}
				}),
				valueField: 'id_requerimiento',
				displayField: 'descripcion',
				gdisplayField:'id_requerimiento',
				//hiddenName: 'nombre',
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
				
				renderer:function (value, p, record){return String.format('{0}', record.data['proyecto']);}
			},
			type:'ComboBox',
			filters:{	
		        pfiltro:'descripcion',
				type:'string'
			},			
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
				name: 'fecha_estado',
				fieldLabel: 'Fecha Estado',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'estreq.fecha_estado',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'hora',
				fieldLabel: 'Hora',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:8
			},
			type:'TextField',
			filters:{pfiltro:'estreq.hora',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'obs',
				fieldLabel: 'Observaciones',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
			type:'TextArea',
			filters:{pfiltro:'estreq.obs',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		/*{
			config:{
				name: 'id_requerimiento',
				fieldLabel: 'id_requerimiento',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'estreq.id_requerimiento',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},*/
		
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
			filters:{pfiltro:'estreq.fecha_reg',type:'date'},
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
			filters:{pfiltro:'estreq.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Estado de Requerimiento',
	ActSave:'../../sis_sastt/control/EstadoRequerimiento/insertarEstadoRequerimiento',
	ActDel:'../../sis_sastt/control/EstadoRequerimiento/eliminarEstadoRequerimiento',
	ActList:'../../sis_sastt/control/EstadoRequerimiento/listarEstadoRequerimiento',
	id_store:'id_estado_requerimiento',
	fields: [
		{name:'id_estado_requerimiento', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'id_depto_usuario', type: 'numeric'},
		{name:'id_estado', type: 'numeric'},
		{name:'fecha_estado', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'hora', type: 'string'},
		{name:'obs', type: 'string'},
		{name:'id_requerimiento', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_estado_requerimiento',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		