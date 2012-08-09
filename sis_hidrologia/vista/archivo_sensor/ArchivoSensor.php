<?php
/**
*@package pXP
*@file gen-ArchivoSensor.php
*@author  (mflores)
*@date 23-11-2011 10:48:29
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ArchivoSensor=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
				
    	//llama al constructor de la clase padre
		Phx.vista.ArchivoSensor.superclass.constructor.call(this,config);
		this.init();
		//this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_archivo_sensor'
			},
			type:'Field',
			form:true 
		},		
		{
			config:{
				sortable:false,
				name: 'id_sensor',
				fieldLabel: 'Sensor',
				allowBlank: false,
				emptyText:'Sensor...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_hidrologia/control/Sensor/listarSensorCombo',
					id: 'id_sensor',
					root: 'datos',
					sortInfo:{
						field: 'id_sensor',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_sensor','codigo'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'codigo'}
				}),
				valueField: 'id_sensor',
				displayField: 'codigo',
				gdisplayField:'codigo',
				//hiddenName: 'id_administrador',
				groupable:true,//rpueba rac
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
				renderer:function (value, p, record){return String.format('{0}', record.data['codigo']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'codigo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		/*{
			config:{
				name: 'id_sensor',
				fieldLabel: 'id_sensor',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'arsen.id_sensor',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},*/
		{
			config:{
				name: 'orden',
				fieldLabel: 'Orden',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'arsen.orden',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'nombre_col_file',
				fieldLabel: 'Nombre columna de archivo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:50
			},
			type:'TextField',
			filters:{pfiltro:'arsen.nombre_col_file',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_tipo_archivo'
			},
			type:'Field',
			form:true 
		},
		/*{
			config:{
				name: 'id_tipo_archivo',
				fieldLabel: 'id_tipo_archivo',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'arsen.id_tipo_archivo',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},*/
		{
			config:{
				name: 'orden_col_fecha',
				fieldLabel: 'Orden columna fecha',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'arsen.orden_col_fecha',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'nombre_col_fecha',
				fieldLabel: 'Nombre columna fecha',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:50
			},
			type:'TextField',
			filters:{pfiltro:'arsen.nombre_col_fecha',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'orden_col_hora',
				fieldLabel: 'Orden columna hora',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'arsen.orden_col_hora',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'nombre_col_hora',
				fieldLabel: 'Nombre columna hora',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:50
			},
			type:'TextField',
			filters:{pfiltro:'arsen.nombre_col_hora',type:'string'},
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
			filters:{pfiltro:'arsen.estado_reg',type:'string'},
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
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'arsen.fecha_reg',type:'date'},
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
			filters:{pfiltro:'arsen.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}		
	],
	title:'Archivo Sensor',
	ActSave:'../../sis_hidrologia/control/ArchivoSensor/insertarArchivoSensor',
	ActDel:'../../sis_hidrologia/control/ArchivoSensor/eliminarArchivoSensor',
	ActList:'../../sis_hidrologia/control/ArchivoSensor/listarArchivoSensor',
	id_store:'id_archivo_sensor',
	
	loadValoresIniciales:function()
	{
		Phx.vista.ArchivoSensor.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_tipo_archivo').setValue(this.maestro.id_tipo_archivo);
	},
	
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_tipo_archivo:this.maestro.id_tipo_archivo};
		this.getComponente('id_sensor').store.baseParams.id_estacion =this.maestro.id_estacion;
		this.getComponente('id_sensor').modificado=true;
		
		this.load({params:{start:0, limit:50}});		
		//console.log('maestro',this.maestro);
	},	
	
	fields: [
		{name:'id_archivo_sensor', type: 'numeric'},
		{name:'id_sensor', type: 'numeric'},
		{name:'orden', type: 'numeric'},
		{name:'nombre_col_file', type: 'string'},
		{name:'orden', type: 'numeric'},
		{name:'nombre_col_file', type: 'string'},
		{name:'orden_col_fecha', type: 'numeric'},
		{name:'nombre_col_fecha', type: 'string'},
		{name:'orden_col_hora', type: 'numeric'},
		{name:'nombre_col_hora', type: 'string'},
		{name:'id_tipo_archivo', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'codigo', type: 'string'},
	],
	sortInfo:{
		field: 'id_archivo_sensor',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		