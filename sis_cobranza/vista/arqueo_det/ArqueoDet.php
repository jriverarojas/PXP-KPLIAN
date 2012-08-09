<?php
/**
*@package pXP
*@file gen-ArqueoDet.php
*@author  (fprudencio)
*@date 29-09-2011 17:20:27
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ArqueoDet=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.ArqueoDet.superclass.constructor.call(this,config);
		this.init();
		this.bloquearMenus()
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_arqueo_det'
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
			filters:{pfiltro:'arqdet.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'cantidad',
				fieldLabel: 'cantidad',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'arqdet.cantidad',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_corte',
				fieldLabel: 'Corte de Moneda',
				allowBlank: false,
				emptyText:'Corte...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_tesoreria/control/CorteMoneda/listarCorteMoneda',
					id: 'id_corte',
					root:'datos',
					sortInfo:{
						field:'descri_corte',
						direction:'ASC'
					},
					totalProperty:'total',
					fields: ['id_corte','descri_corte'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'descri_corte'}
				}),
				valueField: 'id_corte',
				displayField: 'descri_corte',
				gdisplayField:'descri_corte',
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
				renderer:function (value, p, record){return String.format('{0}', record.data['descri_corte']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'cormon.descri_corte',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'importe',
				fieldLabel: 'importe',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
			type:'NumberField',
			filters:{pfiltro:'arqdet.importe',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				labelSeparator:'',
					inputType:'hidden',
					name: 'id_arqueo'
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
			filters:{pfiltro:'arqdet.fecha_reg',type:'date'},
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
			filters:{pfiltro:'arqdet.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Detalle Arqueo',
	ActSave:'../../sis_cobranza/control/ArqueoDet/insertarArqueoDet',
	ActDel:'../../sis_cobranza/control/ArqueoDet/eliminarArqueoDet',
	ActList:'../../sis_cobranza/control/ArqueoDet/listarArqueoDet',
	id_store:'id_arqueo_det',
	loadValoresIniciales:function()
	{
		Phx.vista.ArqueoDet.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_arqueo').setValue(this.maestro.id_arqueo);		
	},
				
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_arqueo:this.maestro.id_arqueo};
		this.load({params:{start:0, limit:50}});			
	},
	fields:[
		{name:'id_arqueo_det', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'cantidad', type: 'numeric'},
		{name:'id_corte', type: 'numeric'},
		{name:'descri_corte', type: 'string'},
		{name:'importe', type: 'numeric'},
		{name:'id_arqueo', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_arqueo_det',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true,
	preparaMenu:function(tb)
	{
			//llamada funcion clace padre
			Phx.vista.ArqueoDet.superclass.preparaMenu.call(this,tb);
	}
	}
)
</script>
		
		