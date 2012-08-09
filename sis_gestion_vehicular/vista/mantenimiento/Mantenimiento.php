<?php
/**
*@package pXP
*@file gen-Mantenimiento.php
*@author  (rcm)
*@date 03-02-2012 20:09:09
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Mantenimiento=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Mantenimiento.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
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
		       		name:'id_tipo_evento',
		       		fieldLabel: 'Tipo Evento',
		       		allowBlank:false,
		       		store:new Ext.data.JsonStore({
			       		url:'../../sis_gestion_vehicular/control/TipoEvento/listarTipoEvento',
			       		id:'id_tipo_evento',
			       		root:'datos',
			       		sortInfo:{
			       			field:'nombre',
			       			direction:'ASC'
		       			},
		       			totalProperty:'total',
		       			fields:['id_tipo_evento','nombre'],
		       			remoteSort:true,
		       			baseParams:{par_filtro:'nombre'}
		       		}),
		       		valueField:'id_tipo_evento',
		       		displayField:'nombre',
		       		mode:'remote',
		       		triggerAction: 'all',
		       		pageSize:10,
		       		queryDelay:500,
		       		width:'80%',
		       		minChars:2,
		       		renderer:function (value, p, record){return String.format('{0}', record.data['nombre']);}
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
				allowBlank: true,
				anchor: '100%',
				gwidth: 300,
				maxLength:2000
			},
			type:'TextArea',
			filters:{pfiltro:'man.descripcion',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
				config:{
	   				name:'id_proveedor',
	   				origen:'PROVEEDOR',
	   				tinit:true,
	   				fieldLabel:'Taller Automotriz',
	   				gdisplayField:'desc_proveedor',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				    width:250,
   				    gwidth:200,
	      			renderer:function (value, p, record){return String.format('{0}', record.data['desc_proveedor']);}
	   			},
	   			type:'ComboRec',
	   			id_grupo:1,
	   			filters:{ pfiltro:'desc_proveedor',type:'string'},
	   		    grid:true,
	   			form:true
	   },
		{
			config:{
				name: 'fecha_ini',
				fieldLabel: 'Fecha Inicio',
				allowBlank: false,
				anchor: '50%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
				format:'d-m-Y'
			},
			type:'DateField',
			filters:{pfiltro:'man.fecha_ini',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_fin',
				fieldLabel: 'Fecha Fin',
				allowBlank: false,
				anchor: '50%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
				format:'d-m-Y'
			},
			type:'DateField',
			filters:{pfiltro:'man.fecha_fin',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
				config:{
	   				name:'id_funcionario',
	   				origen:'FUNCIONARIO',
	   				tinit:true,
	   				fieldLabel:'Responsable',
	   				gdisplayField:'desc_person',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				    width:250,
   				    gwidth:200,
	      			renderer:function (value, p, record){return String.format('{0}', record.data['desc_person']);}
	   			},
	   			type:'ComboRec',
	   			id_grupo:1,
	   			filters:{ pfiltro:'desc_person',type:'string'},
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
			filters:{pfiltro:'man.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
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
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
				format:'d-m-Y'
			},
			type:'DateField',
			filters:{pfiltro:'man.fecha_reg',type:'date'},
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
			filters:{pfiltro:'man.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Mantenimiento',
	ActSave:'../../sis_gestion_vehicular/control/Mantenimiento/insertarMantenimiento',
	ActDel:'../../sis_gestion_vehicular/control/Mantenimiento/eliminarMantenimiento',
	ActList:'../../sis_gestion_vehicular/control/Mantenimiento/listarMantenimiento',
	id_store:'id_mantenimiento',
	fields: [
		{name:'id_mantenimiento', type: 'numeric'},
		{name:'id_tipo_evento', type: 'numeric'},
		{name:'descripcion', type: 'string'},
		{name:'id_proveedor', type: 'numeric'},
		{name:'fecha_ini', type: 'date', dateFormat:'Y-m-d'},
		{name:'fecha_fin', type: 'date', dateFormat:'Y-m-d'},
		{name:'id_funcionario', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:s:i'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'desc_proveedor', type: 'string'},
		{name:'desc_person', type: 'string'},
		{name:'nombre', type: 'string'}
	],
	east:{
		  url:'../../../sis_gestion_vehicular/vista/mantenimiento_det/MantenimientoDet.php',
		  title:'Detalle Mantenimiento', 
		 // height:'50%',	//altura de la ventana hijo
		  width:'50%',		//ancho de la ventana hjo
		  cls:'MantenimientoDet'
		 },
	sortInfo:{
		field: 'id_mantenimiento',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		