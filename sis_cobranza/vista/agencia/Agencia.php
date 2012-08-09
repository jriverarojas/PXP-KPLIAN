<?php
/**
*@package pXP
*@file gen-Agencia.php
*@author  (fprudencio)
*@date 20-09-2011 19:15:41
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Agencia=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Agencia.superclass.constructor.call(this,config);
		this.init();
		//this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_agencia'
			},
			type:'Field',
			form:true 
		},
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_enti_fin'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'nombre',
				fieldLabel: 'Nombre Agencia',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'agen.nombre',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		
		{
			config:{
				name: 'codigo',
				fieldLabel: 'Codigo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:15
			},
			type:'TextField',
			filters:{pfiltro:'agen.codigo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'observaciones',
				fieldLabel: 'Observaciones',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:500
			},
			type:'TextField',
			filters:{pfiltro:'agen.observaciones',type:'string'},
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
			filters:{pfiltro:'agen.estado_reg',type:'string'},
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
			filters:{pfiltro:'agen.fecha_reg',type:'date'},
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
			filters:{pfiltro:'agen.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Agencia',
	ActSave:'../../sis_cobranza/control/Agencia/insertarAgencia',
	ActDel:'../../sis_cobranza/control/Agencia/eliminarAgencia',
	ActList:'../../sis_cobranza/control/Agencia/listarAgencia',
	id_store:'id_agencia',
	
	loadValoresIniciales:function()
	{
		Phx.vista.Agencia.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_enti_fin').setValue(this.maestro.id_enti_fin);		
	},
	
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_enti_fin:this.maestro.id_enti_fin};
		this.load({params:{start:0, limit:50}});			
	},
	
	fields: [
		{name:'id_agencia', type: 'numeric'},
		{name:'observaciones', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'nombre', type: 'string'},
		{name:'id_enti_fin', type: 'numeric'},
		{name:'codigo', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	
	/*south:{
		  url:'../../../sis_cobranza/vista/sistema_dist_agencia/SistemaDistAgenciaEnt.php',
		  title:'Sistema de Distribucion', 
		  height:'50%',	//altura de la ventana hijo
		  cls:'SistemaDistAgenciaEnt'
		 },*/
		 
	tabsouth:[
	     
	    {
		  url:'../../../sis_cobranza/vista/sistema_dist_agencia/SistemaDistAgenciaEnt.php',
		  title:'Sistema de Distribucion', 
		  height:'50%',
		  cls:'SistemaDistAgenciaEnt'
		 },
		 {
		  url:'../../../sis_cobranza/vista/caja/CajaAgencia.php',
		  title:'Cajas', 
		  //width:'50%',
		  height:'50%',
		  cls:'CajaAgencia'
		 }		]	, 
		 
	sortInfo:{
		field: 'id_agencia',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		