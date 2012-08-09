<?php
/**
*@package pXP
*@file gen-CorteMoneda.php
*@author  (fprudencio)
*@date 29-09-2011 10:47:42
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.CorteMoneda=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.CorteMoneda.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_corte'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'importe_valor',
				fieldLabel: 'importe_valor',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
			type:'NumberField',
			filters:{pfiltro:'cormon.importe_valor',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_moneda',
				fieldLabel: 'Moneda',
				allowBlank: false,
				emptyText:'Moneda...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_parametros/control/Moneda/listarMoneda',
					id: 'id_moneda',
					root:'datos',
					sortInfo:{
						field:'cuenta',
						direction:'ASC'
					},
					totalProperty:'total',
					fields: ['id_moneda','moneda','codigo'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'moneda'}
				}),
				valueField: 'id_moneda',
				displayField: 'moneda',
				gdisplayField:'moneda',
				//hiddenName: 'id_administrador',
				forceSelection:true,
				typeAhead: true,
    			triggerAction: 'all',
    			lazyRender:true,
				mode:'remote',
				pageSize:50,
				queryDelay:500,
				width:210,
				gwidth:220,
				minChars:2,
				renderer:function (value, p, record){return String.format('{0}', record.data['moneda']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'moneda.moneda',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'tipo_corte',
				fieldLabel: 'tipo_corte',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:65536
			},
			type:'NumberField',
			filters:{pfiltro:'cormon.tipo_corte',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'descri_corte',
				fieldLabel: 'descri_corte',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:50
			},
			type:'TextField',
			filters:{pfiltro:'cormon.descri_corte',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		}
	],
	title:'Corte de Moneda',
	ActSave:'../../sis_tesoreria/control/CorteMoneda/insertarCorteMoneda',
	ActDel:'../../sis_tesoreria/control/CorteMoneda/eliminarCorteMoneda',
	ActList:'../../sis_tesoreria/control/CorteMoneda/listarCorteMoneda',
	id_store:'id_corte',
	fields: [
		{name:'id_corte', type: 'numeric'},
		{name:'importe_valor', type: 'numeric'},
		{name:'id_moneda', type: 'numeric'},
		{name:'moneda', type: 'string'},
		{name:'tipo_corte', type: 'numeric'},
		{name:'descri_corte', type: 'string'}
		
	],
	sortInfo:{
		field: 'id_corte',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		