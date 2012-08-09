<?php
/**
*@package pXP
*@file gen-Evento.php
*@author  (rcm)
*@date 02-02-2012 01:22:03
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Evento=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Evento.superclass.constructor.call(this,config);
		this.init();
		//this.load({params:{start:0, limit:50}})
		this.bloquearMenus()
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_evento'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'nombre',
				fieldLabel: 'Evento',
				allowBlank: false,
				anchor: '80%',
				gwidth: 150,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'event.nombre',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'descripcion',
				fieldLabel: 'Descripción',
				allowBlank: false,
				anchor: '80%',
				gwidth: 400,
				maxLength:500
			},
			type:'TextField',
			filters:{pfiltro:'event.descripcion',type:'string'},
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
			filters:{pfiltro:'event.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				labelSeparator:'',
				inputType:'hidden',
				name: 'id_tipo_evento'
			},
			type:'Field',
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
			filters:{pfiltro:'event.fecha_reg',type:'date'},
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
			filters:{pfiltro:'event.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Evento',
	ActSave:'../../sis_gestion_vehicular/control/Evento/insertarEvento',
	ActDel:'../../sis_gestion_vehicular/control/Evento/eliminarEvento',
	ActList:'../../sis_gestion_vehicular/control/Evento/listarEvento',
	id_store:'id_evento',
	loadValoresIniciales:function()
	{
		Phx.vista.Evento.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_tipo_evento').setValue(this.maestro.id_tipo_evento);		
	},
				
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_tipo_evento:this.maestro.id_tipo_evento};
		this.load({params:{start:0, limit:50}});			
	},
	fields: [
		{name:'id_evento', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'descripcion', type: 'string'},
		{name:'nombre', type: 'string'},
		{name:'id_tipo_evento', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_evento',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		