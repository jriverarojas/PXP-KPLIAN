<?php
/**
*@package pXP
*@file gen-Estado.php
*@author  (rortiz)
*@date 22-11-2011 15:48:00
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Estado=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Estado.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_estado'
			},
			type:'Field',
			form:true 
		},		
		{
			config:{
				name: 'nombre',
				fieldLabel: 'Nombre',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'est.nombre',type:'string'},
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
				maxLength:40
			},
			type:'NumberField',
			filters:{pfiltro:'est.orden',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'codigo',
				fieldLabel: 'Codigo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:40
			},
			type:'TextField',
			filters:{pfiltro:'est.codigo',type:'string'},
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
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
			type:'DateField',
			filters:{pfiltro:'est.fecha_reg',type:'date'},
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
			filters:{pfiltro:'est.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
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
			filters:{pfiltro:'est.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'estado',
	ActSave:'../../sis_sastt/control/Estado/insertarEstado',
	ActDel:'../../sis_sastt/control/Estado/eliminarEstado',
	ActList:'../../sis_sastt/control/Estado/listarEstado',
	id_store:'id_estado',
	fields: [
		{name:'id_estado', type: 'numeric'},
		{name:'nombre', type: 'string'},
		{name:'orden', type: 'numeric'},
		{name:'codigo', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_estado',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		