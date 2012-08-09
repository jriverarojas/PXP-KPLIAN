<?php
/**
*@package pXP
*@file gen-FacturaCobDet.php
*@author  (gvelasquez)
*@date 23-09-2011 16:47:28
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.FacturaCobDet=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.FacturaCobDet.superclass.constructor.call(this,config);
		this.init();
		//this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_factura_cob_det'
			},
			type:'Field',
			form:true 
		},
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
				name: 'id_tasa',
				fieldLabel: 'Tasa',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'TextField',
			filters:{pfiltro:'facode.id_tasa',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_descuento',
				fieldLabel: 'Descuento',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'TextField',
			filters:{pfiltro:'facode.id_descuento',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'importe',
				fieldLabel: 'Importe',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
			type:'TextField',
			filters:{pfiltro:'facode.importe',type:'string'},
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
			filters:{pfiltro:'facode.estado_reg',type:'string'},
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
				fieldLabel: 'Fecha creación',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'facode.fecha_reg',type:'date'},
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
			filters:{pfiltro:'facode.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Detalle Cobro',
	ActSave:'../../sis_cobranza/control/FacturaCobDet/insertarFacturaCobDet',
	ActDel:'../../sis_cobranza/control/FacturaCobDet/eliminarFacturaCobDet',
	ActList:'../../sis_cobranza/control/FacturaCobDet/listarFacturaCobDet',
	id_store:'id_factura_cob_det',
	
	loadValoresIniciales:function()
	{
		Phx.vista.FacturaCobDet.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_factura_cob').setValue(this.maestro.id_factura_cob);		
	},
	
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_factura_cob:this.maestro.id_factura};
		this.load({params:{start:0, limit:50}});			
	},
	
	fields: [
		{name:'id_factura_cob_det', type: 'numeric'},
		{name:'id_tasa', type: 'numeric'},
		{name:'id_descuento', type: 'numeric'},
		{name:'importe', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'id_factura_cob', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_factura_cob_det',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		