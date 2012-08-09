<?php
/**
*@package pXP
*@file gen-Modelo.php
*@author  (herman)
*@date 02-02-2012 01:44:30
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Modelo=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Modelo.superclass.constructor.call(this,config);
		this.init();
		//this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_modelo'
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
			filters:{pfiltro:'mdl.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		//HP hacer cambios 
		{
			config:{
				name: 'id_marca',
				labelSeparator:'',
				inputType:'hidden',
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'modelo',
				fieldLabel: 'Modelo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'mdl.modelo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'descripcion',
				fieldLabel: 'Descripción',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:500
			},
			type:'TextField',
			filters:{pfiltro:'mdl.descripcion',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		
		{
			config:{
				name: 'anio',
				fieldLabel: 'Año',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'mdl.anio',type:'numeric'},
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
			filters:{pfiltro:'mdl.fecha_reg',type:'date'},
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
			filters:{pfiltro:'mdl.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'modelo',
	ActSave:'../../sis_gestion_vehicular/control/Modelo/insertarModelo',
	ActDel:'../../sis_gestion_vehicular/control/Modelo/eliminarModelo',
	ActList:'../../sis_gestion_vehicular/control/Modelo/listarModelo',
	id_store:'id_modelo',
	
	//hp para enlasar con el padre
	loadValoresIniciales:function()
	{
		Phx.vista.Modelo.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_marca').setValue(this.maestro.id_marca);		
	},
	//hp para enlasar con el padre
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_marca:this.maestro.id_marca};
		this.load({params:{start:0, limit:50}});			
	},
	
	fields: [
		{name:'id_modelo', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'id_marca', type: 'numeric'},
		{name:'descripcion', type: 'string'},
		{name:'modelo', type: 'string'},
		{name:'anio', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_modelo',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		