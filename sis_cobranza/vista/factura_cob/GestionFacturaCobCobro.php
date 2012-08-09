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
Phx.vista.GestionFacturaCobCobro=Ext.extend(Phx.vista.FacturaCobAbs,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre 
		Phx.vista.GestionFacturaCobCobro.superclass.constructor.call(this,config);
		this.init();

		//Agregación de botones
        this.addButton('btn_AnularFactura',{text:'Anular Factura',iconCls: 'blist',disabled:true,handler:btn_AnularFactura,tooltip: '<b>Anular Factura</b><br/>Permite anular la factura seleccionada'});
		this.addButton('btnImpFact',{text:'Reimprimir Factura',iconCls: 'bpagar',disabled:true,handler:btnImpFact,tooltip: '<b>Reimprimir Factura</b><br/>Permite la reimpresión de la factura'});

		//Funciones para los handlers de los botones
		function btn_AnularFactura(){					
			var data_id_factura_cob=this.sm.getSelected().data.id_factura_cob;
			var data_id_cobro=this.sm.getSelected().data.id_cobro;
			var data_importe_total=this.sm.getSelected().data.importe_total;
			var data_id_cliente=this.sm.getSelected().data.id_cliente;
			Phx.CP.loadingShow();
			Ext.Ajax.request({
				// form:this.form.getForm().getEl(),
				url:'../../sis_cobranza/control/FacturaCob/anularFactura',
				params:{'id_factura_cob':data_id_factura_cob,'id_cobro':data_id_cobro,'importe_total':data_importe_total,'id_cliente':data_id_cliente},
				success:this.successSinc,
				failure: this.conexionFailure,
				timeout:this.timeout,
				scope:this
			});		
		}
		function btnImpFact(){
			var data=this.sm.getSelected().data;
			Phx.CP.loadingShow();
			Ext.Ajax.request({
				url:'../../sis_cobranza/control/FacturaCob/repFactura',
				params:{'id_factura_cob':data.id_factura_cob},
				success:this.successSinc,
				failure: this.conexionFailure,
				timeout:this.timeout,
				scope:this
			});
		}
	},
	successSinc:function(resp){			
			Phx.CP.loadingHide();
			var reg = Ext.util.JSON.decode(Ext.util.Format.trim(resp.responseText));
			if(!reg.ROOT.error){
				alert(reg.ROOT.detalle.mensaje)				
			}else{
				
				alert('ocurrio un error durante el proceso')
			}
			this.reload();
		},	
	loadValoresIniciales:function()
	{
		Phx.vista.FacturaCobCobro.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_cobro').setValue(this.maestro.id_cobro);		
	},				
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_cliente:this.maestro.id_cliente,estado_fac:'pagado'};
		this.load({params:{start:0, limit:50}});			
	},
	Grupos:[{ 
		layout: 'column',
		items:[
			{
				xtype:'fieldset',
				layout: 'form',
                border: true,
                title: 'Pago de Facturas',
                bodyStyle: 'padding:0 10px 0;',
                columnWidth: '.5',
                items:[],
		        id_grupo:0,
			}
			]
		}]
	}
)
</script>
		
		