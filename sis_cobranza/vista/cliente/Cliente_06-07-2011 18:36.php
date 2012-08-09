<?php
/**
*@package pXP
*@file Cliente_06-07-2011 18:36.php
*@author  (admin)
*@date 06-07-2011 18:36:50
*@description Archivo con la interfaz de usuario que permite la ejecución de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Cliente=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Cliente.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_cliente'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'cod_ubica',
				fieldLabel: 'cod_ubica',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:15
			},
			type:'TextField',
			filters:{type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'desc_categoria',
				fieldLabel: 'desc_categoria',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:300
			},
			type:'TextField',
			filters:{type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'direccion',
				fieldLabel: 'direccion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:200
			},
			type:'TextField',
			filters:{type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'estado_reg',
				fieldLabel: 'estado_reg',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
			type:'TextField',
			filters:{type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_sistema_dist',
				fieldLabel: 'id_sistema_dist',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'TextField',
			filters:{type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'nombre_fac',
				fieldLabel: 'nombre_fac',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
			type:'TextField',
			filters:{type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'nro_cuenta',
				fieldLabel: 'nro_cuenta',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
			type:'TextField',
			filters:{type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'nro_cuenta_ant',
				fieldLabel: 'nro_cuenta_ant',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
			type:'TextField',
			filters:{type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'nro_nit',
				fieldLabel: 'nro_nit',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:786432
			},
			type:'TextField',
			filters:{type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'nro_serie_med',
				fieldLabel: 'nro_serie_med',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:18
			},
			type:'TextField',
			filters:{type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_reg',
				fieldLabel: 'fecha_reg',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100
			},
			type:'DateField',
			filters:{type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_usuario_reg',
				fieldLabel: 'id_usuario_reg',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'TextField',
			filters:{type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_mod',
				fieldLabel: 'fecha_mod',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100
			},
			type:'DateField',
			filters:{type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_usuario_mod',
				fieldLabel: 'id_usuario_mod',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'TextField',
			filters:{type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		}
	],
	title:'Cliente',
	ActSave:'../../sis_cobranza/control/Cliente/insertarCliente',
	ActDel:'../../sis_cobranza/control/Cliente/eliminarCliente',
	ActList:'../../sis_cobranza/control/Cliente/listarCliente',
	id_store:'id_cliente',
	fields: [
		{name:'id_cliente', type: 'numeric'},
		{name:'cod_ubica', type: 'string'},
		{name:'desc_categoria', type: 'string'},
		{name:'direccion', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'id_sistema_dist', type: 'numeric'},
		{name:'nombre_fac', type: 'string'},
		{name:'nro_cuenta', type: 'string'},
		{name:'nro_cuenta_ant', type: 'string'},
		{name:'nro_nit', type: 'string'},
		{name:'nro_serie_med', type: 'string'},
		{name:'fecha_reg', type: 'date'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_mod', type: 'date'},
		{name:'id_usuario_mod', type: 'numeric'},
	],
	sortInfo:{
		field: 'id_cliente',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		