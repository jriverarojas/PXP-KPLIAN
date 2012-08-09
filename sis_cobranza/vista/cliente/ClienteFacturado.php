<?php
/**
*@package pXP
*@file gen-Cliente.php
*@author  (jmita)
*@date 14-11-2011 11:53:34
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ClienteFacturado=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.ClienteFacturado.superclass.constructor.call(this,config);
		this.init();
		this.bloquearMenus()
	},
	bsave:false,
	bnew:false,
	bedit:false,
	bdel:false,	
    bexcel:true,		
    Atributos:[
          		{
          			//configuracion del componente
          			config:{
          					labelSeparator:'',
          					inputType:'hidden',
          					name: 'id_factura_cob'
          			},
          			type:'Field',
          			form:true 
          		},		
          		{
          			config:{
          				name: 'gestion',
          				inputType:'hidden',
          				fieldLabel: 'Gestión',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 50,
          				maxLength:262144
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.gestion',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:true
          		},
          		{
          			config:{
          				name:'periodo',
          				inputType:'hidden',
          				fieldLabel:'Periodo',
          				allowBlank:true,
          				anchor:'80%',
          				gwidth:50,
          				maxLength:131072
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.periodo',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:true
          		},
          		{
          			config:{
          				name:'nro_factura',
          				fieldLabel:'Nro Factura',
          				allowBlank:true,
          				anchor:'80%',
          				gwidth:100,
          				maxLength:20
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.nro_factura',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		
          		{
          			config:{
          				name:'fecha_factura',
          				fieldLabel:'Fecha Factura',
          				allowBlank:true,
          				anchor:'80%',
          				gwidth:100,
          				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
          			},
          			type:'DateField',
          			filters:{pfiltro:'faccob.fecha_factura',type:'date'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name:'importe_total',
          				fieldLabel:'Importe Total',
          				allowBlank:true,
          				anchor:'80%',
          				gwidth:100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.importe_total',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			//configuracion del componente
          			config:{
          					name:'facturas_pagadas',
          				fieldLabel:'Cantidad de Facturas',
          				allowBlank:true,
          				anchor:'80%',
          				gwidth:100,
          				maxLength:1179650,
          				disabled:true
          			},
          			type:'TextField',
          			id_grupo:0,
          			grid:false,
          			form:true 
          		},	
          		{
          			config:{
          				name:'acumulado',
          				fieldLabel:'Importe Total',
          				allowBlank:true,
          				anchor:'80%',
          				gwidth:100,
          				maxLength:1179650,
          				disabled:true
          			},
          			type:'TextField',
          			id_grupo:0,
          			grid:true,
          			form:true
          		},
          		{
          			config:{
          				name:'importe_recibido',
          				fieldLabel:'Importe Recibido',
          				allowBlank:false,
          				anchor:'80%',
          				gwidth:100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			id_grupo:0,
          			grid:false,
          			form:true
          		},	
          		{
          			config:{
          				name: 'importe_cambio',
          				fieldLabel: 'Cambio',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:10,
          				disabled:true
          			},
          			type:'TextField',
          			id_grupo:0,
          			grid:false,
          			form:true
          		},
          		{
          			config:{
          				name: 'fecha_pago',
          				fieldLabel: 'Fecha de Pago',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
          			},
          			type:'DateField',
          			filters:{pfiltro:'faccob.fecha_pago',type:'date'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'cod_control',
          				fieldLabel: 'Cod Control',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:15
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.cod_control',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'nro_autorizacion',
          				fieldLabel: 'Nro Autorizacion',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:15
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.nro_autorizacion',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},		
          		{
          			config:{
          				name: 'nombre_fac',
          				inputType:'hidden',
          				fieldLabel: 'Nombre Factura',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 200,
          				maxLength:100
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.nombre_fac',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:true
          		},
          		{
          			config:{
          				name: 'nit_fact',
          				fieldLabel: 'NIT ',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:20
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.nit_fact',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'direccion',
          				fieldLabel: 'Dirección',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:100
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.direccion',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'cod_ubica',
          				fieldLabel: 'Cod Ubicación',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:20
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.cod_ubica',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'nro_orden',
          				fieldLabel: 'Nro Orden',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:15
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.nro_orden',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'cod_alfanum',
          				fieldLabel: 'Cod Alfanum',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:15
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.cod_alfanum',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},		
          		{
          			config:{
          				name: 'importe_cred_fis',
          				fieldLabel: 'Importe Cred Fis',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.importe_cred_fis',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		
          		{
          			config:{
          				name: 'tipo_lectura',
          				fieldLabel: 'Tipo Lectura',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:10
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.tipo_lectura',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'reconex_val',
          				fieldLabel: 'Reconex Valodaro (Bs)',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.reconex_val',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'credito_pagado',
          				fieldLabel: 'Credito Pagado',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.credito_pagado',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'consumo_cambio',
          				fieldLabel: 'Consumo Cambio (kWh)',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.consumo_cambio',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		
          		{
          			config:{
          				name: 'potencia_val',
          				fieldLabel: 'Potencia Valorada (Bs)',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.potencia_val',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		
          		{
          			config:{
          				name: 'consumo_libre',
          				fieldLabel: 'Consumo Libre',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.consumo_libre',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		
          		{
          			config:{
          				name: 'sw_deb_fis',
          				fieldLabel: 'Sw Debito Fiscal',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:2
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.sw_deb_fis',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'consumo_total',
          				fieldLabel: 'Consumo Total',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.consumo_total',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		
          		{
          			config:{
          				name: 'id_caja',
          				labelSeparator:'',
          				inputType:'hidden'				
          			},
          			type:'Field',
          			form:true			
          		},
          		
          		{
          			config:{
          				name: 'conexion_val',
          				fieldLabel: 'Conexion Val',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.conexion_val',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'fecha_ant',
          				fieldLabel: 'Fecha Anterior',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
          			},
          			type:'DateField',
          			filters:{pfiltro:'faccob.fecha_ant',type:'date'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'fecha_act',
          				fieldLabel: 'Fecha Actual',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
          			},
          			type:'DateField',
          			filters:{pfiltro:'faccob.fecha_act',type:'date'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},		
          		{
          			config:{
          				name: 'fecha_prox_med',
          				fieldLabel: 'Fecha Prox Medición',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
          			},
          			type:'DateField',
          			filters:{pfiltro:'faccob.fecha_prox_med',type:'date'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		
          		{
          			config:{
          				name: 'lectura_kw',
          				fieldLabel: 'Lectura (kWh)',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.lectura_kw',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          	
          		{
          			config:{
          				name: 'multi_kwh',
          				fieldLabel: 'Multiplicador Kwh',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.multi_kwh',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		
          		{
          			config:{
          				name: 'id_cajero',
          				labelSeparator:'',
          				inputType:'hidden'
          			},
          			type:'Field',
          			form:true
          		},
          		{
          			config:{
          				name: 'id_cliente',
          				labelSeparator:'',
          				inputType:'hidden'
          			},
          			type:'Field',
          			form:true
          		},		
          		{
          			config:{
          				name: 'nro_medidor',
          				fieldLabel: 'Nro Medidor',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:20
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.nro_medidor',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'lectura_act',
          				fieldLabel: 'Lectura Actual',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.lectura_act',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'lectura_ant',
          				fieldLabel: 'Lectura Anterior',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.lectura_ant',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'consumo_val',
          				fieldLabel: 'Consumo Valorado',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.consumo_val',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},		
          		{
          			config:{
          				name: 'importe_dev',
          				fieldLabel: 'Importe Devolución',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.importe_dev',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		
          		{
          			config:{
          				name: 'num_formulario',
          				fieldLabel: 'Num Formulario',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:20
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.num_formulario',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'fecha_vence',
          				fieldLabel: 'Fecha Vencimiento',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
          			},
          			type:'DateField',
          			filters:{pfiltro:'faccob.fecha_vence',type:'date'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		
          		{
          			config:{
          				name: 'id_moneda',
          				labelSeparator:'',
          				inputType:'hidden'
          			},
          			type:'Field',
          			form:true
          		},
          		{
          			config:{
          				name: 'consumo_periodo',
          				fieldLabel: 'Consumo Periodo',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				maxLength:1179650
          			},
          			type:'TextField',
          			filters:{pfiltro:'faccob.consumo_periodo',type:'string'},
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
          			filters:{pfiltro:'faccob.estado_reg',type:'string'},
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
          			type:'TextField',
          			filters:{pfiltro:'usu1.cuenta',type:'string'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
          			config:{
          				name: 'fecha_reg',
          				fieldLabel: 'Fecha Creación',
          				allowBlank: true,
          				anchor: '80%',
          				gwidth: 100,
          				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
          			},
          			type:'DateField',
          			filters:{pfiltro:'faccob.fecha_reg',type:'date'},
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
          			type:'TextField',
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
          			filters:{pfiltro:'faccob.fecha_mod',type:'date'},
          			id_grupo:1,
          			grid:true,
          			form:false
          		},
          		{
                 			config:{
                 				name:'id_factura_cob_',
                 				fieldLabel:'Facturas',
                 				allowBlank:true,
                 				emptyText:'Facturas...',
                 				store: new Ext.data.JsonStore({
                        			url: '../../sis_cobranza/control/FacturaCob/listarFacturaCob',
                 					id: 'id_factura_cob',
                 					root: 'datos',
                 					sortInfo:{
                 						field: 'gestion,periodo',
                 						direction: 'ASC'
                 					},
                 					totalProperty: 'total',
                 					fields: ['id_factura_cob','gestion','periodo','nombre_factura'],
                 					// turn on remote sorting
                 					remoteSort: true,
                 					baseParams:{par_filtro:'periodo'}
                 					
                 				}),
                 				valueField: 'id_factura_cob',
                 				displayField: 'periodo',
                 				forceSelection:true,
                 				typeAhead: true,
                     			triggerAction: 'all',
                     			lazyRender:true,
                 				mode:'remote',
                 				pageSize:10,
                 				queryDelay:1000,
                 				width:250,
                 				minChars:2,
          	       			enableMultiSelect:true,
                 			
                 				//renderer:function(value, p, record){return String.format('{0}', record.data['descripcion']);}

                 			},
                 			type:'AwesomeCombo',
                 			id_grupo:0,
                 			grid:false,
                 			form:false
                 	}
          	],
	title:'Usuarios Facturados',
	ActList:'../../sis_cobranza/control/FacturaCob/listarFacturaCob',
	id_store:'id_factura_cob',
	loadValoresIniciales:function()
	{
		Phx.vista.Cliente.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_sistema_dist').setValue(this.maestro.id_sistema_dist);		
	},
				
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_sistema_dist:this.maestro.id_sistema_dist};
		this.load({params:{start:0, limit:50}});			
	},
	fields: [
		 		{name:'id_factura_cob', type: 'numeric'},
				{name:'importe_cred_fis', type: 'string'},
				{name:'estado_reg', type: 'string'},
				{name:'tipo_lectura', type: 'string'},
				{name:'reconex_val', type: 'string'},
				{name:'credito_pagado', type: 'string'},
				{name:'consumo_cambio', type: 'string'},
				{name:'nombre_fac', type: 'string'},
				{name:'potencia_val', type: 'string'},
				{name:'nro_factura', type: 'string'},
				{name:'consumo_libre', type: 'string'},
				{name:'nro_orden', type: 'string'},
				{name:'sw_deb_fis', type: 'string'},
				{name:'consumo_total', type: 'string'},
				{name:'cod_alfanum', type: 'string'},
				{name:'cod_control', type: 'string'},
				{name:'id_caja', type: 'numeric'},
				{name:'fecha_act', type: 'date', dateFormat:'Y-m-d H:i:s'},
				{name:'conexion_val', type: 'string'},
				{name:'fecha_ant', type: 'date', dateFormat:'Y-m-d H:i:s'},
				{name:'nit_fact', type: 'string'},
				{name:'fecha_prox_med', type: 'date', dateFormat:'Y-m-d H:i:s'},
				{name:'estado_fac', type: 'string'},
				{name:'lectura_kw', type: 'string'},
				{name:'cod_ubica', type: 'string'},
				{name:'nro_autorizacion', type: 'string'},
				{name:'multi_kwh', type: 'string'},
				{name:'gestion', type: 'string'},
				{name:'id_cajero', type: 'numeric'},
				{name:'id_cliente', type: 'numeric'},
				{name:'periodo', type: 'string'},
				{name:'consumo_val', type: 'string'},
				{name:'fecha_pago', type: 'date', dateFormat:'Y-m-d H:i:s'},
				{name:'direccion', type: 'string'},
				{name:'importe_dev', type: 'string'},
				{name:'nro_medidor', type: 'string'},
				{name:'lectura_act', type: 'string'},
				{name:'importe_total', type: 'string'},
				{name:'acumulado', type: 'string'},
				{name:'facturas_pagadas', type: 'numeric'},
				{name:'num_formulario', type: 'string'},
				{name:'fecha_vence', type: 'date', dateFormat:'Y-m-d H:i:s'},
				{name:'fecha_factura', type: 'date', dateFormat:'Y-m-d H:i:s'},
				{name:'id_moneda', type: 'numeric'},
				{name:'consumo_periodo', type: 'string'},
				{name:'lectura_ant', type: 'string'},
				{name:'id_usuario_reg', type: 'numeric'},
				{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
				{name:'id_usuario_mod', type: 'numeric'},
				{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
				{name:'usr_reg', type: 'string'},
				{name:'usr_mod', type: 'string'},
				
			],
	sortInfo:{
		field: 'periodo',
		direction: 'ASC'
	},
	
	preparaMenu:function(tb)
	{
			//llamada funcion clace padre
			Phx.vista.Cliente.superclass.preparaMenu.call(this,tb);
	}
	}
)
</script>
		
		