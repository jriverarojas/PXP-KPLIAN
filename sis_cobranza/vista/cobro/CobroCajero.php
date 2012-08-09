<?php
/**
*@package pXP
*@file gen-Cobro.php
*@author  (gvelasquez)
*@date 27-09-2011 14:59:03
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.CobroCajero=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.CobroCajero.superclass.constructor.call(this,config);
		this.init();
		
		//cuando es un hijo de pestañas es necessario iniciar 
		  //onEnablePanel al para cargar los datos del padre
		  if(Phx.CP.getPagina(this.idContenedorPadre)){
			 var dataMaestro=Phx.CP.getPagina(this.idContenedorPadre).getSelectedData();
			 if(dataMaestro){
				this.onEnablePanel(this,dataMaestro)
			 }
		  }
		
		this.bloquearMenus();
		//console.log('constructor');
		this.iniciarEventos();
		//this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_cobro'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				labelSeparator:'',
				inputType:'hidden',
				name: 'id_cajero'
			},
			type:'Field',			
			form:true
		},
		{
			config:{
				labelSeparator:'',
				inputType:'hidden',
				name: 'id_cliente'
			},
			type:'Field',			
			form:true
		},
		{
       			config:{
       				name:'id_factura_cob',
       				fieldLabel:'Facturas',
       				allowBlank:false,
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
       					fields: ['id_factura_cob','gestion','periodo','nombre_factura','importe_total', 'desc_factura'],
       					// turn on remote sorting
       					remoteSort: true,						
						//baseParams:{id_cliente:this.maestro.id_cliente}
       					baseParams:{par_filtro:'periodo'}
       					
       				}),
       				valueField: 'id_factura_cob',
       				displayField: 'desc_factura',
       				forceSelection:true,
       				typeAhead: true,
           			triggerAction: 'all',
           			lazyRender:true,
       				mode:'remote',
       				pageSize:12,
       				queryDelay:1000,
					
       				//width:650,
       				minChars:2,
	       			enableMultiSelect:true,
       			
       				//renderer:function(value, p, record){return String.format('{0}', record.data['descripcion']);}

       			},
       			type:'AwesomeCombo',
       			id_grupo:0,
       			grid:true,
       			form:true
       	},
		{
			config:{
				name: 'cant_facturas',
				fieldLabel: 'Cantidad de Facturas',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4,
				disabled:true
			},
			type:'NumberField',
			filters:{pfiltro:'cobro.cant_facturas',type:'numeric'},
			id_grupo:1,
			valorInicial:0,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'importe_cobro',
				fieldLabel: 'Importe Total (Bs)',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1310722,
				disabled:true
			},
			type:'NumberField',
			filters:{pfiltro:'cobro.importe_cobro',type:'string'},
			id_grupo:1,
			valorInicial:0,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'importe_recibido',
				fieldLabel: 'Importe Recibido (Bs)',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1310722
			},
			type:'NumberField',
			filters:{pfiltro:'cobro.importe_recibido',type:'string'},
			id_grupo:1,
			valorInicial:0,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'importe_cambio',
				fieldLabel: 'Cambio (Bs)',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1310722,
				disabled:false
			},
			type:'NumberField',
			filters:{pfiltro:'cobro.importe_cambio',type:'string'},
			id_grupo:1,
			valorInicial:0,
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
			filters:{pfiltro:'cobro.estado_reg',type:'string'},
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
			filters:{pfiltro:'cobro.fecha_reg',type:'date'},
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
			filters:{pfiltro:'cobro.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Cobro',
	ActSave:'../../sis_cobranza/control/Cobro/insertarCobro',
	ActDel:'../../sis_cobranza/control/Cobro/eliminarCobro',
	ActList:'../../sis_cobranza/control/Cobro/listarCobro',
	id_store:'id_cobro',
	
	loadValoresIniciales:function()
	{
		Phx.vista.CobroCajero.superclass.loadValoresIniciales.call(this);
		//this.getComponente('id_cliente.setValue(this.maestro.id_cliente)');	 
		this.getComponente('id_cajero').setValue(this.maestro.id_cajero);		
	},
				
	onReloadPage:function(m)
	{
		this.maestro=m;			
		this.store.baseParams.id_cajero=this.maestro.id_cajero;
		this.load({params:{start:0, limit:50}});			
	},
	
	fields: [
		{name:'id_cobro', type: 'numeric'},
		{name:'id_cajero', type: 'numeric'},
		{name:'id_cliente', type: 'numeric'},
		{name:'cant_facturas', type: 'numeric'},
		{name:'importe_cobro', type: 'string'},
		{name:'importe_recibido', type: 'string'},
		{name:'importe_cambio', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'id_factura_cob'},		
	],
	
	east:{
		  url:'../../../sis_cobranza/vista/factura_cob/FacturaCobCobro.php',
		  title:'Facturas Pagadas', 
		  //height:'50%',	//altura de la ventana hijo
		  width:'40%',		//ancho de la ventana hjo
		  cls:'FacturaCobCobro'
		 },	
	
	//estable el manejo de eventos del formulario
	iniciarEventos:function()
	{		
		//console.log('entra_antes');
		//cuando se tikea un registro salta este evento
		this.getComponente('id_factura_cob').on('entrycheck',function(combo,record,index){
				
				//console.log(internal.getCount());
				/*console.log(combo);
				console.log(record);
				console.log(index);*/				
				this.getComponente('cant_facturas').setValue(combo.internal.getCount());
				//this.getComponente('importe_cobro').setValue(  this.getComponente('importe_cobro').getValue()  + record.data.importe_total  )	
				
				/*console.log(parseFloat( this.getComponente('importe_cobro').getValue() ) );
				console.log(parseFloat( record.data.importe_total ));*/
				this.getComponente('importe_cobro').setValue( parseFloat( this.getComponente('importe_cobro').getValue() ) + parseFloat( record.data.importe_total ) )					
				//console.log('ZZZZZZZZZZZZZZZZ')
				
		},this);
		
		//cuando
		this.getComponente('id_factura_cob').on('entryuncheck',function(combo,record,index){				
				//console.log('id_factura_cob','entryuncheck')
				this.getComponente('cant_facturas').setValue(combo.internal.getCount());			
				this.getComponente('importe_cobro').setValue(parseFloat( this.getComponente('importe_cobro').getValue() ) - parseFloat( record.data.importe_total ) )		
			
		},this);
		
		//console.log('antes')
		this.getComponente('importe_recibido').on('blur', function() { 
			
			this.getComponente('importe_cambio').setValue(parseFloat(this.getComponente('importe_recibido').getValue() ) - parseFloat ( this.getComponente('importe_cobro').getValue() ) )  },this)	
		//console.log('despues')
		
	},
	
	sortInfo:{
		field: 'id_cobro',
		direction: 'ASC'
	},
	bdel:false,
	bsave:false,
	bexcel:false,
	bnew:false,
	bedit:false
	}
)
</script>
		
		