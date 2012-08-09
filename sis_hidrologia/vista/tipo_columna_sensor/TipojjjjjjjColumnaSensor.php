<?php
/**
*@package pXP
*@file gen-TipoColumnaSensor.php
*@author  (mflores)
*@date 15-03-2012 10:27:43
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.TipoColumnaSensor=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.TipoColumnaSensor.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_tipo_sensor_columna'
			},
			type:'Field',
			form:true 
		},
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_tipo_columna'
			},
			type:'Field',
			form:true 
		},
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_tipo_sensor'
			},
			type:'Field',
			form:true 
		},
		/*{
			config:{
				name: 'id_tipo_columna',
				fieldLabel: 'id_tipo_columna',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'tcs.id_tipo_columna',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_tipo_sensor',
				fieldLabel: 'id_tipo_sensor',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'tcs.id_tipo_sensor',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},*/
		{
			config:{
				name: 'tipo_columna_sensor',
				fieldLabel: 'Tipo columna sensor',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:255
			},
			type:'TextField',
			filters:{pfiltro:'tcs.tipo_columna_sensor',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'prioridad',
				fieldLabel: 'Prioridad',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:255
			},
			type:'TextField',
			filters:{pfiltro:'tcs.prioridad',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},		
		{
			config:{
				name: 'orden',
				fieldLabel: 'Orden',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
			type:'NumberField',
			filters:{pfiltro:'tcs.orden',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'nombre_medida',
				fieldLabel: 'Nombre Medida',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'tcs.nombre_medida',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'unidad_medida',
				fieldLabel: 'Unidad medida',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:30
			},
			type:'TextField',
			filters:{pfiltro:'tcs.unidad_medida',type:'string'},
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
			filters:{pfiltro:'tcs.estado_reg',type:'string'},
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
			filters:{pfiltro:'tcs.fecha_reg',type:'date'},
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
			filters:{pfiltro:'tcs.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_tipo_sensor:this.maestro.id_tipo_sensor};		
		this.load({params:{start:0, limit:50}});		
	},	
	title:'Tipo Columna Sensor',
	ActSave:'../../sis_hidrologia/control/TipoColumnaSensor/insertarTipoColumnaSensor',
	ActDel:'../../sis_hidrologia/control/TipoColumnaSensor/eliminarTipoColumnaSensor',
	ActList:'../../sis_hidrologia/control/TipoColumnaSensor/listarTipoColumnaSensor',
	id_store:'id_tipo_sensor_columna',
	fields: [
		{name:'id_tipo_sensor_columna', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'id_tipo_columna', type: 'numeric'},
		{name:'tipo_columna_sensor', type: 'string'},
		{name:'prioridad', type: 'string'},
		{name:'id_tipo_sensor', type: 'numeric'},
		{name:'orden', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],	
	sortInfo:{
		field: 'id_tipo_sensor_columna',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		