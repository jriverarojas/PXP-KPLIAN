<?php
/**
*@package pXP
*@file gen-Estado.php
*@author  (fprudencio)
*@date 17-11-2011 09:35:55
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
				name: 'estado_reg',
				fieldLabel: 'Estado Reg.',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'estad.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name:'admite_boleta',
	       		fieldLabel:'Admite Boleta',
				allowBlank:false,
				typeAhead:true,
	       		triggerAction:'all',
	       		lazyRender:true,
	       		disabled:false,
	       		mode:'local',
	       		store:['si','no']
			},
			valorInicial:'si',
			type:'ComboBox',
			filters:{pfiltro:'estad.admite_boleta',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'orden',
				fieldLabel: 'orden',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
			type:'NumberField',
			filters:{pfiltro:'estad.orden',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'codigo',
				fieldLabel: 'codigo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
			type:'TextField',
			filters:{pfiltro:'estad.codigo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name:'admite_anexo',
	       		fieldLabel:'Admite Anexo',
				allowBlank:false,
				typeAhead:true,
	       		triggerAction:'all',
	       		lazyRender:true,
	       		disabled:false,
	       		mode:'local',
	       		store:['si','no']
			},
			valorInicial:'si',
			type:'ComboBox',
			filters:{pfiltro:'estad.admite_anexo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'nombre',
				fieldLabel: 'nombre',
				allowBlank: true,
				anchor: '80%',
				gwidth: 250,
				maxLength:150
			},
			type:'TextField',
			filters:{pfiltro:'estad.nombre',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'dias',
				fieldLabel: 'dias',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
			type:'NumberField',
			filters:{pfiltro:'estad.dias',type:'numeric'},
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
			filters:{pfiltro:'estad.fecha_reg',type:'date'},
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
			filters:{pfiltro:'estad.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Estado',
	ActSave:'../../sis_legal/control/Estado/insertarEstado',
	ActDel:'../../sis_legal/control/Estado/eliminarEstado',
	ActList:'../../sis_legal/control/Estado/listarEstado',
	id_store:'id_estado',
	fields: [
		{name:'id_estado', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'admite_boleta', type: 'string'},
		{name:'orden', type: 'string'},
		{name:'codigo', type: 'string'},
		{name:'admite_anexo', type: 'string'},
		{name:'nombre', type: 'string'},
		{name:'dias', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'}
		
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
		
		