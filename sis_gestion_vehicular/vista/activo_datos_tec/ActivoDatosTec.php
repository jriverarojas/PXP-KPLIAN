<?php
/**
*@package pXP
*@file gen-ActivoDatosTec.php
*@author  (rcm)
*@date 02-02-2012 22:47:06
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ActivoDatosTec=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.ActivoDatosTec.superclass.constructor.call(this,config);
		this.init();
		this.iniciarEventos();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_activo_datos_tec'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'modem_id',
				fieldLabel: 'Modem ID',
				allowBlank: false,
				anchor: '50%',
				gwidth: 100,
				maxLength:50
			},
			type:'TextField',
			filters:{pfiltro:'vehic.modem_id',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
		       	config:{
		       		name:'id_activo_fijo',
		       		fieldLabel: 'Vehículo',
		       		allowBlank:false,
		       		store:new Ext.data.JsonStore({
			       		url:'../../sis_gestion_vehicular/control/ActivoFijo/listarActivoFijo',
			       		id:'id_activo_fijo',
			       		root:'datos',
			       		sortInfo:{
			       			field:'codigo',
			       			direction:'ASC'
		       			},
		       			totalProperty:'total',
		       			fields:['id_activo_fijo','codigo','descripcion','desc_activo_fijo'],
		       			remoteSort:true,
		       			baseParams:{par_filtro:'codigo'}
		       		}),
		       		valueField:'id_activo_fijo',
		       		displayField:'desc_activo_fijo',
		       		mode:'remote',
		       		triggerAction: 'all',
		       		pageSize:10,
		       		queryDelay:500,
		       		width:300,
		       		minChars:2,
		       		renderer:function (value, p, record){return String.format('{0}', record.data['desc_activo_fijo']);},
		       		gwidth:200
	       		},
	       		type:'ComboBox',
	       		id_grupo:0,
       			grid:true,
       			form:true
	       	},
		{
		       	config:{
		       		name:'id_marca',
		       		fieldLabel: 'Marca',
		       		allowBlank:false,
		       		store:new Ext.data.JsonStore({
			       		url:'../../sis_gestion_vehicular/control/Marca/listarMarca',
			       		id:'id_marca',
			       		root:'datos',
			       		sortInfo:{
			       			field:'marca',
			       			direction:'ASC'
		       			},
		       			totalProperty:'total',
		       			fields:['id_marca','marca','procedencia'],
		       			remoteSort:true,
		       			baseParams:{par_filtro:'marca'}
		       		}),
		       		valueField:'id_marca',
		       		displayField:'marca',
		       		mode:'remote',
		       		triggerAction: 'all',
		       		pageSize:10,
		       		queryDelay:500,
		       		width:300,
		       		minChars:2,
		       		renderer:function (value, p, record){return String.format('{0}', record.data['marca']);}
	       		},
	       		type:'ComboBox',
	       		id_grupo:0,
       			grid:true,
       			form:true
	       	},
	    {
		       	config:{
		       		name:'id_modelo',
		       		fieldLabel: 'Modelo',
		       		allowBlank:false,
		       		store:new Ext.data.JsonStore({
			       		url:'../../sis_gestion_vehicular/control/Modelo/listarModelo',
			       		id:'id_modelo',
			       		root:'datos',
			       		sortInfo:{
			       			field:'modelo',
			       			direction:'ASC'
		       			},
		       			totalProperty:'total',
		       			fields:['id_modelo','modelo','descripcion','anio'],
		       			remoteSort:true,
		       			baseParams:{par_filtro:'modelo'}
		       		}),
		       		valueField:'id_modelo',
		       		displayField:'modelo',
		       		mode:'remote',
		       		triggerAction: 'all',
		       		pageSize:10,
		       		queryDelay:500,
		       		width:300,
		       		minChars:2,
		       		renderer:function (value, p, record){return String.format('{0}', record.data['modelo']);}
	       		},
	       		type:'ComboBox',
	       		id_grupo:0,
       			grid:true,
       			form:true
	       	},
	       	
	    {
			config:{
				name: 'placa',
				fieldLabel: 'Placa',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
			type:'TextField',
			filters:{pfiltro:'vehic.placa',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'soat',
				fieldLabel: 'Num. SOAT',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:30
			},
			type:'TextField',
			filters:{pfiltro:'vehic.soat',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'cilindrada_cc',
				fieldLabel: 'Cilindrada(cm3)',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:50
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.cilindrada_cc',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'chasis',
				fieldLabel: 'Num.Chasis',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:50
			},
			type:'TextField',
			filters:{pfiltro:'vehic.chasis',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'num_motor',
				fieldLabel: 'Num. Motor',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:30
			},
			type:'TextField',
			filters:{pfiltro:'vehic.num_motor',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'rend_litro_km',
				fieldLabel: 'Rendimiento Km/Lt',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.rend_litro_km',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'ult_kilometraje',
				fieldLabel: 'Último Kilometraje',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:30
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.ult_kilometraje',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_ult_km',
				fieldLabel: 'Fecha Ult.Km.',
				allowBlank: true,
				anchor: '50%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
				format:'d-m-Y'
			},
			type:'DateField',
			filters:{pfiltro:'vehic.fecha_ult_km',type:'date'},
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
			filters:{pfiltro:'vehic.estado_reg',type:'string'},
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
			filters:{pfiltro:'vehic.fecha_reg',type:'date'},
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
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
				format:'d-m-Y'
			},
			type:'DateField',
			filters:{pfiltro:'vehic.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Vehículos',
	ActSave:'../../sis_gestion_vehicular/control/ActivoDatosTec/insertarActivoDatosTec',
	ActDel:'../../sis_gestion_vehicular/control/ActivoDatosTec/eliminarActivoDatosTec',
	ActList:'../../sis_gestion_vehicular/control/ActivoDatosTec/listarActivoDatosTec',
	id_store:'id_activo_datos_tec',
	fields: [
		{name:'id_activo_datos_tec', type: 'numeric'},
		{name:'rend_litro_km', type: 'numeric'},
		{name:'fecha_ult_km', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'estado_reg', type: 'string'},
		{name:'id_activo_fijo', type: 'numeric'},
		{name:'chasis', type: 'string'},
		{name:'num_motor', type: 'string'},
		{name:'ult_kilometraje', type: 'numeric'},
		{name:'placa', type: 'string'},
		{name:'cilindrada_cc', type: 'numeric'},
		{name:'modem_id', type: 'string'},
		{name:'soat', type: 'string'},
		{name:'id_modelo', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'desc_activo_fijo', type: 'string'},
		{name:'modelo', type: 'string'},
		{name:'marca', type: 'string'},
		{name:'id_marca', type: 'numeric'}
	],
	sortInfo:{
		field: 'id_activo_datos_tec',
		direction: 'ASC'
	},
	iniciarEventos:function()
	{
		this.getComponente('id_marca').on('select',function(s,r,i)
		{
			var cmbModelo=this.getComponente('id_modelo');
			cmbModelo.store.baseParams.id_marca=r.data.id_marca;
			cmbModelo.reset();
			cmbModelo.modificado=true;
		},this);
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		