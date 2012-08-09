<?php
/**
*@package pXP
*@file gen-ActivoFijo.php
*@author  (rcm)
*@date 02-02-2012 21:32:39
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ActivoFijo=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.ActivoFijo.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_activo_fijo'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'num_poliza_garantia',
				fieldLabel: 'num_poliza_garantia',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
			type:'TextField',
			filters:{pfiltro:'vehic.num_poliza_garantia',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_ini_dep',
				fieldLabel: 'fecha_ini_dep',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'vehic.fecha_ini_dep',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'tipo_af_bien',
				fieldLabel: 'tipo_af_bien',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'vehic.tipo_af_bien',type:'string'},
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
				maxLength:40
			},
			type:'TextField',
			filters:{pfiltro:'vehic.codigo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'num_factura',
				fieldLabel: 'num_factura',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'vehic.num_factura',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'depreciacion_acum_ant',
				fieldLabel: 'depreciacion_acum_ant',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179654
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.depreciacion_acum_ant',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_sub_tipo_activo',
				fieldLabel: 'id_sub_tipo_activo',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.id_sub_tipo_activo',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_compra',
				fieldLabel: 'fecha_compra',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'vehic.fecha_compra',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_cotizacion',
				fieldLabel: 'id_cotizacion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.id_cotizacion',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_usuario',
				fieldLabel: 'id_usuario',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.id_usuario',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_deposito',
				fieldLabel: 'id_deposito',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.id_deposito',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'tasa_depreciacion',
				fieldLabel: 'tasa_depreciacion',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:655364
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.tasa_depreciacion',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'foto_activo',
				fieldLabel: 'foto_activo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
			type:'TextField',
			filters:{pfiltro:'vehic.foto_activo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_sub_tipo_ant',
				fieldLabel: 'id_sub_tipo_ant',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.id_sub_tipo_ant',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'estado',
				fieldLabel: 'estado',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
			type:'TextField',
			filters:{pfiltro:'vehic.estado',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'vida_util_restante',
				fieldLabel: 'vida_util_restante',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.vida_util_restante',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'descripcion_larga',
				fieldLabel: 'descripcion_larga',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1000
			},
			type:'TextField',
			filters:{pfiltro:'vehic.descripcion_larga',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'orden_compra',
				fieldLabel: 'orden_compra',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
			type:'TextField',
			filters:{pfiltro:'vehic.orden_compra',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_moneda_original',
				fieldLabel: 'id_moneda_original',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.id_moneda_original',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'origen',
				fieldLabel: 'origen',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
			type:'TextField',
			filters:{pfiltro:'vehic.origen',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'tipo_cambio',
				fieldLabel: 'tipo_cambio',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:655365
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.tipo_cambio',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'vida_util_2',
				fieldLabel: 'vida_util_2',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.vida_util_2',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'monto_actual',
				fieldLabel: 'monto_actual',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179654
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.monto_actual',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'monto_actualiz_2',
				fieldLabel: 'monto_actualiz_2',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.monto_actualiz_2',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_moneda',
				fieldLabel: 'id_moneda',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.id_moneda',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'vida_util_original',
				fieldLabel: 'vida_util_original',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.vida_util_original',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_lugar',
				fieldLabel: 'id_lugar',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.id_lugar',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'proyecto',
				fieldLabel: 'proyecto',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
			type:'TextField',
			filters:{pfiltro:'vehic.proyecto',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'clonacion',
				fieldLabel: 'clonacion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
			type:'TextField',
			filters:{pfiltro:'vehic.clonacion',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_clon_origen',
				fieldLabel: 'id_clon_origen',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.id_clon_origen',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_estado_funcional',
				fieldLabel: 'id_estado_funcional',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.id_estado_funcional',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'descripcion',
				fieldLabel: 'descripcion',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'vehic.descripcion',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'tipo',
				fieldLabel: 'tipo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:15
			},
			type:'TextField',
			filters:{pfiltro:'vehic.tipo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'monto_compra',
				fieldLabel: 'monto_compra',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179654
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.monto_compra',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_ultima_deprec',
				fieldLabel: 'fecha_ultima_deprec',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'vehic.fecha_ultima_deprec',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'flag_revaloriz',
				fieldLabel: 'flag_revaloriz',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
			type:'TextField',
			filters:{pfiltro:'vehic.flag_revaloriz',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_depto',
				fieldLabel: 'id_depto',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.id_depto',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'ubicacion_fisica',
				fieldLabel: 'ubicacion_fisica',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:300
			},
			type:'TextField',
			filters:{pfiltro:'vehic.ubicacion_fisica',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'estado_anterior',
				fieldLabel: 'estado_anterior',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
			type:'TextField',
			filters:{pfiltro:'vehic.estado_anterior',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_solicitud_compra',
				fieldLabel: 'id_solicitud_compra',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.id_solicitud_compra',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'con_garantia',
				fieldLabel: 'con_garantia',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
			type:'TextField',
			filters:{pfiltro:'vehic.con_garantia',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'observaciones',
				fieldLabel: 'observaciones',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1000
			},
			type:'TextField',
			filters:{pfiltro:'vehic.observaciones',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_cotizacion_det',
				fieldLabel: 'id_cotizacion_det',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.id_cotizacion_det',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'monto_compra_mon_orig',
				fieldLabel: 'monto_compra_mon_orig',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179654
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.monto_compra_mon_orig',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'depreciacion_periodo',
				fieldLabel: 'depreciacion_periodo',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179654
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.depreciacion_periodo',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_fin_gar',
				fieldLabel: 'fecha_fin_gar',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'vehic.fecha_fin_gar',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_unidad_constructiva',
				fieldLabel: 'id_unidad_constructiva',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.id_unidad_constructiva',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'codigo_ant',
				fieldLabel: 'codigo_ant',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:40
			},
			type:'TextField',
			filters:{pfiltro:'vehic.codigo_ant',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'depreciacion_acum',
				fieldLabel: 'depreciacion_acum',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179654
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.depreciacion_acum',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'valor_rescate',
				fieldLabel: 'valor_rescate',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.valor_rescate',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'monto_actualiz',
				fieldLabel: 'monto_actualiz',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
			type:'NumberField',
			filters:{pfiltro:'vehic.monto_actualiz',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_reg',
				fieldLabel: 'Fecha creación',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'vehic.fecha_reg',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Vehículos',
	ActSave:'../../sis_gestion_vehicular/control/ActivoFijo/insertarActivoFijo',
	ActDel:'../../sis_gestion_vehicular/control/ActivoFijo/eliminarActivoFijo',
	ActList:'../../sis_gestion_vehicular/control/ActivoFijo/listarActivoFijo',
	id_store:'id_activo_fijo',
	fields: [
		{name:'id_activo_fijo', type: 'numeric'},
		{name:'num_poliza_garantia', type: 'string'},
		{name:'fecha_ini_dep', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'tipo_af_bien', type: 'string'},
		{name:'codigo', type: 'string'},
		{name:'num_factura', type: 'string'},
		{name:'depreciacion_acum_ant', type: 'numeric'},
		{name:'id_sub_tipo_activo', type: 'numeric'},
		{name:'fecha_compra', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_cotizacion', type: 'numeric'},
		{name:'id_usuario', type: 'numeric'},
		{name:'id_deposito', type: 'numeric'},
		{name:'tasa_depreciacion', type: 'numeric'},
		{name:'foto_activo', type: 'string'},
		{name:'id_sub_tipo_ant', type: 'numeric'},
		{name:'estado', type: 'string'},
		{name:'vida_util_restante', type: 'numeric'},
		{name:'descripcion_larga', type: 'string'},
		{name:'orden_compra', type: 'string'},
		{name:'id_moneda_original', type: 'numeric'},
		{name:'origen', type: 'string'},
		{name:'tipo_cambio', type: 'numeric'},
		{name:'vida_util_2', type: 'numeric'},
		{name:'monto_actual', type: 'numeric'},
		{name:'monto_actualiz_2', type: 'numeric'},
		{name:'id_moneda', type: 'numeric'},
		{name:'vida_util_original', type: 'numeric'},
		{name:'id_lugar', type: 'numeric'},
		{name:'proyecto', type: 'string'},
		{name:'clonacion', type: 'string'},
		{name:'id_clon_origen', type: 'numeric'},
		{name:'id_estado_funcional', type: 'numeric'},
		{name:'descripcion', type: 'string'},
		{name:'tipo', type: 'string'},
		{name:'monto_compra', type: 'numeric'},
		{name:'fecha_ultima_deprec', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'flag_revaloriz', type: 'string'},
		{name:'id_depto', type: 'numeric'},
		{name:'ubicacion_fisica', type: 'string'},
		{name:'estado_anterior', type: 'string'},
		{name:'id_solicitud_compra', type: 'numeric'},
		{name:'con_garantia', type: 'string'},
		{name:'observaciones', type: 'string'},
		{name:'id_cotizacion_det', type: 'numeric'},
		{name:'monto_compra_mon_orig', type: 'numeric'},
		{name:'depreciacion_periodo', type: 'numeric'},
		{name:'fecha_fin_gar', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_unidad_constructiva', type: 'numeric'},
		{name:'codigo_ant', type: 'string'},
		{name:'depreciacion_acum', type: 'numeric'},
		{name:'valor_rescate', type: 'numeric'},
		{name:'monto_actualiz', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_activo_fijo',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		