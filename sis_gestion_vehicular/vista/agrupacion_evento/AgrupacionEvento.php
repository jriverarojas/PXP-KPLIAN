<?php
/**
*@package pXP
*@file gen-AgrupacionEvento.php
*@author  (herman)
*@date 02-02-2012 19:07:27
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.AgrupacionEvento=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.AgrupacionEvento.superclass.constructor.call(this,config);
		this.init();
		//hp comentar esta linea
		//this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_agrupacion_evento'
			},
			type:'Field',
			form:true 
		},
		
		{
			
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_agrupacion'
			},
			type:'Field',
			form:true 
		},
		
		{
		       	config:{
		       		name:'id_evento',
		       		fieldLabel: 'Evento',
		       		allowBlank:false,
		       		store:new Ext.data.JsonStore({
			       		url:'../../sis_gestion_vehicular/control/Evento/listarEvento',
			       		id:'id_evento',
			       		root:'datos',
			       		sortInfo:{
			       			field:'nombre',
			       			direction:'ASC'
		       			},
		       			totalProperty:'total',
		       			fields:['id_evento','nombre'],
		       			remoteSort:true,
		       			baseParams:{par_filtro:'nombre'}
		       		}),
		       		valueField:'id_evento',
		       		displayField:'nombre',
		       		mode:'remote',
		       		triggerAction: 'all',
		       		pageSize:10,
		       		queryDelay:500,
		       		width:'100%',
		       		minChars:2,
		       		gwidth:350,
		       		renderer:function (value, p, record){return String.format('{0}', record.data['evento']);}
	       		},
	       		type:'ComboBox',
	       		id_grupo:0,
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
			filters:{pfiltro:'aev.estado_reg',type:'string'},
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
			filters:{pfiltro:'aev.fecha_reg',type:'date'},
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
			filters:{pfiltro:'aev.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Agrupacion Evento',
	ActSave:'../../sis_gestion_vehicular/control/AgrupacionEvento/insertarAgrupacionEvento',
	ActDel:'../../sis_gestion_vehicular/control/AgrupacionEvento/eliminarAgrupacionEvento',
	ActList:'../../sis_gestion_vehicular/control/AgrupacionEvento/listarAgrupacionEvento',
	id_store:'id_agrupacion_evento',
	
	
	//hp para enlasar con el padre
	loadValoresIniciales:function()
	{
		Phx.vista.AgrupacionEvento.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_agrupacion').setValue(this.maestro.id_agrupacion);		
	},
	//hp para enlasar con el padre
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_agrupacion:this.maestro.id_agrupacion};
		this.load({params:{start:0, limit:50}});			
	},
	
	fields: [
		{name:'id_agrupacion_evento', type: 'numeric'},
		{name:'estado', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'id_agrupacion', type: 'numeric'},
		{name:'id_evento', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'evento', type: 'string'}
		
	],
	sortInfo:{
		field: 'id_agrupacion_evento',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		