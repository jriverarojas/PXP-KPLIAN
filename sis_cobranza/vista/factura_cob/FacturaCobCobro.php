<?php
/**
*@package pXP
*@file gen-FacturaCob.php
*@author  (gvelasquez)
*@date 23-09-2011 17:21:15
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
include_once("FacturaCobAbs.php");
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.FacturaCobCobro=Ext.extend(Phx.vista.FacturaCobAbs,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.FacturaCobCobro.superclass.constructor.call(this,config);
		this.init();
		

	
		
		//agregamos boton para mostrar ventana hijo
		//this.addButton('btn_PagarFactura',{text:'Pagar Facturas',iconCls: 'blist',disabled:true,handler:btn_PagarFactura,tooltip: '<b>Pagar Factura</b><br/>Permite pagar e imprimir las facturas seleccionadas'});
		
		//agregamos boton para mostrar ventana hijo
		//this.addButton('btn_DetalleFactura',{text:'Detalle Factura',iconCls: 'blist',disabled:true,handler:btn_DetalleFactura,tooltip: '<b>Detalle Factura</b><br/>Detalle de los conceptos registrados en la factura'});
		
		//this.bloquearMenus();
		//this.load({params:{start:0, limit:50}});
		
		/*function btn_PagarFactura()
		{					
			var rec=this.sm.getSelected();
			
			//guardar en la base de datos las facturas pagadas
			
			//generar un solo reporte para imprimir las facturas pagadas
			
			//actualizar el listado

			Phx.CP.loadWindows('../../../sis_cobranza/vista/factura_cob_det/FacturaCobDet.php',
					'PagarFacatura',
					{
						modal:true,
						width:900,
						height:400
				    },rec.data,this.idContenedor,'FacturaCobDet')			
		}*/
		
		/*function btn_DetalleFactura()
		{					
			var rec=this.sm.getSelected();
			
			//console.log('rec del sensor',rec)

			Phx.CP.loadWindows('../../../sis_cobranza/vista/factura_cob_det/FacturaCobDet.php',
					'FacturaCobDet',
					{
						modal:true,
						width:900,
						height:400
				    },rec.data,this.idContenedor,'FacturaCobDet')			
		}*/
	},
	
	loadValoresIniciales:function()
	{
		Phx.vista.FacturaCobCobro.superclass.loadValoresIniciales.call(this);
	//	this.getComponente('id_cobro').setValue(this.maestro.id_cobro);		
	},
				
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_cobro:this.maestro.id_cobro};
		this.load({params:{start:0, limit:50,}});			
	}
	
	
	}
)
</script>
		
		