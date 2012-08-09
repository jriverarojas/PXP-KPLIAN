<?php
/**
*@package pXP
*@file gen-Bitacora.php
*@author  (rac)
*@date 02-02-2012 21:38:38
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Bitacora=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Bitacora.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_bitacora'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'id_servicio_det',
				inputType:'hidden',
				labelSeparator:''
			},
			type:'NumberField',
		    form:true
		},
		
		
		{
			config:{
				name: 'fecha',
				fieldLabel: 'fecha',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				format:'d-m-Y',
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'bit.fecha',type:'date'},
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
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'bit.origen',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'destino',
				fieldLabel: 'destino',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'bit.destino',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		
		{
			config:{
				name: 'combustible',
				fieldLabel: 'combustible',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:255
			},
			type:'TextField',
			filters:{pfiltro:'bit.combustible',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
	
		{
			config:{
				name: 'combustible_lts',
				fieldLabel: 'combustible_lts',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
			type:'NumberField',
			filters:{pfiltro:'bit.combustible_lts',type:'numeric'},
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
				maxLength:40
			},
			type:'TextField',
			filters:{pfiltro:'bit.num_factura',type:'string'},
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
			filters:{pfiltro:'bit.importe',type:'numeric'},
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
				maxLength:500
			},
			type:'TextField',
			filters:{pfiltro:'bit.observaciones',type:'string'},
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
			filters:{pfiltro:'bit.estado_reg',type:'string'},
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
			filters:{pfiltro:'bit.fecha_reg',type:'date'},
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
			filters:{pfiltro:'bit.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Bitacora',
	ActSave:'../../sis_gestion_vehicular/control/Bitacora/insertarBitacora',
	ActDel:'../../sis_gestion_vehicular/control/Bitacora/eliminarBitacora',
	ActList:'../../sis_gestion_vehicular/control/Bitacora/listarBitacora',
	id_store:'id_bitacora',
	fields: [
		{name:'id_bitacora', type: 'numeric'},
		{name:'observaciones', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'id_servicio_det', type: 'numeric'},
		{name:'combustible', type: 'string'},
		{name:'combustible_lts', type: 'numeric'},
		{name:'destino', type: 'string'},
		{name:'origen', type: 'string'},
		{name:'fecha', type: 'date', dateFormat:'Y-m-d'},
		{name:'num_factura', type: 'string'},
		{name:'importe', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_bitacora',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true,
	onReloadPage:function(m){
          	this.maestro=m;
			this.Atributos[1].valorInicial=this.maestro.id_servicio_det;
	    	this.store.baseParams={id_servicio_det:this.maestro.id_servicio_det};
			this.load({params:{start:0, limit:50}})

		}
	}
)
</script>
		
		