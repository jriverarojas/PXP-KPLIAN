<?php
/**
*@package pXP
*@file gen-FacturaCobCliente.php
*@author  (gvelasquez)
*@date 23-09-2011 17:21:15
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
include_once("FacturaCobAbs.php");
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.FacturaCobCliente=Ext.extend(Phx.vista.FacturaCobAbs,{

	//para permitir que la grilla acepte checkbox
	CheckSelectionModel:true,
	tam_pag:20,//registro por paginas del grid

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.FacturaCobCliente.superclass.constructor.call(this,config);
		//this.init();
		this.sm.selectAll=function()
		{
			this.suspendEvents(false);
			
			  Ext.grid.CheckboxSelectionModel.superclass.selectAll.call(this);
			
			this.resumeEvents();
		}
		
		this.sm.clearSelections=function(fast){
			this.suspendEvents(false);
		  	Ext.grid.CheckboxSelectionModel.superclass.clearSelections.call(this,fast);
			this.resumeEvents();
		}
		
		//console.log('>>>>>>>>>>>>>>>>>>',this.sm);
		this.sm.on('rowselect',function(a,b,c,e,f){
			// console.log(a,b,c,e,f)			  
			//this.sm.selectPrevious(false);
			console.log(this.grid.store.getCount() );
			  
			this.sm.suspendEvents(false)
			//if(!this.sm.isSelected(b-1)){
			this.sm.selectRange(0,b,true)
			this.sm.deselectRange(b+1 , this.grid.store.getCount()-1)
			//}
            this.sm.resumeEvents();
			 
		},this
		) 
		
		
		
		this.sm.on('rowdeselect',function(a,b,c,e,f)
		    {
			  //console.log(a,b,c,e,f)			  
			  //this.sm.selectPrevious(false);
			  //console.log(this.grid.store.getCount() );
			  
			  this.sm.suspendEvents(false)
			   //if(!this.sm.isSelected(b-1)){
			      this.sm.selectRange(0,b-1,true)
				   this.sm.deselectRange(b , this.grid.store.getCount()-1)
			   //}
               this.sm.resumeEvents();
			 
		    },this
		) 	
			
		
		//agregamos boton para mostrar ventana hijo con el detalle
		this.addButton('btn_PagarFactura',{text:'Pagar Facturas',iconCls: 'bpagar',disabled:true,handler:btn_PagarFactura,tooltip: '<b>Pagar Factura</b><br/>Permite pagar e imprimir las facturas seleccionadas'});
		
		//agregamos boton para mostrar ventana hijo
		//this.addButton('btn_DetalleFactura',{text:'Detalle Factura',iconCls: 'blist',disabled:true,handler:btn_DetalleFactura,tooltip: '<b>Detalle Factura</b><br/>Detalle de los conceptos registrados en la factura'});
		
		//this.bloquearMenus();
		//this.load({params:{start:0, limit:50}});
		
		function btn_PagarFactura()  
		{					
			//var rec=this.sm.getSelected();			
			//guardar en la base de datos las facturas pagadas			
			//generar un solo reporte para imprimir las facturas pagadas
			
			//actualizar el listado
			//alert(rec.data.id_cliente);
			//this.onButtonEdit();
			this.window.show();
			
			//recupera los registros seleccionados 
			var filas=this.sm.getSelections();
			var data= {},aux={};
			var suma_importe=0;
			var identificadores='';
			var cliente='';
			
			//console.log(filas,i)
			
            //arma una matriz de los identificadores de registros que se van a pagar
			for(var i=0; i<this.sm.getCount(); i++){
				aux={};
				aux[this.id_store]=filas[i].data[this.id_store];
				//console.log(filas)  				 
				data[i]=aux;
				data[i]._fila=this.store.indexOf(filas[i])+1;
				//console.log(data[i]) ; 				
				//console.log(filas[i]);
				
				if( i == 0 ) 
				{
					identificadores = filas[i].data.id_factura_cob ;
					cliente = filas[i].data.id_cliente ;
				}
				else
				{
					identificadores = identificadores +','+ filas[i].data.id_factura_cob ;
				}
				
				console.log(identificadores);
				suma_importe = suma_importe + parseFloat(filas[i].data.importe_total);
				
				//console.log(suma_importe);
			}
			this.getComponente('id_factura_cob').setValue( identificadores);
			this.getComponente('facturas_pagadas').setValue( this.sm.getCount() );
			this.getComponente('acumulado').setValue( suma_importe );		
			this.getComponente('id_cliente').setValue( cliente );		
			this.getComponente('importe_recibido').setValue( '' );	
			this.getComponente('importe_cambio').setValue( '' );
			//Se establece el valor mínimo del monto a recibir como el total a pagar
			this.getComponente('importe_recibido').minValue=suma_importe;	
		}
		
		//cuando es un hijo de pestañas es necessario iniciar 
		//onEnablePanel al para cargar los datos del padre
		  if(Phx.CP.getPagina(this.idContenedorPadre))
		  {
			 var dataMaestro=Phx.CP.getPagina(this.idContenedorPadre).getSelectedData();
			 if(dataMaestro)
			 {
				this.onEnablePanel(this,dataMaestro)
			 }
		  }
		
		this.iniciarEventos();		
	},
	
	ActSave:'../../sis_cobranza/control/FacturaCob/pagarFacturaCob',
	loadValoresIniciales:function()
	{
		Phx.vista.FacturaCobCliente.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_cliente').setValue(this.maestro.id_cliente);		
	},
	
	iniciarEventos:function(){
		var cmpRecibido=this.getComponente('importe_recibido');
		//Habilita la propiedad de eventos para que puedan utilizarse los eventos de las teclas presionadas
		cmpRecibido.enableKeyEvents=true;
		//Se habilita evento al soltar la tecla
		cmpRecibido.on('keyup', function(){ 
			var cambio_factura;
			cambio_factura=parseFloat(cmpRecibido.getValue()) - parseFloat(this.getComponente('acumulado').getValue());
			cambio_factura=Math.round(cambio_factura*100)/100;
			this.getComponente('importe_cambio').setValue(cambio_factura)
			
		},this);
	},	
	successSave: function(resp){
		var resp_json=Ext.util.JSON.decode(Ext.util.Format.trim(resp.responseText));
		var cambio=Ext.util.Format.number(resp_json.ROOT.datos.cambio,Ext.FORMATO_MONETARIO);
		Phx.vista.FacturaCobCliente.superclass.successSave.call(this,resp);
		Ext.Msg.alert('Información adicional','Cambio total: <font size="8"><b>Bs.'+cambio+'</b></font>');
	} ,
	onReloadPage:function(m){
		this.maestro=m;						
		this.store.baseParams={id_cliente:this.maestro.id_cliente};
		this.load({params:{start:0, limit:this.tam_pag}});  //, tam_pag:10
		//this.getComponente('id_factura_cob').store.baseParams.id_cliente=maestro.id_cliente;
					
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
		        id_grupo:0
			}
			]
		}],
		
	preparaMenu:function(tb)
	{
			//llamada funcion clace padre
			this.getBoton('btn_PagarFactura').enable();
			Phx.vista.FacturaCobCliente.superclass.preparaMenu.call(this,tb);
	}	
	
	}
)
</script>
		
		