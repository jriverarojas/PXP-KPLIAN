<?php
/**
*@package pXP
*@file gen-ImportarFacturResum.php
*@author  (jmita)
*@date 18-10-2011 10:41:58
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ImportarFacturResum=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.ImportarFacturResum.superclass.constructor.call(this,config);
		this.init();
		this.bloquearMenus()
	},
			
	Atributos:[
		
		{
			config:{
				name: 'periodo',
				fieldLabel: 'Periodo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
			type:'TextField',
			filters:{pfiltro:'periodo',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'gestion',
				fieldLabel: 'Gestión',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'TextField',
			filters:{pfiltro:'gestion',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'cant_clientes',
				fieldLabel: 'Cantidad Clientes',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'TextField',
			filters:{pfiltro:'cant_clientes',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'importe_total',
				fieldLabel: 'Importe Total',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'TextField',
			filters:{pfiltro:'importe_total',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Resumen Facturación',
	//ActSave:'../../sis_cobranza/control/SistemaDistUsuario/insertarSistemaDistUsuario',
	//ActDel:'../../sis_cobranza/control/SistemaDistUsuario/eliminarSistemaDistUsuario',
	ActList:'../../sis_cobranza/control/FacturacionPeriodo/listarFacturacionPeriodo',
	id_store:'periodo',
	loadValoresIniciales:function()
	{
		Phx.vista.ImportarFacturResum.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_sistema_dist').setValue(this.maestro.id_sistema_dist);		
	},
				
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_sistema_dist:this.maestro.id_sistema_dist};
		this.load({params:{start:0, limit:50}});			
	},
	fields: [
		{name:'periodo', type: 'numeric'},
		{name:'gestion', type: 'numeric'},
		{name:'cant_clientes', type: 'numeric'},
		{name:'importe_total', type: 'numeric'},
		
	],
	sortInfo:{
		field: 'fc.gestion DESC, fc.periodo',
		direction: 'ASC'
	},
	bdel:false,
	bsave:false,
	bnew:false,
	bedit:false,
	bexcel:false,
	//sobre carga de funcion
	south:{
		  url:'../../../sis_cobranza/vista/cliente/ClienteFacturado.php',
		  title:'Clientes Facturados', 
		  height:'40%',
		  cls:'ClienteFacturado'
		 },
	preparaMenu:function(tb)
	{
			//llamada funcion clace padre
			Phx.vista.ImportarFacturResum.superclass.preparaMenu.call(this,tb);
	}
	}
)
</script>
		
		