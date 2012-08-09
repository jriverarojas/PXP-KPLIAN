<?php
/**
*@package pXP
*@file gen-TipoArchivo.php
*@author  (mflores)
*@date 23-11-2011 10:48:12
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.TipoArchivo=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.TipoArchivo.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
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
		{
			config:{
				sortable:false,
				name: 'id_estacion',
				fieldLabel: 'Estación',
				allowBlank: false,
				emptyText:'Estación...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_hidrologia/control/Estacion/listarEstacion',
					id: 'id_estacion',
					root: 'datos',
					sortInfo:{
						field: 'id_estacion',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_estacion','codigo'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'codigo'}
				}),
				valueField: 'id_estacion',
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
		
		{
			config:{
				name: 'patron_nombre_archivo',
				fieldLabel: 'Patron Nombre archivo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:500
			},
			type:'TextField',
			filters:{pfiltro:'tipar.patron_nombre_archivo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'num_file_ini',
				fieldLabel: 'Fila de inicio de datos',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'tipar.num_file_ini',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'periodo',
				fieldLabel: 'Periodo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:40
			},
			type:'TextField',
			filters:{pfiltro:'tipar.periodo',type:'string'},
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
			filters:{pfiltro:'tipar.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'fecha_ini',
				fieldLabel: 'Fecha inicio',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},				
				format:'d-m-Y'
			},
			type:'DateField',
			filters:{pfiltro:'tipar.fecha_ini',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_fin',
				fieldLabel: 'Fecha fin',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
				format:'d-m-Y'
			},
			type:'DateField',
			filters:{pfiltro:'tipar.fecha_fin',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},		
		/*{
			config:{
				name: 'id_estacion',
				fieldLabel: 'id_estacion',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'tipar.id_estacion',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},*/
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
			filters:{pfiltro:'tipar.fecha_reg',type:'date'},
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
			filters:{pfiltro:'tipar.fecha_mod',type:'date'},
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
	title:'Tipo Archivo',
	ActSave:'../../sis_hidrologia/control/TipoArchivo/insertarTipoArchivo',
	ActDel:'../../sis_hidrologia/control/TipoArchivo/eliminarTipoArchivo',
	ActList:'../../sis_hidrologia/control/TipoArchivo/listarTipoArchivo',
	id_store:'id_tipo_archivo',
	fields: [
		{name:'id_tipo_archivo', type: 'numeric'},
		{name:'patron_nombre_archivo', type: 'string'},
		{name:'num_file_ini', type: 'numeric'},
		{name:'fecha_fin', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'periodo', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'fecha_ini', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_estacion', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'codigo', type: 'string'}
	],
	sortInfo:{
		field: 'id_tipo_archivo',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true,
	
	south:{
		  url:'../../../sis_hidrologia/vista/archivo_sensor/ArchivoSensor.php',
		  title:'Archivo - Sensor', 		 
		  height:'50%',
		  cls:'ArchivoSensor'
	},
	}
)
</script>
		
		